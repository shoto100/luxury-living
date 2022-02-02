<?php

session_start();
$database_name = "Product_details";
$con = mysqli_connect("localhost", "root", "", $database_name);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="description" content="Satodhru Das, Developer, satodhrunondon@gmail.com">
  <meta name="keywords" content="Satodhru Das, Front End Developer, satodhrunondon@gmail.com">
  <meta name="developer" content="Satodhru Das">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Luxury Living || Home</title>

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="assets/plugins/css/bootstrap.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">
  <!-- Custom CSS -->
  <link rel="stylesheet" href="assets/css/style.css">
  <!-- Fontawesome -->
  <script src="https://kit.fontawesome.com/53b23fd92a.js" crossorigin="anonymous"></script>

  <style>
    #main-header-wrapper {
      padding: 0px 0px 45px 0px;
    }

    .content-text {
      text-align: center !important;
    }

    #best-company-wrapper {
      text-align: center;
      color: #33303a;
      font-family: "Poppins", sans-serif;
      padding: 60px 0;
    }

    #best-company-wrapper .best-company-content h2 {
      font-size: 34px;
      font-weight: 700;
      padding: 0px 0 35px;
    }

    #bangladesh-wrapper {
      text-align: center;
      color: #33303a;
      font-family: "Poppins", sans-serif;
      padding: 30px 0 20px;
    }

    #bangladesh-wrapper .ban-content-wrap {
      padding: 65px 0 0;
    }

    #bangladesh-wrapper .ban-content-wrap h2 {
      font-size: 36px;
      font-weight: 700;
    }

    #bangladesh-wrapper .ban-content-wrap .ban-body {
      padding: 25px 50px 0;
      font-size: 18px;
      font-weight: 400;
    }

    #bangladesh-wrapper .ban-content-wrap .ban-bottom-line {
      padding: 20px 0 0;
      font-size: 16px;
      font-weight: 300;
    }

    .booking-services {
      margin: 30px 0 50px 0;
    }

    #footer-wrapper {
      font-family: "Poppins", sans-serif;
      color: #FFFFFF;
      background: #251d58 !important;
      padding: 45px 0 0;
    }

    #footer-wrapper .footer-content {
      font-size: 18px;
      font-weight: 300;
      padding: 20px 50px 0 0;
    }

    #footer-wrapper .footer-content span {
      font-weight: 700;
    }

    #footer-wrapper .footer-item-wrap {
      font-size: 18px;
    }

    #footer-wrapper .footer-item-wrap .footer-title {
      padding: 0 0 25px;
    }

    #footer-wrapper .footer-item-wrap .footer-title h3 {
      font-size: 18px;
      font-weight: 700;
    }

    #footer-wrapper .footer-item-wrap ul {
      list-style: none;
    }

    #footer-wrapper .footer-item-wrap ul li {
      padding: 0 0 8px;
    }

    #footer-wrapper .footer-item-wrap a {
      color: #FFFFFF;
      font-weight: 300;
      text-decoration: none;
      font-size: 18px;
    }

    #footer-wrapper .footer-item-wrap .sl {
      padding: 0 10px 0 0;
      max-width: 35px;
    }

    #footer-wrapper .copyright-wrap p {
      margin: o;
      text-align: center;
      font-weight: 300;
      font-size: 14px;
    }

    #footer-wrapper .copyright-wrap p span {
      font-weight: 400;
    }
  </style>
</head>

