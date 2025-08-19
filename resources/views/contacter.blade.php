<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>CargoWenn</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/icone-logo.png" rel="icon">
  <link href="assets/img/icone-logo.png" rel="icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">


   <!-- =======================================================
  * Template Name: Vesperr - v4.10.0
  * Template URL: https://bootstrapmade.com/vesperr-free-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>



  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

      <div class="logo">
        <h1><a href="/"><img src="assets/img/logo.png"></a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="/">Home</a></li>
          <li><a class="nav-link scrollto" href="/">About</a></li>
          <li><a class="nav-link scrollto" href="index.html#Transitaires">Transitaires</a></li>
          <li><a class="nav-link scrollto " href="index.html#Compagnies-aériennes">Compagnies aériennes</a></li>


          <li><a class="nav-link scrollto" href="#contact">Contacter nous</a></li>
          <li><a class="getstarted scrollto" href="">Connexion</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <main id="main">

    <!-- ======= Breadcrumbs Section ======= -->
    <section class="breadcrumbs">
      <div class="container"  data-aos="fade-up">

        <div class="d-flex justify-content-between align-items-center">
          <h1>Contactez Nous</h1>

        </div>

        <div class="row">
          <div class="col-lg-6 pt-5 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center">
            <form method="POST" action="{{ route('sendEmail') }}">
                @if (session('success'))
                <div class="alert alert-success">
           {{ session('success') }}
           </div>
                  @endif
                  @if (session('fail'))
                  <div class="alert alert-success">
             {{ session('fail') }}
             </div>
                    @endif
             @csrf

                <div class="form-group">
                    <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" value="{{ old('name') }}" required>
                </div>

                <div class="form-group">
                    <input type="email" name="email" class="form-control" id="email" placeholder="Your Email" value="{{ old('email') }}" required>
                </div>

                <div class="form-group">
                    <input type="text" name="subject" class="form-control" id="subject" placeholder="Subject" value="{{ old('subject') }}" required>
                </div>

                <div class="form-group">
                    <textarea name="message" class="form-control" id="message" rows="5" placeholder="Message" required>{{ old('message') }}</textarea>
                </div>

                <button type="submit" class="btn btn-primary">Send Message</button>
            </form>


          </div>
          <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="fade-left" data-aos-delay="200">
            <img src="assets/img/contactez.png" class="img-fluid animated" alt="">
          </div>
        </div>

      </div>
    </section>
    <!-- End Breadcrumbs Section -->


  </main>

      <!-- ======= Contact Section ======= -->
      <section id="contact" class="contact">
        <div class="container">

          <div class="section-title" data-aos="fade-up">
            <h2 style="color:#fff" >Entrer en contact</h2>
          </div>

          <div class="row">

            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
              <div class="contact-about">
                <h1 style="color:#fff">CargoWeen</h1>
                <br>

                <h5 style="color:#fff" >cargoween.com is a realiable digital plateform that help to book air cargo instantly.</h5>
                <div class="social-links">
                  <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                  <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                  <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                  <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
            </div>

            <div class="col-lg-3 col-md-6 mt-4 mt-md-0" data-aos="fade-up" data-aos-delay="200">
              <div class="info">
                <div>
                  <i class="ri-map-pin-line"></i>
                  <p>Avenue de la république immeuble de l’oranger<br>
                    app Nr 13.1 er étage Nabeul 8000-Tunisie</p>
                </div>

                <div>
                  <i class="ri-mail-send-line"></i>
                  <p>cargoween@cargoween.com</p>
                </div>

                <div>
                  <i class="ri-phone-line"></i>
                  <p>+216 31 594 750</p>
                </div>

              </div>
            </div>

            <div class="col-lg-5 col-md-12" data-aos="fade-up" data-aos-delay="300">
              <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d1159.4703281265868!2d10.7317718913276!3d36.45261570973!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sus!4v1676455376466!5m2!1sen!2sus"
              width="500" height="240" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

            </div>

          </div>

        </div>
      </section><!-- End Contact Section -->

    </main>
  <!-- End #main -->
 <!-- ======= Footer ======= -->
 <footer id="footer">
  <div class="container">
    <div class="row d-flex align-items-center">
      <div class="col-lg-6 text-lg-left text-center">
        <div class="copyright">
          &copy; Copyright <strong>CargoWenn</strong>. All Rights Reserved
        </div>

      </div>

    </div>
  </div>
</footer><!-- End Footer -->

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
<script src="assets/vendor/aos/aos.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="assets/vendor/php-email-form/validate.js"></script>



<!-- Template Main JS File -->
<script src="assets/js/main.js"></script>

</body>


</html>
