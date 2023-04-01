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
        $this->adminModel = new AdminModel();
        $this->guruModel = new GuruModel();
        $this->muridModel = new MuridModel();
        $this->walimuridModel = new WalimuridModel();

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

    public function profile_admin($id)
    {
        $adminModel = new AdminModel();

        $data = [
            'title' => "Profil Admin",
            'admin' => $adminModel->getAdmin($id)
        ];

        return view("/admin/profile", $data);
    }

    public function edit_profile_admin($id)
    {
        $data = [
            'title' => 'Edit Admin',
            'validation' => \Config\Services::validation(),
            'admin' => $this->adminModel->getAdmin($id)
        ];

        return view('/admin/edit', $data);
    }

    public function update_profile_admin($id)
    {
        $validation = \Config\Services::validation();

        $adminOld = $this->adminModel->getAdmin($id);
        if($adminOld['username_admin'] == $this->request->getVar('username_admin')) {
            $rule_username = 'required';
        } else {    
            $rule_username = 'required|is_unique[admin.username_admin]';
        };

        if($adminOld['email_admin'] == $this->request->getVar('email_admin')) {
            $rule_email = 'required';
        } else {    
            $rule_email = 'required|valid_email|is_unique[admin.email_admin]';
        };

        $validation->setRules([
            'username_admin' => [
                'label' => 'Username',
                'rules' => $rule_username,
                'errors' => [
                    'required' => 'Username perlu diisi',
                    'is_unique' => 'Username sudah ada'
                ]
            ],
            'password_admin' => [
                'label' => 'Password',
                'rules' => 'required|min_length[8]',
                'errors' => [
                    'required' => 'Password perlu diisi',
                    'min_length' => 'Password harus terdiri dari 8 kata',
                ]
            ],
            'email_admin' => [
                'label' => 'Email',
                'rules' => $rule_email,
                'errors' => [
                    'required' => 'Email perlu diisi',
                    'valid_email' => 'Data yang diisi bukan email',
                    'is_unique' => 'Email sudah ada'                
                ]
            ],
            'nama_admin' => [
                'label' => 'Nama',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama perlu diisi'              
                ]
            ],
            'jenis_kelamin' => [
                'label' => 'Jenis Kelamin',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jenis Kelamin perlu diisi'
                ]
            ],
            'foto_profile' => [
                'label' => 'Foto Profil',
                'rules' => 'is_image[foto_profil]',
                'errors' => [
                    'is_image' => 'Data yang diisi buka foto',
                    // 'mime_in' => 'Tipe data tidak diizinkan'              
                ]
            ],
        ]);

        if ($validation->withRequest($this->request)->run())
        {
            $fileFoto =$this->request->getFile('foto_profil');
            $getphoto = $this->adminModel->Pilihadmin($id)->getRow();
            $nama = $getphoto->foto_profile;

        if($fileFoto->getError() == 4) {
            $namaFoto = $getphoto->foto_profile;
            
        } 
        else if($nama == "user.png") {

            $namaFoto = $fileFoto->getRandomName();
    
            $fileFoto->move(ROOTPATH . 'public/img/', $namaFoto);
        }
        else {
            $getphoto = $this->adminModel->Pilihadmin($id)->getRow();
            $photo = $getphoto->foto_profile;
            @unlink(ROOTPATH . 'public/img/'. $photo);

            $namaFoto = $fileFoto->getRandomName();
    
            $fileFoto->move(ROOTPATH . 'public/img/', $namaFoto);
        }
        $password = password_hash($this->request->getVar('password_admin'), PASSWORD_DEFAULT);

        $this->adminModel->save([
            'id_admin' => $id,
            'username_admin' => $this->request->getVar('username_admin'),
            'password_admin' => $password,
            'email_admin' => $this->request->getVar('email_admin'),
            'nama_admin' => $this->request->getVar('nama_admin'),
            'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
            'foto_profile' => $namaFoto,
        ]);

        $admin = $this->adminModel->find($id);

        session()->set([
            'is_logged' => true,
            'user_type' => 'admin', 
            'user_id' => $admin['id_admin'],
            'user_name' => $admin['nama_admin'],
            'user_username' => $admin['username_admin'],
            'user_photo' => $admin['foto_profile'],
        ]);

        session()->setFlashdata('add', 'Data admin berhasil dibuat');
        return redirect()->to('/admin/dashboard');

            }
        else
        {
            // validation failed, show errors to the user
            $data = [
                'title' => 'Create admin',
                'errors' => $validation->getErrors(),
                'admin' => $this->adminModel->getAdmin($id)
                ];
            return view('/admin/edit', $data);
        }
    }
}