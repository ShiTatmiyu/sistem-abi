<?php

namespace App\Models;

use CodeIgniter\Model;

class GuruModel extends Model
{
    protected $table            = 'guru';
    protected $primaryKey       = 'id_guru';
    protected $useAutoIncrement = true;
    protected $protectFields    = true;
    protected $allowedFields    = ["id_guru","username_guru","password_guru","email_guru","nama_guru","jenis_kelamin","foto_profile"];


    public function getGuru($id_guru = false)
    {
        if ($id_guru == false) {
          return $this->findAll();
        }
        return $this->where (['id_guru' => $id_guru])->first();
    }
  
    public function search($keyword)
    {
      // $builder = $this->table('buku');
      // $builder->like('judul', $keyword);
      // return $builder;
  
      return $this->table('guru')->like('username_guru', $keyword)->orLike('email_guru', $keyword)->orLike('nama_guru', $keyword);
    }

    public function PilihGuru($id)
    {
       $query = $this->getWhere(['id_guru' => $id]);
       return $query;
    }

  public function HapusGuru($id)
    {
      $query = $this->db->table($this->table)->delete(array('id_guru' => $id));
      return $query;
    }
}


