<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<?= $this->include('layout/admin_header'); ?>
<div class="container">
  <div class="col-lg-12 col-md-12 ml-auto mr-auto mt-4 text-white">
    <div class="card pd-2" style="border: none; background-color: #fff">
      <div class="flash-data" data-flashdata="<?= session()->getFlashdata('pesan'); ?>">
        <?php if (session()->getFlashdata('pesan')) : ?>
          
        <?php endif; ?>
      </div>
      <div class="table-responsive p-0">
        <table class="table table-white list_table table-hover ">
          <thead>
            <tr>
              <th class="text-center">#</th>
              <th class="text-center">Cover</th>
              <th class="text-center">Judul</th>
              <th class="text-center">Waktu Dibuat</th>
              <th class="text-center">Terakhir diubah</th>
              <th class="text-center">Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php $i = 1;
            foreach ($komik as $k) : ?>
              <tr height="120px">
                <td class="text-center"><?= $i++; ?></td>
                <td style="background:url(/assets/img/<?= $k['cover']; ?>); background-size:cover"></td>
                <td class=" text-center"><?= $k['judul']; ?></td>
                <td class="text-center"><?= $k['created_at']; ?></td>
                <td class=" text-center"><?= $k['updated_at']; ?></td>
                <td class="td-actions text-center">
                  <a href="/komik/<?= $k['slug']; ?>" class="btn btn-success">
                    <i class="fa fa-eye"></i>
                  </a>
                  <a href="/admin/edit/<?= $k['slug']; ?>" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                  <form class="d-inline" action="/admin/<?= $k['id']; ?>" method="post">
                    <?= csrf_field(); ?>
                    <input type="hidden" name="_method" value="DELETE">
                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                  </form>
                </td>
              </tr>
            <?php endforeach; ?>
        </table>
      </div>
    </div>
  </div>
</div>
<div class="container">
  <div class="fixed-bottom mb-3">
    <div class="row justify-content-center">
      <div class="col">
        <div class="container">
          <a class="btn btn-danger home_add_data_btn" href="/admin/create">
            <i class="fas fa-plus mr-2"></i>
            Tambah Data Komik
          </a>
        </div>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection(); ?>