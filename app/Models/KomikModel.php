<?php

namespace App\Models;

use CodeIgniter\Model;

class KomikModel extends Model
{
  #Inisialisasi Table
  protected $table = 'komik';
  #Mengaktifkan TimeStamp
  protected $useTimestamps = true;
  #Kolom yang diizinakn untuk ditambah
  protected $allowedFields = ['judul', 'slug', 'cover', 'genre', 'tipe', 'mangaka', 'penerbit', 'rating', 'status', 'deskripsi'];

  #Memanggil Table yg dibutuhkan
  public function getKomik($slug = false)
  {
    #Jika tidak ada spesifik slug yg diminta maka return smua data
    if ($slug == false) {
      return $this->findAll();
    }
    #Jika ada spesifik data yg diminta return data tsb
    return $this->where(['slug' => $slug])->first();
  }

  #FUncion Search
  public function search($keyword)
  {
    return $this->table('komik')->like('judul', $keyword)->findAll();
  }
  public function getHari($hari)
  {
    $db = db_connect();
    if($hari=='sen'){
      $sql = $db->query("select * from komik where dayname(updated_at)='monday'");
    }else if($hari=='sel'){
      $sql = $db->query("select * from komik where dayname(updated_at)='thuesday'");
    }else if($hari=='rab'){
      $sql = $db->query("select * from komik where dayname(updated_at)='wednesday'");
    }else if($hari=='kam'){
      $sql = $db->query("select * from komik where dayname(updated_at)='thursday'");
    }else if($hari=='jum'){
      $sql = $db->query("select * from komik where dayname(updated_at)='friday'");
    }else if($hari=='sab'){
      $sql = $db->query("select * from komik where dayname(updated_at)='saturday'");
    }else{
      $sql = $db->query("select * from komik where dayname(updated_at)='sunday'");
    }
    return $sql->getResultArray();
    // return $this->table('komik')->getWhere(['dayname(updated_at)'=>'saturday']);
  }
  public function abjadkers($abjad)
  {
    return $this->table('komik')->like('judul', $abjad, 'after')->findAll();
  }
  public function genreGet($genre){
    return $this->table('komik')->like('genre',$genre)->findAll();
  }
  public function tipeGet($tipe){
    return $this->table('komik')->like('tipe',$tipe)->findAll();;
  }
  public function statusGet($status){
    return $this->table('komik')->like('status',$status)->findAll();;
  }
  public function orderGet($ord, $sort='asc'){
    if($ord == 'Z-A'||$ord == 'Populer'|| $ord == 'Latest Update'|| $ord == 'Latest Add'){
      $sort = 'desc';
    }
    $order = '';
    if($ord=='A-Z'|| $ord == 'Z-A'){
      $order = 'judul';
    }else if($ord == 'Populer'){
      $order = 'rating';
    }else if($ord == 'Latest Update'){
      $order = 'updated_at';
    }else {
      $order = 'created_at';
    }
    return $this->table('komik')->orderBy($order,$sort)->findAll();
  }
}
