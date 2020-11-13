<?php

namespace App\Models;

use CodeIgniter\Model;

class FasilitasModel extends Model
{
    protected $table      = 'fasilitas';

    protected $useTimestamps = true;
    protected $allowedFields = ['judul', 'deskripsi', 'path', 'userId', 'slug'];

    public function getFasilitas($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['id' => $id])->first();
    }
}
