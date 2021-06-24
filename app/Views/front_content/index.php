<?= $this->extend('layout/front_layout') ?>

<?= $this->section('content') ?>

<!-- ======= Intro Section ======= -->
<section id="intro">

<div class="intro-content">
  <h2>Penerimaan <span>Peserta Didik Baru</span><br> SMAN 1 Gangga</h2>
  <div>
  <?php if($session->get('logged_in')): ?>
    <a href="<?= base_url('dashboard') ?>" class="btn-get-started scrollto">Dasboard</a>
  <?php else: ?>
    <a href="<?= base_url('masuk') ?>" class="btn-get-started scrollto">Masuk</a>
    <a href="<?= base_url('daftar') ?>" class="btn-projects scrollto">Daftar</a>
  <?php endif; ?>
    
  </div>
</div>

<div id="intro-carousel" class="owl-carousel">
  <div class="item" style="background-image: url('<?= base_url('theme/front/assets/img/intro-carousel/1.jpg'); ?>');"></div>
  <div class="item" style="background-image: url('<?= base_url('theme/front/assets/img/intro-carousel/2.jpg'); ?>');"></div>
  <div class="item" style="background-image: url('<?= base_url('theme/front/assets/img/intro-carousel/3.jpg'); ?>');"></div>
  <div class="item" style="background-image: url('<?= base_url('theme/front/assets/img/intro-carousel/4.jpg'); ?>');"></div>
  <div class="item" style="background-image: url('<?= base_url('theme/front/assets/img/intro-carousel/5.jpg'); ?>');"></div>
</div>

</section><!-- End Intro Section -->

<main id="main">

<!-- ======= About Section ======= -->
<section id="tentang_kami" class="wow fadeInUp">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 about-img">
        <img src="<?= base_url('theme/front/assets/img/about-img.jpg'); ?>" alt="">
      </div>

      <div class="col-lg-6 content">
        <h2>Tentang SMAN 1 Gangga</h2>
        <h3>Terwujudnya Peserta Didik yang Berkarakter, Berimpati, Cerdas, Pantang Menyerah (BEST) dalam menghadapi tantangan global berdasarkan iman dan taqwa. </h3>

        <ul>
          <li><i class="ion-android-checkmark-circle"></i> Melaksanakan kegiatan berdoa bersama kepada Tuhan Yang Maha Esa pada awal dan akhir pembelajaran;</li>
          <li><i class="ion-android-checkmark-circle"></i> Melaksanakan pembiasaan Disiplin, Komitmen, Tanggung Jawab, dan Integritas;</li>
          <li><i class="ion-android-checkmark-circle"></i> Melaksanakan pembiasaan Senyum, Sapa, Salam, Sopan, dan Santun (5S);</li>
        </ul>

      </div>
    </div>

  </div>
</section><!-- End About Section -->

<!-- ======= Services Section ======= -->
<section id="panduan">
  <div class="container">
    <div class="section-header">
      <h2>Panduan Pendaftaran</h2>
      <p>Berikut beberapa panduan dan cara dalam melakukan pendaftaran dan seleksi secara online atau PPDB Online di SMAN 1 Gangga</p>
    </div>

    <div class="row">
    <?php foreach($panduans as $panduan): ?>
      <div class="col-lg-6">
        <div class="box wow fadeInLeft">
          <div class="icon"><i class="fa fa-bar-chart"></i></div>
          <h4 class="title"><a href=""><?= $panduan['judul'] ?></a></h4>
          <p class="description"><?= substr($panduan['preview_deskripsi'], 0, 100) ?></p>
        </div>
      </div>
      <?php endforeach; ?>
    </div>

  </div>
</section><!-- End Services Section -->

