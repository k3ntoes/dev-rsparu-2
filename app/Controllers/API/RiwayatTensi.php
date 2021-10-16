<?php

namespace App\Controllers\API;

use App\Models\API\RiwayatTensiModel;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\RESTful\ResourceController;

class RiwayatTensi extends ResourceController
{
	use ResponseTrait;
	protected $modelName = RiwayatTensiModel::class;
	protected $type = 'json';

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
		if ($id == null) return $this->respondNoContent('Hmmm');
		$res = $this->model->find($id);
		if (!$res) return $this->respond(res204(['message' => 'riwayat belum ada']));
		return $this->respond(res200(['data' => $res]));
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
		$body->norm = $body->rw_norm;
		$ex = $this->model->insert($body);

		if (!$ex) return $this->respond(res304(['message' => 'sepertinya ada yang salah nih']));
		return $this->respond(res201(['message' => 'Data Riwayat berhasil disimpan!']));
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
		$body->norm = $body->rw_norm;
		$ex = $this->model->update($id, $body);

		if (!$ex) return $this->respond(res304(['message' => 'sepertinya ada yang salah nih']));
		return $this->respond(res201(['message' => 'Data Riwayat berhasil diupdate!']));
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
