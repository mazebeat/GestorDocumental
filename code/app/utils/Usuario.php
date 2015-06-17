<?php namespace App\Util;

/**
 * Class Usuario
 * @package App\Util
 */
class Usuario{
	/**
	 * @var
	 */
	private $identify;
	/**
	 * @var
	 */
	private $first_name;
	/**
	 * @var
	 */
	private $last_name;
	/**
	 * @var
	 */
	private $username;

	/**
	 * @param $identify
	 * @param $first_name
	 * @param $last_name
	 * @param $username
	 */
	public function __construct($identify,$first_name,$last_name,$username){
		$this->identify=$identify;
		$this->first_name=$first_name;
		$this->last_name=$last_name;
		$this->username=$username;
	}

	/**
	 * @return mixed
	 */
	public function getFirstName(){
		return $this->first_name;
	}

	/**
	 * @param mixed $first_name
	 */
	public function setFirstName($first_name){
		$this->first_name=$first_name;
	}

	/**
	 * @return mixed
	 */
	public function getIdentify(){
		return $this->identify;
	}

	/**
	 * @param mixed $identify
	 */
	public function setIdentify($identify){
		$this->identify=$identify;
	}

	/**
	 * @return mixed
	 */
	public function getLastName(){
		return $this->last_name;
	}

	/**
	 * @param mixed $last_name
	 */
	public function setLastName($last_name){
		$this->last_name=$last_name;
	}

	/**
	 * @return mixed
	 */
	public function getUsername(){
		return $this->username;
	}

	/**
	 * @param mixed $username
	 */
	public function setUsername($username){
		$this->username=$username;
	}
} 
