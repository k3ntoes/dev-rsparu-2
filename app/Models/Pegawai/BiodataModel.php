<?php

namespace App\Models\Pegawai;

use CodeIgniter\Model;

class BiodataModel extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'peg_m_biodata';
	protected $primaryKey           = 'nip';
	protected $useAutoIncrement     = false;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDeletes       = false;
	protected $protectFields        = true;
	protected $allowedFields        = [
		'nama',
		'jeniskel',
		'tempat_lahir',
		'tgl_lahir',
		'alamat',
		'kd_prov',
		'kd_kab',
		'kd_kec',
		'kd_kel',
		'kdAgama',
		'status_kawin'
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
