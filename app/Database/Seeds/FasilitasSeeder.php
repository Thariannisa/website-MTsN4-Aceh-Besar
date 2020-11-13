<?php

namespace App\Database\Seeds;

use Faker\Factory;
use App\Models\UserModel;
use CodeIgniter\I18n\Time;

class FasilitasSeeder extends \CodeIgniter\Database\Seeder
{
    public function run()
    {
        $faker = Factory::create('id_ID');
        for ($i = 1; $i <= 50; $i++) :
            $title = $faker->sentence(5);
            $data = [
                'userId' => 1,
                'judul'    => $title,
                'slug' => url_title($title, '-', TRUE),
                'deskripsi' => $faker->text(500),
                'path' => 'default.png',
                'created_at'    => Time::now(),
                'updated_at'    => Time::now(),
            ];
            $this->db->table('fasilitas')->insert($data);
        endfor;
    }
}
