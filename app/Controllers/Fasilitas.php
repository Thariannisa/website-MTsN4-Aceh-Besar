<?php

namespace App\Controllers;

use \Config\Services;
use App\Models\UserModel;
use App\Models\BeritaModel;
use App\Models\GaleriModel;
use App\Models\FasilitasModel;
use App\Models\PengumumanModel;

class Fasilitas extends BaseController
{

    protected $userModel, $fasilitasModel;
    protected $session;
    protected $data;
    public function __construct()
    {
        $this->session = session();

        $this->userModel = new UserModel();
        $this->fasilitasModel = new FasilitasModel();
        //$this->data['user'] = $this->userModel->getUser($this->session->get('email'));
    }
    public function index()
    {
        $this->data['pageTitle'] = "Admin | Fasilitas";
        $this->data['validation'] = Services::validation();
        $this->data['fasilitas'] = $this->fasilitasModel->getFasilitas();
        return view('admin/fasilitas/index', $this->data);
    }
    public function detail($id)
    {
        $user = new UserModel();
        $data = [
            'pageTitle' => 'Detail Fasilitas',
            'a' => $this->fasilitasModel->getFasilitas($id),
            'user' => $user,
        ];

        return view('admin/fasilitas/detailFasilitas', $data);
    }
    public function create()
    {
        $this->data['pageTitle'] = "Admin | CreateFasilitas";
        $this->data['validation'] = Services::validation();
        return view('admin/fasilitas/create', $this->data);
    }

    public function store()
    {
        if (!$this->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'path' => [
                'rules' => 'max_size[path,4092]|is_image[path]|mime_in[path,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran tidak boleh lebih dari 4mb',
                    'is_image' => 'File yang dimasukkan harus gambar',
                    'mime_in' => 'File yang dimasukkan harus gambar',
                ]
            ]
        ])) {
            return redirect()->to('/admin/fasilitas/create')->withInput();
        }
        // ambil sampul
        $fileSampul = $this->request->getFile('path');
        if ($fileSampul->getError() == 4)
            $namaSampul = 'default.png';
        else {
            // ambil nama file sampul
            $namaSampul = $fileSampul->getRandomName();
            // pindahkan file
            $fileSampul->move('sbadmin/img/fasilitas', $namaSampul);
        }
        //tambah data
        $user = $this->userModel->getUser(session()->get('email'));
        $userId = $user['id'];
        // dd($user['id']);
        $this->fasilitasModel->save([
            'userId' => $userId,
            'judul' => $this->request->getVar('judul'),
            'slug' => url_title($this->request->getVar('judul'), '-', TRUE),
            'deskripsi' => $this->request->getVar('deskripsi'),
            'path' => $namaSampul,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        session()->setFlashdata('pesan', 'fasilitas telah ditambahkan.');
        return redirect()->to('/admin/fasilitas');
    }

    public function edit($id)
    {
        $this->data['pageTitle'] = "Admin | EditFasilitas";
        $this->data['fasilitas'] = $this->fasilitasModel->getFasilitas($id);
        $this->data['validation'] = Services::validation();
        return view('admin/fasilitas/edit', $this->data);
    }

    public function update($id)
    {
        if (!$this->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'path' => [
                'rules' => 'max_size[path,4092]|is_image[path]|mime_in[path,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran tidak boleh lebih dari 4mb',
                    'is_image' => 'File yang dimasukkan harus gambar',
                    'mime_in' => 'File yang dimasukkan harus gambar',
                ]
            ]
        ])) {
            return redirect()->to('/admin/fasilitas/' . $id)->withInput();
        }
        // ambil sampul
        $fileSampul = $this->request->getFile('path');
        if ($fileSampul->getError() != 4) {
            // $this->deleteFile($id);
            // ambil nama file sampul
            $namaSampul = $fileSampul->getRandomName();
            // pindahkan file
            $fileSampul->move('sbadmin/img/fasilitas', $namaSampul);
            $this->fasilitasModel->save([
                'id' => $id,
                'path' => $namaSampul,
            ]);
        }

        $this->fasilitasModel->save([
            'id' => $id,
            'judul' => $this->request->getVar('judul'),
            'slug' => url_title($this->request->getVar('judul'), '-', TRUE),
            'deskripsi' => $this->request->getVar('deskripsi'),
            'updated_at' => now()
        ]);
        session()->setFlashdata('pesan', 'fasilitas telah diubah.');
        return redirect()->to('/admin/fasilitas');
    }

    public function delete()
    {
        $id = $this->request->getVar('id');
        // dd($id);
        for ($i = 0; $i < count($id); $i++) {
            if ($this->deleteFile($id[$i]))
                $this->fasilitasModel->delete($id[$i]);
        }

        return redirect()->to('/admin/fasilitas');
    }

    private function deleteFile($id)
    {
        $fasilitas = $this->fasilitasModel->getFasilitas($id);
        $path = './sbadmin/img/fasilitas/' . $fasilitas['path'];
        if (!($fasilitas['path'] == 'default.png' || $fasilitas['path'] == Null)) {
            if (is_readable($path) && unlink($path)) {
            }
        }
        return true;
    }
    //--------------------------------------------------------------------


    public function user()
    {
        $fasilitas = new FasilitasModel();
        $beritaModel = new BeritaModel();
        $galeriModel = new GaleriModel();
        $pengumumanModel = new PengumumanModel();
        $data = [
            'countberita' => count($beritaModel->getBerita()),
            'countgaleri' => count($galeriModel->getGaleri()),
            'countpengumuman' => count($pengumumanModel->getPengumuman()),
            'pageTitle' => 'Fasilitas',
            'fasilitas' => $this->fasilitasModel->paginate(6, 'fasilitas'),
            'pager'     => $this->fasilitasModel->pager,
        ];
        return view('user/fasilitas/index', $data);
    }
}
