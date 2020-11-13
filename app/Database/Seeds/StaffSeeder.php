<?php

namespace App\Database\Seeds;

use Faker\Factory;
use App\Models\UserModel;
use CodeIgniter\I18n\Time;

class StaffSeeder extends \CodeIgniter\Database\Seeder
{
    public function run()
    {
        $faker = Factory::create('id_ID');
        for ($i = 1; $i <= 50; $i++) :
            $data = [
                'userId' => 1,
                'nama'    => $faker->name,
                'nip' => $faker->unique()->numerify('#############'),
                'Mata_Pelajaran' => $faker->randomElement(['Matematika', "Ilmu Pengetahuan Alam", 'Aqidah Akhlak', 'Fiqih', 'PKN', 'Bahasa Arab', 'Bahasa Indonesia', 'Bahasa Inggris', 'Ilmu Pengetahuan Sosial', 'Olahraga', 'Seni Budaya', 'Prakarya', 'Teknologi Informasi dan Komunikasi']),
                'path' => 'default.png',
                'Jabatan' => 'aktif',
                'Status_Kepegawaian' => 'aktif',
                'created_at'    => Time::now(),
                'updated_at'    => Time::now(),
            ];
            $this->db->table('guru')->insert($data);
        endfor;
        for ($i = 1; $i <= 50; $i++) :
            $data = [
                'userId' => 1,
                'nama'    => $faker->name,
                'path' => 'default.png',
                'Jabatan' => 'pegawai',
                'Status_Karyawan' => 'aktif',
                'created_at'    => Time::now(),
                'updated_at'    => Time::now(),
            ];
            $this->db->table('karyawan')->insert($data);
        endfor;
    }
}
