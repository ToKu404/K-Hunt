<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<section id="all">
  <div class="container">
    <div class="card mt-4 abjaders">
      <div class="card-body">
        <div class="row justify-content-center">
          <form action="" method="get">
            <?php $abjad = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', "o", "p", "q", 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z']; ?>
            <?php foreach ($abjad as $abj) : ?>
              <input type="submit" href="" name="abjad" id="abjad" value="<?= $abj; ?>" class="btn btn-outline-secondary"></button>
            <?php endforeach; ?>
            <input type="submit" href="" name="abjad" id="abjad" value="all" class="btn btn-outline-secondary"></button>
          </form>
        </div>
      </div>
    </div>

    <div class="card mt-3 all_box">
      <div class="card-body">
        <div class="row">
          <div class="col-md-3">
            <div class="dropdown">
              <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Genre
              </a>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <?php $gen = ['action', 'adventure', 'mecha', 'drama', 'fantasy', 'slice of life', 'sport', 'sci-fi', 'martial art', 'romance', 'comedy', 'horror'] ?>
                <?php foreach ($gen as $g) : ?>
                  <a class="dropdown-item" href="?genre=<?= $g; ?>"><?= $g; ?></a>
                <?php endforeach; ?>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="dropdown">
              <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Tipe
              </a>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <?php $tipe = ['manhwa', 'manhua', 'manga'] ?>
                <?php foreach ($tipe as $t) : ?>
                  <a class="dropdown-item" href="?tipe=<?= $t; ?>"><?= $t; ?></a>
                <?php endforeach; ?>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="dropdown">
              <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Status
              </a>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <?php $status = ['complete', 'ongoing'] ?>
                <?php foreach ($status as $s) : ?>
                  <a class="dropdown-item" href="?status=<?= $s; ?>"><?= $s; ?></a>
                <?php endforeach; ?>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="dropdown">
              <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Order By
              </a>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <?php $order = ['A-Z', 'Z-A', 'Populer', 'Latest Update', 'Latest Add'] ?>
                <?php foreach ($order as $o) : ?>
                  <a class="dropdown-item" href="?order=<?= $o; ?>"><?= $o; ?></a>
                <?php endforeach; ?>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col" style="display:<?= empty($komik) ? 'block' : 'none'; ?>" width="100%">
            <h5 class="mt-5 text-center">Tidak ada record untuk ditampilkan</h5>
          </div>
          <div class="row mt-2 justify-content-start ml-5 mr-3">

            <!-- <div class="col-md-1"></div> -->
            <?php foreach ($komik as $k) : ?>
              <!-- <div class="col-md-2 mr-4 mt-4"> -->
              <a href="/komik/<?= $k['slug']; ?>" class="komik_card mr-4 mt-3">
                <div class="poster">
                  <div class="gambar">
                    <img src="/assets/img/<?= $k['cover']; ?>" alt="">
                  </div>
                  <div class="details">
                    <div class="atas" style="min-height:82px">
                      <h5><?= $k['judul']; ?><br><span><?= $k['mangaka']; ?></span></h5>
                      <div class="starter">
                        <i class="fa fa-star <?= $k['rating'] >= 1 ? 'checked' : ''; ?>"></i>
                        <i class="fa fa-star <?= $k['rating'] >= 3 ? 'checked' : ''; ?>"></i>
                        <i class="fa fa-star <?= $k['rating'] >= 5 ? 'checked' : ''; ?>"></i>
                        <i class="fa fa-star <?= $k['rating'] >= 7 ? 'checked' : ''; ?>"></i>
                        <i class="fa fa-star <?= $k['rating'] >= 9 ? 'checked' : ''; ?>"></i>
                        <!-- <span><?= $k['rating']; ?>/10</span> -->
                      </div>
                      <div class="tags">
                        <?php
                        $color = ['ef5d5d', '3480ea', '278019', 'f2870d', 'ebb62d'];
                        $tag = explode(',', $k['genre']) ?>
                        <?php foreach ($tag as $g) : ?>
                          <span class="gn mr-1" style="background:#<?= $color[rand(0, 4)]; ?>">
                            <?= $g; ?>
                          </span>
                        <?php endforeach; ?>
                      </div>
                    </div>
                    <div class="info">
                      <p style="overflow:hidden;height:80px">
                        <?= $k['deskripsi']; ?>
                      </p>
                    </div>
                  </div>
                </div>
              </a>
              <!-- </div> -->
            <?php endforeach; ?>
            <!-- <div class="col-md-1"></div> -->
          </div>
        </div>
      </div>
    </div>

  </div>
</section>
<?= $this->endSection(); ?>