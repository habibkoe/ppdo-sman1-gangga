<?php

namespace App\Models;

use CodeIgniter\Model;

class Kelas extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'kelas';
	protected $primaryKey           = 'id';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDeletes       = true;
	protected $protectFields        = true;
	protected $allowedFields        = ['id','nama','lokasi','daya_tampung','inventaris','wali_kelas_id', 'jurusan_id'];

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

	public function getKelasWithJoin() : array
	{
		$data = [];
		$builder = $this->table('kelas');
		$builder->select('kelas.*, staf.nama_awal as nama_awal_wali, staf.nama_akhir as nama_akhir_wali, master_jurusan.nama as nama_group');
		$builder->join('staf', 'staf.id=kelas.wali_kelas_id', 'left');
		$builder->join('master_jurusan', 'master_jurusan.id=kelas.jurusan_id', 'left');
		$query = $builder->findAll();

		if(isset($query)) {
			$data = $query;
		}

		return $data;

	}
}
