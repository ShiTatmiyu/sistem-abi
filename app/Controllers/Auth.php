<?php

namespace App\Controllers;
use App\Models\AdminModel;
use App\Models\GuruModel;
use App\Models\MuridModel;
use App\Models\WalimuridModel;

class Auth extends BaseController
{
    public function __construct()
    {
        $this->validation = \Config\Services::validation(); 
        $this->session = \Config\Services::session();   
    }
    
    public function index()
    {
        return view('login');
    }

    public function attempt()
    {
        $adminModel = new AdminModel();
        $guruModel = new GuruModel();
        $muridModel = new MuridModel();
        $walimuridModel = new WalimuridModel();

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $admin = $adminModel->where('username_admin', $username)->first();
        $guru = $guruModel->where('username_guru', $username)->first();
        $murid = $muridModel->where('username_murid', $username)->first();
        $walimurid = $walimuridModel->where('username_walimurid', $username)->first();

        if ($admin && password_verify($password, $admin['password_admin'])) {
            session()->set([
                'is_logged' => true,
                'user_type' => 'admin', 
                'user_id' => $admin['id_admin'],
                'user_name' => $admin['nama_admin'],
                'user_username' => $admin['username_admin'],
                'user_photo' => $admin['foto_profile'],
            ]);
            return redirect()->to('/admin/dashboard');
        } elseif ($guru && password_verify($password, $guru['password_guru'])) {
            session()->set([
                'is_logged' => true,
                'user_type' => 'guru',
                'user_id' => $guru['id_guru'],
                'user_name' => $guru['nama_guru'],
                'user_username' => $guru['username_guru'],
                'user_photo' => $guru['foto_profile'],
            ]);
            return redirect()->to('/guru/dashboard');
        } elseif ($murid && password_verify($password, $murid['password_murid'])) {
            session()->set([
                'is_logged' => true,
                'user_type' => 'murid',
                'user_id' => $murid['nisn'],
                'user_name' => $murid['nama_murid'],
                'user_username' => $murid['username_murid'],
                'user_photo' => $murid['foto_profile'],
            ]);
            return redirect()->to('/murid/dashboard');
        } elseif ($walimurid && password_verify($password, $walimurid['password_walimurid'])) {
            session()->set([
                'is_logged' => true,
                'user_type' => 'walimurid',
                'user_id' => $walimurid['id_walimurid'],
                'students_id' => $walimurid['nisn_murid'],
                'user_name' => $walimurid['nama_walimurid'],
                'user_username' => $walimurid['username_walimurid'],
                'user_photo' => $walimurid['foto_profile'],
            ]);
            return redirect()->to('/walimurid/dashboard');
        } else {
            return redirect()->back()->withInput()->with('error', 'Invalid login credentials.');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}