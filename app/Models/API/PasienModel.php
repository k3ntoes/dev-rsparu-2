<?php

namespace App\Models\API;

use CodeIgniter\Model;

class PasienModel extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'm_pasien';
	protected $primaryKey           = 'inorm';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'object';
	protected $useSoftDeletes       = false;
	protected $protectFields        = true;
	protected $allowedFields        = [
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

	public function cari_rm($norm = null)
	{
		$result = $this->builder('v_find_pasien')
			->where('CAST(norm AS SIGNED)', $norm)
			->get()
			->getResult();

		return $result;
	}

	public function cari_bio($fnama = null, $fdesa = null, $fkecamatan = null, $fkabupaten = null)
	{
		$builder = $this->builder('v_find_pasien');
		if ($fnama != "") $builder->like('nama', $fnama);
		if ($fdesa != "") $builder->like('kkelurahan', $fdesa);
		if ($fkecamatan != "") $builder->like('kkecamatan', $fkecamatan);
		if ($fkabupaten != "") $builder->like('kkabupaten', $fkabupaten);

		$result = $builder->get()->getResult();

		return $result;
	}

	public function cekExist(object $req)
	{
		$exist = false;
		$result = null;
		$cekNorm = $this->cariByNoRm($req->norm);
		$cekNik = $this->cariByNik($req->noktp);
		$cekAsuransi = $this->cariByAsuransi($req->noasuransi);

		if ($cekNorm != null) {
			$exist = true;
			$result = $cekNorm;
			return [
				'exist' => $exist,
				'result' => $result,
				'by' => 'norm'
			];
		}
		if ($cekNik != null) {
			$exist = true;
			$result = $cekNik;
			return [
				'exist' => $exist,
				'result' => $result,
				'by' => 'nik'
			];
		}
		if ($cekAsuransi != null) {
			$exist = true;
			$result = $cekAsuransi;
			return [
				'exist' => $exist,
				'result' => $result,
				'by' => 'noasuransi'
			];
		}

		return [
			'exist' => $exist,
			'result' => $result,
			'by' => ''
		];
	}

	public function cariByNoRm($norm = null)
	{
		if ($norm == null) return null;
		$inorm = intval($norm);
		$res = $this->builder($this->table)->where('inorm', $inorm)->get()->getFirstRow();
		return $res;
	}
	public function cariByNik($noktp = null)
	{
		if ($noktp == null) return null;
		$res = $this->builder($this->table)->where('noktp', $noktp)->get()->getFirstRow();
		return $res;
	}

	public function cariByAsuransi($noasuransi = null)
	{
		if ($noasuransi == null) return null;
		$res = $this->builder($this->table)->where('noasuransi', $noasuransi)->get()->getFirstRow();
		return $res;
	}
}
