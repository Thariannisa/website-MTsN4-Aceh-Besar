<?php

namespace App\Database\Seeds;

use Faker\Factory;
use App\Models\UserModel;
use CodeIgniter\I18n\Time;

class ProfilSekolahSeeder extends \CodeIgniter\Database\Seeder
{
    public function run()
    {
        $faker = Factory::create('id_ID');
        $data = [
            'visi'    => $faker->text(500),
            'misi'    => $faker->text(500),
        ];

        // Using Query Builder
        $this->db->table('visimisi')->insert($data);
        $data = [
            'tatatertib'    => $faker->text(500),
        ];

        // Using Query Builder
        $this->db->table('tatatertib')->insert($data);
        $data = [
            'path_struktur'    => 'struktur.png',
        ];

        // Using Query Builder
        $this->db->table('struktur')->insert($data);
    }
}
