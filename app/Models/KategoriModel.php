<?php

namespace App\Models;

use CodeIgniter\Model;

class KategoriModel extends Model
{
    protected $table      = 'kategoris';

    protected $useTimestamps = true;
    protected $allowedFields = ['nama', 'slug'];

    public function getKategori($id = false)
    {
        if ($id == false) {
            return $this->orderBy('created_at', 'desc')->findAll();
        }

        return $this->where(['id' => $id])->first();
    }
    public function getKategoribySlug($slug) //untuk apa fungsi ni?
    {
        return $this->where(['slug' => $slug])->first(); //kurang paham
    }
}
