<?php

namespace App\Controllers\API;

use App\Models\API\PasienModel;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\RESTful\ResourceController;

class Pasien extends ResourceController
{
	use ResponseTrait;
	protected $modelName = PasienModel::class;
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
		$result = $this->model->find($id);
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
		$req = json_decode($this->request->getBody());
		if ($req->norm != "") {
			$cek = $this->model->cekExist($req->norm);
		} else {
			$save_baru = $this->model->insert($req);
		}
		return $this->respondCreated($cek);
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
		$req = (object) json_decode($this->request->getBody());

		$updatePasien = $this->model->update($id, $req);
		if (!$updatePasien) return $this->respond(res304(['message' => 'Gagal mengupdate data Pasien']));
		return $this->respond(res201(['message' => 'Data pasien berhasil diupdate', 'data' => $id]));
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
