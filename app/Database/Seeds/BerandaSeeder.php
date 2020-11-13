<?php

namespace App\Database\Seeds;

use Faker\Factory;
use App\Models\UserModel;
use CodeIgniter\I18n\Time;

class BerandaSeeder extends \CodeIgniter\Database\Seeder
{
    public function run()
    {
        $faker = Factory::create('id_ID');
        for ($i = 1; $i <= 50; $i++) :
            $title = $faker->sentence(5);
            $data = [
                'userId' => 1,
                'judul_berita'    => $title,
                'slug' => url_title($title, '-', TRUE),
                'isi_berita' => $faker->text(500),
                'path_berita' => 'default.png',
                'created_at'    => Time::now(),
                'updated_at'    => Time::now(),
            ];
            $this->db->table('berita')->insert($data);
        endfor;
        for ($i = 1; $i <= 50; $i++) :
            $title = $faker->sentence(5);
            $data = [
                'userId' => 1,
                'judul_pengumuman'    => $title,
                'slug' => url_title($title, '-', TRUE),
                'isi_pengumuman' => $faker->text(500),
                'path_pengumuman' => 'default.png',
                'created_at'    => Time::now(),
                'updated_at'    => Time::now(),
            ];
            $this->db->table('pengumuman')->insert($data);
        endfor;
        for ($i = 1; $i <= 50; $i++) :
            $data = [
                'userId' => 1,
                'categoryId' => $faker->numberBetween(1,  51),
                'judul_gambar'    => 'default.png',
                'path_gambar' => 'default.png',
                'created_at'    => Time::now(),
                'updated_at'    => Time::now(),
            ];
            $this->db->table('galeri')->insert($data);
        endfor;
    }
}
