<?php

namespace App\Controllers;


use Config\Services;
use App\Models\UserModel;
use CodeIgniter\I18n\Time;
use App\Models\BeritaModel;
use App\Models\GaleriModel;
use App\Models\KategoriModel;
use App\Models\OrganisasiModel;
use App\Models\PengumumanModel;

class Organisasi extends BaseController
{
    protected $userModel, $organisasiModel, $beritaModel;
    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->kategoriModel = new KategoriModel();
        $this->organisasiModel = new OrganisasiModel();
    }

    public function index()
    {
        $organisasi = new OrganisasiModel();
        $user = new UserModel();
        $data = [
            'pageTitle' => 'Organisasi',
            'organisasi' => $organisasi->getOrganisasi(),
            'user' => $user,
        ];
        return view('admin/akademik/organisasi', $data);
    }
    public function detail($id)
    {
        $user = new UserModel();
        $data = [
            'pageTitle' => 'Detail Organisasi',
            'o' => $this->organisasiModel->getOrganisasi($id),
            'user' => $user,
        ];

        return view('admin/akademik/detailOrganisasi', $data);
    }

    public function create()
    {
        $data = [
            'pageTitle' => 'Tambah Organisasi',
            'validation' => Services::validation(),
        ];

        return view('admin/akademik/create_organisasi', $data);
    }

    public function store()
    {
        //validasi data
        if (!$this->validate([ //yg dalam validasi ni name nya bukan nama kolom di table
            'judulOrganisasi' => 'required', //harus diisi 
            'isiOrganisasi' => 'required',
        ])) {
            return redirect()->to('/admin/akademik/organisasi/create')->withInput(); //kembaliin ke method create dgn kasih tau inputan
        }

        $user = $this->userModel->getUser(session()->get('email'));

        $this->organisasiModel->save([
            'userId' => $user['id'],
            'judul_organisasi' => $this->request->getVar('judulOrganisasi'), //masukin inputan dari name title kedalam kolom title
            'isi_organisasi' => $this->request->getVar('isiOrganisasi'),
            'slug' => url_title($this->request->getVar('judulOrganisasi'), '-', TRUE),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        $this->kategoriModel->save([
            'nama' => $this->request->getVar('judulOrganisasi'),
            'slug' => url_title($this->request->getVar('judulOrganisasi'), '-', TRUE),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        session()->setFlashdata('pesan', 'Organisasi telah ditambahkan.');
        return redirect()->to('/admin/akademik/organisasi'); //ke method index
    }


    public function edit($id)
    {

        $data = [
            'pageTitle' => 'Edit Organisasi',
            'o' => $this->organisasiModel->getOrganisasi($id),
            'validation' => Services::validation(),
        ];


        return view('admin/akademik/edit_organisasi', $data);
    }

    public function update($id)
    {
        //validasi data
        if (!$this->validate([ //yg dalam validasi ni name nya bukan nama kolom di table
            'judulOrganisasi' => 'required', //harus diisi 
            'isiOrganisasi' => 'required',
        ])) {
            return redirect()->to('/admin/akademik/organisasi/edit/' . $id)->withInput(); //kembaliin ke method create dgn kasih tau inputan
        }
        $org = $this->organisasiModel->getOrganisasi($id);
        $kategori = $this->kategoriModel->getKategoribySlug($org['slug']);
        $user = $this->userModel->getUser(session()->get('email'));

        $this->organisasiModel->save([
            'id' => $id,
            'userId' => $user['id'],
            'judul_organisasi' => $this->request->getVar('judulOrganisasi'), //masukin inputan dari name title kedalam kolom title
            'isi_organisasi' => $this->request->getVar('isiOrganisasi'),
            'slug' => url_title($this->request->getVar('judulOrganisasi'), '-', TRUE),
            'updated_at' => now(),
        ]);
        $this->kategoriModel->save([
            'id' => $kategori['id'],
            'nama' => $this->request->getVar('judulOrganisasi'),
            'slug' => url_title($this->request->getVar('judulOrganisasi'), '-', TRUE),
            'updated_at' => now(),
        ]);
        session()->setFlashdata('pesan', 'organisasi telah diubah.');
        return redirect()->to('/admin/akademik/organisasi'); //ke method index
    }

    public function delete()
    {
        $id = $this->request->getVar('id');
        // dd($id);
        for ($i = 0; $i < count($id); $i++) {
            if ($this->deleteFile($id[$i]))
                $this->organisasiModel->delete($id[$i]);
        }

        session()->setFlashdata('pesanHapus', 'organisasi telah dihapus.');
        return redirect()->to('/admin/akademik/organisasi');
    }

    private function deleteFile($id)
    {
        $organisasi = $this->organisasiModel->getOrganisasi($id);
        return true;
    }
    //--------------------------------------------------------------------
    public function user()

    {
        $organisasi = new OrganisasiModel();
        $user = new UserModel();
        $berita = new BeritaModel();
        $beritaModel = new BeritaModel();
        $galeriModel = new GaleriModel();
        $pengumumanModel = new PengumumanModel();
        $data = [
            'countberita' => count($beritaModel->getBerita()),
            'countgaleri' => count($galeriModel->getGaleri()),
            'countpengumuman' => count($pengumumanModel->getPengumuman()),
            'pageTitle' => 'ORGANISASI',
            'user' => $user,
            'organisasi' => $this->organisasiModel->orderBy('created_at', 'desc')->paginate(6, 'organisasi'),
            'pager' => $this->organisasiModel->pager,
            'berita' => $berita->getBerita(),
            'recent' => $berita->last_record(),
            'sliderBerita' => $berita->last_record_berita(),
        ];
        return view('user/akademik/organisasi', $data);
    }

    public function organisasiDetail($slug)
    {
        $organisasi = new OrganisasiModel();
        $berita = new BeritaModel();
        $galeri = new GaleriModel();
        $user = new UserModel();
        $beritaModel = new BeritaModel();
        $galeriModel = new GaleriModel();
        $pengumumanModel = new PengumumanModel();
        $data = [
            'countberita' => count($beritaModel->getBerita()),
            'countgaleri' => count($galeriModel->getGaleri()),
            'countpengumuman' => count($pengumumanModel->getPengumuman()),

            'pageTitle' => 'Detail Organisasi',
            'o' => $this->organisasiModel->getOrganisasibySlug($slug),
            'organisasi' => $organisasi->getOrganisasi(),
            'user' => $user,
            'galeri' => $galeri->getGaleribyKategori($slug),
            'recent' => $berita->last_record(),
            'time' => new Time('now'),
            'sliderBerita' => $berita->last_record_berita(),
        ];

        return view('user/akademik/detailOrganisasi', $data);
    }
}
