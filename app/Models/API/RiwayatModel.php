<?php

namespace App\Models\API;

use CodeIgniter\Model;

class RiwayatModel extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 't_kunjungan';
	protected $primaryKey           = 'notrans';

	public function cariKunjLoket(object $req)
	{
		if ($req->frnorm != "") return $this->cariByRM($req->frnorm);
		return $this->cariBio($req);
	}

	public function cariByRM($norm)
	{
		$res = $this->builder()
			->select(
				't_kunjungan.norm,
				t_kunjungan.tgltrans,
				m_pasien.nama,
				m_pasien.jeniskel,
				m_kelurahan.kelurahan,
				m_kecamatan.kecamatan,
				m_kabupaten.kabupaten,
				m_pasien.noktp,
				m_pasien.noasuransi'
			)
			->join('m_pasien', 't_kunjungan.norm = m_pasien.norm', 'INNER')
			->join('m_kelurahan', 'm_pasien.kkelurahan = m_kelurahan.kdKel', 'INNER')
			->join('m_kecamatan', 'm_pasien.kkecamatan = m_kecamatan.kdKec', 'INNER')
			->join('m_kabupaten', 'm_pasien.kkabupaten = m_kabupaten.kdKab', 'INNER')
			->where('m_pasien.inorm', intval($norm))
			->get()
			->getResultObject();

		if (!$res) return null;
		return $res;
	}

	public function cariBio($req)
	{
		$builder = $this->builder()
			->select(
				't_kunjungan.norm,
				t_kunjungan.tgltrans,
				m_pasien.nama,
				m_pasien.jeniskel,
				m_kelurahan.kelurahan,
				m_kecamatan.kecamatan,
				m_kabupaten.kabupaten,
				m_pasien.noktp,
				m_pasien.noasuransi'
			)
			->join('m_pasien', 't_kunjungan.norm = m_pasien.norm', 'INNER')
			->join('m_kelurahan', 'm_pasien.kkelurahan = m_kelurahan.kdKel', 'INNER')
			->join('m_kecamatan', 'm_pasien.kkecamatan = m_kecamatan.kdKec', 'INNER')
			->join('m_kabupaten', 'm_pasien.kkabupaten = m_kabupaten.kdKab', 'INNER');
		if ($req->frnama != "") $builder->like('m_pasien.nama', $req->frnama);
		if ($req->frdesa != "") $builder->like('m_kelurahan.kelurahan', $req->frdesa);
		if ($req->frkecamatan != "") $builder->like('m_kecamatan.kecamatan', $req->frkecamatan);
		if ($req->frkabupaten != "") $builder->like('m_kabupaten.kabupaten', $req->frkabupaten);

		$res = $builder->get()
			->getResultObject();

		if (!$res) return null;
		return $res;
	}
}
