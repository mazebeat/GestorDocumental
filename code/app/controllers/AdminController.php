<?php

class AdminController extends BaseController
{
	private $data;
	private $status = 200;
	private $headers = array('ContentType' => 'application/json',
	                         'charset'     => 'utf-8');

	public function __construct()
	{
		$this->beforeFilter('auth');

		if (\Session::token() !== \Input::get('_token')) {
			return \Response::json(array('msg' => 'Unauthorized mfk!'), $this->status, $this->headers);
		}
	}

	public function index()
	{
		return \View::make('dashboard.index');
	}

	public function fastSearch()
	{
		$response = array('status' => 'success',
		                  'msg'    => 'Setting created successfully',);

		return \Response::json($response, $this->status, $this->headers);
	}

	public function search()
	{
		return \View::make('dashboard.busqueda');
	}

	public function searchResult()
	{
		$this->data = \Input::all();
		$word       = array_get($this->data, 'keyword');

		return \View::make('dashboard.busqueda')->with('word', $word);
	}

	public function export()
	{
		$this->data = \Input::all();
		$id         = array_get($this->data, 'user');
		$format     = array_get($this->data, 'format');

		switch (\Str::lower($format)) {
			case 'pdf':
				var_dump('USUARIO : ' . $id . ' FORMATO pdf');
				break;
			case 'xls':
				var_dump('USUARIO : ' . $id . ' FORMATO xls');
				break;
		}
	}

	public function folder($dir = '')
	{
		return View::make('dashboard.carpeta')->with('dir', $dir);
	}

	public function searchFolder()
	{
		$folder = array();
		$ws     = new \WebServiceController();
		$ws->setCodUtils('10');
		$ws->setCarpeta("a_" . \Input::get('year'));
		$result = $ws->get('listFolder');

		if ($result->ok && isset($result->lista)) {
			try {
				foreach ($result->lista as $key => $value) {
					$number = explode("m_", trim($value->strcarpeta));
					$name   = App\Util\Functions::convNumberToMonth((int)$number[1]);

					array_push($folder, array('id'     => (string)$value->stridcarpeta,
					                          'name'   => (string)$name,
					                          'number' => (int)$number[1],
					                          'root'   => (string)$value->strrutacarpeta));
				}
				$this->data['ok']     = true;
				$this->data['folder'] = \App\Util\Functions::array_orderby($folder, 'number', SORT_ASC);
			} catch (Exception $e) {
				$this->data['ok']      = false;
				$this->data['message'] = $e->getMessage();
			}
		} else {
			$this->data['ok']      = false;
			$this->data['message'] = 'No existe carpeta';
		}

		return \Response::json($this->data, $this->status, $this->headers);
	}

	public function showFolders()
	{
		$folders = array();
		$ws      = new \WebServiceController();
		$ws->setCodUtils('10');
		$ws->setCarpeta(\Input::get('root'));
		$result = $ws->get('listFolder');

		if ($result->ok && isset($result->lista)) {
			try {
				foreach ($result->lista as $key => $value) {
					if (is_object($value)) {
						array_push($folders, array('name' => (string)$value->strcarpeta,
						                           'id'   => (string)$value->stridcarpeta,
						                           'root' => base64_encode((string)$value->strrutacarpeta)));
					} else {
						$folders = array('name' => (string)$result->lista->strcarpeta,
						                 'id'   => (string)$result->lista->stridcarpeta,
						                 'root' => base64_encode((string)$value->strrutacarpeta));
					}
				}
				$this->data['ok']     = true;
				$this->data['folder'] = $folders;
			} catch (Exception $e) {
				$this->data['ok']      = false;
				$this->data['message'] = $e->getMessage();
			}
		} else {
			$this->data['ok']      = false;
			$this->data['message'] = 'No existe carpeta';
		}

		return \Response::json($this->data, $this->status, $this->headers);
	}


	public function viewer()
	{
		return \View::make('dashboard.documento');
	}

	public function form()
	{
		return \View::make('dashboard.mantenedor');
	}

	public function saveForm()
	{
		return \View::make('dashboard.mantenedor');
	}
}
