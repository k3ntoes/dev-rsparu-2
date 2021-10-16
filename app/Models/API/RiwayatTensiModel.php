<?php

namespace App\Models\API;

use CodeIgniter\Model;

class RiwayatTensiModel extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 't_riwayat';
	protected $primaryKey           = 'norm';
	protected $useAutoIncrement     = false;
	protected $insertID             = 0;
	protected $returnType           = 'object';
	protected $useSoftDeletes       = false;
	protected $protectFields        = true;
	protected $allowedFields        = [
		'norm',
		'cacatFisik',
		'cacatFisikKet',
		'alatBantu',
		'alatBantuKet',
		'penyDahulu',
		'penyLain',
		'pengoTB',
		'pengoTBtahun',
		'pengoTBlama',
		'pengoTBtempat',
		'pengoLain',
		'penyKeluarga',
		'penyKeluargaKet',
		'alergi',
		'alergiKet',
		'alergiReaksi',
		'operasi',
		'operasiJenis',
		'operasiTahun',
		'operasiTempat',
		'rokok',
		'rokokKet',
		'alkohol',
		'alkoholKet',
		'obat',
		'obatKet',
		'kerja'
	];

	// Dates
	protected $useTimestamps        = false;
	protected $dateFormat           = 'datetime';
	protected $createdField         = 'created_at';
	protected $updatedField         = 'updated_at';
	protected $deletedField         = 'deleted_at';

	// Validation
	protected $validationRules      = [];
	protected $validationMessages   = [];
	protected $skipValidation       = false;
	protected $cleanValidationRules = true;

	// Callbacks
	protected $allowCallbacks       = true;
	protected $beforeInsert         = [];
	protected $afterInsert          = [];
	protected $beforeUpdate         = [];
	protected $afterUpdate          = [];
	protected $beforeFind           = [];
	protected $afterFind            = [];
	protected $beforeDelete         = [];
	protected $afterDelete          = [];
}