<body>

  <!--
            -- ─── HEADER ─────────────────────────────────────────────────────────────────────
        -->
  <header id="main-header-wrapper">
    <!--
            -- ─── NAVBAR ─────────────────────────────────────────────────────────────────────
            -->
    <div id="nav-wrapper">
      <nav class="navbar navbar-expand-lg bg-transparent custom-nav">
        <div class="container">
          <div class="logo-wrap">
            <div class="logo">
              <a class="navbar-brand" href="#0">
                <img src="assets/images/logo.svg" alt="cleaning-logo" class="img-fluid">
              </a>
            </div>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav custom-navbar ml-auto custom-navbar-1">
              <li class="nav-item custom-nav-item">
                <a class="nav-link custom-nav-link active" href="index.php">Home</a>
              </li>
              <li class="nav-item custom-nav-item">
                <a class="nav-link custom-nav-link active" href="#0">About</a>
              </li>
              <li class="nav-item custom-nav-item">
                <a class="nav-link custom-nav-link active" href="#0">Projects</a>
              </li>
            </ul>
            <ul class="navbar-nav ml-auto custom-navbar custom-navbar-2">

              <?php
              if (isset($_SESSION['username']) == false) {
                echo '<li class="nav-item custom-nav-item">
                        <a class="nav-link custom-nav-link custom-btn-2" href="login.php">Log In</a>
                      </li>
                      <li class="nav-item custom-nav-item">
                        <a class="nav-link custom-nav-link custom-btn-2" href="register.php">Register</a>
                      </li>';
              } else {
                echo '<li class="nav-item custom-nav-item">
                        <a class="nav-link custom-nav-link custom-btn-2" href="login.php">Hi, ' . $_SESSION['username'] . ' </a>
                      </li>
                      <li class="nav-item custom-nav-item">
                        <a class="nav-link custom-nav-link custom-btn-2" href="logout.php">Log Out</a>
                      </li>';
              }
              ?>
            </ul>
          </div>
        </div>
      </nav>
    </div>
    <div class="main-header-wrap">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-lg-6">
            <h1>We Build <br>
              Your Dream</h1>
            <p>
              Online Easte Agency, the mordern way to sell your own home,
              You can use Griffin Residential to market your property.
            </p>
            <div class="header-btn">

              <?php
              if (isset($_SESSION['username']) == false) {
                echo '<a href="login.php" class="btn custom-btn-2">
                          Booking
                      </a>';
              } else {
                echo '<a href="product.php" class="btn custom-btn-2">
                        Choose Services
                      </a>';
              }
              ?>
            </div>
          </div>
          <div class="col-md-6 col-lg-6 ">
            <img src="assets/images/img-1.svg" class="img-1 img-fluid">
          </div>
        </div>

      </div>

    </div>

  </header>
  <!--
        -- ─── PROJECTS ─────────────────────────────────────────────────────────────────────
        -->

  <section id="best-company-wrapper">
    <div class="best-company-wrap">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-lg-12 text-center">
            <div class="best-company-content">
              <p>
                <small>
                  Projects
                </small>
              </p>
              <h2>
                Discover the latest Interior Design <br>
                available today
              </h2>

            </div>
          </div>
          <div class="col-md-12 col-lg-12">
            <div class="project-content">
              <div class="row">
                <div class="col-md-4 col-lg-4">
                  <div class="card custom-card">
                    <img src="assets/images/project-3.svg" class="card-img-top custom-card-img">
                    <div class="card-body">
                      <h5 class="card-title custom-card-title">Villa on Washington Avenue</h5>
                      <p class="card-text custom-card-text">Sylhet, Bangladesh</p>
                    </div>
                  </div>
                </div>
                <div class="col-md-4 col-lg-4">
                  <div class="card custom-card">
                    <img src="assets/images/project-3.svg" class="card-img-top custom-card-img">
                    <div class="card-body">
                      <h5 class="card-title custom-card-title">Luxury villa in Rego Park</h5>
                      <p class="card-text custom-card-text">Dhaka, Bangladesh</p>
                    </div>
                  </div>
                </div>
                <div class="col-md-4 col-lg-4">
                  <div class="card custom-card">
                    <img src="assets/images/project-3.svg" class="card-img-top custom-card-img">
                    <div class="card-body">
                      <h5 class="card-title custom-card-title">Gorgeous house</h5>
                      <p class="card-text custom-card-text">Dhaka, Bangladesh</p>
                    </div>
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--
        -- ─── BANGLADESH ─────────────────────────────────────────────────────────────────────
        -->

  <section id="bangladesh-wrapper">
    <div class="bangladesh-wrap">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-lg-12">
            <div class="ban-content-wrap">
              <h2>We are all over Bangladesh</h2>

              <p class="ban-body">
                Luxury Living Group designs, manufactures and distributes high-end Made in Italy furniture for international luxury brands. This success story, built on craftsmanship, experimentation and precious materials, began in the sixties and was the brainchild of its founder, Satodhru.
              </p>
              <p class="ban-bottom-line">
                *Zones which are not central may incur extra charges.
              </p>
              <div class="header-btn booking-services">
                <?php
                if (isset($_SESSION['username']) == false) {
                  echo '<a href="login.php" class="btn custom-btn-2">
                          Booking
                      </a>';
                } else {
                  echo '<a href="product.php" class="btn custom-btn-2">
                          Choose Services
                      </a>';
                }
                ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--
        -- ─── FOOTER ─────────────────────────────────────────────────────────────────────
        -->
  <footer id="footer-wrapper">
    <div class="footer-wrap">
      <div class="container">
        <div class="row">
          <div class="col-md-5 col-lg-5">
            <div class="footer-logo">
              <img src="assets/images/logo.svg">
            </div>
            <div class="footer-content">
              <p>The 100% <span>Money Back Guarantee</span> luxury living
                company, specialised in high quality luxury living.</p>
            </div>
          </div>
          <div class="col-md-2 col-lg-2">
            <div class="footer-item-wrap">
              <div class="footer-li">
                <div class="footer-title">
                  <h3>Navigation</h3>
                </div>
                <ul>
                  <li>
                    <a href="#0">Help</a>
                  </li>
                  <li>
                    <a href="#0">Blog</a>
                  </li>
                  <li>
                    <a href="#0">Contact us</a>
                  </li>
                  <li>
                    <a href="#0">Request Quote</a>
                  </li>
                  <li>
                    <a href="#0">Login</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-md-2 col-lg-2">
            <div class="footer-item-wrap">
              <div class="footer-li">
                <div class="footer-title">
                  <h3>Support</h3>
                </div>
                <ul>
                  <li>
                    <a href="#0">Terms &amp; Conditions</a>
                  </li>
                  <li>
                    <a href="#0">Privacy Policy</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-md-2 col-lg-2">
            <div class="footer-item-wrap">
              <div class="footer-li">
                <div class="footer-title">
                  <h3>Follow us</h3>
                </div>
                <div class="social-logo">
                  <a href="" class="fb">
                    <img class="sl" src="assets/images/fb.svg">
                  </a>
                  <a href="" class="insta">
                    <img class="sl" src="assets/images/insta.svg">
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="copyright-wrap">
          <div class="row">
            <div class="col-md-12 col-lg-12">
              <p>&copy; 2022 <span>SATODHRU DAS</span> || All Rights Reserved</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>


  <!-- Bootstrap -->
  <script src="assets/plugins/js/bootstrap.min.js"></script>
  <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script> -->
  <!-- Custom JS --> 
  <!-- <script src="assets/js/custom.js"></script> -->
</body>

</html>