<?php

namespace App\Controllers\API;

use App\Models\API\KunjunganModel;
use App\Models\API\TensiModel;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\RESTful\ResourceController;

class Tensi extends ResourceController
{
	use ResponseTrait;
	protected $modelName = TensiModel::class;
	protected $type = 'json';

	function __construct()
	{
		helper('cusresponse');
		$this->transKunj = new KunjunganModel();
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
		$result = $this->model->find($id);
		if (!$result) return $this->respond(res204(['message' => 'Data belum ada']));
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
		$body = json_decode($this->request->getBody());

		if (intval($body->f_riwayat) == 0) return $this->respond(res304(['message' => 'Harap input data riwayat terlebih dahulu']));
		$ex = $this->model->insert($body);
		if (!$ex) return $this->respond(res400(['message' => 'ada yang salah', 'debug' => $ex]));
		$updKunj = $this->transKunj->update($body->notrans, $body);
		return $this->respond(res201(['message' => 'Data berhasil disimpan', 'data' => $ex, "debug" => $updKunj]));
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
		$body = json_decode($this->request->getBody());

		$ex = $this->model->update($id, $body);
		if (!$ex) return $this->respond(res400(['message' => 'ada yang salah', 'debug' => $ex]));
		$updKunj = $this->transKunj->update($id, $body);
		return $this->respond(res201(['message' => 'Data berhasil diupdate', 'data' => $ex, "debug" => $updKunj]));
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
