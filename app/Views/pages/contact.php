<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<section id="about">
  <div class="container">
    <h1 class="mt-5 text-center">Contact</h1>
    <div class="col-sm-12" id="parent">
      <div class="row justify-content-center">
        <div class="col-sm-10" style="box-shadow: 2px 5px 10px rgba(0,0,0,0.1);">
          <iframe src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d249.33998540482477!2d113.92132699999999!3d-0.7892749999999976!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sid!4v1608185976292!5m2!1sen!2sid" width="100%" height="400px;" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
        </div>
      </div>
    </div>
  </div>

  <div class="container second-portion mt-4">
    <div class="row">
      <!-- Boxes de Acoes -->
      <div class="col-xs-12 col-sm-6 col-lg-4">
        <div class="box" >
          <div class="icon">
            <div class="image-ini"><i class="fa fa-envelope" aria-hidden="true"></i></div>
            <div class="info mt-1">
              <h3 class="title">MAIL & WEBSITE</h3>
              <p>
                <i class="fa fa-envelope" aria-hidden="true"></i> &nbsp ikhsan26isn@gmail.com
                <br>
                <br>
                <i class="fa fa-globe" aria-hidden="true"></i> &nbsp www.toku404.github.com
              </p>

            </div>
          </div>
          <div class="space"></div>
        </div>
      </div>

      <div class="col-xs-12 col-sm-6 col-lg-4">
        <div class="box">
          <div class="icon">
            <div class="image-ini"><i class="fa fa-mobile" aria-hidden="true"></i></div>
            <div class="info mt-1">
              <h3 class="title">CONTACT</h3>
              <p>
                <i class="fa fa-mobile" aria-hidden="true"></i> &nbsp 082198246668
                <br>
                <br>
                <i class="fa fa-mobile" aria-hidden="true"></i> &nbsp 085341802882
              </p>
            </div>
          </div>
          <div class="space"></div>
        </div>
      </div>

      <div class="col-xs-12 col-sm-6 col-lg-4">
        <div class="box">
          <div class="icon">
            <div class="image-ini"><i class="fa fa-map-marker" aria-hidden="true"></i></div>
            <div class="info mt-1">
              <h3 class="title">ADDRESS</h3>
              <p>
                <i class="fa fa-map-marker" aria-hidden="true"></i> &nbsp Soppeng
              </p>
            </div>
          </div>
          <div class="space"></div>
        </div>
      </div>
    </div>
</section>
<?= $this->endSection(); ?>