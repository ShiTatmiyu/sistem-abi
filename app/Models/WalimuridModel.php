<?php

namespace App\Models;

use CodeIgniter\Model;

class WalimuridModel extends Model
{
    protected $table            = 'walimurid';
    protected $allowedFields    = ["id_walimurid","username_walimurid","password_walimurid","email_walimurid","nama_walimurid","nisn_murid","jenis_kelamin","foto_profile"];


    public function getWM($id_walimurid = false)
    {
        if ($id_walimurid == false) {
            return $this->findAll();
          }
          return $this->where (['id_walimurid' => $id_walimurid])->first();
    }

    public function getWalimurid($id_walimurid = false)
    {
        if ($id_walimurid == false) {
            $builder = $this->db->table($this->table);
            $builder->select('walimurid.*, murid.nama_murid as nama_murid');
            $builder->join('murid', 'murid.nisn = walimurid.nisn_murid');
            return $builder->get()->getResult();
        }
            $builder = $this->db->table('walimurid');
            $builder->select('walimurid.*,murid.username_murid as username_murid,murid.nama_murid as nama_murid');
            $builder->join('murid', 'murid.nisn = walimurid.nisn_murid');
            $builder->where('walimurid.id_walimurid =', $id_walimurid);
            $query = $builder->get();    
            return $query->getRow();
    }

    public function Pilihwalimurid($id)
    {
         $query = $this->getWhere(['id_walimurid' => $id]);
         return $query;
    }
  
    public function Hapuswalimurid($id)
    {
        $this->db->disableForeignKeyChecks();
        $query = $this->db->table($this->table)->delete(array('id_walimurid' => $id));
        return $query;
        $this->db->enableForeignKeyChecks();
    }

    public function updateWalimurid($id, $data)
    {
        $this->where('id_walimurid', $id)
             ->set($data)
             ->update();
    }
}
