<?php

namespace App\Controllers;

#import Komik Model
use App\Models\KomikModel;
#import Pengunjung Model
use App\Models\PengunjungModel;

class Admin extends BaseController
{
  // deklarasi model
  protected $komikModel;
  protected $orangModel;
  protected $allKomik;
  
  // instance komikmodel di konstruktor
  // instance komikmodel di konstruktor
  public function __construct()
  {
    $this->komikModel = new KomikModel();
    $this->allKomik = $this->komikModel->getKomik();
    $this->pengunjungModel = new PengunjungModel();
  }


  //Pengunjung
  public function pengunjung()
  {
    $keyword = $this->request->getVar('keyword');
    if ($keyword) {
      $pengunjung = $this->pengunjungModel->search($keyword);
    }else{
      $pengunjung = $this->pengunjungModel;
    }
    $currentPage = $this->request->getVar('page_pengunjung') ? $this->request->getVar('page_pengunjung') : 1;
    $data = [
      'title' => 'Data Pengunjung',
      // 'pengunjung' => $this->pengunjungModel->findAll(),
      'pengunjung' => $this->pengunjungModel->paginate(10, 'pengunjung'),
      'pager' => $this->pengunjungModel->pager,
      'currentPage' => $currentPage,
    ];
    return view('admin/pengunjung', $data);
  }
  // LIST KOMIK
  public function list()
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
    $data = [
      'title' => 'Data Komik',
      'komik' => $komik,
    ];
    return view('admin/list', $data);
  }

  // EDIT KOMIK
  public function edit($slug)
  {
    $data = [
      'title' => 'Edit Data Komik',
      'validation' => \Config\Services::validation(),
      'komik' => $this->komikModel->getKomik($slug)
    ];

    return view('admin/edit', $data);
  }

  // CREATE KOMIK
  public function create()
  {
    $data = [
      'title' => 'Tambah Data Komik',
      'validation' => \Config\Services::validation()
    ];
    return view('admin/create', $data);
  }

  // UPDATE KOMIK
  public function update($id)
  {
    $komikLama = $this->komikModel->getKomik($this->request->getVar('slug'));
    if ($komikLama['judul'] == $this->request->getVar('judul')) {
      $rule_judul = 'required';
    } else {
      $rule_judul = "required|is_unique[komik.judul]";
    }

    if (!$this->validate([
      'judul' => [
        'rules' => $rule_judul,
        'errors' => [
          'required' => '{field} komik harus diisi!.',
          'is_unique' => '{field} komik sudah ada'
        ]
      ],
      'cover' => [
        'rules' => 'max_size[cover,2048]|is_image[cover]|mime_in[cover,image/jpg,image/jpeg,image/png]',
        'errors' => [
          'max_size => "Ukusan gambar terlalu besar',
          'is_image' => "Yang anda pilih bukan gambar",
          "mime_in" => 'Yang anda pilih bukan gambar'
        ]
      ]
    ])) {
      return redirect()->to('/admin/edit/' . $this->request->getVar('slug'))->withInput();
    }

    $fileCover = $this->request->getFile('cover');

    if ($fileCover->getError() == 4) {
      $namaCover = $this->request->getVar('sampulLama');
    } else {
      $namaCover = $fileCover->getRandomName();
      $fileCover->move('assets/img', $namaCover);
      unlink('assets/img/' . $this->request->getVar('sampulLama'));
    }

    $slug = url_title($this->request->getVar('judul'), '-', true);



    $genres = empty($this->request->getVar('genre')) ? $this->request->getVar('genre') : implode(",", $this->request->getVar('genre'));
    
    $rating = empty($this->request->getVar('rating'))?0: $this->request->getVar('rating');

    $this->komikModel->save([
      'id' => $id,
      'judul' => $this->request->getVar('judul'),
      'slug' => $slug,
      'genre' => $genres,
      'tipe' => $this->request->getVar('tipe'),
      'rating' => $rating,
      'status' => $this->request->getVar('status'),
      'deskripsi' => $this->request->getVar('deskripsi'),
      'mangaka' => $this->request->getVar('mangaka'),
      'penerbit' => $this->request->getVar('penerbit'),
      'cover' => $namaCover,
    ]);

    session()->setFlashdata('pesan', 'Diubah.');

    return redirect()->to('/admin/list');
  }

  // DELETE KOMIK
  public function delete($id)
  {

    #Hapus gambar
    $komik = $this->komikModel->find($id);

    // cek jika file gambar default 
    if ($komik['cover'] != 'default.jpg' && $komik['cover'] != null) {
      unlink('assets/img/' . $komik['cover']);
    }
    $this->komikModel->delete($id);
    session()->setFlashdata('pesan', 'Dihapus.');
    return redirect()->to('/admin/list');
  }

  // SIMPAN KOMIK
  public function save()
  {
    // Jenis Validasi
    if (!$this->validate([
      'judul' => [
        'rules' => 'required|is_unique[komik.judul]',
        'errors' => [
          'required' => '{field} komik harus diisi!.',
          'is_unique' => '{field} komik sudah ada'
        ]
      ],
      'cover' => [
        'rules' => 'max_size[cover,2048]|is_image[cover]|mime_in[cover,image/jpg,image/jpeg,image/png]',
        'errors' => [
          'max_size => "Ukusan gambar terlalu besar',
          'is_image' => "Yang anda pilih bukan gambar",
          "mime_in" => 'Yang anda pilih bukan gambar'
        ]
      ]
    ])) {
      return redirect()->to('/admin/create')->withInput();
    }

    // Ambil Gambar
    $fileCover = $this->request->getFile('cover');
    // Apakah tdk ada gambar yang diupload

    if ($fileCover->getError() == 4) {
      $namaCover = "default.jpg";
    } else {
      // Generate nama sampul random
      $namaCover = $fileCover->getRandomName();
      // Pindahkan ke folder img
      $fileCover->move('assets/img', $namaCover);
    }

    $genres = ($this->request->getVar('genre')) == null ? '' : implode(",", $this->request->getVar('genre'));
    $slug = url_title($this->request->getVar('judul'), '-', true);
    $this->komikModel->save([
      'judul' => $this->request->getVar('judul'),
      'slug' => $slug,
      'genre' => $genres,
      'tipe' => $this->request->getVar('tipe'),
      'rating' => $this->request->getVar('rating'),
      'status' => $this->request->getVar('status'),
      'deskripsi' => $this->request->getVar('deskripsi'),
      'mangaka' => $this->request->getVar('mangaka'),
      'penerbit' => $this->request->getVar('penerbit'),
      'cover' => $namaCover,
    ]);

    session()->setFlashdata('pesan', 'Ditambahkan.');

    return redirect()->to('/admin/list');
  }
}
