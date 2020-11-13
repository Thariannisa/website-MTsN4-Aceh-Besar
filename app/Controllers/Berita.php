<?php

namespace App\Controllers;


use Config\Services;
use App\Models\BeritaModel;
use App\Models\UserModel;

class Berita extends BaseController
{
    protected $userModel, $beritaModel;
    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->beritaModel = new BeritaModel();
    }

    public function index()
    {
        $berita = new BeritaModel();
        $user = new UserModel();
        $data = [
            'pageTitle' => 'Berita',
            'berita' => $berita->getBerita(),
            'user' => $user,
        ];
        return view('admin/beranda/berita', $data);
    }

    public function detail($id)
    {
        $user = new UserModel();
        $data = [
            'pageTitle' => 'Detail Berita',
            'b' => $this->beritaModel->getBerita($id),
            'user' => $user,
        ];

        return view('admin/beranda/detailBerita', $data);
    }


    public function create()
    {
        $data = [
            'pageTitle' => 'Tambah Berita',
            'validation' => Services::validation(),
        ];

        return view('admin/beranda/tambahBerita', $data);
    }

    public function store()
    {
        //validasi data
        if (!$this->validate([ //yg dalam validasi ni name nya bukan nama kolom di table
            'judulBerita' => 'required', //harus diisi 
            'isiBerita' => 'required',
            'gambarBerita' => 'max_size[gambarBerita,8192]|is_image[gambarBerita]|mime_in[gambarBerita,image/jpg,image/jpeg,image/png]',
        ])) {
            return redirect()->to('/admin/berita/tambah')->withInput(); //kembaliin ke method create dgn kasih tau inputan
        }

        $fileSampul = $this->request->getFile('gambarBerita');

        if ($fileSampul->getError() == 4) {
            $namaSampul = "default.png";
        } else {
            $namaSampul = $fileSampul->getRandomName();
            $fileSampul->move('gambar/berita', $namaSampul);
        }

        $user = $this->userModel->getUser(session()->get('email'));

        $this->beritaModel->save([
            'userId' => $user['id'],
            'judul_berita' => $this->request->getVar('judulBerita'), //masukin inputan dari name title kedalam kolom title
            'isi_berita' => $this->request->getVar('isiBerita'),
            'slug' => url_title($this->request->getVar('judulBerita'), '-', TRUE),
            'path_berita' => $namaSampul,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        session()->setFlashdata('pesan', 'Berita telah ditambahkan.');
        return redirect()->to('/admin/berita'); //ke method index
    }


    public function edit($id)
    {

        $data = [
            'pageTitle' => 'Edit Berita',
            'b' => $this->beritaModel->getBerita($id),
            'validation' => Services::validation(),
        ];

        return view('admin/beranda/editBerita', $data);
    }

    public function update($id)
    {
        //validasi data
        if (!$this->validate([ //yg dalam validasi ni name nya bukan nama kolom di table
            'judulBerita' => 'required', //harus diisi 
            'isiBerita' => 'required',
            'gambarBerita' => 'max_size[gambarBerita,8192]|is_image[gambarBerita]|mime_in[gambarBerita,image/jpg,image/jpeg,image/png]',
        ])) {
            session()->setFlashdata('pesan', 'Berita gagal backend.');
            return redirect()->to('/admin/berita/edit/' . $id)->withInput(); //kembaliin ke method create dgn kasih tau inputan
        }

        $fileSampul = $this->request->getFile('gambarBerita');
        if ($fileSampul->getError() != 4) {
            $namaSampul = $fileSampul->getRandomName();
            $fileSampul->move('gambar/berita', $namaSampul);
            $this->beritaModel->save([
                'id' => $id,
                'path_berita' => $namaSampul,
            ]);
        }

        $user = $this->userModel->getUser(session()->get('email'));

        $this->beritaModel->save([
            'id' => $id,
            'userId' => $user['id'],
            'judul_berita' => $this->request->getVar('judulBerita'), //masukin inputan dari name title kedalam kolom title
            'isi_berita' => $this->request->getVar('isiBerita'),
            'slug' => url_title($this->request->getVar('judulBerita'), '-', TRUE),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        session()->setFlashdata('pesan', 'Berita telah diubah.');
        return redirect()->to('/admin/berita'); //ke method index
    }

    public function delete()
    {
        $id = $this->request->getVar('id');
        // dd($id);
        for ($i = 0; $i < count($id); $i++) {
            if ($this->deleteFile($id[$i]))
                $this->beritaModel->delete($id[$i]);
        }
        session()->setFlashdata('pesanHapus', 'Berita telah dihapus.');
        return redirect()->to('/admin/berita');
    }

    private function deleteFile($id)
    {
        $berita = $this->beritaModel->getBerita($id);
        $path = './gambar/berita/' . $berita['path_berita'];
        if (!($berita['path_berita'] == 'default.png' || $berita['path_berita'] == Null)) {
            if (is_readable($path) && unlink($path)) {
            }
        }
        return true;
    }
    //--------------------------------------------------------------------

}
