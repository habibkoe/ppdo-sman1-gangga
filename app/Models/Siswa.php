<?php

namespace App\Models;

use CodeIgniter\Model;

class Siswa extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'siswa';
	protected $primaryKey           = 'id';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDeletes       = true;
	protected $protectFields        = true;
	protected $allowedFields        = ['id','nis','nik','pas_poto','nama_awal','nama_akhir','tempat_lahir','tanggal_lahir','alamat','jenis_kelamin','user_id','agama_id','jurusan_id'];

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

	public function getDataJoin(int $userId) : array
	{
		$data = [];
		$builder = $this->table('siswa');
		$builder->where('user_id', $userId);
		$builder->select('siswa.*, master_jurusan.nama as nama_jurusan, master_agama.nama as nama_agama');
		$builder->join('master_jurusan', 'master_jurusan.id = siswa.jurusan_id');
		$builder->join('master_agama', 'master_agama.id = siswa.agama_id');
		$query = $builder->first();

		if(isset($query)) {
			$data = $query;
		}

		return $data;
	}

}