<!-- ======= Portfolio Section ======= -->
<section id="portfolio" class="portfolio wow fadeInUp">
  <div class="container">
    <div class="section-header">
      <h2>Ekstra Kulikuler</h2>
      <p>Untuk para calon siswa SMAN 1 Gangga, kalian disini tidak hanya belajar pelajaran resmi dan formal, tapi kalian juga dapat melatih dan mengembangkan kreatifitas dan bakat kalian melalui beberapa program EKstra Kulikuler yang kami sediakan untuk kalian</p>
    </div>

    <div class="row">
      <div class="col-lg-12 d-flex justify-content-center">
        <ul id="portfolio-flters">
          <li data-filter="*" class="filter-active">Semua</li>
          <li data-filter=".filter-app">OLahraga</li>
          <li data-filter=".filter-card">Seni</li>
          <li data-filter=".filter-web">IT</li>
        </ul>
      </div>
    </div>

    <div class="row portfolio-container">

      <div class="col-lg-4 col-md-6 portfolio-item filter-app">
        <img src="<?= base_url('theme/front/assets/img/portfolio/portfolio-1.jpg'); ?>" class="img-fluid" alt="">
        <div class="portfolio-info">
          <h4>Ekskul Basket</h4>
          <p>Basket keren</p>
          <a href="<?= base_url('theme/front/assets/img/portfolio/portfolio-1.jpg'); ?>" data-gall="portfolioGallery" class="venobox preview-link" title="App 1"><i class="bx bx-plus"></i></a>
          <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 portfolio-item filter-web">
        <img src="<?= base_url('theme/front/assets/img/portfolio/portfolio-2.jpg'); ?>" class="img-fluid" alt="">
        <div class="portfolio-info">
          <h4>Ekskul Programming</h4>
          <p>Developer</p>
          <a href="<?= base_url('theme/front/assets/img/portfolio/portfolio-2.jpg'); ?>" data-gall="portfolioGallery" class="venobox preview-link" title="Web 3"><i class="bx bx-plus"></i></a>
          <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 portfolio-item filter-app">
        <img src="<?= base_url('theme/front/assets/img/portfolio/portfolio-3.jpg'); ?>" class="img-fluid" alt="">
        <div class="portfolio-info">
          <h4>Ekskul Futsal</h4>
          <p>Futsal</p>
          <a href="<?= base_url('theme/front/assets/img/portfolio/portfolio-3.jpg'); ?>" data-gall="portfolioGallery" class="venobox preview-link" title="App 2"><i class="bx bx-plus"></i></a>
          <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 portfolio-item filter-card">
        <img src="<?= base_url('theme/front/assets/img/portfolio/portfolio-4.jpg'); ?>" class="img-fluid" alt="">
        <div class="portfolio-info">
          <h4>Ekskul Drum Band</h4>
          <p>Drum Band</p>
          <a href="<?= base_url('theme/front/assets/img/portfolio/portfolio-4.jpg'); ?>" data-gall="portfolioGallery" class="venobox preview-link" title="Card 2"><i class="bx bx-plus"></i></a>
          <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 portfolio-item filter-web">
        <img src="<?= base_url('theme/front/assets/img/portfolio/portfolio-5.jpg'); ?>" class="img-fluid" alt="">
        <div class="portfolio-info">
          <h4>Ekskul Disain</h4>
          <p>Disain</p>
          <a href="<?= base_url('theme/front/assets/img/portfolio/portfolio-5.jpg'); ?>" data-gall="portfolioGallery" class="venobox preview-link" title="Web 2"><i class="bx bx-plus"></i></a>
          <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 portfolio-item filter-app">
        <img src="<?= base_url('theme/front/assets/img/portfolio/portfolio-6.jpg'); ?>" class="img-fluid" alt="">
        <div class="portfolio-info">
          <h4>Ekskul Volley</h4>
          <p>Volley</p>
          <a href="<?= base_url('theme/front/assets/img/portfolio/portfolio-6.jpg'); ?>" data-gall="portfolioGallery" class="venobox preview-link" title="App 3"><i class="bx bx-plus"></i></a>
          <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 portfolio-item filter-card">
        <img src="<?= base_url('theme/front/assets/img/portfolio/portfolio-7.jpg'); ?>" class="img-fluid" alt="">
        <div class="portfolio-info">
          <h4>Ekskul Paduan Suara</h4>
          <p>Padus</p>
          <a href="<?= base_url('theme/front/assets/img/portfolio/portfolio-7.jpg'); ?>" data-gall="portfolioGallery" class="venobox preview-link" title="Card 1"><i class="bx bx-plus"></i></a>
          <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 portfolio-item filter-card">
        <img src="<?= base_url('theme/front/assets/img/portfolio/portfolio-8.jpg'); ?>" class="img-fluid" alt="">
        <div class="portfolio-info">
          <h4>Ekskul Kejarinan Tanah</h4>
          <p>Kerajinan Tanah</p>
          <a href="<?= base_url('theme/front/assets/img/portfolio/portfolio-8.jpg'); ?>" data-gall="portfolioGallery" class="venobox preview-link" title="Card 3"><i class="bx bx-plus"></i></a>
          <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 portfolio-item filter-web">
        <img src="<?= base_url('theme/front/assets/img/portfolio/portfolio-9.jpg'); ?>" class="img-fluid" alt="">
        <div class="portfolio-info">
          <h4>Ekskul Bisnis Digital</h4>
          <p>Digital bisnis</p>
          <a href="<?= base_url('theme/front/assets/img/portfolio/portfolio-9.jpg'); ?>" data-gall="portfolioGallery" class="venobox preview-link" title="Web 3"><i class="bx bx-plus"></i></a>
          <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
        </div>
      </div>

    </div>

  </div>
</section><!-- End Portfolio Section -->

