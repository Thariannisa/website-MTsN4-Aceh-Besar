<?php

namespace App\Models;

use CodeIgniter\Model;

class OrganisasiModel extends Model
{
    protected $table      = 'organisasi';
    protected $primaryKey = 'id';


    protected $allowedFields = ['judul_organisasi', 'isi_organisasi', 'userId', 'slug']; //data yg boleh dimasukkin sm user

    protected $useTimestamps = true;

    public function getOrganisasi($id = false) //untuk apa fungsi ni?
    {
        if ($id) {
            return $this->where(['id' => $id])->first(); //kurang paham
        }
        return $this->orderBy('created_at', 'desc')->findAll();
    }
    public function getOrganisasibySlug($slug) //untuk apa fungsi ni?
    {
        return $this->where(['slug' => $slug])->first(); //kurang paham
    }
}
