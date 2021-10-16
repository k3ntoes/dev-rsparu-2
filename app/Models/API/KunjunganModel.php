<?php

namespace App\Models\API;

date_default_timezone_set('Asia/Jakarta');

use CodeIgniter\Model;

class KunjunganModel extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 't_kunjungan';
	protected $primaryKey           = 'notrans';
	protected $useAutoIncrement     = false;
	protected $insertID             = 0;
	protected $returnType           = 'object';
	protected $useSoftDeletes       = false;
	protected $protectFields        = true;
	protected $allowedFields        = [
		'norm',
		'rmlama',
		'nourut',
		'tgltrans',
		'kunj',
		'jeniskel',
		'kkelompok',
		'noasuransi',
		'ktujuan',
		'kkabupaten',
		'umurthn',
		'umurbln',
		'umurhr',
		'biaya',
		'loket',
		'selesai'
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
	protected $beforeInsert         = ['bfrIns'];
	protected $afterInsert          = [];
	protected $beforeUpdate         = [];
	protected $afterUpdate          = [];
	protected $beforeFind           = [];
	protected $afterFind            = [];
	protected $beforeDelete         = [];
	protected $afterDelete          = [];

	function initialize()
	{
		$this->db = \Config\Database::connect('default');
	}

	function bfrIns(array $data)
	{
		if (!$data['data']) return $data;

		$data['data']['notrans'] = $this->generateNoTrans($data['data']['norm'], $data['data']['tgltrans']);
		return $data;
	}

	function generateNoTrans($norm, $tgltrans)
	{
		$d = date('mY');
		$res = $this->builder()
			->select('notrans', 'norm')
			->where('norm', $norm)
			->where('YEAR(tgltrans)', DATE('Y', strtotime($tgltrans)))
			->where('MONTH(tgltrans)', DATE('m', strtotime($tgltrans)))
			->get()
			->getLastRow();

		if (!$res) return $norm . $d . '01';
		$urut = substr($res->notrans, -2, 2) + 1;
		if ($urut < 10) $urut = '0' . $urut;
		return $norm . $d . $urut;
	}

	function isTransExist($req)
	{
		$result = $this->db
			->table($this->table)
			->where('norm', $req->norm)
			->where('DATE(tgltrans)', $req->tgldaftar)
			->get()
			->getFirstRow();

		if (!$result) return ['exist' => false, 'data' => $result];
		return ['exist' => true, 'data' => $result];
	}
}
