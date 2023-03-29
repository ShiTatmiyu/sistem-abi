<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AbsenibadahModel;
use App\Models\IbadahModel;
use App\Models\MuridModel;

class Guru extends BaseController
{
    public function __construct()
    {
        $this->absenModel = new AbsenibadahModel;
        $this->ibadahModel = new IbadahModel;
        $this->muridModel = new MuridModel;
    }

    public function index()
    {
        $data = [
            'title' => 'Guru Dashboard',
        ];

        return view('guru/index', $data); 
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

        return view('/guru/ibadah/index', $data);
    }    

    public function laporan_murid()
    {
        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $murid = $this->muridModel->search($keyword);
        } else {
            $murid = $this->muridModel;
        }


        $data = [
            'title' => 'Data murid',
            'murid' => $this->muridModel->getMurid()
        ];

        return view('/guru/laporan/index', $data);
    }    

    public function show_murid()
    {
        $data = [
            'title' => 'Data Absen Murid',
            'absen' => $this->absenModel->getAbsen()
        ];

        return view('/guru/laporan/show', $data);
    }
}
