<?php

namespace App\Controllers;


use Config\Services;
use App\Models\UserModel;
use App\Models\GaleriModel;
use App\Models\KategoriModel;

class Galeri extends BaseController
{
    protected $userModel, $galeriModel;
    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->galeriModel = new GaleriModel();
    }

    public function index()
    {
        $user = new UserModel();
        $data = [
            'pageTitle' => 'Galeri',
            'kategori' => new KategoriModel(),
            'galeri' => $this->galeriModel->getGaleri(),
            'user' => $user,
        ];
        return view('admin/beranda/galeri', $data);
    }

    public function detail($id)
    {
        $user = new UserModel();
        $data = [
            'pageTitle' => 'Detail Foto',
            'b' => $this->galeriModel->getGaleri($id),
            'user' => $user,
        ];

        return view('admin/beranda/detailGaleri', $data);
    }

    public function create()
    {
        $kategori = new KategoriModel();
        $data = [
            'pageTitle' => 'Tambah Foto',
            'kategori' => $kategori->getKategori(),
            'validation' => Services::validation(),
        ];

        return view('admin/beranda/tambahGaleri', $data);
    }

    public function store()
    {
        $idKategori = $this->request->getVar('kategori');
        $fileSampul = $this->request->getFile('file');
        $namaSampul = $fileSampul->getRandomName();
        $namaJudul = $fileSampul->getName();
        $fileSampul->move('gambar/galeri', $namaSampul);

        $user = $this->userModel->getUser(session()->get('email'));

        $this->galeriModel->save([
            'userId' => $user['id'],
            'categoryId' => $idKategori,
            'judul_gambar' => $namaJudul, //masukin inputan dari name title kedalam kolom title
            'path_gambar' => $namaSampul,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }


    public function edit($id)
    {

        $data = [
            'pageTitle' => 'Edit Galeri',
            'b' => $this->galeriModel->getGaleri($id),
            'validation' => Services::validation(),
        ];

        return view('admin/beranda/editGaleri', $data);
    }

    public function update($id)
    {
        //validasi data
        if (!$this->validate([ //yg dalam validasi ni name nya bukan nama kolom di table
            'judulGaleri' => 'required', //harus diisi 
            'gambarGaleri' => 'max_size[gambarGaleri,8192]|is_image[gambarGaleri]|mime_in[gambarGaleri,image/jpg,image/jpeg,image/png]',
        ])) {
            return redirect()->to('/admin/galeri/edit/' . $id)->withInput(); //kembaliin ke method create dgn kasih tau inputan
        }

        $fileSampul = $this->request->getFile('gambarGaleri');
        if ($fileSampul->getError() != 4) {
            $namaSampul = $fileSampul->getRandomName();
            $fileSampul->move('gambar/galeri', $namaSampul);
            $this->galeriModel->save([
                'id' => $id,
                'path_gambar' => $namaSampul,
            ]);
        }

        $user = $this->userModel->getUser(session()->get('email'));

        $this->galeriModel->save([
            'id' => $id,
            'userId' => $user['id'],
            'judul_gambar' => $this->request->getVar('judulGaleri'), //masukin inputan dari name title kedalam kolom title
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        session()->setFlashdata('pesan', 'Foto telah diubah.');
        return redirect()->to('/admin/galeri'); //ke method index
    }

    public function delete()
    {
        $id = $this->request->getVar('id');
        // dd($id);
        for ($i = 0; $i < count($id); $i++) {
            if ($this->deleteFile($id[$i]))
                $this->galeriModel->delete($id[$i]);
        }

        session()->setFlashdata('pesanHapus', 'Foto telah dihapus.');
        return redirect()->to('/admin/galeri');
    }

    private function deleteFile($id)
    {
        $galeri = $this->galeriModel->getGaleri($id);
        $path = './gambar/galeri/' . $galeri['path_gambar'];
        if (!($galeri['path_gambar'] == 'default.png' || $galeri['path_gambar'] == Null)) {
            if (is_readable($path) && unlink($path)) {
            }
        }
        return true;
    }
    //--------------------------------------------------------------------

}
