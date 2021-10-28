<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\API\PasienModel;
use CodeIgniter\API\ResponseTrait;

class Cetak extends BaseController
{
	use ResponseTrait;
	public function RM($id = null)
	{
		if ($id == null) return $this->respondNoContent('Hmm');
		$data =  model(PasienModel::class)->cari_bio_by_rm($id);
		$v = view('cetak/rm', []);
	}
}
