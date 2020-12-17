<div class="admin_jumbotron jumbotron jumbotron-fluid bg-dark " style="margin:0;">
  <div class="admin_jumbotron-background">
  </div>
  <div class="container admin_text ">
    <div class="row justify-content-center">
      <h1 class="display-4">MENU ADMIN</h1>
    </div>
  </div>
</div>
<div class="home_menu container-fluid mb-5">
  <div class="container">
    <div class="row">
      <div class="col ml-3">
        <div class="row justify-content-start">
          <div class="col nav">
            <ul>
              <li class=""><a class="<?= uri_string() == 'admin/list' ? 'active' : ''; ?>" href="/admin/list">Data Komik</a></li>
              <li class=""><a class="<?= uri_string() == 'admin/pengunjung' ? 'active' : ''; ?>" href="/admin/pengunjung">Pengunjung</a></li>
            </ul>
          </div>
        </div>
      </div>
      <div class="col mr-3 align-items-center">
        <form action="" method="get">
          <div class="row list_search_box justify-content-end mt-1">
            <div class="nav">
              <input type="text" id="keyword" name="keyword" class="form-control float-right list_search" placeholder="Search">
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>