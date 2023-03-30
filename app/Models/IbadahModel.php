<?php

namespace App\Models;

use CodeIgniter\Model;

class IbadahModel extends Model
{
    protected $table            = 'ibadah';
    protected $primaryKey       = 'id_ibadah';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ["id_ibadah","nama_ibadah","hukum_ibadah","jadwal_ibadah"];



    public function getIbadah($id_ibadah = false)
  {
      if ($id_ibadah == false) {
        return $this->findAll();
      }
      return $this->where (['id_ibadah' => $id_ibadah])->first();
  }

    public function search($keyword)
  {
    // $builder = $this->table('buku');
    // $builder->like('judul', $keyword);
    // return $builder;

    return $this->table('ibadah')->like('nama_ibadah', $keyword);
  }

  public function HapusIbadah($id)
  {
      $query = $this->db->table($this->table)->delete(array('id_ibadah' => $id));
      return $query;
  }
}