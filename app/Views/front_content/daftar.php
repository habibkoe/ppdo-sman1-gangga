<?= $this->extend('layout/front_layout') ?>

<?= $this->section('content') ?>

<main id="main">

  <!-- ======= Breadcrumbs Section ======= -->
  <section class="breadcrumbs">
    <div class="container">

      <div class="d-flex justify-content-between align-items-center">
        <h2>Halaman Daftar</h2>
        <ol>
          <li><a href="index.html">Home</a></li>
          <li>Halaman Daftar</li>
        </ol>
      </div>

    </div>
  </section><!-- End Breadcrumbs Section -->

  <section class="inner-page pt-4">
    <div class="container">
      <?php if(isset($validation)):?>
        <div class="alert alert-danger"><?= $validation->listErrors() ?></div>
      <?php endif;?>
      <div class="row">
        <div class="col-md-8">
          <form action="<?= base_url('post-daftar') ?>" method="post">
            <div class="form-group">
              <label for="username">Username</label>
              <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp">
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" class="form-control" id="password" name="password">
            </div>
            <div class="form-group">
              <label for="confirmpassword">Ulangi Password</label>
              <input type="password" name="confpassword" class="form-control" id="confirmpassword">
            </div>
            <button type="submit" class="btn btn-primary">DAFTAR</button>
          </form>
        </div>
        <div class="col-md-4">
          <p>
            Silahkan isi username dan password anda disamping
            <ol>
              <li>Username anda minimal 3 karakter dan maksimal 20 karakter</li>
              <li>Password minimal 6 karakter</li>
              <li>Pastikan anda mengisi password yang benar</li>
            </ol>
          </p>
        </div>
      </div>

    </div>
  </section>

</main><!-- End #main -->
<?= $this->endSection() ?>