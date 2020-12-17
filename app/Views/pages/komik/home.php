<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<section id="homepage">
  <div id="carouselExampleControls" class="carousel slide carousel-fade" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="5"></li>
    </ol>
    <div class="carousel-inner">
      <?php $i = 0; ?>
      <div class="carousel-item <?= $i == 0 ? 'active' : '' ?>" style="background-image: url(https://wallpapercave.com/wp/wp3790986.jpg);">
        <div class="carousel-caption">
          <h1>Selamat Datang Di K-Hunt</h1>
          <a href="/komik/all" class="btn btn-light">Explore</a>
        </div>
      </div>
      <?php foreach ($komik as $k) : ?>
        <div class="carousel-item <?= $i == 1 ? 'active' : '' ?>" style="background-image: url(/assets/img/<?= $k['cover']; ?>);">
          <?php $i = $i + 1; ?>
          <div class="carousel-caption">
            <h1><?= $k['judul']; ?></h1>
            <a href="/komik/<?= $k['slug']; ?>" class="btn btn-light">Lihat Detail</a>
          </div>
        </div>
        <?php $i += 1 ?>
      <?php endforeach; ?>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
  <div class="home_menu container-fluid">
    <div class="row">
      <div class="container">
        <div class="nav justify-content-center">
          <ul>
            <li class=""><a href="?hari=sen">SEN</a></li>
            <li class=""><a href="?hari=sel">SEL</a></li>
            <li class=""><a href="?hari=rab">RAB</a></li>
            <li class=""><a href="?hari=kam">KAM</a></li>
            <li class=""><a href="?hari=jum">JUM</a></li>
            <li class=""><a href="?hari=sab">SAB</a></li>
            <li class=""><a href="?hari=min">MIN</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="container-fluid mt-5" id="daftarHome">
    <div class="row justify-content-center">
      <div class="col-md-10">
        <div class="row">
          <?php foreach ($komik as $k) : ?>
            <div class="col-md-4 mt-3">
              <div class="kartu_sampul card mb-3">
                <div class="row no-gutters">
                  <div class="col-md-4">
                    <div class="imagesrs" style="width: 100%; height: 100%; background-size:cover; background-position: center center; background-image: url(/assets/img/<?= $k['cover']; ?>)"></div>
                  </div>
                  <div class="col-md-8">
                    <div class="card-body">
                      <h5 class="card-title" style="height:40px; font-size:20px"><?= $k['judul']; ?></h5>
                      <p class="card-text" style="height:70px;overflow:hidden"><?= $k['deskripsi']; ?></p>
                      <p class="card-text"><small class="text-muted"></small><?= $k['updated_at']; ?></p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </div>
</section>
<?= $this->endSection(); ?>