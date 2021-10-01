<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class Pasien extends Entity
{
	protected $datamap = [
		'norm',
		'rmlama',
		'tgldaftar',
		'jamdaftar',
		'kkelompok',
		'noasuransi',
		'noktp',
		'nama',
		'alamat',
		'kprovinsi',
		'kkabupaten',
		'kkecamatan',
		'kkelurahan',
		'rtrw',
		'jeniskel',
		'tmptlahir',
		'tgllahir',
		'kdAgama',
		'kdPendidikan',
		'nohp',
		'statKawin',
		'pekerjaan',
		'pjwb',
		'ibuKandung',
		'jctkkartu',
		'goldarah',
		'kunj'
	];
	protected $dates   = [
		'created_at',
		'updated_at',
		'deleted_at',
	];
	protected $casts   = [];
}
