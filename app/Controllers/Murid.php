<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MuridModel;
use App\Models\IbadahModel;
use App\Models\AbsenibadahholdModel;

class Murid extends BaseController
{
    public function __construct()
    {
        $session = \Config\Services::session();
        $this->muridModel = new MuridModel;
        $this->ibadahModel = new IbadahModel;
        $this->absenModel = new AbsenibadahholdModel;
    }

    public function index()
    {
        $data = [
            'title' => 'Admin Dashboard',
        ];

        return view('murid/index', $data); 
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
            'ibadah' => $this->ibadahModel->getIbadah()
        ];

        return view('/murid/ibadah/index', $data);
    }

    public function index_absen()
    {
        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $absen = $this->absenModel->search($keyword);
        } else {
            $absen = $this->absenModel;
        }


        $data = [
            'title' => 'Data absen',
            'absen' => $this->absenModel->getAbsenHold()
        ];

        return view('/murid/absen/index', $data);
    }

    public function create_absen()
    {
        $data = [
            'title' => 'Data absen',
            'validation' => \Config\Services::validation(), 
            'absen' => $this->ibadahModel->getIbadah(),
        ];

        return view('murid/absen/create', $data);
    }

    public function store_absen()
    {
        $session = \Config\Services::session();


        foreach ($this->ibadahModel->findAll() as $ibadah) {
            $absen = [
                'nisn_murid' => $session->get('user_id'),
                'absenhold_ibadah' => $ibadah['nama_ibadah'],
                'status_ibadah' => isset($this->request->getPost('absen')[$ibadah['id_ibadah']]['present']) ? "Dilakukan" : "Tidak Dilakukan",
                'waktu_isi' => date('Y-m-d H:i:s')
                
            ];
            $this->absenModel->insert($absen);
        }

        return redirect()->to('/absen2');
      
    }
}
