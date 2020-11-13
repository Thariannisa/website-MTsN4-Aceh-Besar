<?php

namespace App\Controllers;

use App\Models\UserModel;
use Config\Services;

class Auth extends BaseController
{
    public function login() //pake method get
    {
        $data = [
            'title' => 'Masuk Admin',
            'validation' => Services::validation(),
        ];

        return view('/admin/auth/login', $data);
    }

    public function logout() //pake method get
    {
        $this->session->remove('email');
        return redirect()->to('/auth');
    }

    public function auth() //untuk tangkap backend dari login //pake method post
    {
        //validasi data
        if (!$this->validate([
            'password' => 'required',
            'email' => 'required|valid_email',
        ])) {
            return redirect()->to('/auth')->withInput(); //kembaliin ke method create dgn kasih tau inputan
        }

        $user = new UserModel(); //buat objek untuk panggil model user

        $akun = $user->getUser($this->request->getVar('email'));

        if ($akun) { //cek ada akun apa gak
            if (password_verify($this->request->getVar('password'), $akun['password'])) { //cek password betul apa gak
                $this->session->set('email', $this->request->getVar('email'));
                return redirect()->to('/admin'); //berhasil,bawa ke halaman /
            }
            session()->setFlashdata('pesan', 'pass salah');
            return redirect()->to('/auth'); //kalo salah password kembali ke halaman login
        }
        session()->setFlashdata('pesan', 'email salah');
        return redirect()->to('/auth'); //kalo ssalah/gda akun kembali ke halaman login

    }
}
