<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\API\TransPetugasModel;

class Entahlah extends BaseController
{
	public function index()
	{
		$trasnPetugas = new TransPetugasModel();
		$req = [
			'notrans' => '00000109202102',
			'p_loket' => '3302100808900001'
		];
		$simpan = $trasnPetugas->insert($req);
		print_r($simpan);
	}
}
