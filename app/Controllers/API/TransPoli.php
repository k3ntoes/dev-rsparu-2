<?php

namespace App\Controllers\API;

use App\Models\API\KunjunganModel;
use App\Models\API\TransPetugasModel;
use App\Models\API\TransPoliModel;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\RESTful\ResourceController;

class TransPoli extends ResourceController
{
	use ResponseTrait;
	protected $modelName = TransPoliModel::class;
	protected $type = 'json';

	function __construct()
	{
		helper('cusresponse');
		$this->kunj = new KunjunganModel();
		$this->transPetugas = new TransPetugasModel();
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
		$save = $this->model->save($body);
		if (!$save) return $this->respond(res400(['message' => 'ada yang salah', 'debug' => $save]));
		$this->kunj->save($body);
		$this->transPetugas->save($body);
		return $this->respond(res201(['message' => 'Data berhasil disimpan', 'data' => $save]));
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
