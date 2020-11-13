<?php

namespace App\Database\Seeds;

use CodeIgniter\I18n\Time;

class AllSeeder extends \CodeIgniter\Database\Seeder
{
    public function run()
    {
        $this->call('AkunSeeder');
        $this->call('AkademikSeeder');
        $this->call('FasilitasSeeder');
        $this->call('ProfilSekolahSeeder');
        $this->call('BerandaSeeder');
        $this->call('StaffSeeder');
    }
}
