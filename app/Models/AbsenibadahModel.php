<?php

namespace App\Models;

use CodeIgniter\Model;

class AbsenibadahModel extends Model
{
    protected $table            = 'absenibadah';
    protected $allowedFields    = ['id_absen','nisn_murid','nama_ibadah','status_ibadah','waktu_isi','keterangan_walimurid'];


    public function getAbsen($nisn_murid = false)
    {
        $uri = service('uri');
        $nisn = $uri->getSegment(2);

        if ($nisn_murid == false) {
            return $this->where('nisn_murid', $nisn)
            ->findAll();
                }
        return $this->where(['nisn_murid' => $nisn_murid])->First(); 
    }
}