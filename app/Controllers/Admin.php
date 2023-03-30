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

    public function index_ibadah()
    {
        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $ibadah = $this->ibadahModel->search($keyword);
        } else {
            $ibadah = $this->ibadahModel;
        }


        $data = [
            'title' => 'Data ibadah',
            'ibadah' => $this->ibadahModel->getibadah()
        ];

        return view('/admin/ibadah/index', $data);
    } 

    public function create_ibadah()
    {
        $data = [
            'title' => 'Create Ibadah',
            'validation' => \Config\Services::validation(), 
        ];

        return view('/admin/ibadah/create', $data);
    }

    public function save_ibadah()
    {
        $validation = \Config\Services::validation();

        $validation->setRules([
            'nama_ibadah' => [
                'label' => 'Nama Ibadah',
                'rules' => 'required|is_unique[ibadah.nama_ibadah]',
                'errors' => [
                    'required' => 'Nama Ibadah perlu diisi',
                    'is_unique' => 'Nama Ibadah sudah ada'
                ]
            ],
            'hukum_ibadah' => [
                'label' => 'Hukum Ibadah',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Hukum Ibadah perlu diisi',
                ]
            ],
            'jadwal_ibadah' => [
                'label' => 'Jadwal Ibadah',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jadwal Ibadah perlu diisi',
                ]
            ],
        ]);
        if ($validation->withRequest($this->request)->run())
        {
            $this->ibadahModel->save([
                'nama_ibadah' => $this->request->getVar('nama_ibadah'),
                'hukum_ibadah' => $this->request->getVar('hukum_ibadah'),
                'jadwal_ibadah' => $this->request->getVar('jadwal_ibadah'),
            ]);
    
            session()->setFlashdata('add', 'Data Ibadah berhasil dibuat');
            return redirect()->to('/ibadahad2');
        }
        else
        {
            // validation failed, show errors to the user
            $data = [
                'errors' => $validation->getErrors(),
                'title' => 'Create Ibadah'
                ];
            return view('/admin/ibadah/create', $data);
        }
    }

    public function edit_ibadah($id)
    {
        $data = [
            'title' => 'Edit Admin',
            'validation' => \Config\Services::validation(),
            'ibadah' => $this->ibadahModel->getIbadah($id)
        ];

        return view('/admin/ibadah/edit', $data);
    }

    public function update_ibadah($id)
    {
        $validation = \Config\Services::validation();
        $ibadahOld = $this->ibadahModel->getIbadah($id);

        if($ibadahOld['nama_ibadah'] == $this->request->getVar('nama_ibadah')) {
            $rule_nama = 'required';
        } else {    
            $rule_nama = 'required|is_unique[ibadah.nama_ibadah]';
        };


        $validation->setRules([
            'nama_ibadah' => [
                'label' => 'Nama Ibadah',
                'rules' => $rule_nama,
                'errors' => [
                    'required' => 'Nama Ibadah perlu diisi',
                    'is_unique' => 'Nama Ibadah sudah ada'
                ]
            ],
            'hukum_ibadah' => [
                'label' => 'Hukum Ibadah',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Hukum Ibadah perlu diisi',
                ]
            ],
            'jadwal_ibadah' => [
                'label' => 'Jadwal Ibadah',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jadwal Ibadah perlu diisi',
                ]
            ],
        ]);
        if ($validation->withRequest($this->request)->run())
        {
            $this->ibadahModel->save([
                'id_ibadah' => $id,
                'nama_ibadah' => $this->request->getVar('nama_ibadah'),
                'hukum_ibadah' => $this->request->getVar('hukum_ibadah'),
                'jadwal_ibadah' => $this->request->getVar('jadwal_ibadah'),
            ]);
    
            session()->setFlashdata('add', 'Data Ibadah berhasil dibuat');
            return redirect()->to('/ibadahad2');
        }
        else
        {
            // validation failed, show errors to the user
            $data = [
                'errors' => $validation->getErrors(),
                'title' => 'Create Ibadah'
                ];
            return view('/admin/ibadah/create', $data);
        }
    }

    public function delete_ibadah($id)
    {
        $this->ibadahModel->Hapusibadah($id);
        return redirect()->to('/ibadahad2');
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
        $validation = \Config\Services::validation();

        $adminOld = $this->adminModel->getAdmin($id);
        if($adminOld['username_admin'] == $this->request->getVar('username_admin')) {
            $rule_username = 'required';
        } else {    
            $rule_username = 'required|is_unique[admin.username_admin]';
        };

        if($adminOld['email_admin'] == $this->request->getVar('email')) {
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

        session()->setFlashdata('add', 'Data admin berhasil dibuat');
        return redirect()->to('/admin2');

            }
        else
        {
            // validation failed, show errors to the user
            $data = [
                'title' => 'Create admin',
                'errors' => $validation->getErrors(),
                'admin' => $this->adminModel->getAdmin($id)
                ];
            return view('/admin/admin/create', $data);
        }
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
        $validation = \Config\Services::validation();
        

        $validation->setRules([
            'username_guru' => [
                'label' => 'Username',
                'rules' => 'required|is_unique[guru.username_guru]',
                'errors' => [
                    'required' => 'Username perlu diisi',
                    'is_unique' => 'Username sudah ada'
                ]
            ],
            'password_guru' => [
                'label' => 'Password',
                'rules' => 'required|min_length[8]',
                'errors' => [
                    'required' => 'Password perlu diisi',
                    'min_length' => 'Password harus terdiri dari 8 kata',
                ]
            ],
            'email_guru' => [
                'label' => 'Email',
                'rules' => 'required|valid_email|is_unique[guru.email_guru]',
                'errors' => [
                    'required' => 'Email perlu diisi',
                    'valid_email' => 'Data yang diisi bukan email',
                    'is_unique' => 'Email sudah ada'                
                ]
            ],
            'nama_guru' => [
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

            if($fileFoto->getError() == 4) {
                $namaFoto = 'user.png';
            } else {
                $namaFoto = $fileFoto->getRandomName();
    
                $fileFoto->move(ROOTPATH . 'public/img/', $namaFoto);
            }
    
            $password = password_hash($this->request->getVar('password_guru'), PASSWORD_DEFAULT);

            $this->guruModel->save([
                'username_guru' => $this->request->getVar('username_guru'),
                'password_guru' => $password,
                'email_guru' => $this->request->getVar('email_guru'),
                'nama_guru' => $this->request->getVar('nama_guru'),
                'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
                'foto_profile' => $namaFoto,
            ]);
    
            session()->setFlashdata('add', 'Data guru berhasil dibuat');
            return redirect()->to('/guru2');
    
            }
        else
        {
            // validation failed, show errors to the user
            $data = [
                'errors' => $validation->getErrors(),
                'title' => 'Create guru'
                ];
            return view('/admin/guru/create', $data);
        }
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
        $validation = \Config\Services::validation();
        

        $validation->setRules([
            'nisn' => [
                'label' => 'Nisn',
                'rules' => 'required|is_unique[murid.nisn]|min_length[8]',
                'errors' => [
                    'required' => 'Nisn perlu diisi',
                    'is_unique' => 'Nisn sudah ada',
                    'min_length' => 'Nisn memiliki 8 huruf (Harus)',
                ]
            ],
            'username_murid' => [
                'label' => 'Username',
                'rules' => 'required|is_unique[murid.username_murid]',
                'errors' => [
                    'required' => 'Username perlu diisi',
                    'is_unique' => 'Username sudah ada'
                ]
            ],
            'password_murid' => [
                'label' => 'Password',
                'rules' => 'required|min_length[8]',
                'errors' => [
                    'required' => 'Password perlu diisi',
                    'min_length' => 'Password harus terdiri dari 8 kata',
                ]
            ],
            'email_murid' => [
                'label' => 'Email',
                'rules' => 'required|valid_email|is_unique[murid.email_murid]',
                'errors' => [
                    'required' => 'Email perlu diisi',
                    'valid_email' => 'Data yang diisi bukan email',
                    'is_unique' => 'Email sudah ada'                
                ]
            ],
            'nama_murid' => [
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

            if($fileFoto->getError() == 4) {
                $namaFoto = 'user.png';
            } else {
                $namaFoto = $fileFoto->getRandomName();
    
                $fileFoto->move(ROOTPATH . 'public/img/', $namaFoto);
            }
    
            $password = password_hash($this->request->getVar('password_murid'), PASSWORD_DEFAULT);

            $this->muridModel->save([
                'nisn' => $this->request->getVar('nisn'),
                'username_murid' => $this->request->getVar('username_murid'),
                'password_murid' => $password,
                'email_murid' => $this->request->getVar('email_murid'),
                'nama_murid' => $this->request->getVar('nama_murid'),
                'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
                'foto_profile' => $namaFoto,
            ]);
    
            session()->setFlashdata('add', 'Data murid berhasil dibuat');
            return redirect()->to('/murid2');
    
            }
        else
        {
            // validation failed, show errors to the user
            $data = [
                'errors' => $validation->getErrors(),
                'title' => 'Create murid'
                ];
            return view('/admin/murid/create', $data);
        }
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

    public function edit_gr($id)
    {
        $data = [
            'title' => 'Edit Guru',
            'validation' => \Config\Services::validation(),
            'guru' => $this->guruModel->getGuru($id)
        ];

        return view('/admin/guru/edit', $data);
    }

    public function index_murid()
    {
        $data = [
            'title' => 'Data Murid',
            'murid' => $this->muridModel->getMurid()
        ];

        return view('/admin/murid/index', $data);
    }

    public function detail_murid($id)
    {
        $data = [
            'title' => 'Detail Murid',
            'murid' => $this->muridModel->getMurid($id)
        ];


        return view('/admin/murid/detail', $data);
    }

    public function index_walimurid()
    {
        $data = [
            'title' => 'Data Walimurid'
        ];

        return view('/admin/walimurid/index', $data);
    }


}
