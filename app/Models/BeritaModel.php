<?php

namespace App\Models;

use CodeIgniter\Model;

class BeritaModel extends Model
{
    protected $table      = 'berita';
    protected $primaryKey = 'id';


    protected $allowedFields = ['judul_berita', 'isi_berita', 'path_berita', 'userId', 'slug']; //data yg boleh dimasukkin sm user

    protected $useTimestamps = true;

    public function getBerita($id = false) //untuk apa fungsi ni?
    {
        if ($id) {
            return $this->where(['id' => $id])->first(); //kurang paham
        }
        return $this->findAll();
    }
    public function getBeritabySlug($slug) //untuk apa fungsi ni?
    {
        return $this->where(['slug' => $slug])->first(); //kurang paham
    }

    public function last_record()
    {
        $query = $this->db->query("SELECT * FROM berita ORDER BY id DESC LIMIT 5");
        $result = $query->getResultArray();
        return $result;
    }
    public function last_record_berita()
    {
        $query = $this->db->query("SELECT * FROM berita ORDER BY id DESC LIMIT 10");
        $result = $query->getResultArray();
        return $result;
    }
}
