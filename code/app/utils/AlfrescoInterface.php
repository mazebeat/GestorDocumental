<?php namespace App\Util\Interfaces;

interface AlfrescoInterface{
	public function createDocument($params);

	public function createFolder($params);

	public function createSpace($params);

	public function createUser($params);

	public function deleteDocument($params);

	public function search($params);
} 
