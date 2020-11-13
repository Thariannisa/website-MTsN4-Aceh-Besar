<?php

namespace App\Database\Seeds;

use Faker\Factory;
use App\Models\UserModel;
use CodeIgniter\I18n\Time;

class AkademikSeeder extends \CodeIgniter\Database\Seeder
{
    public function run()
    {
        $faker = Factory::create('id_ID');
        $data = [
            'nama' => 'lainnya',
            'slug' => 'lainnya',
            'created_at' => Time::now(),
            'updated_at' => Time::now()
        ];
        $this->db->table('kategoris')->insert($data);
        for ($i = 1; $i <= 50; $i++) :
            $title = $faker->sentence(5);
            $data = [
                'userId' => 1,
                'judul_organisasi'    => $title,
                'slug' => url_title($title, '-', TRUE),
                'isi_organisasi' => $faker->text(500),
                'created_at'    => Time::now(),
                'updated_at'    => Time::now(),
            ];
            $this->db->table('organisasi')->insert($data);

            $data = [
                'nama' => $title,
                'slug' => url_title($title, '-', TRUE),
                'created_at' => Time::now(),
                'updated_at' => Time::now()
            ];
            $this->db->table('kategoris')->insert($data);
        endfor;


        for ($i = 1; $i <= 50; $i++) :
            $title = $faker->sentence(5);
            $data = [
                'userId' => 1,
                'judul_prestasi'    => $title,
                'slug' => url_title($title, '-', TRUE),
                'kategori' => $faker->randomElement(['Olimpiade', 'Ekskul',  'Lomba']),
                'isi_prestasi' => $faker->text(500),
                'path_prestasi' => 'default.png',
                'created_at'    => Time::now(),
                'updated_at'    => Time::now(),
            ];
            $this->db->table('prestasi')->insert($data);
        endfor;
    }
}
