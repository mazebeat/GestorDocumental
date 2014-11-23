<?php namespace App\Util;

	//<div class="menu">
	//    <ul>
	//        {{ \HTML::menu_active('/','Home') }}
	//        {{ \HTML::menu_active('page/about','About') }}
	//        {{ \HTML::menu_active('page/contacts','Contacts') }}
	//        {{ \HTML::menu_active('page/service','Service') }}
	//    </ul>
//</div>
\HTML::macro('menu_active', function ($route, $name) {
	if (\Request::is($route . '/*') OR \Request::is($route)) {
		$active = '<li class="active"><a href="' . \URL::to($route) . '">' . $name . '</a></li>';
	} else {
		$active = '<li><a href="' . \URL::to($route) . '">' . $name . '</a></li>';
	}

	return $active;
});

\HTML::macro('create_nav', function () {
});

\HTML::macro('load_documents', function ($dir) {
	$output = '';
	//	var_dump('a_'.substr($dir, 0, 4).'**m_'.substr($dir, 4, 2).'**c_'.substr($dir, 6, strlen($dir)));
	$ws = new \WebServiceController('/GestionDocIntelidata/RetornaListaAlfrescoPort?WSDL');
	$ws->setRutaCarpeta(base64_decode($dir));
	$result = $ws->get('showFolder');

	$element = '<div class="col-xs-6 col-sm-4 col-md-3 %s">
				    <div class="thmb">
				        <div class="ckbox ckbox-default">
				            <input type="checkbox" id="check%d" value="1"/>
				            <label for="check%d"></label>
				        </div>
				        <div class="btn-group fm-group">
				            <button type="button" class="btn btn-default dropdown-toggle fm-toggle" data-toggle="dropdown">
				                <span class="caret"></span>
				            </button>
				            <ul class="dropdown-menu fm-menu" role="menu">
				                <li><a href="' . \URL::to('#') . '"><i class="fa fa-envelope-o fa-fw"></i>Email</a></li>
				                <li><a href="' . \URL::to('#') . '"><i class="fa fa-print fa-fw"></i>Imprimir</a></li>
				                <li><a href="' . \URL::to('#') . '"><i class="fa fa-download fa-fw"></i>Descargar</a></li>
				                <li><a href="' . \URL::to('#') . '"><i class="fa fa-trash-o fa-fw"></i>Eliminar</a></li>
				            </ul>
				        </div>
				        <div class="thmb-prev text-center">
				            <span>%s</span>
				        </div>
				        <h5 class="fm-title"><a href="' . \URL::to('#') . '">%s</a></h5>
				        <small class="text-muted">Agregado: %s</small>
				    </div>
				</div>';

	foreach ($result->lista as $key => $value) {
		$id        = $key;
		$doc_name  = $value;// 'document.xls';
		$extension = $value;// 'xls';
		$type      = $value;// 'document';
		$image_url = $value;// 'images/files/media-%s.png';
		$image     = \HTML::image(sprintf($image_url, $extension), null, array('class' => ''));
		$created   = \Carbon::now($value)->toFormattedDateString();
		$output .= sprintf($element, $type, $id, $id, $image, $doc_name, $created);
	}

	return $output;
});

\HTML::macro('load_tags', function ($metas = array()) {
	if (count($metas) > 0) {
		$tags = '<ul class="tag-list">';
		foreach ($metas as $value) {
			$tags .= sprintf('<li><a href = "' . \URL::to('#') . '">%s</a></li>', $value);
		}
		$tags .= '</ul >';
	} else {
		$tags = '<div class="alert alert-danger">
        <button aria-hidden="true" data-dismiss="alert" class="close" type="button"><i class="fa fa-times"></i></button>
        No se encontraron etiquetas<strong>!</strong>.
    </div>';
	}

	return $tags;
});

\HTML::macro('fast_search', function ($keyword = null) {
	if (isset($keyword)) {
		return;
	}

	return $keyword;
});

\HTML::macro('search_result', function ($keyword = '') {
	if (trim($keyword) === '') {
		return;
	}

	$output = '';

	for ($i = 1; $i <= 3; $i++) {

		$output .= '<tr>
            <td>
                <div class="rdio rdio-primary">' . \Form::radio('user', $i, false, array('id' => $i)) . '<label for="' . $i . '"></label>
                </div>
            </td>
            <td>' . $i . '</td>
            <td>2004/01/23</td>
            <td>16.517.430-6</td>
            <td>888888888888888</td>
            <td>Alexis San Martin</td>
            <td><span class="label label-success">Activo</span></td>
            <td>10</td>
        </tr>';
	}

	return $output;
});

\Form::macro('chosenPerfiles', function ($name = 'perfiles', $options = array()) {
	$perfiles = array();
	$ws       = new \WebServiceController();
	$ws->setRutaCarpeta('');
	$result = $ws->get('showFolder');

	foreach ($result->lista as $key => $value) {
		$perfiles[] = $value;
	}

	return \Form::chosen($name, $perfiles, $options);
});

\Form::macro('chosen', function ($name, $list = array(), $options = array()) {
	$options['class'] .= ' chosen-select';
	if (!isset($options['name']))
		$options['name'] = $name;
	if (!isset($options['id']))
		$options['id'] = $name;

	$html   = array();
	$html[] = '<option value=""></option>';

	foreach ($list as $value => $display) {
		$html[] = sprintf('<option value="%d">%d</option>', $value, $display);
	}

	$options = attributes($options);
	$list    = implode('', $html);

	return "<select{$options}>{$list}</select>";
});

\Form::macro('selectYear2', function ($name, $startYear = null, $endYear = null, $options = array()) {
	if ($endYear == null)
		$endYear = \Carbon\Carbon::now()->year;
	if ($endYear == null)
		$endYear = 1980;

	$years = range($endYear, $startYear);
	$list  = array_combine($years, $years); // [2013 => 2013]

	if (!isset($options['name']))
		$options['name'] = $name;

	$html   = array();
	$html[] = '<option value=""></option>';

	foreach ($list as $value => $display) {
		$html[] = sprintf('<option value="%d">%d</option>', $value, $display);
	}

	$options = attributes($options);
	$list    = implode('', $html);

	return "<select{$options}>{$list}</select>";
});

\Form::macro('checkbox2', function ($name, $title, $class = 'default', $check = false, $options = array()) {
	$output = '<div class="ckbox ckbox-%s">%s%s</div>';
	if (!isset($options['name']))
		$options['name'] = $name;
	if (!isset($options['id']))
		$options['id'] = $name;

	return sprintf($output, $class, \Form::checkbox($name, 1, $check, $options), \Form::label($name, $title, $options));
});

function attributes($attributes)
{
	$html = array();

	foreach ((array)$attributes as $key => $value) {
		$element = attributeElement($key, $value);

		if (!is_null($element))
			$html[] = $element;
	}

	return count($html) > 0 ? ' ' . implode(' ', $html) : '';
}

function attributeElement($key, $value)
{
	if (is_numeric($key))
		$key = $value;

	if (!is_null($value))
		return $key . '="' . e($value) . '"';
}
