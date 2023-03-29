<?php

namespace App\Models;

use CodeIgniter\Model;

class AdminModel extends Model
{
    protected $table            = 'admin';
    protected $primaryKey       = 'id_admin';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ["id_admin","username_admin","password_admin","email_admin","nama_admin","jenis_kelamin","foto_profile"];



    public function getAdmin($id_admin = false)
  {
      if ($id_admin == false) {
        return $this->findAll();
      }
      return $this->where (['id_admin' => $id_admin])->first();
  }

  public function search($keyword)
  {
    // $builder = $this->table('buku');
    // $builder->like('judul', $keyword);
    // return $builder;

    return $this->table('admin')->like('username_admin', $keyword)->orLike('email_admin', $keyword)->orLike('nama_admin', $keyword);
  }

  public function PilihAdmin($id)
  {
       $query = $this->getWhere(['id_admin' => $id]);
       return $query;
  }

  public function HapusAdmin($id)
  {
      $query = $this->db->table($this->table)->delete(array('id_admin' => $id));
      return $query;
  }
}


