<?php

include(app_path() . '/libs/nusoap/nusoap.php');

class WebServiceController extends BaseController
{
	//	General vars
	private $name;
	private $function;
	private $params;
	private $result;
	private $server;
	private $webservice;
	private $wsdl;
	//	Webservice vars *****************************************

	//	private $apellidosUser;
	//	private $buscador;
	//	private $carpeta;
	//	private $cliente;
	//	private $codUtils;
	//	private $descripcion;
	//	private $documento;
	//	private $estado;
	//	private $fechaLog;
	//	private $idEspacio;
	//	private $idNegocio;
	//	private $idProceso;
	//	private $idUser;
	//	private $idPerfil;
	//	private $nombresUser;
	//	private $nuevoEspacio;
	//	private $pass;
	//	private $rutaEspacio;
	//  private $rutaCarpeta;
	//	private $tipoDocumento;
	//	private $user;
	//	private $vigenciaIni;
	//	private $vigenciaFin;

	public function __construct($webservice = '/GestionDocIntelidata/UtilsAlfresco?WSDL', $ip_server = '192.168.1.86', $port = '8080', $function = 'opRequestUtils', $secure = false)
	{
		$this->function   = $function;
		$this->server     = $ip_server;
		$this->webservice = $webservice;

		if ($secure) {
			$this->wsdl = 'https://' . $this->server . ':' . $port . $this->webservice;
		} else {
			$this->wsdl = 'http://' . $this->server . ':' . $port . $this->webservice;
		}
		if (preg_match('/Utils/', $this->webservice)) {
			$this->params = array('strTipoRespuestaUtils' => '',
			                      'strCarpeta'            => '',
			                      'strCodUtils'           => '',
			                      'strUser'               => '',
			                      'strPass'               => '',
			                      'strNombresUser'        => '',
			                      'strApellidosUser'      => '',
			                      'strIdNegocio'          => '',
			                      'strVigenciaIni'        => '',
			                      'strVigenciaFin'        => '',
			                      'strEstado'             => '',
			                      'strNuevoEspacio'       => '',
			                      'strRutaEspacio'        => '',
			                      'trRutaCarpeta'         => '',
			                      'strIdEspacio'          => '',
			                      'strTipoDocumento'      => '',
			                      'strDocumento'          => '',
			                      'strIdProceso'          => '',
			                      'strIdUser'             => '',
			                      'strFechaLog'           => '',
			                      'strCliente'            => '',
			                      'strDescripcion'        => '',
			                      'strBuscador'           => '',
			                      'strIdPerfil'           => '',
			                      'strPerfil'             => '');
		}
		if (preg_match('/Lista/', $this->webservice)) {
			$this->params = array('strRutaCarpeta' => '');
		}
		if (preg_match('/Documento/', $this->webservice)) {
			$this->params = array('strIdCliente'     => '',
			                      'strIdDocumento'   => '',
			                      'strTipoDocumento' => '');
		}
	}

	public function getParams()
	{
		return $this->params;
	}

	public function setParams($params)
	{
		$this->params = $params;
	}

	public function getCarpeta()
	{
		return array_get($this->params, 'strCarpeta');
	}

	public function setCarpeta($carpeta)
	{
		array_set($this->params, 'strCarpeta', $carpeta);
	}

	public function getCodUtils()
	{
		return array_get($this->params, 'strCodUtils');
	}

	public function setCodUtils($codUtils)
	{
		array_set($this->params, 'strCodUtils', $codUtils);
	}

	public function getIdUser()
	{
		return array_get($this->params, 'strIdUser');
	}

	public function setIdUser($idUser)
	{
		array_set($this->params, 'strIdUser', $idUser);
	}

	public function getIdProceso()
	{
		return array_get($this->params, 'strIdProceso');
	}

	public function setIdProceso($idProceso)
	{
		array_set($this->params, 'strIdProceso', $idProceso);
	}

	public function getDocumento()
	{
		return array_get($this->params, 'strDocumento');
	}

	public function setDocumento($documento)
	{
		array_set($this->params, 'strDocumento', $documento);
	}

