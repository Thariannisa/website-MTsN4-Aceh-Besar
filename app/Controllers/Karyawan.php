<?php

namespace App\Controllers;

use \Config\Services;
use App\Models\UserModel;
use App\Models\BeritaModel;
use App\Models\GaleriModel;
use App\Models\KaryawanModel;
use App\Models\PengumumanModel;

class Karyawan extends BaseController
{
    protected $userModel, $KaryawanModel;
    protected $data;
    public function __construct()
    {
        $this->data = [
            "pageTitle" => "Admin | Karyawan"
        ];
        $this->KaryawanModel = new KaryawanModel();
        $this->userModel = new userModel();
    }
    public function index()
    {
        $this->data['karyawan'] = $this->KaryawanModel->getKaryawan();
        return view('admin/staff/karyawan', $this->data);
    }

    public function create()
    {
        $this->data['pageTitle'] = "Admin | Create Karyawan";
        $this->data['validation'] = Services::validation();
        return view('admin/staff/create_karyawan', $this->data);
    }

    public function store()
    {
        if (!$this->validate([
            'nama' => 'required',
            'Status_Karyawan' => 'required',
            'Jabatan' => 'required',
            'path' => [
                'rules' => 'max_size[path,4092]|is_image[path]|mime_in[path,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran tidak boleh lebih dari 4mb',
                    'is_image' => 'File yang dimasukkan harus gambar',
                    'mime_in' => 'File yang dimasukkan harus gambar',
                ]
            ]
        ])) {
            return redirect()->to('/admin/staff/karyawan')->withInput();
        }
        $nama = $this->request->getVar('nama');
        $Status_Karyawan = $this->request->getVar('Status_Karyawan');
        $Jabatan = $this->request->getVar('Jabatan');
        $file = $this->request->getFiles('path');
        for ($i = 0; $i < count($nama); $i++) {
            // // ambil sampul
            $fileSampul = $file['path'][$i];
            if ($fileSampul->getError() == 4)
                $namaSampul = 'default.png';
            else {
                // ambil nama file sampul
                $namaSampul = $fileSampul->getRandomName();
                // pindahkan file
                $fileSampul->move('sbadmin/img/karyawan', $namaSampul);
            }
            //tambah data
            $user = $this->userModel->getUser(session()->get('email'));
            $this->KaryawanModel->save([
                'userId' => $user['id'],
                'nama' => $nama[$i],
                'Status_Karyawan' => $Status_Karyawan[$i],
                'Jabatan' => $Jabatan[$i],
                'path' => $namaSampul,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }

        return redirect()->to('/admin/staff/karyawan');
    }


    public function edit($id)
    {
        $this->data['pageTitle'] = "Admin | Edit Karyawan";
        $this->data['karyawan'] = $this->KaryawanModel->getKaryawan($id);
        $this->data['validation'] = Services::validation();
        return view('admin/staff/edit_karyawan', $this->data);
    }

    public function update($id)
    {
        if (!$this->validate([
            'nama' => 'required',
            'Status_Karyawan' => 'required',
            'Jabatan' => 'required',
            'path' => [
                'rules' => 'max_size[path,4092]|is_image[path]|mime_in[path,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran tidak boleh lebih dari 4mb',
                    'is_image' => 'File yang dimasukkan harus gambar',
                    'mime_in' => 'File yang dimasukkan harus gambar',
                ]
            ]
        ])) {
            return redirect()->to('/admin/staff/karyawan/edit/' . $id)->withInput();
        }
        // ambil sampul
        $fileSampul = $this->request->getFile('path');
        if ($fileSampul->getError() != 4) {
            $this->deleteFile($id);
            // ambil nama file sampul
            $namaSampul = $fileSampul->getRandomName();
            // pindahkan file
            $fileSampul->move('sbadmin/img/karyawan', $namaSampul);
            $this->KaryawanModel->save([
                'id' => $id,
                'path' => $namaSampul
            ]);
        }

        $this->KaryawanModel->save([
            'id' => $id,
            'nama' => $this->request->getVar('nama'),
            'Status_Karyawan' => $this->request->getVar('Status_Karyawan'),
            'Jabatan' => $this->request->getVar('Jabatan'),
            'updated_at' => now()
        ]);

        return redirect()->to('/admin/staff/karyawan');
    }

    public function delete()
    {
        $id = $this->request->getVar('id');
        // dd($id);
        for ($i = 0; $i < count($id); $i++) {
            if ($this->deleteFile($id[$i]))
                $this->KaryawanModel->delete($id[$i]);
        }

        return redirect()->to('/admin/staff/karyawan');
    }
    private function deleteFile($id)
    {
        $Karyawan = $this->KaryawanModel->getKaryawan($id);
        $path = './sbadmin/img/karyawan/' . $Karyawan['path'];
        if (!($Karyawan['path'] == 'default.png' || $Karyawan['path'] == Null)) {
            if (is_readable($path) && unlink($path)) {
            }
        }
        return true;
    }

    //--------------------------------------------------------------------
    public function user()
    {
        $karyawan = new KaryawanModel();
        $beritaModel = new BeritaModel();
        $galeriModel = new GaleriModel();
        $pengumumanModel = new PengumumanModel();
        $karyawan = $this->KaryawanModel;
        $halamanSekarang = $this->request->getVar('page_karyawan') ? $this->request->getVar('page_karyawan') :
        1;
        if ($this->request->getGet('keyword')) {
            $karyawan = $karyawan
                ->like('nama',  $this->request->getGet('keyword'), 'both')
                ->orlike('Status_Karyawan', $this->request->getGet('keyword') . '', 'both')
                ->orlike('Jabatan', $this->request->getGet('keyword') . '', 'both');
        }
        $data = [
            'countberita' => count($beritaModel->getBerita()),
            'countgaleri' => count($galeriModel->getGaleri()),
            'countpengumuman' => count($pengumumanModel->getPengumuman()),
            'pageTitle' => 'Karyawan',
            'karyawan' => $karyawan->orderBy('created_at', 'desc')->paginate(10, 'karyawan'),
            'pager'     => $this->KaryawanModel->pager,
            'halamanSekarang'=> $halamanSekarang,
        ];
        return view('user/staff/karyawan', $data);
    }
}
