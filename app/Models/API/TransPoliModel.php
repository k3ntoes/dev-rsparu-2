<?php

namespace App\Models\API;

use CodeIgniter\Model;

class TransPoliModel extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 't_poli';
	protected $primaryKey           = 'notrans';
	protected $useAutoIncrement     = false;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDeletes       = false;
	protected $protectFields        = true;
	protected $allowedFields        = [
		"notrans",
		"norm",
		"tgltrans",
		"ktujuan",
		"inspeksi",
		"perkusi",
		"palpasi",
		"auskultasi",
		"anemis",
		"cyanosis",
		"dyspneu",
		"stomatitis",
		"rontgen",
		"konsul",
		"tcm",
		"bta",
		"hematologi",
		"kimiaDarah",
		"imunoSerologi",
		"mantoux",
		"ekg",
		"mikroCo",
		"spirometri",
		"spo2",
		"diagnosa1",
		"diagnosa2",
		"diagnosa3",
		"nebulizer",
		"infus",
		"oksigenasi",
		"injeksi",
		"terapi"
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
