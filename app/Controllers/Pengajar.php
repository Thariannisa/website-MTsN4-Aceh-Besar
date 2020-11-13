<?php

namespace App\Controllers;

use \Config\Services;
use App\Models\GuruModel;
use App\Models\UserModel;
use App\Models\BeritaModel;
use App\Models\GaleriModel;
use App\Models\PengumumanModel;

class Pengajar extends BaseController
{
    protected $data;
    protected $userModel, $GuruModel;
    public function __construct()
    {
        $this->data = [
            "pageTitle" => "Admin |Pengajar"
        ];
        $this->GuruModel = new GuruModel();
        $this->userModel = new userModel();
    }
    public function index()
    {
        $this->data['pengajar'] = $this->GuruModel->getPengajar();
        return view('admin/staff/pengajar', $this->data);
    }

    public function create()
    {
        $this->data['pageTitle'] = "Admin | Create Pengajar";
        $this->data['validation'] = Services::validation();
        return view('admin/staff/create_pengajar', $this->data);
    }

    public function store()
    {
        if (!$this->validate([

            'nama' => 'required',
            'nip' => 'required',
            'Mata_Pelajaran' => 'required',
            'Jabatan' => 'required',
            'Status_Kepegawaian' => 'required',
            'path' => [
                'rules' => 'max_size[path,4092]|is_image[path]|mime_in[path,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran tidak boleh lebih dari 4mb',
                    'is_image' => 'File yang dimasukkan harus gambar',
                    'mime_in' => 'File yang dimasukkan harus gambar',
                ]
            ]
        ])) {
            return redirect()->to('/admin/staff/pengajar/create')->withInput();
        }

        //tambah data
        $user = $this->userModel->getUser($this->session->get('email'));
        $userId = $user['id'];

        $nama = $this->request->getVar('nama');
        $nip = $this->request->getVar('nip');
        $Mata_Pelajaran = $this->request->getVar('Mata_Pelajaran');
        $Jabatan = $this->request->getVar('Jabatan');
        $Status_Kepegawaian = $this->request->getVar('Status_Kepegawaian');
        $file = $this->request->getFiles('path');
        for ($i = 0; $i < count($nip); $i++) {
            // // ambil sampul
            $fileSampul = $file['path'][$i];
            if ($fileSampul->getError() == 4)
                $namaSampul = 'default.png';
            else {
                // ambil nama file sampul
                $namaSampul = $fileSampul->getRandomName();
                // pindahkan file
                $fileSampul->move('sbadmin/img/pengajar', $namaSampul);
            }
            $this->GuruModel->save([
                'userId' => $userId,
                'nama' => $nama[$i],
                'nip' => $nip[$i],
                'Mata_Pelajaran' => $Mata_Pelajaran[$i],
                'Jabatan' => $Jabatan[$i],
                'Status_Kepegawaian' => $Status_Kepegawaian[$i],
                'path' => $namaSampul,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }

        return redirect()->to('/admin/staff/pengajar');
    }


    public function edit($id)
    {
        $this->data['pageTitle'] = "Admin | Edit Teacher";
        $this->data['pengajar'] = $this->GuruModel->getPengajar($id);
        $this->data['validation'] = Services::validation();
        return view('admin/staff/edit_pengajar', $this->data);
    }

    public function update($id)
    {
        if (!$this->validate([
            'nama' => 'required',
            'nip' => 'required|numeric',
            'Mata_Pelajaran' => 'required',
            'Jabatan' => 'required',
            'Status_Kepegawaian' => 'required',
            'path' => [
                'rules' => 'max_size[path,4092]|is_image[path]|mime_in[path,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran tidak boleh lebih dari 4mb',
                    'is_image' => 'File yang dimasukkan harus gambar',
                    'mime_in' => 'File yang dimasukkan harus gambar',
                ]
            ]
        ])) {
            return redirect()->to('/admin/staff/pengajar/edit/' . $id)->withInput();
        }
        // ambil sampul
        $fileSampul = $this->request->getFile('path');
        if ($fileSampul->getError() != 4) {
            $this->deleteFile($id);
            // ambil nama file sampul
            $namaSampul = $fileSampul->getRandomName();
            // pindahkan file
            $fileSampul->move('sbadmin/img/pengajar', $namaSampul);
            $this->GuruModel->save([
                'id' => $id,
                'path' => $namaSampul
            ]);
        }

        $this->GuruModel->save([
            'id' => $id,
            'nama' => $this->request->getVar('nama'),
            'nip' => $this->request->getVar('nip'),
            'Mata_Pelajaran' => $this->request->getVar('Mata_Pelajaran'),
            'Jabatan' => $this->request->getVar('Jabatan'),
            'Status_Kepegawaian' => $this->request->getVar('Status_Kepegawaian'),
            'updated_at' => now()
        ]);

        return redirect()->to('/admin/staff/pengajar');
    }

    public function delete()
    {
        $id = $this->request->getVar('id');
        // dd($id);
        for ($i = 0; $i < count($id); $i++) {
            if ($this->deleteFile($id[$i]))
                $this->GuruModel->delete($id[$i]);
        }

        return redirect()->to('/admin/staff/pengajar');
    }
    private function deleteFile($id)
    {
        $pengajar = $this->GuruModel->getPengajar($id);
        $path = './sbadmin/img/pengajar/' . $pengajar['path'];
        if (!($pengajar['path'] == 'default.png' || $pengajar['path'] == Null)) {
            if (is_readable($path) && unlink($path)) {
            }
        }
        return true;
    }

    //--------------------------------------------------------------------
    public function user()
    {
        $pengajar = new GuruModel();
        $beritaModel = new BeritaModel();
        $galeriModel = new GaleriModel();
        $pengumumanModel = new PengumumanModel();
        $guru = $this->GuruModel;
        $halamanSekarang = $this->request->getVar('page_guru') ? $this->request->getVar('page_guru') :
            1;
        if ($this->request->getGet('keyword')) {
            $guru = $guru
                ->like('nama',  $this->request->getGet('keyword'), 'both')
                ->orlike('nip', $this->request->getGet('keyword') . '', 'both')
                ->orlike('Mata_Pelajaran', $this->request->getGet('keyword') . '', 'both')
                ->orlike('Jabatan', $this->request->getGet('keyword') . '', 'both')
                ->orlike('Status_Kepegawaian', $this->request->getGet('keyword') . '', 'both');
        }
        $data = [
            'countberita' => count($beritaModel->getBerita()),
            'countgaleri' => count($galeriModel->getGaleri()),
            'countpengumuman' => count($pengumumanModel->getPengumuman()),
            'pageTitle' => 'Pengajar',
            'pengajar' => $guru->orderBy('created_at', 'desc')->paginate(10, 'guru'),
            'pager' => $this->GuruModel->pager,
            'halamanSekarang' => $halamanSekarang,
        ];
        return view('user/staff/pengajar', $data);
    }
}
