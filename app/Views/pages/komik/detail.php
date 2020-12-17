<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<section id="detail">
  <div class="jumbotron jumbotron-fluid coverImageHolder">
    <div class="container cover_with_image" style="background-image: url(/assets/img/<?= $komik['cover']; ?>)">
    </div>
  </div>
  <div class="detailKomik container-fluid">
    <div class="container valueKomik">
      <div class="row full">
        <div class="col-md-3">
          <div class="row justify-content-center">
            <div class="detailImage">
              <img width="200px" class="coverKomik" src="/assets/img/<?= $komik['cover']; ?>" alt="">
            </div>
          </div>
        </div>
        <div class="col-md-9">
          <div class="title_detail">
            <div class="row">
              <div class="col">
                <h1 class="text_detail">
                  <?= $komik['judul']; ?>
                </h1>
              </div>
            </div>
            <div class="row">
              <div class="col">
                <i class="fa fa-star bintang <?= $komik['rating'] >= 1 ? 'checked' : ''; ?>"></i>
                <i class="fa fa-star bintang <?= $komik['rating'] >= 2 ? 'checked' : ''; ?>"></i>
                <i class="fa fa-star bintang <?= $komik['rating'] >= 3 ? 'checked' : ''; ?>"></i>
                <i class="fa fa-star bintang <?= $komik['rating'] >= 4 ? 'checked' : ''; ?>"></i>
                <i class="fa fa-star bintang <?= $komik['rating'] >= 5 ? 'checked' : ''; ?>"></i>
                <h1 class="rate pl-2"><?= $komik['rating']; ?></h1>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row mt-4 ml-2 mr-2">
        <div class="col">
          <div class="detail_info card">
            <h3 class="card-body">Sinopsis</h3>
            <div class="text_info p-3">
              <p><?= $komik['deskripsi']; ?></p>
            </div>
          </div>
        </div>
      </div>
      <div class="row mt-4  ml-2 mr-2">
        <div class="col">
          <div class="card mb-5">
            <ul class="list-group list-group-flush">
              <li class="list-group-item">
                <div class="row">
                  <div class="col-sm-2 text_key">Tipe</div>
                  <div class="col-sm-10 text_value">: <?= ucwords($komik['tipe']); ?><div>
                    </div>
              </li>
              <li class="list-group-item">
                <div class="row">
                  <div class="col-sm-2 text_key">Genre</div>
                  <div class="col-sm-10 text_value">: <?= ucwords($komik['genre']); ?><div>
                    </div>
              </li>
              <li class="list-group-item">
                <div class="row">
                  <div class="col-sm-2 text_key">Status</div>
                  <div class="col-sm-10 text_value">: <?= ucwords($komik['status']); ?><div>
                    </div>
              </li>
              <li class="list-group-item">
                <div class="row">
                  <div class="col-sm-2 text_key">Mangaka</div>
                  <div class="col-sm-10 text_value">: <?= ucwords($komik['mangaka']); ?><div>
                    </div>
              </li>
              <li class="list-group-item">
                <div class="row">
                  <div class="col-sm-2 text_key">Penerbit</div>
                  <div class="col-sm-10 text_value">: <?= ucwords($komik['penerbit']); ?><div>
                    </div>
              </li>
              <li class="list-group-item">
                <div class="row">
                  <div class="col-sm-2 text_key">Updated On</div>
                  <div class="col-sm-10 text_value">: <?= date('F j, Y', strtotime($komik['updated_at'])); ?><div>
                    </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?= $this->endSection(); ?>