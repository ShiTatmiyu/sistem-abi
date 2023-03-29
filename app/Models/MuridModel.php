<?php

namespace App\Models;

use CodeIgniter\Model;

class MuridModel extends Model
{
    protected $table            = 'murid';
    protected $allowedFields    = ["nisn","username_murid","password_murid","email_murid","nama_murid","jenis_kelamin","foto_profile"];

    public function getMurid($nisn = false)
    {
        if ($nisn == false) {
          return $this->findAll();
        }
        return $this->where (['nisn' => $nisn])->first();
    }
  
    public function search($keyword)
    {
      // $builder = $this->table('buku');
      // $builder->like('judul', $keyword);
      // return $builder;
  
      return $this->table('murid')->like('username_murid', $keyword)->orLike('email_murid', $keyword)->orLike('nama_murid', $keyword);
    }
  
    
    public function Pilihmurid($id)
    {
         $query = $this->getWhere(['nisn' => $id]);
         return $query;
    }
  
    public function Hapusmurid($id)
    {
        $query = $this->db->table($this->table)->delete(array('nisn' => $id));
        return $query;
    }

}
