<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AdminModel;
use App\Models\GuruModel;
use App\Models\MuridModel;
use App\Models\WalimuridModel;
use App\Models\IbadahModel;

class Admin extends BaseController
{
    protected $session;
    protected $adminModel;

    public function __construct()
    {
        $this->adminModel = new AdminModel();
        $this->guruModel = new GuruModel();
        $this->muridModel = new MuridModel();
        $this->walimuridModel = new WalimuridModel();
        $this->ibadahModel = new IbadahModel();
        
        $validation = \Config\Services::validation();
        $this->session = \Config\Services::session();
    }
    
    public function index()
    {   

        $data = [
            'title' => 'Admin Dashboard',
            'count_admin' => $this->adminModel->countAllResults(),
            'count_guru' => $this->guruModel->countAllResults(),
            'count_murid' => $this->muridModel->countAllResults(),
            'count_walimurid' => $this->walimuridModel->countAllResults(),
            'count_ibadah' => $this->ibadahModel->countAllResults(),
        ];

        return view('admin/index', $data);   
    }

    public function create_admin()
    {
        $data = [
            'title' => 'Create Admin',
            'validation' => \Config\Services::validation(), 
        ];

        return view('/admin/admin/create', $data);
    }

    public function save_admin()
    {
        $validation = \Config\Services::validation();
        

        $validation->setRules([
            'username_admin' => [
                'label' => 'Username',
                'rules' => 'required|is_unique[admin.username_admin]',
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
                'rules' => 'required|valid_email|is_unique[admin.email_admin]',
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
                'rules' => 'is_image[foto_profil]|mime_in[image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'is_image' => 'Data yang diisi buka foto',
                    'mime_in' => 'Tipe data tidak diizinkan'              
                ]
            ],
        ]);
        if ($validation->withRequest($this->request)->run())
        {
            $fileFoto =$this->request->getFile('foto_profil');

            if($fileFoto->getError() == 4) {
                $namaFoto = 'user.png';
            } else {
                $namaFoto = $fileFoto->getRandomName();
    
                $fileFoto->move(ROOTPATH . 'public/img/', $namaFoto);
            }
    
            $password = password_hash($this->request->getVar('password_admin'), PASSWORD_DEFAULT);

            $this->adminModel->save([
                'username_admin' => $this->request->getVar('username_admin'),
                'password_admin' => $password,
                'email_admin' => $this->request->getVar('email_admin'),
                'nama_admin' => $this->request->getVar('nama_admin'),
                'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
                'foto_profile' => $namaFoto,
            ]);
    
            session()->setFlashdata('add', 'Data Admin berhasil dibuat');
            return redirect()->to('/admin2');
    
            }
        else
        {
            // validation failed, show errors to the user
            $data = [
                'errors' => $validation->getErrors(),
                'title' => 'Create Admin'
                ];
            return view('/admin/admin/create', $data);
        }
            

            // $username = $this->request->getPost('username_admin');
            // $user = $adminModel->where('username_admin', $username);
            // if (!empty($user)) {
            //     session()->setFlashdata('unique_admin', 'Username sudah digunakan');
            //     return redirect()->to('/admin/create')->withinput();
            // }

            
        // $info = \Config\Services::image('imagick')
        // ->withFile($fileFoto)
        // ->getFile()
        // ->getProperties(true);
        

        // $xOffset = ($info['width'] / 2) - 50;
        // $yOffset = ($info['height'] / 2) - 50;
            
