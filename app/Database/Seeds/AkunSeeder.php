<?php

namespace App\Database\Seeds;

use Faker\Factory;
use App\Models\UserModel;
use CodeIgniter\I18n\Time;

class AkunSeeder extends \CodeIgniter\Database\Seeder
{
    public function run()
    {
        $faker = Factory::create('id_ID');
        $data = [
            'email'    => 'jeureulamtsn@yahoo.com',
            'password'    => password_hash('mtsn1234', PASSWORD_DEFAULT),
            'nama' => 'Admin',
            'created_at'    => Time::now(),
            'updated_at'    => Time::now(),
        ];

        // Using Query Builder
        $this->db->table('users')->insert($data);
    }
}
