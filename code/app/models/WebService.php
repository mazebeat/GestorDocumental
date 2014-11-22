<?php

class WebService
{
	//	Webservice vars
	private $apellidosUser;
	private $buscador;
	private $carpeta;
	private $cliente;
	private $codUtils;
	private $descripcion;
	private $documento;
	private $estado;
	private $fechaLog;
	private $idEspacio;
	private $idNegocio;
	private $idProceso;
	private $idUser;
	private $idPerfil;
	private $nombresUser;
	private $nuevoEspacio;
	private $pass;
	private $rutaEspacio;
	private $tipoDocumento;
	private $user;
	private $vigenciaIni;
	private $vigenciaFin;

	public function __construct($apellidosUser = '', $buscador = '', $carpeta = '', $cliente = '', $codUtils = '', $descripcion = '', $documento = '', $estado = '', $fechaLog = '', $idEspacio = '', $idNegocio = '', $idProceso = '', $idUser = '', $idPerfil = '', $nombresUser = '', $nuevoEspacio = '', $pass = '', $rutaEspacio = '', $tipoDocumento = '', $user = '', $vigenciaIni = '', $vigenciaFin = '')
	{
		$this->apellidosUser = $apellidosUser;
		$this->buscador      = $buscador;
		$this->carpeta       = $carpeta;
		$this->cliente       = $cliente;
		$this->codUtils      = $codUtils;
		$this->descripcion   = $descripcion;
		$this->documento     = $documento;
		$this->estado        = $estado;
		$this->fechaLog      = $fechaLog;
		$this->idEspacio     = $idEspacio;
		$this->idNegocio     = $idNegocio;
		$this->idProceso     = $idProceso;
		$this->idUser        = $idUser;
		$this->idPerfil      = $idPerfil;
		$this->nombresUser   = $nombresUser;
		$this->nuevoEspacio  = $nuevoEspacio;
		$this->pass          = $pass;
		$this->rutaEspacio   = $rutaEspacio;
		$this->tipoDocumento = $tipoDocumento;
		$this->user          = $user;
		$this->vigenciaIni   = $vigenciaIni;
		$this->vigenciaFin   = $vigenciaFin;
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
} 