<!-- ======= Testimonials Section ======= -->
<section id="testimonials">
  <div class="container">
    <div class="section-header">
      <h2>Jurusan</h2>
      <p>Untuk pada calon siswa baru, kalian dapat memilih jurusan sesuai dengan minat dan kemampuan kalian, terdapat beberapa jurusan yang dapat dipilih nanti pada proses pendaftaran</p>
    </div>
    <div class="owl-carousel testimonials-carousel">

      <div class="testimonial-item">
        <p>
          <img src="<?= base_url('theme/front/assets/img/quote-sign-left.png'); ?>" class="quote-sign-left" alt="">
          Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam, risus at semper.
          <img src="assets/img/quote-sign-right.png" class="quote-sign-right" alt="">
        </p>
        <img src="<?= base_url('theme/front/assets/img/testimonial-1.jpg'); ?>" class="testimonial-img" alt="">
        <h3>Jurusan IPA</h3>
        <h4>Ceo &amp; Founder</h4>
      </div>

      <div class="testimonial-item">
        <p>
          <img src="<?= base_url('theme/front/assets/img/quote-sign-left.png'); ?>" class="quote-sign-left" alt="">
          Export tempor illum tamen malis malis eram quae irure esse labore quem cillum quid cillum eram malis quorum velit fore eram velit sunt aliqua noster fugiat irure amet legam anim culpa.
          <img src="assets/img/quote-sign-right.png" class="quote-sign-right" alt="">
        </p>
        <img src="<?= base_url('theme/front/assets/img/testimonial-2.jpg'); ?>" class="testimonial-img" alt="">
        <h3>Jurusan Bahasa</h3>
        <h4>Designer</h4>
      </div>

      <div class="testimonial-item">
        <p>
          <img src="<?= base_url('theme/front/assets/img/quote-sign-left.png'); ?>" class="quote-sign-left" alt="">
          Enim nisi quem export duis labore cillum quae magna enim sint quorum nulla quem veniam duis minim tempor labore quem eram duis noster aute amet eram fore quis sint minim.
          <img src="assets/img/quote-sign-right.png" class="quote-sign-right" alt="">
        </p>
        <img src="<?= base_url('theme/front/assets/img/testimonial-3.jpg'); ?>" class="testimonial-img" alt="">
        <h3>Jurusan IPS</h3>
        <h4>Store Owner</h4>
      </div>
    </div>

  </div>
</section><!-- End Testimonials Section -->

<!-- ======= Call To Action Section ======= -->
<section id="call-to-action" class="wow fadeInUp">
  <div class="container">
    <div class="row">
      <div class="col-lg-9 text-center text-lg-left">
        <h3 class="cta-title">Daftar Segera</h3>
        <p class="cta-text"> Jika kalian sudah siap dan yakin ingin meraih masa depan bersama kami, jangan ragu, segera daftarkan diri anda, kami tunggu.</p>
      </div>
      <div class="col-lg-3 cta-btn-container text-center">
        <a class="cta-btn align-middle" href="<?= base_url('daftar') ?>">DAFTAR</a>
      </div>
    </div>

  </div>
</section><!-- End Call To Action Section -->

<!-- ======= Contact Section ======= -->
<section id="hubungi_kami" class="wow fadeInUp">
  <div class="container">
    <div class="section-header">
      <h2>Hubungi Kami</h2>
      <p>Jika anda masih bingung mengenai proses pendaftara, silahkan hubungi kami melalui saluran telepon atau datang langsung ke SMAN 1 Gangga, silahkan, tentu dengan menggunakan prokes standart Covid ya, memakai masker, menjaga jarak, dan rajin mencuci tangan</p>
    </div>

    <div class="row contact-info">

      <div class="col-md-4">
        <div class="contact-address">
          <i class="ion-ios-location-outline"></i>
          <h3>Alamat</h3>
          <address>Jl. Raya Gondang, Gondang, Gangga, Kabupaten Lombok Utara, Nusa Tenggara Bar. 83353</address>
        </div>
      </div>

      <div class="col-md-4">
        <div class="contact-phone">
          <i class="ion-ios-telephone-outline"></i>
          <h3>Nomor Telepon</h3>
          <p><a href="tel:+155895548855">+62 000 1111 2222</a></p>
        </div>
      </div>

      <div class="col-md-4">
        <div class="contact-email">
          <i class="ion-ios-email-outline"></i>
          <h3>Email</h3>
          <p><a href="mailto:info@example.com">contact@sman1gangga.sch.id</a></p>
        </div>
      </div>

    </div>
  </div>

  <div class="container mb-4">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3947.702450549632!2d116.18969231429779!3d-8.332335094006027!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dcdd9850421b2af%3A0xaefd3ea151ab24bb!2sSMAN%201%20Gangga!5e0!3m2!1sen!2sid!4v1623596751544!5m2!1sen!2sid" width="100%" height="380" frameborder="0" style="border:0" allowfullscreen loading="lazy"></iframe>
  </div>

  <div class="container">
    <div class="form">
      <form action="forms/contact.php" method="post" role="form" class="php-email-form">
        <div class="form-row">
          <div class="form-group col-md-6">
            <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
            <div class="validate"></div>
          </div>
          <div class="form-group col-md-6">
            <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
            <div class="validate"></div>
          </div>
        </div>
        <div class="form-group">
          <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
          <div class="validate"></div>
        </div>
        <div class="form-group">
          <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
          <div class="validate"></div>
        </div>

        <div class="mb-3">
          <div class="loading">Loading</div>
          <div class="error-message"></div>
          <div class="sent-message">Your message has been sent. Thank you!</div>
        </div>

        <div class="text-center"><button type="submit">Send Message</button></div>
      </form>
    </div>

  </div>
</section><!-- End Contact Section -->

</main><!-- End #main -->
<?= $this->endSection() ?>