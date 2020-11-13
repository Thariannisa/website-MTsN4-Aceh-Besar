<?php

namespace App\Models;

use CodeIgniter\Model;

class PengumumanModel extends Model
{
    protected $table      = 'pengumuman';
    protected $primaryKey = 'id';


    protected $allowedFields = ['judul_pengumuman', 'isi_pengumuman', 'path_pengumuman', 'userId', 'slug', 'file_pengumuman']; //data yg boleh dimasukkin sm user

    protected $useTimestamps = true;

    public function getPengumuman($id = false) //untuk apa fungsi ni?
    {
        if ($id) {
            return $this->where(['id' => $id])->first(); //kurang paham
        }
        return $this->findAll();
    }

    public function last_record_pengumuman()
    {
        $query = $this->db->query("SELECT * FROM pengumuman ORDER BY id DESC LIMIT 5");
        $result = $query->getResultArray();
        return $result;
    }

    public function getPengumumanbySlug($slug) //untuk apa fungsi ni?
    {
        return $this->where(['slug' => $slug])->first(); //kurang paham
    }
}
