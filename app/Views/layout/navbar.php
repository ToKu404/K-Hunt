<nav class="navbar sticky-top navbar-expand-md navbar-light">
  <a class="navbar-brand ml-2" href="/"><img src="/assets/img/biglogo.png" height="74px" alt=""></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse " id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <?php $uri = current_url(true); ?>
      <li class="nav-item <?= uri_string() == "komik/home" ? " active" : ""; ?>">
        <a class="nav-link menu" href="/komik/home">HOME <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item <?= $uri->getSegment(1) == "komik" && $uri->getSegment(2) != 'home' ? " active" : ""; ?>">
        <a class="nav-link menu" href="/komik/all">LIST</a>
      </li>
      <li class="nav-item <?= uri_string() == "pages/contact" ? " active" : ""; ?>">
        <a class="nav-link menu" href="/pages/contact">CONTACT</a>
      </li>
      <li class="nav-item <?= uri_string() == "pages/about" ? " active" : ""; ?>">
        <a class="nav-link menu" href="/pages/about">ABOUT</a>
      </li>
    </ul>
    <form action="/admin/list" class="form-inline my-2 my-lg-0 mr-2">
      <button class="btn btn-dark my-2 my-sm-0 nav_btn_publish" type="submit">Publish</button>
    </form>
    <form action="<?= logged_in() ? '/logout' : '/admin/list'; ?>" class="form-inline my-2 my-lg-0 mr-2">
      <button class="btn btn-dark my-2 my-sm-0 nav_btn_login" type="submit"><?= logged_in() ? 'Logout' : 'Sign In'; ?></button>
    </form>
    <span class="bar mr-2"></span>
    <form action="/komik/all" method="get">
      <div class="nav_box">
        <input type="text" id="keyword" name="keyword" placeholder="Cari Komik" class="nav_input">
        <div class="nav_search_btn">
          <i class="fa fa-search" aria-hidden="true"></i>
        </div>
      </div>
    </form>
  </div>
</nav>