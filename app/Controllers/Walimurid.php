<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\WalimuridModel;
use App\Models\IbadahModel;
use App\Models\AbsenibadahholdModel;
use App\Models\AbsenibadahModel;

class Walimurid extends BaseController
{
    public function __construct()
    {
        $this->muridModel = new WalimuridModel;
        $this->ibadahModel = new IbadahModel;
        $this->absenholdModel = new AbsenibadahholdModel;
        $this->absenModel = new AbsenibadahModel;
    }

    public function index()
    {
        $data = [
            'title' => 'Walimurid Dashboard',
        ];

        return view('walimurid/index', $data); 
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

        return view('/walimurid/ibadah/index', $data);
    }

    public function index_laporan()
    {
        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $absen = $this->absenholdModel->search($keyword);
        } else {
            $absen = $this->absenholdModel;
        }


        $data = [
            'title' => 'Data Laporan',
            'laporan' => $this->absenholdModel->getAbsenHoldwm()
        ];

        return view('/walimurid/laporan/index', $data);
    }

    public function confirm()
    {
        // Retrieve the selected date from Table 1
        $selectedDate = $this->absenholdModel->select('waktu_isi')->distinct()->get()->getResult()[0]->waktu_isi;

        // Retrieve the data from Table 1 that matches the selected date
        $absenholdData = $this->absenholdModel->where('waktu_isi', $selectedDate)->findAll();

        $absenData = [];
        foreach ($absenholdData as $row) {
            $absenData[] = [
                'nisn_murid' => $row['nisn_murid'],
                'nama_ibadah' => $row['absenhold_ibadah'],
                'status_ibadah' => $row['status_ibadah'],
                'waktu_isi' => $row['waktu_isi'],
                // add more columns as necessary
            ];
        }
        // Insert the data into Table 2
        $this->absenModel->insertBatch($absenData);

        // Delete the data from Table 1
        $this->absenholdModel->where('waktu_isi', $selectedDate)->delete();

        // Return a view to the user confirming that the data has been moved
        return redirect()->to('/laporan2');
    }

}
