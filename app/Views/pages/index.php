<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="home_box_btn"><a href="/admin/list" class="btn btn-danger home_sign_btn" style="<?= logged_in()? 'visibility: hidden;': 'visibility: visible'; ?>">Sign In</a></div>

<div class="home_jumbotron jumbotron jumbotron-fluid min-vh-100 text-center m-0 bg-info d-flex flex-column justify-content-center">
  <div class=" container">
    <div class="row justify-content-center align-items-center">
      <div class="col-md-8 col-lg-6">
        <h1 class="display-4"><img src="/assets/img/biglogo.png" alt="" width="60px" class="mr-2">Komik Hunter</h1>
      </div>
    </div>
    <div class="row justify-content-center align-items-center">
      <div class="col-md-8 col-lg-6">
        <div class="input-group custom-search-form">
          <form action="/komik/all/" method="get" class="custom-search-form" style="width: 81%;">
            <input type="text" id="keyword" name="keyword" class="home_input form-control" placeholder="Masukkan nama komik">
          </form>
          <span class="input-group-btn">
            <button class="btn home_search_btn" type="button">
              <i class="fa fa-search" aria-hidden="true"></i>
            </button>
          </span>
        </div>
      </div>
    </div>
    <div class="row justify-content-center align-items-center mt-3">
      <p class="home_text">K-Hunt. Dapatkan Rekomendasi Komik Terkeren</p>
    </div>
    <div class="row justify-content-center align-items-center mt-2">
      <div class="col-md-8 col-lg-6">
        <a href="/komik/home" class="btn btn-danger home_go_btn">Go To Homepage</a>
      </div>
    </div>
  </div>
</div> <?= $this->endSection(); ?>