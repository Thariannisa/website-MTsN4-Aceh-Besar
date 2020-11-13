<?php

namespace App\Models;

use CodeIgniter\Model;

class StrukturModel extends Model
{
    protected $table      = 'struktur';

    protected $useTimestamps = false;
    protected $allowedFields = ['path_struktur'];

    public function getStruktur($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['id' => $id])->first();
    }
}
