<?php

namespace App\Controllers;


use Config\Services;
use App\Models\PengumumanModel;
use App\Models\UserModel;

class Pengumuman extends BaseController
{
    protected $userModel, $pengumumanModel;
    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->pengumumanModel = new PengumumanModel();
    }

    public function index()
    {
        $pengumuman = new PengumumanModel();
        $user = new UserModel();
        $data = [
            'pageTitle' => 'Pengunguman',
            'pengumuman' => $pengumuman->getPengumuman(),
            'user' => $user,
        ];
        return view('admin/beranda/pengumuman', $data);
    }

    public function detail($id)
    {
        $user = new UserModel();
        $data = [
            'pageTitle' => 'Detail Pengumuman',
            'b' => $this->pengumumanModel->getPengumuman($id),
            'user' => $user,
        ];

        return view('admin/beranda/detailPengumuman', $data);
    }


    public function create()
    {
        $data = [
            'pageTitle' => 'Tambah Pengumuman',
            'validation' => Services::validation(),
        ];

        return view('admin/beranda/tambahPengumuman', $data);
    }

    public function store()
    {
        //validasi data
        if (!$this->validate([ //yg dalam validasi ni name nya bukan nama kolom di table
            'judulPengumuman' => 'required', //harus diisi 
            'isiPengumuman' => 'required',
            'gambarPengumuman' => 'max_size[gambarPengumuman,8192]|is_image[gambarPengumuman]|mime_in[gambarPengumuman,image/jpg,image/jpeg,image/png]',
            'berkasPengumuman' => 'max_size[berkasPengumuman,8192]'
        ])) {
            return redirect()->to('/admin/pengumuman/tambah')->withInput(); //kembaliin ke method create dgn kasih tau inputan
        }

        $fileSampul = $this->request->getFile('gambarPengumuman');
        if ($fileSampul->getError() == 4) {
            $namaSampul = "default.png";
        } else {
            $namaSampul = $fileSampul->getRandomName();
            $fileSampul->move('gambar/pengumuman', $namaSampul);
        }

        $fileBerkas = $this->request->getFile('berkasPengumuman');
        if ($fileBerkas->getError() == 4) {
            $namaBerkas = "Tidak ada berkas";
        } else {
            $namaBerkas = $fileBerkas->getName();
            $fileBerkas->move('file/pengumuman', $namaBerkas);
        }

        $user = $this->userModel->getUser(session()->get('email'));

        $this->pengumumanModel->save([
            'userId' => $user['id'],
            'judul_pengumuman' => $this->request->getVar('judulPengumuman'), //masukin inputan dari name title kedalam kolom title
            'isi_pengumuman' => $this->request->getVar('isiPengumuman'),
            'slug' => url_title($this->request->getVar('judulPengumuman'), '-', TRUE),
            'path_pengumuman' => $namaSampul,
            'file_pengumuman' => $namaBerkas,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        session()->setFlashdata('pesan', 'Pengumuman ditambahkan.');
        return redirect()->to('/admin/pengumuman'); //ke method index
    }

    public function edit($id)
    {

        $data = [
            'pageTitle' => 'Edit Pengumuman',
            'b' => $this->pengumumanModel->getPengumuman($id),
            'validation' => Services::validation(),
        ];

        return view('admin/beranda/editPengumuman', $data);
    }

    public function update($id)
    {
        //validasi data
        if (!$this->validate([ //yg dalam validasi ni name nya bukan nama kolom di table
            'judulPengumuman' => 'required', //harus diisi 
            'isiPengumuman' => 'required',
            'gambarPengumuman' => 'max_size[gambarPengumuman,8192]|is_image[gambarPengumuman]|mime_in[gambarPengumuman,image/jpg,image/jpeg,image/png]',
            'berkasPengumuman' => 'max_size[berkasPengumuman,8192]'
        ])) {
            return redirect()->to('/admin/pengumuman/edit/' . $id)->withInput(); //kembaliin ke method create dgn kasih tau inputan
        }


        $fileSampul = $this->request->getFile('gambarPengumuman');
        if ($fileSampul->getError() != 4) {
            $namaSampul = $fileSampul->getRandomName();
            $fileSampul->move('gambar/pengumuman', $namaSampul);
            $this->pengumumanModel->save([
                'id' => $id,
                'path_pengumuman' => $namaSampul,
            ]);
        }

        $fileSampul = $this->request->getFile('berkasPengumuman');
        if ($fileSampul->getError() != 4) {
            $namaSampul = $fileSampul->getName();
            $fileSampul->move('file/pengumuman', $namaSampul);
            $this->pengumumanModel->save([
                'id' => $id,
                'file_pengumuman' => $namaSampul,
            ]);
        }

        $user = $this->userModel->getUser(session()->get('email'));

        $this->pengumumanModel->save([
            'id' => $id,
            'userId' => $user['id'],
            'judul_pengumuman' => $this->request->getVar('judulPengumuman'), //masukin inputan dari name title kedalam kolom title
            'isi_pengumuman' => $this->request->getVar('isiPengumuman'),
            'slug' => url_title($this->request->getVar('judulPengumuman'), '-', TRUE),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        session()->setFlashdata('pesan', 'Pengumuman telah diubah.');
        return redirect()->to('/admin/pengumuman'); //ke method index
    }

    public function delete()
    {
        $id = $this->request->getVar('id');
        // dd($id);
        for ($i = 0; $i < count($id); $i++) {
            if ($this->deleteFile($id[$i]))
                $this->pengumumanModel->delete($id[$i]);
        }
        session()->setFlashdata('pesanHapus', 'Pengumuman telah dihapus.');
        return redirect()->to('/admin/pengumuman');
    }

    private function deleteFile($id)
    {
        $pengumuman = $this->pengumumanModel->getPengumuman($id);
        $path = './gambar/pengumuman/' . $pengumuman['path_pengumuman'];
        if (!($pengumuman['path_pengumuman'] == 'default.png' || $pengumuman['path_pengumuman'] == Null)) {
            if (is_readable($path) && unlink($path)) {
            }
        }
        return true;
    }


    //--------------------------------------------------------------------

}
