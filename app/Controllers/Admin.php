<?php

namespace App\Controllers;

use Config\Services;
use App\Models\VisimisiModel;
use App\Models\UserModel;
use App\Models\StrukturModel;
use App\Models\TataTertibModel;

class Admin extends BaseController
{
    protected $userModel, $visiMisiModel, $strukturModel, $tataTertibModel;
    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->visiMisiModel = new VisimisiModel();
        $this->strukturModel = new StrukturModel();
        $this->tataTertibModel = new TataTertibModel();
    }


    public function index()
    {
        $this->data['pageTitle'] = "Admin";
        return view('admin/index', $this->data);
    }

    public function profilSekolah()
    {
        $this->data['pageTitle'] = "Profil Sekolah";
        return view('admin/profil/profilSekolah', $this->data);
    }
    //-----------------------------------------------------------------------------------------------------------------
    // public function visiMisi()
    // {
    //     $data = [
    //         'pageTitle' => 'Visi dan Misi',
    //         'visimisi' => $this->visiMisiModel->getVisimisi(),
    //     ];
    //     return view('admin/profil/visiMisi', $data);
    // }

    public function visiMisiEdit($id)
    {

        $data = [
            'pageTitle' => 'Visi dan Misi',
            'b' => $this->visiMisiModel->getVisimisi($id),
            'validation' => Services::validation(),
        ];

        return view('admin/profil/visiMisi', $data);
    }

    public function visiMisiUpdate($id)
    {
        //validasi data
        if (!$this->validate([ //yg dalam validasi ni name nya bukan nama kolom di table
            'visi' => 'required', //harus diisi 
            'misi' => 'required',
        ])) {
            return redirect()->to('/admin/profil/visimisi/' . $id)->withInput(); //kembaliin ke method create dgn kasih tau inputan
        }

        $this->visiMisiModel->save([
            'id' => $id,
            'visi' => $this->request->getVar('visi'), //masukin inputan dari name title kedalam kolom title
            'misi' => $this->request->getVar('misi'),
        ]);

        session()->setFlashdata('pesan', 'Berita telah diubah.');
        return redirect()->to('/admin/profil/visimisi/1'); //ke method index
    }
    //-----------------------------------------------------------------------------------------------------------------

    public function strukturSekolah()
    {
        $this->data['pageTitle'] = "Struktur Sekolah";
        return view('admin/profil/struktur', $this->data);
    }

    public function strukturEdit($id)
    {
        $data = [
            'pageTitle' => 'Struktur Sekolah',
            'b' => $this->strukturModel->getStruktur($id),
            'validation' => Services::validation(),
        ];

        return view('admin/profil/struktur', $data);
    }

    public function strukturUpdate($id)
    {
        //validasi data
        if (!$this->validate([ //yg dalam validasi ni name nya bukan nama kolom di table
            'gambarStruktur' => 'max_size[gambarStruktur,8192]|is_image[gambarStruktur]|mime_in[gambarStruktur,image/jpg,image/jpeg,image/png]',
        ])) {
            return redirect()->to('/admin/profil/struktur/' . $id)->withInput(); //kembaliin ke method create dgn kasih tau inputan
        }

        $fileSampul = $this->request->getFile('gambarStruktur');
        if ($fileSampul->getError() != 4) {
            $namaSampul = $fileSampul->getRandomName();
            $fileSampul->move('gambar/struktur', $namaSampul);
            $this->strukturModel->save([
                'id' => $id,
                'path_struktur' => $namaSampul,
            ]);
        }

        session()->setFlashdata('pesan', 'Data Struktur Sekolah telah diubah.');
        return redirect()->to('/admin/profil/struktur/1'); //ke method index
    }


    //-----------------------------------------------------------------------------------------------------------------

    public function tataTertibEdit($id)
    {
        $data = [
            'pageTitle' => 'Tata Tertib',
            'b' => $this->tataTertibModel->getTataTertib($id),
            'validation' => Services::validation(),
        ];

        return view('admin/profil/tataTertib', $data);
    }


    public function tataTertibUpdate($id)
    {
        //validasi data
        if (!$this->validate([ //yg dalam validasi ni name nya bukan nama kolom di table
            'tatatertib' => 'required',
        ])) {
            return redirect()->to('/admin/profil/tatatertib/' . $id)->withInput(); //kembaliin ke method create dgn kasih tau inputan
        }

        $this->tataTertibModel->save([
            'id' => $id,
            'tatatertib' => $this->request->getVar('tatatertib'),
        ]);

        session()->setFlashdata('pesan', 'Data Tata Tertib telah diubah.');
        return redirect()->to('/admin/profil/tatatertib/1'); //ke method index
    }

    public function kontak()
    {
        $this->data['pageTitle'] = "Kontak";
        return view('admin/kontak/kontak', $this->data);
    }


    //--------------------------------------------------------------------

}
