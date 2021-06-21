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

}
