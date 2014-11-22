<?php

class HomeController extends BaseController
{
	private $credentials;
	private $data;
	private $status = 200;
	private $headers = array('ContentType' => 'application/json',
	                         'charset'     => 'utf-8');

	public function __construct()
	{
		$this->credentials = $this->credentials;
	}


	public function index()
	{
		if (\Auth::check()) {
			return \Redirect::to('dashboard');
		}

		return \View::make('index');
	}

	public function login()
	{
		$validator = \Validator::make(\Input::all(), array('username' => 'required',
		                                                   'password' => 'required'));

		if ($validator->fails()) {
			$this->data['message'] = $validator->messages();
			$this->data['ok']      = false;

			return \Response::json($this->data, $this->status, $this->headers);
		}

		$ws = new \WebServiceController();
		$ws->setCodUtils('11');
		$ws->setUser(Input::get('username'));
		$ws->setPass(Input::get('password'));
		$result = $ws->get('login');

		if (!$result->ok) {
			$this->data['message'] = array('Usuario no encontrado');
			$this->data['ok']      = false;

			return \Response::json($this->data, $this->status, $this->headers);
		}
		if($result->ok) {
			$this->credentials = array(

				'id'          => $result->lista->intiduser,
				'username'    => \Str::camel($result->lista->strnombresuser),
				'password'    => \Hash::make(\Input::get('password')),
				'name'        => $result->lista->strnombresuser . ' ' . $result->lista->strapellidosuser,
				'idNegocio'   => $result->lista->stridnegocio,
				'vigenciaIni' => new \Carbon($result->lista->strvigenciaini),
				'vigenciaFin' => new \Carbon($result->lista->strvigenciafin),
				'estado'      => $result->lista->strestado,
				'profile'     => ''

			);

			\Session::put('credentials', $this->credentials);

			$ws = new \WebServiceController();
			$ws->setCodUtils('18');
			$ws->setIdUser($this->credentials['id']);

			$result = $ws->get('profiles');

			if ($result->ok) {
				try {
					$this->data['find'] = true;
					$this->data['ok']   = true;
					$perfiles           = explode(";", $result->lista->stridperfil);

					$ws = new \WebServiceController();
					$ws->setCodUtils('19');
					$this->data['profiles'] = array();
					foreach ($perfiles as $key => $value) {
						$ws->setIdPerfil($value);
						$result = $ws->get('profiles');

						if ($result->ok) {
							array_push($this->data['profiles'], array('code' => $value,
							                                          'name' => $result->lista->stridperfil));
						}
					}
					$this->data['message'] = array('Usuario con perfiles asociados');
				} catch (Exception $e) {
					$this->data['ok']      = true;
					$this->data['message'] = array($e->getMessage());
				}

			} else {
				$this->data['find']     = false;
				$this->data['ok']       = true;
				$this->data['profiles'] = array();
				$this->data['message']  = array('Usuario sin perfiles asociados');
			}
		}
		return \Response::json($this->data, $this->status, $this->headers);
	}

	public function saveUser()
	{
		$this->credentials = \Session::get('credentials');
		\Session::forget('credentials');

		$validator = \Validator::make(\Input::all(), array('profile' => 'required'));

		if ($validator->fails()) {
			$this->data['message'] = $validator->messages();
			$this->data['ok']      = false;

			return \Response::json($this->data, $this->status, $this->headers);
		}

		$this->credentials['profile'] = \Input::get('profile');

		if (\Auth::attempt($this->credentials)) {
			$this->data['message'] = array('Autentificación correcta');
			$this->data['ok']      = true;

			return \Response::json($this->data, $this->status, $this->headers);
		}

		$this->data['message'] = array('Autentificación fallida');
		$this->data['ok']      = false;

		return \Response::json($this->data, $this->status, $this->headers);
	}

	public function logout()
	{
		\Auth::logout();
		\Session::forget('credentials');

		return \Redirect::to('/');
	}

}
