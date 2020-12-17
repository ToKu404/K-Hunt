<?php

namespace App\Models;

use CodeIgniter\Model;

class PengunjungModel extends Model
{
  #Inisialisasi Table
  protected $table = 'pengunjung';
  #Mengaktifkan TimeStamp
  protected $useTimestamps = true;

  public function search($keyword)
  {
    return $this->table('pengunjung')->like('nama', $keyword)->orLike('email',$keyword);
  }
}
