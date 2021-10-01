<?php

namespace App\Controllers\API;

use App\Models\API\DaftarTungguModel;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\RESTful\ResourceController;

class DaftarTunggu extends ResourceController
{
	use ResponseTrait;
	protected $modelName = DaftarTungguModel::class;
	protected $type = 'json';

	function __construct()
	{
		helper('cusresponse');
	}

	public function tensi($tgl)
	{
		$result = $this->model->where('tgltrans', $tgl)->find();

		return $this->respond(res200(['data' => $result]));
	}
}
