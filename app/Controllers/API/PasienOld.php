<?php

namespace App\Controllers\API;

use App\Models\API\PasienOldModel;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\RESTful\ResourceController;

class PasienOld extends ResourceController
{
	use ResponseTrait;
	protected $modelName = PasienOldModel::class;
	protected $type = "json";

	function __construct()
	{
		helper('cusresponse');
	}

	/**
	 * Return an array of resource objects, themselves in array format
	 *
	 * @return mixed
	 */
	public function index()
	{
		//
	}

	/**
	 * Return the properties of a resource object
	 *
	 * @return mixed
	 */
	public function show($id = null)
	{
		if ($id == null) return $this->respond(res400(['message' => 'Bad Request']));
		$result = $this->model->cari_rm($id)[0];
		return $this->respond(res200(['data' => $result]));
	}

	/**
	 * Return a new resource object, with default properties
	 *
	 * @return mixed
	 */
	public function new()
	{
		//
	}

	/**
	 * Create a new resource object, from "posted" parameters
	 *
	 * @return mixed
	 */
	public function create()
	{
		//
	}

	public function cari()
	{
		$fnama = $this->request->getVar('fnama');
		$fdesa = $this->request->getVar('fdesa');
		$fkecamatan = $this->request->getVar('fkecamatan');
		$fkabupaten = $this->request->getVar('fkabupaten');
		$frmlama = $this->request->getVar('frmlama');

		if (
			$fnama == "" &&
			$fdesa == "" &&
			$fkecamatan == "" &&
			$fkabupaten == "" &&
			$frmlama == ""
		) return $this->respond(res400(['message' => 'Bad Request']));

		if ($frmlama != "") {
			$result = $this->model->cari_rm($frmlama);
		} else {
			$result = $this->model->cari_bio($fnama, $fdesa, $fkecamatan, $fkabupaten);
		}

		return $this->respond(res200(["data" => $result]));
	}

	/**
	 * Return the editable properties of a resource object
	 *
	 * @return mixed
	 */
	public function edit($id = null)
	{
		//
	}

	/**
	 * Add or update a model resource, from "posted" properties
	 *
	 * @return mixed
	 */
	public function update($id = null)
	{
		//
	}

	/**
	 * Delete the designated resource object from the model
	 *
	 * @return mixed
	 */
	public function delete($id = null)
	{
		//
	}
}
