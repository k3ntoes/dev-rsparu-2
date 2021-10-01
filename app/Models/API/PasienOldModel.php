<?php

namespace App\Models\API;

use CodeIgniter\Model;

class PasienOldModel extends Model
{
	protected $DBGroup              = 'rs_old';
	protected $table                = 'pend_pasien';
	protected $primaryKey           = 'id';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDeletes       = false;
	protected $protectFields        = true;
	protected $allowedFields        = [];

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

	public function cari_rm($frmlama)
	{
		$builder = $this->db
			->table($this->table)
			->select("'' AS norm, "
				. "pend_pasien.NIK AS noktp, "
				. "pend_pasien.NOMOR AS rmlama, "
				. "pend_pasien.LAHIR_TEMPAT AS tmptlahir, "
				. "pend_pasien.TANGGAL AS tgldaftar, "
				. "pend_pasien.NAMA AS nama, "
				. "pend_pasien.ALAMAT AS alamat, "
				. "pend_pasien.DESA AS kkelurahan, "
				. "pend_pasien.RKRT AS rtrw, "
				. "pend_pasien.KEC AS kkecamatan, "
				. "pend_pasien.KAB AS kkabupaten, "
				. "IFNULL(m_agama.kd_agama,1) AS kdAgama, "
				. "pend_pasien.JNSKEL AS jeniskel, "
				. "pend_pasien.GOLDARAH AS goldarah, "
				. "IFNULL(m_stat_nikah.kd_stat_nikah,'K') AS statKawin, "
				. "pend_pasien.PEKERJAAN AS pekerjaan, "
				. "pend_pasien.TGLAKHIR AS tglakhir, "
				. "pend_pasien.TGLLAHIR AS tgllahir, "
				. "IFNULL(m_kelompok.kkelompok,1) AS kkelompok, "
				. "pend_pasien.NOKTA AS noasuransi, "
				. "1 AS kdPendidikan, "
				. "'L' AS kunj, "
				. "'' AS orangtua ")
			->join("m_agama", "pend_pasien.AGAMA = m_agama.agama", "LEFT")
			->join("m_stat_nikah", "pend_pasien.`STATUS` = m_stat_nikah.status_nikah", "LEFT")
			->join("m_kelompok", "pend_pasien.KTA = m_kelompok.kelompok", "LEFT")
			->groupBy("pend_pasien.NOMOR");
		if (strlen($frmlama) > 6) {
			$builder->where('pend_pasien.NOMOR', $frmlama);
		} else {
			$builder->where("CAST(RIGHT(pend_pasien.NOMOR,5) AS SIGNED) = '$frmlama'");
		}

		$result = $builder->get()->getResult();

		return $result;
	}

	public function cari_bio($fnama = null, $fdesa = null, $fkecamatan = null, $fkabupaten = null)
	{
		$builder = $this->db
			->table($this->table)
			->select("'' AS norm, "
				. "pend_pasien.NIK AS noktp, "
				. "pend_pasien.NOMOR AS rmlama, "
				. "pend_pasien.LAHIR_TEMPAT AS tmptlahir, "
				. "pend_pasien.TANGGAL AS tgldaftar, "
				. "pend_pasien.NAMA AS nama, "
				. "pend_pasien.ALAMAT AS alamat, "
				. "pend_pasien.DESA AS kkelurahan, "
				. "pend_pasien.RKRT AS rtrw, "
				. "pend_pasien.KEC AS kkecamatan, "
				. "pend_pasien.KAB AS kkabupaten, "
				. "IFNULL(m_agama.kd_agama,1) AS kdAgama, "
				. "pend_pasien.JNSKEL AS jeniskel, "
				. "pend_pasien.GOLDARAH AS goldarah, "
				. "IFNULL(m_stat_nikah.kd_stat_nikah,'K') AS statKawin, "
				. "pend_pasien.PEKERJAAN AS pekerjaan, "
				. "pend_pasien.TGLAKHIR AS tglakhir, "
				. "pend_pasien.TGLLAHIR AS tgllahir, "
				. "IFNULL(m_kelompok.kkelompok,1) AS kkelompok, "
				. "pend_pasien.NOKTA AS noasuransi, "
				. "1 AS kdPendidikan, "
				. "'L' AS kunj, "
				. "'' AS orangtua ")
			->join("m_agama", "pend_pasien.AGAMA = m_agama.agama", "LEFT")
			->join("m_stat_nikah", "pend_pasien.`STATUS` = m_stat_nikah.status_nikah", "LEFT")
			->join("m_kelompok", "pend_pasien.KTA = m_kelompok.kelompok", "LEFT")
			->groupBy("pend_pasien.NOMOR");

		if ($fnama != "") $builder->like('pend_pasien.NAMA', $fnama);
		if ($fdesa != "") $builder->like('pend_pasien.DESA', $fdesa);
		if ($fkecamatan != "") $builder->like('pend_pasien.KEC', $fkecamatan);
		if ($fkabupaten != "") $builder->like('pend_pasien.KAB', $fkabupaten);

		$result = $builder->get()->getResult();

		return $result;
	}
}
