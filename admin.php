<?php
session_start();
$database_name = "Product_details";
$con = mysqli_connect("localhost", "root", "", $database_name);
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
}


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
    <title>Luxury Living || Admin</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/plugins/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">
    <!-- Fontawesome -->
    <link rel="stylesheet" href="assets/plugins/css/all.min.css">
    <script src="https://kit.fontawesome.com/53b23fd92a.js" crossorigin="anonymous"></script>
    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        * {
            font-weight: 700;
            font-family: "Poppins", sans-serif;
        }

        #main-header-wrapper {
            padding: 0px 0px 5px 0px;
            background-color: #FFFFFF;
        }

        .content-text {
            text-align: center !important;
        }

        #best-company-wrapper {
            text-align: center;
            color: #33303a;
            font-family: "Poppins", sans-serif;
        }

        #best-company-wrapper .best-company-content {
            padding: 0px;
        }

        #best-company-wrapper .best-company-content h2 {
            font-size: 34px;
            font-weight: 700;
            padding: 0px 0 35px;
        }
        .custom-css input {
            width: 50%;
            margin: auto;
        }
        .custom-css {
            text-align: center;
        }
        .best-company-wrap {
            border-radius: 10px;
        }
        .img-responsive {
            height: 200px;
            margin-left: auto;
            margin-right: auto;
        }

        .form-button {
            margin-left: auto;
            margin-right: auto;
        }

        .user-name {
            background: orange;
            padding-top: 10px;
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

        /* @media only screen and (max-width: 600px) {
            .product {
                margin-left: 0px;
                width: 250px;
                margin-left: auto;
                margin-right: auto;
            }
        } */
    </style>
</head>

<body>
    <?php require_once 'process.php'; ?>

    <div id="main-header-wrapper">
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
                                <a class="nav-link custom-nav-link active" href="adminIndex.php">Home</a>
                            </li>
                            <li class="nav-item custom-nav-item">
                                <a class="nav-link custom-nav-link active" href="#0">About</a>
                            </li>
                            <li class="nav-item custom-nav-item">
                                <a class="nav-link custom-nav-link active" href="#0">Projects</a>
                            </li>
                            <li class="nav-item custom-nav-item">
                                <a class="nav-link custom-nav-link active" href="admin.php">Admin</a>
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
    </div>

    <div id="best-company-wrapper">
        <div class="best-company-wrap">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-12">
                        <div class="best-company-content">
                            <h2>
                                Our All Services
                            </h2>
                        </div>
                        <div class="row">
                            <?php
                            $database_name = "product_details";
                            $mysqli = new mysqli('localhost', 'root', '', $database_name) or die(mysqli_error($mysqli));
                            $result = $mysqli->query("SELECT * FROM product") or die($mysqli->error);
                            ?>


                            <?php
                            while ($row = $result->fetch_assoc()) :
                            ?>
                                <!-- <div class="col-md-4"> -->
                                <div class="product col-lg-4 col-4">
                                    <div class="card custom-card p-3">
                                        <img src="<?php echo $row['image']; ?>" class="img-responsive">
                                        <h5 class="text-info card-title custom-card-title"><?php echo $row['pname']; ?></h5>
                                        <h5 class="text-danger">$<?php echo $row['price']; ?></h5>

                                        <input type="hidden" name="hidden_name" value="<?php echo $row['pname']; ?>">
                                        <input type="hidden" name="hidden_price" value="<?php echo $row['price']; ?>">
                                        <a style="background-color: #251d58;" href="admin.php?edit=<?php echo $row['id']; ?>" class='btn btn-info mb-2'>Edit</a>
                                        <a href="process.php?delete=<?php echo $row['id']; ?>" class='btn btn-danger'>Delete</a>
                                    </div>
                                </div>
                                <!-- </div> -->
                            <?php endwhile; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--
        -- ─── ALl SERVICES ─────────────────────────────────────────────────────────────────────
        -->
    <div id="best-company-wrappe2 ">
        <div class="best-company-wrap">
            <div class="container">
                <div class="row">
                    <?php
                    function pre_r($array)
                    {
                        echo '<pre>';
                        print_r($array);
                        echo '</pre>';
                    }
                    ?>
                    <div width="50%" class="col-lg-12 col-12 mb-4 p-4" style="background-color: #251d58; color: #FFFFFF;">

                        <form  class='custom-css' action="process.php" method='POST'>
                            <input type="hidden" name="id" value="<?php echo $id; ?>">
                            <h2 class='form-width mb-5'>Add and Update Services</h2>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Service Name</label>
                                <input type="text" name="pname" value="<?php echo $name; ?>" class="form-control form-width" placeholder="Product Name">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Image</label>
                                <input type="text" name="image" value="<?php echo $image; ?>" class="form-control form-width" placeholder="Image Url">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Cost</label>
                                <input type="number" name="price" value="<?php echo $price; ?>" class="form-control form-width" placeholder="Product Price">
                            </div>
                            <?php
                                if ($update == true) :
                                ?>
                                    <button type="submit" class='btn btn-danger mt-5' name='update'>Update</button>
                                <?php else : ?>
                                    <button type="submit" class='btn btn-warning mt-5' name='save'>Add</button>
                                <?php endif; ?>
                        </form>


                        <!-- <form class='form-css' action="process.php" method='POST'>
                            <input type="hidden" name="id" value="<?php echo $id; ?>">
                            <div class="form-row">
                                <h2 class='form-width'>Add and Update Products</h2>
                                <div class="col mt-5 form-group">
                                    <input type="text" name="pname" value="<?php echo $name; ?>" class="form-control form-width" placeholder="Product Name">
                                </div><br>
                                <div class="col form-group">
                                    <input type="text" name="image" value="<?php echo $image; ?>" class="form-control form-width" placeholder="Image Url">
                                </div><br>
                                <div class="col form-group">
                                    <input type="number" name="price" value="<?php echo $price; ?>" class="form-control form-width" placeholder="Product Price">
                                </div>
                                <?php
                                if ($update == true) :
                                ?>
                                    <button type="submit" class='btn btn-danger mt-5' name='update'>Update</button>
                                <?php else : ?>
                                    <button type="submit" class='btn btn-warning mt-5' name='save'>Add</button>
                                <?php endif; ?>
                            </div>
                        </form> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
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
                    <img class="sl" src="images/fb.svg">
                  </a>
                  <a href="" class="insta">
                    <img class="sl" src="images/insta.svg">
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
</body>

</html>