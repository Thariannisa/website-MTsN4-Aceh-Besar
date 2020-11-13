<?php

namespace App\Controllers;

use App\Models\GuruModel;
use App\Models\BeritaModel;
use App\Models\GaleriModel;
use App\Models\PrestasiModel;
use App\Models\FasilitasModel;
use App\Models\OrganisasiModel;
use App\Models\PengumumanModel;
use App\Models\VisimisiModel;
use App\Models\StrukturModel;
use App\Models\TataTertibModel;
use App\Models\UserModel;
use CodeIgniter\I18n\Time;
use Config\Services;

class Beranda extends BaseController
{
    protected $userModel, $beritaModel, $data;
    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->beritaModel = new BeritaModel();
        $this->pengumumanModel = new PengumumanModel();
        $this->galeriModel = new galeriModel();
        $this->data = [
            'countberita' => count($this->beritaModel->getBerita()),
            'countgaleri' => count($this->galeriModel->getGaleri()),
            'countpengumuman' => count($this->pengumumanModel->getPengumuman()),
        ];
    }

    public function index()
    {
        $berita = new BeritaModel();
        $galeri = new GaleriModel();
        $pengumuman = new PengumumanModel();
        $fasilitas = new FasilitasModel();
        $pengajar = new GuruModel();
        // $murid = new MuridModel();
        $organisasi = new OrganisasiModel();
        $prestasi = new PrestasiModel();
        $this->data += [
            'pageTitle' => 'Madrasah Tsanawiyah 4 Aceh Besar',
            'berita' => $berita->getBerita(),
            'galeri' => $galeri->last_record_galeri(),
            'pengumuman' => $pengumuman->last_record_pengumuman(),
            'jmlfasilitas' => count($fasilitas->getFasilitas()),
            'jmlpengajar' => count($pengajar->getPengajar()),
            'jmlprestasi' => count($prestasi->getPrestasi()),
            'jmlorganisasi' => count($organisasi->getOrganisasi()),
            'time' => new Time('now'),
            'sliderBerita' => $berita->last_record_berita(),
        ];
        return view('user/home/beranda', $this->data);
    }

    public function visiMisi()
    {
        $visiMisi = new VisimisiModel();
        $this->data += [
            'pageTitle' => 'Visi & Misi',
            'v' => $visiMisi->getVisimisi(),
        ];
        return view('user/profil/visiMisi', $this->data);
    }

    public function strukturSekolah()
    {
        $struktur = new StrukturModel();
        $this->data += [
            'pageTitle' => 'Struktur Sekolah',
            'struktur' => $struktur->getStruktur(),
        ];
        return view('user/profil/struktur', $this->data);
    }

    public function tataTertib()
    {
        $tata = new TataTertibModel();
        $this->data += [
            'pageTitle' => 'Tata Tertib',
            'tata' => $tata->getTataTertib(),
        ];
        return view('user/profil/tatatertib', $this->data);
    }

    public function berita()
    {
        $berita = new BeritaModel();
        $user = new UserModel();
        $this->data += [
            'pageTitle' => 'Indeks Berita',
            'user' => $user,
            'berita' => $this->beritaModel->paginate(6, 'berita'),
            'pager' => $this->beritaModel->pager,
            'recent' => $berita->last_record(),
            'sliderBerita' => $berita->last_record_berita(),
        ];
        return view('user/home/berita', $this->data);
    }

    public function beritaDetail($slug)
    {
        $beri = $this->beritaModel->getBeritabySlug($slug);
        $berita = new BeritaModel();
        $user = new UserModel();
        $this->data += [
            'pageTitle' => $beri['judul_berita'],
            'b' => $beri,
            'berita' => $berita->getBerita(),
            'user' => $user,
            'recent' => $berita->last_record(),
            'time' => new Time('now'),
            'sliderBerita' => $berita->last_record_berita(),
        ];

        return view('user/home/detailBerita', $this->data);
    }

    public function pengumuman()
    {
        $berita = new BeritaModel();
        $pengumuman = new PengumumanModel();
        $pengumuman = $this->pengumumanModel->paginate(6, 'pengumuman');
        $user = new UserModel();
        $this->data += [
            'pageTitle' => 'Indeks Pengumuman',
            'user' => $user,
            'berita' => $berita->getBerita(),
            'pengumuman' => $pengumuman,
            'pager' => $this->pengumumanModel->pager,
            'recent' => $berita->last_record(),
            'sliderBerita' => $berita->last_record_berita(),
        ];
        return view('user/home/pengumuman', $this->data);
    }

    public function pengumumanDetail($slug)
    {
        $berita = new BeritaModel();
        $user = new UserModel();
        $this->data += [
            'pageTitle' => 'Detail Pengumuman',
            'b' => $this->pengumumanModel->getPengumumanbySlug($slug),
            'berita' => $berita->getBerita(),
            'user' => $user,
            'recent' => $berita->last_record(),
            'time' => new Time('now'),
            'sliderBerita' => $berita->last_record_berita(),
        ];

        return view('user/home/detailPengumuman', $this->data);
    }

    public function galeri()
    {
        $berita = new BeritaModel();
        $user = new UserModel();
        $galeri = new GaleriModel();
        $this->data += [
            'pageTitle' => 'Indeks Galeri',
            'user' => $user,
            'berita' => $berita->getBerita(),
            'galeri' => $this->galeriModel->orderBy('created_at', 'DESC')->paginate(12, 'galeri'),
            'pager' => $this->galeriModel->pager,
            'recent' => $berita->last_record(),
            'sliderBerita' => $berita->last_record_berita(),
        ];
        return view('user/home/galeri', $this->data);
    }

    public function indexAdmin()
    {
        return view('Admin/home/dashboard');
    }

    public function search()
    {
        if (!$this->validate([
            'search' => 'required',
        ])) {
            return redirect()->to('/beranda');
        }

        $pengumuman = $this->pengumumanModel
            ->like('judul_pengumuman',  $this->request->getVar('search'), 'both')
            ->orlike('isi_pengumuman', $this->request->getVar('search') . '', 'both')
            ->findAll(6);
        if (count($pengumuman) != 0) {
            $berita = new BeritaModel();
            $user = new UserModel();
            $this->data += [
                'pageTitle' => 'Indeks Pengumuman',
                'user' => $user,
                'berita' => $berita->getBerita(),
                'pengumuman' => $pengumuman,
                'pager' => $this->pengumumanModel->pager,
                'recent' => $berita->last_record(),
                'sliderBerita' => $berita->last_record_berita(),
            ];
            return view('user/home/pengumuman', $this->data);
        } else {
            return redirect()->to('/beranda');
        }
    }
    //--------------------------------------------------------------------

}
