<?php

namespace App\Controllers\API;

use App\Models\API\KunjunganModel;
use App\Models\API\PasienModel;
use App\Models\API\TransPetugasModel;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\RESTful\ResourceController;

class Kunjungan extends ResourceController
{
	use ResponseTrait;
	protected $modelName = KunjunganModel::class;
	protected $type = "json";

	function __construct()
	{
		$this->pasien = new PasienModel();
		$this->transPetugas = new TransPetugasModel();
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
		if ($id == null) return $this->respond(res400(['message' => 'hemm mau ngapain ya?']));

		$res = $this->model->find($id);
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
		$req = json_decode($this->request->getBody());
		$req->tgltrans = $req->tgldaftar . ' ' . $req->jamdaftar;

		if ($req->norm == "") {
			$cekPasien = (object)$this->pasien->cekExist($req);
			if ($cekPasien->exist == true) return $this->respond(res302(['message' => 'Pasien sudah terdaftar', 'data' => $cekPasien]));
			$simpanPasien = $this->pasien->insert((array)$req);
			if ($simpanPasien)  return $this->simpanKunj($req);
		}

		if ($req->updKunj == 1) return $this->updKunj($req);

		$cekKunj = (object)$this->model->isTransExist($req);
		if ($cekKunj->exist == true) {
			return $this->respond(res304(['message' => 'Pasien sudah mendaftar hari ini']));
		}

		return $this->simpanKunj($req);
	}

	private function simpanKunj($req)
	{
		$simpanKunj = $this->model->insert($req);
		if ($simpanKunj) {
			$req->notrans = $simpanKunj;
			$this->transPetugas->insert($req);
			return $this->respondCreated(res201(['message' => 'Data berhasil disimpan', 'data' => $req->notrans]));
		}

		return $this->respond(res304(['message' => 'gagal menyimpan kunjungan']));
	}

	private function updKunj($req)
	{
		$cekKunj = (object)$this->model->isTransExist($req);
		$updateKunj = $this->model->update($cekKunj->data->notrans, (array)$req);
		return $this->respondCreated(res201(['message' => 'Data berhasil diupdate', 'data' => $cekKunj->data->notrans]));
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
		if ($id == null) return $this->respondNoContent('Hayo mau ngapain???');
		$body = json_decode($this->request->getBody());
		$u = $this->model->update($id, $body);
		if (!$u) return $this->respond(res204(['message' => 'Sepertinya ada yang salah nih']));
		return $this->respond(res201(['message' => 'data berhasil di update']));
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
