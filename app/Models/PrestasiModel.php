<?php

namespace App\Models;

use CodeIgniter\Model;

class PrestasiModel extends Model
{
    protected $table      = 'prestasi';
    protected $primaryKey = 'id';


    protected $allowedFields = ['judul_prestasi', 'isi_prestasi', 'kategori', 'path_prestasi', 'userId', 'slug']; //data yg boleh dimasukkin sm user

    protected $useTimestamps = true;

    public function getPrestasi($id = false) //untuk apa fungsi ni?
    {
        if ($id) {
            return $this->where(['id' => $id])->first(); //kurang paham
        }
        return $this->findAll();
    }

    public function getPrestasibySlug($slug) //untuk apa fungsi ni?
    {
        return $this->where(['slug' => $slug])->first(); //kurang paham
    }
}
