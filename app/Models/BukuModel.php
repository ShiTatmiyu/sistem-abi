<?php

namespace App\Models;

use CodeIgniter\Model;

class BukuModel extends Model
{
  protected $table = 'buku1';
  protected $useTimestamps = false;
  protected $allowedFields = ['judul','slug','kelas','penulis','penerbit','sampul'];

  public function getBuku($slug = false)
  {
      if ($slug == false) {
        return $this->findAll();
      }
      return $this->where (['slug' => $slug])->first();
  }

  public function search($keyword)
  {
    // $builder = $this->table('buku');
    // $builder->like('judul', $keyword);
    // return $builder;

    return $this->table('buku')->like('judul', $keyword)->orLike('penulis', $keyword)->orLike('penerbit', $keyword);
  }
}
