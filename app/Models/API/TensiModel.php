<?php

namespace App\Models\API;

use CodeIgniter\Model;

class TensiModel extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 't_tensi';
	protected $primaryKey           = 'notrans';
	protected $useAutoIncrement     = false;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDeletes       = false;
	protected $protectFields        = true;
	protected $allowedFields        = [
		'notrans',
		'norm',
		'tgltrans',
		'ktujuan',
		'smbrData',
		'ketSmbrData',
		'hubSmbrData',
		'statRujuk',
		'ketStatRujuk',
		'td',
		'fnadi',
		'suhu',
		'fnafas',
		'spo2',
		'bb',
		'tb',
		'hilangBB3Bln',
		'turunAsupMkn',
		'psiko',
		'otherPsiko',
		'hasilPeriksaSebelumnya',
		'batuk',
		'batukDahak',
		'batukDarah',
		'batukDarahKualitas',
		'sesak',
		'sesakSuara',
		'nyeriDada',
		'nyeriDadaLok',
		'demam',
		'demamWaktuPagi',
		'keluhanLain'
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
