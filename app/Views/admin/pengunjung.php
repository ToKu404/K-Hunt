<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<?= $this->include('layout/admin_header'); ?>
<div class="container">
  <div class="col-lg-12 col-md-12 ml-auto mr-auto mt-4 text-white">
    <div class="card pd-2" style="border: none; background-color: #eee">
      <div class="table-responsive p-0">
        <table class="table table-bordered list_table table-hover ">
          <thead class="thead-light">
            <tr>
              <th class="text-center">#</th>
              <th class="pl-3">Nama</th>
              <th class="pl-3">Email</th>
            </tr>
          </thead>
          <tbody>
            <?php $i = 1 + (10 * ($currentPage - 1)); ?>
            <?php foreach ($pengunjung as $p) : ?>
              <tr height="20px">
                <td class="text-center"><?= $i++; ?></td>
                <td class="pl-3"><?= $p['nama']; ?></td>
                <td class="pl-3"><?= $p['email']; ?></td>
              </tr>
            <?php endforeach; ?>
        </table>
        <div class="card-footer clearfix" style="padding-top:0;margin-top: 0px;">
          <ul class="pagination pagination-sm m-0 float-left">
            <?= $i > 10 ? $pager->links('pengunjung', 'control_pagination') : '' ?>
          </ul>
          <!-- <ul class="m-0 float-left">
            <a href="/admin/pengunjung" class="btn btn-primary" style="visibility:<?= empty(parse_url(current_url())) ?'hidden':'visible'; ?>">Tampilkan Semua</a>
          </ul> -->
        </div>
      </div>

    </div>
  </div>
</div>
</div>
<?= $this->endSection(); ?>