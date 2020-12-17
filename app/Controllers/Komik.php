<?php

namespace App\Controllers;

use App\Models\KomikModel;

class Komik extends BaseController
{
  // deklarasi model
  protected $komikModel;
  protected $allKomik;
  // instance komikmodel di konstruktor
  // instance komikmodel di konstruktor
  public function __construct()
  {
    $this->komikModel = new KomikModel();
    $this->allKomik = $this->komikModel->getKomik();
  }
  public function home()
  {
    $hari = $this->request->getVar('hari');
    if ($hari) {
      $komik = $this->komikModel->getHari($hari);
    } else {
      $komik = $this->allKomik;
    }
    $data = [
      'title' => 'Home Komik',
      'komik' => $komik,
    ];
    return view('pages/komik/home', $data);
  }
  public function all()
  {
    $keyword = $this->request->getVar('keyword');
    if ($keyword) {
      $komik = $this->komikModel->search($keyword);
    } else {
      $abjad = $this->request->getVar('abjad');
      if ($abjad && $abjad != "all") {
        $komik = $this->komikModel->abjadkers($abjad);
      } else {
        $komik = $this->allKomik;
      }
    }
    if($genre= $this->request->getVar('genre')){
      $komik = $this->komikModel->genreGet($genre);
    }
    else if($tipe= $this->request->getVar('tipe')){
      $komik = $this->komikModel->tipeGet($tipe);
    }
    else if($status= $this->request->getVar('status')){
      $komik = $this->komikModel->statusGet($status);
    }
    else if($order= $this->request->getVar('order')){
      $komik = $this->komikModel->orderGet($order);
    }
    $data = [
      'title' => 'All Komik',
      'komik' => $komik,
    ];
    
    return view('pages/komik/all', $data);
  }
  public function detail($slug)
  {
    $komik = $this->komikModel->getKomik($slug);
    $data = [
      'title' => 'Detail Komik',
      'komik' => $komik,
    ];
    return view('pages/komik/detail',$data);
  }
}
