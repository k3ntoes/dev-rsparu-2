<?php

namespace App\Controllers\API;

use App\Models\API\RiwayatModel;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\RESTful\ResourceController;

class Riwayat extends ResourceController
{
	use ResponseTrait;
	protected $modelName = RiwayatModel::class;
	protected $type = "json";

	function __construct()
	{
		helper('cusresponse');
	}

	public function kunjungan()
	{
		$req = json_decode($this->request->getBody());
		$result = $this->model->cariKunjLoket($req);
		if ($result == null) return $this->respond(res204(['message' => 'Data tidak ditemukan!']));
		return $this->respond(res200(['data' => $result]));
	}

	public function pemeriksaan($norm = null)
	{
		$result = $this->model->riwayat_tensi($norm);
		if ($result == null) return $this->respond(res204(['message' => 'Data tidak ditemukan!']));
		return $this->respond(res200(['data' => $result]));
	}
}
