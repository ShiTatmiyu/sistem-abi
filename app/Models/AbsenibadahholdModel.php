<?php

namespace App\Models;

use CodeIgniter\Model;

class AbsenibadahholdModel extends Model
{
    protected $table            = 'absenibadahhold';
    protected $primaryKey       = 'id_absenhold';
    protected $allowedFields    = ['id_absenhold','nisn_murid','absenhold_ibadah','status_ibadah','waktu_isi'];

    // Dates
    protected $useTimestamps = false;

    public function getAbsenHold($id_absenhold = false)
    {
        $session = \Config\Services::session();
        $nisn = $session->get('user_id');

        if ($id_absenhold == false) {
          return $this->where('nisn_murid', $nisn)
                      ->findAll();
        }
        return $this->where(['id_absenhold' => $id_absenhold])->first(); 
    }

    public function getAbsenHoldwm($id_absenhold = false)
    {
        $session = \Config\Services::session();
        $nisn = $session->get('students_id');

        if ($id_absenhold == false) {
          return $this->where('nisn_murid', $nisn)
                      ->findAll();
        }
        return $this->where(['id_absenhold' => $id_absenhold])->first(); 
    }

    public function search($keyword)
    {
      // $builder = $this->table('buku');
      // $builder->like('judul', $keyword);
      // return $builder;
  
      return $this->table('absenibadahhold')->like('absenhold_ibadah', $keyword);
    }
}
