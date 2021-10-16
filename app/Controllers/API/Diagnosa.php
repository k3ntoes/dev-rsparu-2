<?php

namespace App\Controllers\API;

use App\Models\API\DiagnosaModel;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\RESTful\ResourceController;

class Diagnosa extends ResourceController
{
	use ResponseTrait;
	protected $modelName = DiagnosaModel::class;
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
		$res = $this->model->orderBy('diagnosa', 'asc')->findAll();
		if (!$res) return $this->respond(res204(['message' => 'hemm']));
		return $this->respond(res200(['data' => $res]));
	}

	/**
	 * Return the properties of a resource object
	 *
	 * @return mixed
	 */
	public function show($id = null)
	{
		if ($id == null) return $this->respondNoContent('Hayo mau ngapain??');
		$res = $this->model->find($id);
		if (!$res) return $this->respond(res204(['message' => 'hemm']));
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
