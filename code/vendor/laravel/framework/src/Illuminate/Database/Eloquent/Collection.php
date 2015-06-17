<?php namespace Illuminate\Database\Eloquent;

use Illuminate\Support\Collection as BaseCollection;

class Collection extends BaseCollection {

	/**
	 * Load a set of relationships onto the collection.
	 *
	 * @param  mixed  $relations
	 * @return $this
	 */
	public function load($relations)
	{
		if (count($this->items) > 0)
		{
			if (is_string($relations)) $relations = func_get_args();

			$query = $this->first()->newQuery()->with($relations);

			$this->items = $query->eagerLoadRelations($this->items);
		}

		return $this;
	}

	/**
	 * Determine if a key exists in the collection.
	 *
	 * @param  mixed  $key
	 * @return bool
	 */
	public function contains($key)
	{
		return ! is_null($this->find($key));
	}

	/**
	 * Diff the collection with the given items.
	 *
	 * @param  \ArrayAccess|array  $items
	 * @return static
	 */
	public function diff($items)
	{
		$diff = new static;

		$dictionary = $this->getDictionary($items);

		foreach ($this->items as $item)
		{
			if ( ! isset($dictionary[$item->getKey()]))
			{
				$diff->add($item);
			}
		}

		return $diff;
	}

	/**
	 * Fetch a nested element of the collection.
	 *
	 * @param  string  $key
	 * @return static
	 */
	public function fetch($key)
	{
		return new static(array_fetch($this->toArray(), $key));
	}

	/**
	 * Intersect the collection with the given items.
	 *
 	 * @param  \ArrayAccess|array  $items
	 * @return static
	 */
	public function intersect($items)
	{
		$intersect = new static;

		$dictionary = $this->getDictionary($items);

		foreach ($this->items as $item)
		{
			if (isset($dictionary[$item->getKey()]))
			{
				$intersect->add($item);
			}
		}

		return $intersect;
	}

	/**
	 * Merge the collection with the given items.
	 *
	 * @param  \ArrayAccess|array  $items
	 * @return static
	 */
	public function merge($items)
	{
		$dictionary = $this->getDictionary();

		foreach ($items as $item)
		{
			$dictionary[$item->getKey()] = $item;
		}

		return new static(array_values($dictionary));
	}

	/**
	 * Return only unique items from the collection.
	 *
	 * @return static
	 */
	public function unique()
	{
		$dictionary = $this->getDictionary();

		return new static(array_values($dictionary));
	}

	/**
	 * Find a model in the collection by key.
	 *
	 * @param  mixed  $key
	 * @param  mixed  $default
	 * @return \Illuminate\Database\Eloquent\Model
	 */
	public function find($key, $default = null)
	{
		if ($key instanceof Model)
		{
			$key = $key->getKey();
		}

		return array_first($this->items, function($itemKey, $model) use ($key)
		{
			return $model->getKey() == $key;

		}, $default);
	}

	/**
	 * Get a dictionary keyed by primary keys.
	 *
	 * @param  \ArrayAccess|array  $items
	 * @return array
	 */
	public function getDictionary($items = null)
	{
		$items = is_null($items) ? $this->items : $items;

		$dictionary = array();

		foreach ($items as $value)
		{
			$dictionary[$value->getKey()] = $value;
		}

		return $dictionary;
	}

	/**
	 * Add an item to the collection.
	 *
	 * @param  mixed  $item
	 * @return $this
	 */
	public function add($item)
	{
		$this->items[] = $item;

		return $this;
	}

	/**
	 * Get the max value of a given key.
	 *
	 * @param  string  $key
	 * @return mixed
	 */
	public function max($key)
	{
		return $this->reduce(function($result, $item) use ($key)
		{
			return (is_null($result) || $item->{$key} > $result) ? $item->{$key} : $result;
		});
	}

	/**
	 * Get the min value of a given key.
	 *
	 * @param  string  $key
	 * @return mixed
	 */
	public function min($key)
	{
		return $this->reduce(function($result, $item) use ($key)
		{
			return (is_null($result) || $item->{$key} < $result) ? $item->{$key} : $result;
		});
	}

	/**
	 * Get the array of primary keys
	 *
	 * @return array
	 */
	public function modelKeys()
	{
		return array_map(function($m) { return $m->getKey(); }, $this->items);
	}

	/**
	 * Returns only the models from the collection with the specified keys.
	 *
	 * @param  mixed  $keys
	 * @return static
	 */
	public function only($keys)
	{
		$dictionary = array_only($this->getDictionary(), $keys);

		return new static(array_values($dictionary));
	}

	/**
	 * Returns all models in the collection except the models with specified keys.
	 *
	 * @param  mixed  $keys
	 * @return static
	 */
	public function except($keys)
	{
		$dictionary = array_except($this->getDictionary(), $keys);

		return new static(array_values($dictionary));
	}

	/**
	 * Get a base Support collection instance from this collection.
	 *
	 * @return \Illuminate\Support\Collection
	 */
	public function toBase()
	{
		return new BaseCollection($this->items);
	}

}
