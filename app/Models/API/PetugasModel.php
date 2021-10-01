<?php

namespace App\Models\API;

use CodeIgniter\Model;

class PetugasModel extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'peg_t_pegawai';
	protected $returnType           = 'object';
	function initialize()
	{
	}

	public function find($id = null)
	{
	}

	public function findAll(int $limit = 0, int $offset = 0)
	{
		$p = $this->db
			->table('peg_t_pegawai')
			->select(
				'peg_t_pegawai.nip, 
				peg_t_pegawai.gelar_d, 
				peg_m_biodata.nama, 
				peg_t_pegawai.gelar_b, 
				peg_t_pegawai.kd_jab'
			)
			->join('peg_m_biodata', 'peg_t_pegawai.nip = peg_m_biodata.nip', 'INNER')
			->orderBy('peg_m_biodata.nama', 'ASC')
			->get()
			->getResult();
		return $p;
	}
}
