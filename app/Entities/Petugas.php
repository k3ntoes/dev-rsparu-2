<?php

namespace App\Entities;

use App\Models\Pegawai\PegawaiModel;
use CodeIgniter\Entity\Entity;

class Petugas extends Entity
{
	protected $petugas = [];

	function __construct()
	{
		$this->pegawai = new PegawaiModel();
	}

	function getOptPetugas($nip)
	{
		
	}
}
