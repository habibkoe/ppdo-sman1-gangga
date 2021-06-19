<?php

namespace App\Models;

use CodeIgniter\Model;

class ApplicationUser extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'application_user';
	protected $primaryKey           = 'id';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDeletes       = true;
	protected $protectFields        = true;
	protected $allowedFields        = ['id','username','password','role_id','is_aktif','is_lengkap','created_at','updated_at','deleted_at'];

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

	public function getRole() : array
	{
		$builder = $this->table('application_user');
		$builder->select('role.*');
		$builder->join('role', 'role.id = application_user.role_id');
		$query = $builder->get();

		return $query;
	}
}
