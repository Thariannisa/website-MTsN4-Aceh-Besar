<?php

namespace App\Models;

use CodeIgniter\Model;

class VisimisiModel extends Model
{
    protected $table      = 'visimisi';

    protected $useTimestamps = false;
    protected $allowedFields = ['visi', 'misi'];

    public function getVisimisi($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['id' => $id])->first();
    }
}
