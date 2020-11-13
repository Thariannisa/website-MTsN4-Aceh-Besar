<?php

namespace App\Models;

use CodeIgniter\Model;

class GaleriModel extends Model
{
    protected $table      = 'galeri';

    protected $useTimestamps = true;
    protected $allowedFields = ['judul_gambar', 'path_gambar', 'userId', 'categoryId'];

    public function getGaleri($id = false)
    {
        if ($id == false) {
            return $this->orderBy('created_at', 'desc')->findAll();
        }

        return $this->where(['id' => $id])->first();
    }

    public function last_record_galeri()
    {
        $query = $this->db->query("SELECT * FROM galeri ORDER BY id DESC LIMIT 8");
        $result = $query->getResultArray();
        return $result;
    }

    public function getGaleribyKategori($slug)
    {
        $kategori = new KategoriModel();
        $data = $kategori->getKategoribySlug($slug);
        return $this->where(['categoryId' => $data['id']])->findAll();
    }
}