	public function getDescripcion()
	{
		return array_get($this->params, 'strDescripcion');
	}

	public function setDescripcion($descripcion)
	{
		array_set($this->params, 'strDescripcion', $descripcion);
	}

	public function getEstado()
	{
		return array_get($this->params, 'strEstado');
	}

	public function setEstado($estado)
	{
		array_set($this->params, 'strEstado', $estado);
	}

	public function getFechaLog()
	{
		return array_get($this->params, 'strFechaLog');
	}

	public function setFechaLog($fechaLog)
	{
		array_set($this->params, 'strFechaLog', $fechaLog);
	}

	public function getIdEspacio()
	{
		return array_get($this->params, 'strIdEspacio');
	}

	public function setIdEspacio($idEspacio)
	{
		array_set($this->params, 'strIdEspacio', $idEspacio);
	}

	public function getIdNegocio()
	{
		return array_get($this->params, 'strIdNegocio');
	}

	public function setIdNegocio($idNegocio)
	{
		array_set($this->params, 'strIdNegocio', $idNegocio);
	}

	public function getCliente()
	{
		return array_get($this->params, 'strCliente');
	}

	public function setCliente($cliente)
	{
		array_set($this->params, 'strCliente', $cliente);
	}

	public function getNombresUser()
	{
		return array_get($this->params, 'strNombresUser');
	}

	public function setNombresUser($nombresUser)
	{
		array_set($this->params, 'strNombresUser', $nombresUser);
	}

	public function getNuevoEspacio()
	{
		return array_get($this->params, 'strNuevoEspacio');
	}

	public function setNuevoEspacio($nuevoEspacio)
	{
		array_set($this->params, 'strNuevoEspacio', $nuevoEspacio);
	}

	public function getPass()
	{
		return array_get($this->params, 'strPass');
	}

	public function setPass($pass)
	{
		array_set($this->params, 'strPass', $pass);
	}

	public function getRutaEspacio()
	{
		return array_get($this->params, 'strRutaEspacio');
	}

	public function setRutaEspacio($rutaEspacio)
	{
		array_set($this->params, 'strRutaEspacio', $rutaEspacio);
	}

	public function getTipoDocumento()
	{
		return array_get($this->params, 'strTipoDocumento');
	}

	public function setTipoDocumento($tipoDocumento)
	{
		array_set($this->params, 'strTipoDocumento', $tipoDocumento);
	}

	public function getUser()
	{
		return array_get($this->params, 'strUser');
	}

	public function setUser($user)
	{
		array_set($this->params, 'strUser', $user);
	}

	public function getVigenciaFin()
	{
		return array_get($this->params, 'strVigenciaFin');
	}

	public function setVigenciaFin($vigenciaFin)
	{
		array_set($this->params, 'strVigenciaFin', $vigenciaFin);
	}

	public function getVigenciaIni()
	{
		return array_get($this->params, 'strVigenciaIni');
	}

	public function setVigenciaIni($vigenciaIni)
	{
		array_set($this->params, 'strVigenciaIni', $vigenciaIni);
	}

	public function getBuscador()
	{
		return array_get($this->params, 'strBuscador');
	}

	public function setBuscador($buscador)
	{
		array_set($this->params, 'strBuscador', $buscador);
	}

	public function getApellidosUser()
	{
		return array_get($this->params, 'strApellidosUser');
	}

	public function setApellidosUser($apellidosUser)
	{
		array_set($this->params, 'strApellidosUser', $apellidosUser);
	}

	public function getIdPerfil()
	{
		return array_get($this->params, 'strIdPerfil');
	}

	public function setIdPerfil($idPerfil)
	{
		array_set($this->params, 'strIdPerfil', $idPerfil);
	}

	public function getPerfil()
	{
		return array_get($this->params, 'strPerfil');
	}

	public function setPerfil($perfil)
	{
		array_set($this->params, 'strPerfil', $perfil);
	}

	public function getRutaCarpeta()
	{
		return array_get($this->params, 'strRutaCarpeta');
	}

