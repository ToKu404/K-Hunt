<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<?= $this->include('layout/admin_header'); ?>
<div class="container">
  <div class="col-md-12">
    <div class="card bg-dark create_card text-white">
      <div class="card-header">
        <h3 class="card-title">Form tambah data</h3>
      </div>
      <form action="/admin/save" method="post" enctype="multipart/form-data">
        <!-- Perlindungan isiform lewat jalur lain-->
        <?= csrf_field(); ?>
        <div class="card-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="judul">Judul</label>
                <input type="text" class="form-control <?= ($validation->hasError('judul')) ? 'is-invalid' : ''; ?>" id="judul" name="judul" autofocus value="<?= old('judul'); ?>" placeholder="Tambahkan Judul">
                <div class="invalid-feedback">
                  <?= $validation->getError('judul'); ?>
                </div>
              </div>
              <div class="form-group">
                <label for="tipe">Tipe</label>
                <select class="custom-select" name="tipe" id="tipe">
                  <option value="manga">Manga</option>
                  <option value="manhua">Manhua</option>
                  <option value="manhwa">Manhwa</option>
                </select>
              </div>
              <div class="form-group">
                <label for="genre">Genre</label>
                <div class="create_box_genre">
                  <div class="row">
                    <div class="col-md-3 create_genre_choice">
                      <label for="">Action</label>
                      <input type="checkbox" name="genre[]" id="genre" value="action">
                    </div>
                    <div class="col-md-3 create_genre_choice">
                      <label for="">Adventure</label>
                      <input type="checkbox" name="genre[]" id="genre" value="adventure">
                    </div>
                    <div class="col-md-3 create_genre_choice">
                      <label for="">Mecha</label>
                      <input type="checkbox" name="genre[]" id="genre" value="mecha">
                    </div>
                    <div class="col-md-3 create_genre_choice">
                      <label for="">Drama</label>
                      <input type="checkbox" name="genre[]" id="genre" value="drama">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-3 create_genre_choice">
                      <label for="">Fantasy</label>
                      <input type="checkbox" name="genre[]" id="genre" value="fantasy">
                    </div>
                    <div class="col-md-3 create_genre_choice">
                      <label for="">Slice Of Life</label>
                      <input type="checkbox" name="genre[]" id="genre" value="slice of life">
                    </div>
                    <div class="col-md-3 create_genre_choice">
                      <label for="">Sport</label>
                      <input type="checkbox" name="genre[]" id="genre" value="sport">
                    </div>
                    <div class="col-md-3 create_genre_choice">
                      <label for="">Sci-Fi</label>
                      <input type="checkbox" name="genre[]" id="genre" value="sce-fi">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-3 create_genre_choice">
                      <label for="">Martial Art</label>
                      <input type="checkbox" name="genre[]" id="genre" value="martial art">
                    </div>
                    <div class="col-md-3 create_genre_choice">
                      <label for="">Romance</label>
                      <input type="checkbox" name="genre[]" id="genre" value="romance">
                    </div>
                    <div class="col-md-3 create_genre_choice">
                      <label for="">Comedy</label>
                      <input type="checkbox" name="genre[]" id="genre" value="comedy">
                    </div>
                    <div class="col-md-3 create_genre_choice">
                      <label for="">Horror</label>
                      <input type="checkbox" name="genre[]" id="genre" value="horror">
                    </div>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <label for="cover">Cover</label>
                <div class="row">
                  <div class="col-sm-3 col-md-2 mb-2">
                    <img src="/assets/img/default.jpg" class="img-preview" alt="img-thumbnail" width="90px" height="100px">
                  </div>
                  <div class="col-sm-9 col-md-10">
                    <div class="custom-file">
                      <input type="file" class="custom-file-input <?= ($validation->hasError('cover')) ? 'is-invalid' : ''; ?>" id="cover" name="cover" onchange="previewImg()">
                      <label class="custom-file-label ml-2" for="cover">Pilih gambar..</label>
                      <div class="invalid-feedback">
                        <?= $validation->getError('cover'); ?>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="mangaka">Mangaka</label>
                <input type="text" class="form-control" id="mangaka" name="mangaka" value="<?= old('mangaka'); ?>" placeholder="Tambahkan Mangaka">
              </div>
              <div class="form-group">
                <label for="penerbit">Penerbit</label>
                <input type="text" class="form-control" id="penerbit" name="penerbit" value="<?= old('penerbit'); ?>" placeholder="Tambahkan Penerbit">
              </div>
              <!-- <div class="row"> -->
              <!-- <div class="col-sm-4"> -->
              <!-- <form>
                <div class="form-group">
                  <label for="formControlRange">Rating</label>
                  <input type="range" class="form-control-range" id="formControlRange">
                </div>
              </form> -->
              <div class="form-group">
                <label for="rating">Rating</label>
                <input type="range" class="form-control" id="rating" name="rating" value="<?= old('rating') ?>" min="0" max="5">
              </div>
              <!-- </div>
                <div class="col"> -->
              <div class="form-group">
                <label for="status">Status</label>
                <select class="custom-select" name="status" id="status">
                  <option>Ongoing</option>
                  <option>Completed</option>
                </select>
              </div>
              <!-- </div>
              </div> -->
              <div class="row">
                <div class="col-sm-12">
                  <div class="form-group">
                    <label for="deskripsi">Sinopsis</label>
                    <textarea class="form-control" rows="7" placeholder="Tambakan sinopsis" name="deskripsi" id="deskripsi"></textarea>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>
        <!-- /.card-body -->

        <div class="card-footer">
          <button type="submit" class="btn btn-danger">Submit</button>
        </div>
      </form>
    </div>
    <!-- /.card -->
  </div>
</div>
<?= $this->endSection(); ?>