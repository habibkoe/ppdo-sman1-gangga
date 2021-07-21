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

	public function getKelasPembagian() : array 
	{
		$data = [];
		$builder = $this->table('pembagian_kelas');
		$kelas = $builder->findAll();

		foreach($kelas as $k) {

			$pembagianKelas = new PembagianKelas();
			$pembagianKelas->where('kelas_id', $k['id']);
			$jmlSiswa = $pembagianKelas->countAllResults();

			$data[$k['id']] = $jmlSiswa;
		}

		return $data;
	}

	public function getKelasSiswaPembagian(int $kelasId) : array
	{
		$data = [];

		$builder = $this->table('kelas');
		$builder->join('pembagian_kelas', 'pembagian_kelas.kelas_id=kelas.id', 'left');
		$builder->join('siswa', 'siswa.id=pembagian_kelas.siswa_id');
		$builder->where('kelas.id', $kelasId);
		$builder->select('kelas.id as kelas_id, kelas.nama as nama_kelas, siswa.nis, siswa.nik, siswa.pas_poto, siswa.nama_awal, siswa.nama_akhir');
		$query = $builder->findAll();

		if(isset($query)) {
			$data = $query;
		}

		return $data;
	}
}
