<?php

namespace App\Models;

use CodeIgniter\Model;

class TataTertibModel extends Model
{
    protected $table      = 'tatatertib';

    protected $useTimestamps = false;
    protected $allowedFields = ['tatatertib'];

    public function getTataTertib($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['id' => $id])->first();
    }
}
