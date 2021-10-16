<?php

namespace App\Controllers\API;

use App\Models\API\KelompokModel;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\RESTful\ResourceController;

class Kelompok extends ResourceController
{
	use ResponseTrait;

	protected $modelName = KelompokModel::class;
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
		$result = $this->model->findAll();
		return $this->respond(res200(['data' => $result]));
	}

	/**
	 * Return the properties of a resource object
	 *
	 * @return mixed
	 */
	public function show($id = null)
	{
		if ($id == null) {
			return $this->respondNoContent('hmmm');
		}
		$result = $this->model->find($id);
		if ($result) return $this->respondCreated(res200($result));
		return $this->respond(res204(['message' => 'Data tidak ditemukan!']));
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
