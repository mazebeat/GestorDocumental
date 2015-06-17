<?php

/*
1 Mantenedor Usuarios
2 Estructura Ambiente
3 Elminiar Cliente
4 Almacenar Informacion
5 Consultar Informacion
6 Visualizar Informacion
7 Descargar Documentos
8 Imprimir Documentos
9 Versionar Documentos
*/

class ProfileController extends ApiController
{
	public function __construct()
	{
		//		$this->beforeFilter('auth');

		if (Session::token() !== Input::get('_token')) {
			return Response::json(array('msg' => 'Unauthorized mfk!'));
		}
	}

	public function index()
	{
		return View::make('dashboard.profiles');
	}

	public function saveProfile()
	{
		dd(Input::all());
	}

}
