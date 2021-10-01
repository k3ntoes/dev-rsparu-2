<?php

namespace App\Models\Pegawai;

use CodeIgniter\Model;

class PegawaiModel extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'pegawais';
	protected $primaryKey           = 'peg_t_pegawai';
	protected $useAutoIncrement     = false;
	protected $insertID             = 0;
	protected $returnType           = 'object';
	protected $useSoftDeletes       = false;
	protected $protectFields        = true;
	protected $allowedFields        = [
		'stat_pns',
		'gelar_d',
		'gelar_b',
		'kd_jab',
		'kd_pend',
		'kd_jurusan',
		'tgl_masuk',
		'pswd'
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
