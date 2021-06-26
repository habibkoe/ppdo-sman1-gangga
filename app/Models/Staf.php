<?php

namespace App\Models;

use CodeIgniter\Model;

class Staf extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'staf';
	protected $primaryKey           = 'id';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDeletes       = true;
	protected $protectFields        = true;
	protected $allowedFields        = ['id','nip','nik','pas_poto','nama_awal','nama_akhir','tempat_lahir','tanggal_lahir','alamat','jenis_kelamin','user_id','agama_id','pendidikan_id','jabatan_id'];

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


	public function getDataStafWithJoin() : array
	{
		$data = [];
		$builder = $this->table('staf');
		$builder->select('staf.*, master_pendidikan.nama as nama_pendidikan, master_agama.nama as nama_agama, master_jabatan.nama as nama_jabatan');
		$builder->join('master_agama', 'master_agama.id = staf.agama_id', 'left');
		$builder->join('master_pendidikan', 'master_pendidikan.id = staf.pendidikan_id', 'left');
		$builder->join('master_jabatan', 'master_jabatan.id = staf.jabatan_id', 'left');
		$query = $builder->findAll();

		if(isset($query)) {
			$data = $query;
		}

		return $data;
	}

}
