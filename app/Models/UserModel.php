<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table      = 'users';

    protected $useTimestamps = true;
    protected $allowedFields = ['email', 'nama', 'alamat', 'password', 'pathProfile'];

    public function getUser($email = false)
    {
        if ($email == false) {
            return $this->findAll();
        }

        return $this->where(['email' => $email])->first();
    }
}