	public function setRutaCarpeta($carpeta)
	{
		array_set($this->params, 'strRutaCarpeta', $carpeta);
	}

	public function getIdCliente()
	{
		return array_get($this->params, 'strIdCliente');
	}

	public function setIdCliente($idCliente)
	{
		array_set($this->params, 'strIdCliente', $idCliente);
	}

	public function getIdDocumento()
	{
		return array_get($this->params, 'strIdDocumento');
	}

	public function setIdDocumento($idDocumento)
	{
		array_set($this->params, 'strIdDocumento', $idDocumento);
	}

	public function get($name = '')
	{
		if ($name === '') {
			return 'Name is required';
		}

		$this->name = $name;
		switch ($this->name) {
			case 'createUser':
				$this->beforeFilter('auth');
				array_set($this->params, 'strTipoRespuestaUtils', '1');
				break;
			case 'createSpace':
				$this->beforeFilter('auth');
				array_set($this->params, 'strTipoRespuestaUtils', '1');
				break;
			case 'createDocument':
				$this->beforeFilter('auth');
				array_set($this->params, 'strTipoRespuestaUtils', '1');
				break;
			case 'deleteDocument':
				$this->beforeFilter('auth');
				array_set($this->params, 'strTipoRespuestaUtils', '1');
				break;
			case 'listFolder':
				$this->beforeFilter('auth');
				array_set($this->params, 'strTipoRespuestaUtils', '2');
				break;
			case 'login':
				array_set($this->params, 'strTipoRespuestaUtils', '2');
				break;
			case 'profiles':
				array_set($this->params, 'strTipoRespuestaUtils', '2');
				break;
			case 'search':
				$this->beforeFilter('auth');
				array_set($this->params, 'strTipoRespuestaUtils', '2');
				break;
			case 'showFolder':
				$this->beforeFilter('auth');
				break;
			case 'showDocument':
				$this->beforeFilter('auth');
				break;
			default:
				array_set($this->params, 'strTipoRespuestaUtils', '2');
				break;
		}

		$soap                   = new \nusoap_client($this->wsdl, 'wsdl');
		$soap->soap_defencoding = 'UTF-8';
		$soap->decode_utf8      = false;
		$temp                   = $soap->call($this->function, array('arg0' => $this->params));

		if ($soap->getError()) {
			return 'Constructor error: ' . $soap->getError();
		}
		if ($soap->fault) {
			return 'Fault: ' . $this->result;
		}
		if ($soap->getError()) {
			return 'Error: ' . $soap->getError();
		}

		$temp = App\Util\Functions::toObject($temp['return']);
		//		$temp = $temp['return'];
		//		return $temp;
		$this->result = new stdClass();

		if (!(Str::lower($temp->msgexecution) === Str::lower('Transacción Exitosa'))) {
			$this->result->ok = false;

			return $this->result;
		}

		$this->result->ok      = true;
		$this->result->codigo  = value(function () use ($temp) {
			return $temp->codexecution;
		});
		$this->result->lista   = value(function () use ($temp) {
			if (isset($temp->documentlist)) {
				return $temp->documentlist;
			}

			return null;
		});
		$this->result->mensaje = value(function () use ($temp) {
			return $temp->msgexecution;
		});

		return $this->result;

		//		$soap = new Soaper($this->name, $this->wsdl);
		//
		//		$soap->params(array('arg0' => $this->params));
		//
		//		$temp         = $soap->run($this->function)->get();
		//		$this->result = new stdClass();
		//
		//		if (!(Str::lower($temp->msgExecution) === Str::lower('Transacción Exitosa'))) {
		//			$this->result->ok = false;
		//
		//			return $this->result;
		//		}
		//
		//		$this->result->ok      = true;
		//		$this->result->codigo  = value(function () use ($temp) {
		//			return $temp->codExecution;
		//		});
		//		$this->result->lista   = value(function () use ($temp) {
		//			return $temp->documentList;
		//		});
		//		$this->result->mensaje = value(function () use ($temp) {
		//			return $temp->msgExecution;
		//		});
		//
		//		return $this->result;
	}
}
