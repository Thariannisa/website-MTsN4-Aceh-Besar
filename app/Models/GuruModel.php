<?php

namespace App\Models;

use CodeIgniter\Model;

class GuruModel extends Model
{
    protected $table      = 'guru';

    protected $useTimestamps = true;
    protected $allowedFields = ['nama', 'nip', 'Mata_Pelajaran', 'path', 'Jabatan', 'Status_Kepegawaian', 'userId'];

    public function getPengajar($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['id' => $id])->first();
    }
}
