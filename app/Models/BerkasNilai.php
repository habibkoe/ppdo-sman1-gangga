<?php

namespace App\Models;

use CodeIgniter\Model;

class BerkasNilai extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'berkas_nilai';
	protected $primaryKey           = 'id';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDeletes       = true;
	protected $protectFields        = true;
	protected $allowedFields        = ['id','mata_pelajaran','nilai','siswa_id'];

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

	public array $mapel = [1 => "Matematika", "Bahasa Indonesia", "Bahasa Inggris", "IPA"];
}
