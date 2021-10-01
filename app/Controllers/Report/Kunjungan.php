<?php

namespace App\Controllers\Report;

use App\Models\API\KunjunganModel;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\RESTful\ResourceController;

class Kunjungan extends ResourceController
{
	use ResponseTrait;
	protected $modelName = KunjunganModel::class;
	protected $type = "json";

	function __construct()
	{
		helper('auth');
		helper('cusresponse');
	}
	/**
	 * Return an array of resource objects, themselves in array format
	 *
	 * @return mixed
	 */
	public function index()
	{
		return view('report/kunjungan');
	}

	/**
	 * Return the properties of a resource object
	 *
	 * @return mixed
	 */
	public function show($id = null)
	{
		if ($id == null) return $this->respond(res304(['message' => 'hmm... mau ngapain y?']));
		$result = $this->model
			->select(
				'COUNT(t_kunjungan.notrans) AS jml,
				m_kabupaten.kdKab,
				m_kabupaten.kabupaten AS kabupaten,
				MONTH(t_kunjungan.tgltrans) AS bulan'
			)
			->join('m_kabupaten', 't_kunjungan.kkabupaten = m_kabupaten.kdKab', 'INNER')
			->where('YEAR(t_kunjungan.tgltrans)', $id)
			->groupBy(['kabupaten', 'bulan'])
			->orderBy('kabupaten ASC, bulan ASC')
			->find();

		if (!$result) return $this->respond(res204(['message' => 'ga ada data boy']));
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
