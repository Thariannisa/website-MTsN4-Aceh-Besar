<?php

namespace App\Models;

use CodeIgniter\Model;

class KaryawanModel extends Model
{
    protected $table      = 'karyawan';
    protected $useTimestamps = true;
    protected $allowedFields = ['nama', 'path', 'Status_Karyawan', 'Jabatan', 'userId'];

    public function getKaryawan($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['id' => $id])->first();
    }
}
