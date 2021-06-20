<?php

namespace App\Models;

use CodeIgniter\Model;

class OrangTua extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'orang_tua';
	protected $primaryKey           = 'id';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDeletes       = true;
	protected $protectFields        = true;
	protected $allowedFields        = ['id','nik','nama_awal','nama_akhir','alamat','jenis_kelamin','siswa_id','agama_id','pekerjaan_id','status','pendidikan_id'];

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

}
