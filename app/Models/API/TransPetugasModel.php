<?php

namespace App\Models\API;

use CodeIgniter\Model;

class TransPetugasModel extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 't_petugas';
	protected $primaryKey           = 'notrans';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'object';
	protected $useSoftDeletes       = false;
	protected $protectFields        = true;
	protected $allowedFields        = [
		'notrans',
		'p_loket',
		'p_admin_tensi',
		'p_perawat_tensi',
		'p_admin_poli',
		'p_dokter_poli',
		'p_admin_poli_konsul',
		'p_dokter_poli_konsul',
		'p_rontgen',
		'p_admin_tind',
		'p_perawat_tind',
		'p_dokter_tind'
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
	protected $afterInsert          = ['ai'];
	protected $beforeUpdate         = [];
	protected $afterUpdate          = [];
	protected $beforeFind           = [];
	protected $afterFind            = [];
	protected $beforeDelete         = [];
	protected $afterDelete          = [];

	function ai(array $data)
	{
		$data['id'] = $data['data']['notrans'];
		return $data;
	}
}
