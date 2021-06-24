<?= $this->extend('layout/login_layout') ?>

<?= $this->section('content') ?>
<!-- Begin page -->
<div class="wrapper-page">

  <div class="card">
    <div class="card-body">

      <h3 class="text-center mt-0 m-b-15">
        SMAN 1 GANGGA
        <br>
        Silahkan masuk
      </h3>
      <?php if(session()->getFlashdata('msg')):?>
        <div class="alert alert-danger"><?= session()->getFlashdata('msg') ?></div>
      <?php endif;?>
      <div class="p-3">
        <form class="form-horizontal m-t-20" action="<?= base_url('post-masuk') ?>" method="post">

          <div class="form-group row">
            <div class="col-12">
              <input class="form-control <?= $session->getFlashdata('msg_user') != null ? 'is-invalid' : '' ?>" type="text" required="" name="username" placeholder="Username">
              <div class="invalid-feedback" id="errorSingkatan">
                <?= $session->getFlashdata('msg_user') ?>
              </div>
            </div>
          </div>

          <div class="form-group row">
            <div class="col-12">
              <input class="form-control <?= $session->getFlashdata('msg_password') != null ? 'is-invalid' : '' ?>" type="password" required="" name="password" placeholder="Password">
              <div class="invalid-feedback" id="errorSingkatan">
                <?= $session->getFlashdata('msg_password') ?>
              </div>
            </div>
          </div>

          <div class="form-group text-center row m-t-20">
            <div class="col-12">
              <button class="btn btn-danger btn-block waves-effect waves-light" type="submit">Masuk</button>
            </div>
          </div>

          <div class="form-group m-t-10 mb-0 row">
            <div class="col-sm-7 m-t-20">

            </div>
            <div class="col-sm-5 m-t-20">

            </div>
          </div>
        </form>
      </div>

    </div>
  </div>
</div>
<?= $this->endSection() ?>