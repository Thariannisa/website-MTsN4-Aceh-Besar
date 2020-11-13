<?php

namespace App\Controllers;


use Config\Services;
use App\Models\UserModel;
use CodeIgniter\I18n\Time;
use App\Models\BeritaModel;
use App\Models\GaleriModel;
use App\Models\PrestasiModel;
use App\Models\PengumumanModel;

class Prestasi extends BaseController
{
    protected $userModel, $prestasiModel, $beritaModel;
    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->prestasiModel = new PrestasiModel();
        $this->beritaModel = new BeritaModel();
    }

    public function index()
    {
        $prestasi = new PrestasiModel();
        $user = new UserModel();
        $data = [
            'pageTitle' => 'Prestasi',
            'prestasi' => $prestasi->getPrestasi(),
            'user' => $user,
        ];
        return view('admin/akademik/prestasi', $data);
    }

    public function detail($id)
    {
        $user = new UserModel();
        $data = [
            'pageTitle' => 'Detail Prestasi',
            'p' => $this->prestasiModel->getPrestasi($id),
            'user' => $user,
        ];

        return view('admin/akademik/detailPrestasi', $data);
    }

    public function create()
    {
        $data = [
            'pageTitle' => 'Tambah Prestasi',
            'validation' => Services::validation(),
        ];

        return view('admin/akademik/create_prestasi', $data);
    }

    public function store()
    {
        //validasi data
        if (!$this->validate([ //yg dalam validasi ni name nya bukan nama kolom di table
            'judulPrestasi' => 'required', //harus diisi 
            'isiPrestasi' => 'required',
            'kategoriPrestasi' => 'required',
            'gambarPrestasi' => 'max_size[gambarPrestasi,8192]|is_image[gambarPrestasi]|mime_in[gambarPrestasi,image/jpg,image/jpeg,image/png]',
        ])) {
            return redirect()->to('/admin/akademik/prestasi/create')->withInput(); //kembaliin ke method create dgn kasih tau inputan
        }

        $fileSampul = $this->request->getFile('gambarPrestasi');

        if ($fileSampul->getError() == 4) {
            $namaSampul = "default.png";
        } else {
            $namaSampul = $fileSampul->getRandomName();
            $fileSampul->move('sbadmin/img/prestasi', $namaSampul);
        }

        $user = $this->userModel->getUser(session()->get('email'));

        $this->prestasiModel->save([
            'userId' => $user['id'],
            'judul_prestasi' => $this->request->getVar('judulPrestasi'), //masukin inputan dari name title kedalam kolom title
            'isi_prestasi' => $this->request->getVar('isiPrestasi'),
            'kategori' => $this->request->getVar('kategoriPrestasi'),
            'slug' => url_title($this->request->getVar('judulPrestasi'), '-', TRUE),
            'path_prestasi' => $namaSampul,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        session()->setFlashdata('pesan', 'Prestasi telah ditambahkan.');
        return redirect()->to('/admin/akademik/prestasi'); //ke method index
    }


    public function edit($id)
    {

        $data = [
            'pageTitle' => 'Edit Prestasi',
            'p' => $this->prestasiModel->getPrestasi($id),
            'validation' => Services::validation(),
        ];

        return view('admin/akademik/edit_prestasi', $data);
    }

    public function update($id)
    {
        //validasi data
        if (!$this->validate([ //yg dalam validasi ni name nya bukan nama kolom di table
            'judulPrestasi' => 'required', //harus diisi 
            'isiPrestasi' => 'required',
            'kategoriPrestasi' => 'required',
            'gambarPrestasi' => 'max_size[gambarPrestasi,8192]|is_image[gambarPrestasi]|mime_in[gambarPrestasi,image/jpg,image/jpeg,image/png]',
        ])) {
            return redirect()->to('/admin/akademik/prestasi/edit/' . $id)->withInput(); //kembaliin ke method create dgn kasih tau inputan
        }

        $fileSampul = $this->request->getFile('gambarPrestasi');
        if ($fileSampul->getError() != 4) {
            $namaSampul = $fileSampul->getRandomName();
            $fileSampul->move('sbadmin/img/prestasi', $namaSampul);
            $this->prestasiModel->save([
                'id' => $id,
                'path_prestasi' => $namaSampul,
            ]);
        }

        $user = $this->userModel->getUser(session()->get('email'));

        $this->prestasiModel->save([
            'id' => $id,
            'userId' => $user['id'],
            'judul_prestasi' => $this->request->getVar('judulPrestasi'), //masukin inputan dari name title kedalam kolom title
            'isi_prestasi' => $this->request->getVar('isiPrestasi'),
            'kategori' => $this->request->getVar('kategoriPrestasi'),
            'slug' => url_title($this->request->getVar('judulPrestasi'), '-', TRUE),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        session()->setFlashdata('pesan', 'prestasi telah diubah.');
        return redirect()->to('/admin/akademik/prestasi'); //ke method index
    }

    public function delete()
    {
        $id = $this->request->getVar('id');
        // dd($id);
        for ($i = 0; $i < count($id); $i++) {
            if ($this->deleteFile($id[$i]))
                $this->prestasiModel->delete($id[$i]);
        }

        session()->setFlashdata('pesanHapus', 'Prestasi telah dihapus.');
        return redirect()->to('/admin/akademik/prestasi');
    }

    private function deleteFile($id)
    {
        $prestasi = $this->prestasiModel->getPrestasi($id);
        $path = './sbadmin/img/prestasi' . $prestasi['path_prestasi'];
        if (!($prestasi['path_prestasi'] == 'default.png' || $prestasi['path_prestasi'] == Null)) {
            if (is_readable($path) && unlink($path)) {
            }
        }
        return true;
    }
    //--------------------------------------------------------------------

    public function user()
    {
        $prestasi = new PrestasiModel();
        $berita = new BeritaModel();
        $user = new UserModel();
        $beritaModel = new BeritaModel();
        $galeriModel = new GaleriModel();
        $pengumumanModel = new PengumumanModel();
        $data = [
            'countberita' => count($beritaModel->getBerita()),
            'countgaleri' => count($galeriModel->getGaleri()),
            'countpengumuman' => count($pengumumanModel->getPengumuman()),
            'pageTitle' => 'Prestasi',
            'user' => $user,
            'prestasi' => $this->prestasiModel->orderBy('created_at', 'desc')->paginate(6, 'prestasi'),
            'pager' => $this->prestasiModel->pager,
            'recent' => $berita->last_record(),
            'sliderBerita' => $berita->last_record_berita(),
        ];
        return view('user/akademik/prestasi', $data);
    }

    public function prestasiDetail($slug)
    {
        $prestasi = new PrestasiModel();
        $berita = new BeritaModel();
        $user = new UserModel();
        $beritaModel = new BeritaModel();
        $galeriModel = new GaleriModel();
        $pengumumanModel = new PengumumanModel();
        $data = [
            'countberita' => count($beritaModel->getBerita()),
            'countgaleri' => count($galeriModel->getGaleri()),
            'countpengumuman' => count($pengumumanModel->getPengumuman()),
            'pageTitle' => 'Detail Prestasi',
            'p' => $this->prestasiModel->getPrestasibySlug($slug),
            'prestasi' => $prestasi->getPrestasi(),
            'user' => $user,
            'berita' => $berita->getBerita(),
            'recent' => $berita->last_record(),
            'time' => new Time('now'),
            'sliderBerita' => $berita->last_record_berita(),
        ];

        return view('user/akademik/detailPrestasi', $data);
    }
}
