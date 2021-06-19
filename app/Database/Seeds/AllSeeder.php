<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AllSeeder extends Seeder
{
	public function run()
    {
        $this->call('AgamaSeeder');
        $this->call('JabatanSeeder');
        $this->call('JurusanSeeder');
        $this->call('PekerjaanSeeder');
        $this->call('PendidikanSeeder');
        $this->call('RoleSeeder');
    }
}