        // \Config\Services::image('imagick')
        // ->withFile($fileFoto)
        // ->resize(200, 100, true, 'height')
        // ->crop(100, 100, $xOffset, $yOffset);
        



    }

    public function edit_adm($id)
    {
        $data = [
            'title' => 'Edit Admin',
            'validation' => \Config\Services::validation(),
            'admin' => $this->adminModel->getAdmin($id)
        ];

        return view('/admin/admin/edit', $data);
    }

    public function update_adm($id)
    {
        $adminOld = $this->adminModel->getAdmin($id);
        if($adminOld['username_admin'] == $this->request->getVar('username')) {
            $rule_username = 'required';
        } else {    
            $rule_username = 'required|is_unique[
                admin.username_admin,
                guru.username_guru,
                murid.username_murid,
                walimurid.username_walimurid
                ]';
        };

        if($adminOld['email_admin'] == $this->request->getVar('email')) {
            $rule_email = 'required';
        } else {    
            $rule_email = 'required|valid_email|is_unique[
                admin.email_admin,
                guru.email_guru,
                murid.email_murid,
                walimurid.email_walimurid,            
                ]';
        };

        if($adminOld['nama_admin'] == $this->request->getVar('nama')) {
            $rule_nama = 'required';
        } else {    
            $rule_nama = 'required|is_unique[
                admin.nama_admin,
                guru.nama_guru,
                murid.nama_murid,
                walimurid.nama_walimurid,            
                ]';
        };

        
        if (!$validation([
            'username' => [
                'rules' => $rule_username,
                'errors' => [
                    'required' => '{field} Itu harus diisi',
                    'is_unique' => 'Udh ada yang {field}nya sama'
                ]
            ],
            'password' => [
                'rules' => 'required|min_length[8]|alpha_numeric_punct',
                'errors' => [
                    'required' => 'Password perlu diisi',
                    'min_length' => 'Password harus terdiri dari 8 kata',
                    'alpha_numeric_punct' => 'Password hanya boleh mengandung angka, huruf, dan karakter yang valid'
                ]
            ],
            'email' => [
                'rules' => $rule_email,
                'errors' => [
                    'required' => 'Email perlu diisi',
                    'valid_email' => 'Data yang diisi bukan email',
                    'is_unique' => 'Email sudah ada'                
                ]
            ],
            'nama' => [
                'rules' => $rule_nama,
                'errors' => [
                    'required' => 'Nama perlu diisi',
                    'is_unique' => 'Udh ada yang {field}nya sama'              
                ]
            ],
            'jenis_kelamin' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jenis Kelamin perlu diisi'
                ]
            ],
            'foto_profil' => [
                'rules' => 'is_image[foto_profil]|mime_in[image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'is_image' => 'Data yang diisi buka foto',
                    'mime_in' => 'Tipe data tidak diizinkan'              
                ]
            ],
        ]))
        {
            $validation = \Config\Services::validation();
            return redirect()->back()->withinput()->with('validation', $validation);
        }

        $fileFoto =$this->request->getFile('foto_profil');
        $getphoto = $this->adminModel->PilihAdmin($id)->getRow();
        $nama = $getphoto->foto_profile;

        if($fileFoto->getError() == 4) {
            $namaFoto = $getphoto->foto_profile;
            
        } 
        else if($nama == "user.png") {

            $namaFoto = $fileFoto->getRandomName();
    
            $fileFoto->move(ROOTPATH . 'public/img/', $namaFoto);
        }
        else {
            $getphoto = $this->adminModel->PilihAdmin($id)->getRow();
            $photo = $getphoto->foto_profile;
            @unlink(ROOTPATH . 'public/img/'. $photo);

            $namaFoto = $fileFoto->getRandomName();
    
            $fileFoto->move(ROOTPATH . 'public/img/', $namaFoto);
        }
        $password = password_hash($this->request->getVar('password'), PASSWORD_DEFAULT);

        $this->adminModel->save([
            'id_admin' => $id,
            'username_admin' => $this->request->getVar('username'),
            'password_admin' => $password,
            'email_admin' => $this->request->getVar('email'),
            'nama_admin' => $this->request->getVar('nama'),
            'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
            'foto_profile' => $namaFoto,
        ]);

        session()->setFlashdata('add', 'Data Admin berhasil dibuat');
        return redirect()->to('/admin2');
    }

    public function delete_adm($id)
    {
        $getphoto = $this->adminModel->PilihAdmin($id)->getRow();
        $photo = $getphoto->foto_profile;

        if ($photo == "user.png") {
            $this->adminModel->HapusAdmin($id);
        } else {
            @unlink(ROOTPATH . 'public/img/'. $photo);
            $this->adminModel->HapusAdmin($id);
        }

        return redirect()->to('/admin2');
    }

    public function create_guru()
    {
        $data = [
            'title' => 'Create Guru'
        ];

        return view('/admin/guru/create', $data);
    }

    public function save_guru()
    {
        $data = $this->request->getPost();
        $this->validation->run($data, 'crguru');
        $errors = $this->validation->getErrors();

        if($errors){
            session()->setFlashdata('error', $errors);
            return redirect()->to('/admin/guru/create');
        }

        $password = password_hash($data['password'], PASSWORD_DEFAULT);

        $this->guruModel->save([
            'username_guru' => $data['username'],
            'password_guru' => $password,
            'email_guru' => $data['email'],
            'nama_guru' => $data['nama_guru'],
            'jenis_kelamin' => $data['jenis_kelamin'],
            'foto_profile' => $data['fotoprofil'],
        ]);

        session()->setFlashdata('add', 'Data guru berhasil dibuat');
        return redirect()->to('/admin/guru/index');
    }
    public function create_murid()
    {
        $data = [
            'title' => 'Create Murid'
        ];

        return view('/admin/murid/create', $data);
    }

    public function save_murid()
    {
        $data = $this->request->getPost();
        $this->validation->run($data, 'crmurid');
        $errors = $this->validation->getErrors();

        if($errors){
            session()->setFlashdata('error', $errors);
            return redirect()->to('/admin/murid/create');
        }

        $password = password_hash($data['password'], PASSWORD_DEFAULT);

        $this->muridModel->save([
            'nisn' => $data['nisnmurid'],
            'username_murid' => $data['username'],
            'password_murid' => $password,
            'email_murid' => $data['email'],
            'nama_murid' => $data['nama_murid'],
            'jenis_kelamin' => $data['jenis_kelamin'],
            'foto_profile' => $data['fotoprofil'],
        ]);
        session()->setFlashdata('add', 'Data murid berhasil dibuat');
        return redirect()->to('/admin/murid/index');
    }
    public function create_walimurid()
    {
        $data = [
            'title' => 'Create Walimurid'
        ];

        return view('/admin/walimurid/create', $data);
    }

    public function save_walimurid()
    {
        $data = $this->request->getPost();
        $this->validation->run($data, 'crwalimurid');
        $errors = $this->validation->getErrors();

        if($errors){
            session()->setFlashdata('error', $errors);
            return redirect()->to('/admin/walimurid/create');
        }

        $password = password_hash($data['password'], PASSWORD_DEFAULT);

        $this->walimuridModel->save([
            'username_walimurid' => $data['username'],
            'password_walimurid' => $password,
            'email_walimurid' => $data['email'],
            'nama_walimurid' => $data['nama_walimurid'],
            'nisn_murid' => $data['nisnmurid'],
            'jenis_kelamin' => $data['jenis_kelamin'],
            'foto_profile' => $data['fotoprofil'],
        ]);

        session()->setFlashdata('add', 'Data walimurid berhasil dibuat');
        return redirect()->to('/admin/walimurid/index');
    }

    public function logout()
    {
        //hancurkan session 
        //balikan ke halaman login
        $this->session->destroy();
        return redirect()->to('/login');
    }
    
    public function index_admin()
    {
        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $admin = $this->adminModel->search($keyword);
        } else {
            $admin = $this->adminModel;
        }


        $data = [
            'title' => 'Data Admin',
            'admin' => $this->adminModel->getAdmin()
        ];

        return view('/admin/admin/index', $data);
    }

    public function detail_admin($id)
    {
        $data = [
            'title' => 'Detail Admin',
            'admin' => $this->adminModel->getAdmin($id)
        ];


        return view('/admin/admin/detail', $data);
    }

    public function index_guru()
    {
        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $guru = $this->guruModel->search($keyword);
        } else {
            $guru = $this->guruModel;
        }


        $data = [
            'title' => 'Data Guru',
            'guru' => $this->guruModel->getGuru()
        ];

        return view('/admin/guru/index', $data);
    }

    public function detail_guru($id)
    {
        $data = [
            'title' => 'Detail guru',
            'guru' => $this->guruModel->getGuru($id)
        ];


        return view('/admin/guru/detail', $data);
    }

    public function delete_gr($id)
    {
        $getphoto = $this->guruModel->PilihGuru($id)->getRow();
        $photo = $getphoto->foto_profile;

        if ($photo == "user.png") {
            $this->guruModel->HapusGuru($id);
        } else {
            @unlink(ROOTPATH . 'public/img/'. $photo);
            $this->guruModel->HapusGuru($id);
        }

        return redirect()->to('/guru2');
    }

    public function index_murid()
    {
        $data = [
            'title' => 'Data Murid'
        ];

        return view('/admin/murid/index', $data);
    }

    public function index_walimurid()
    {
        $data = [
            'title' => 'Data Walimurid'
        ];

        return view('/admin/walimurid/index', $data);
    }

    public function index_data()
    {
        $data = [
            'title' => 'Data Ibadah'
        ];

        return view('/admin/ibadah/index', $data);
    }

}
