<?php
session_start();
$database_name = "Product_details";
$con = mysqli_connect("localhost", "root", "", $database_name);
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
}

if (isset($_POST["add"])) {
    if (isset($_SESSION["cart"])) {
        $item_array_id = array_column($_SESSION["cart"], "product_id");
        if (!in_array($_GET["id"], $item_array_id)) {
            $count = count($_SESSION["cart"]);
            $item_array = array(
                'product_id' => $_GET["id"],
                'item_name' => $_POST["hidden_name"],
                'product_price' => $_POST["hidden_price"],
                'item_quantity' => $_POST["quantity"],
            );
            $_SESSION["cart"][$count] = $item_array;
            echo '<script>window.location="product.php"</script>';
        } else {
            echo '<script>alert("Product is already Added to Cart")</script>';
            echo '<script>window.location="product.php"</script>';
        }
    } else {
        $item_array = array(
            'product_id' => $_GET["id"],
            'item_name' => $_POST["hidden_name"],
            'product_price' => $_POST["hidden_price"],
            'item_quantity' => $_POST["quantity"],
        );
        $_SESSION["cart"][0] = $item_array;
    }
}

if (isset($_GET["action"])) {
    if ($_GET["action"] == "delete") {
        foreach ($_SESSION["cart"] as $keys => $value) {
            if ($value["product_id"] == $_GET["id"]) {
                unset($_SESSION["cart"][$keys]);
                echo '<script>alert("Product has been Removed...!")</script>';
                echo '<script>window.location="product.php"</script>';
            }
        }
    }
}
?>

<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Satodhru Das, Developer, satodhrunondon@gmail.com">
    <meta name="keywords" content="Satodhru Das, Front End Developer, satodhrunondon@gmail.com">
    <meta name="developer" content="Satodhru Das">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Luxury Living || Project</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/plugins/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">
    <!-- Fontawesome -->
    <link rel="stylesheet" href="./assets/plugins/css/all.min.css">
    <script src="https://kit.fontawesome.com/53b23fd92a.js" crossorigin="anonymous"></script>
    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/style.css">

    <style>
        * {
            font-weight: 700;
            font-family: 'Poppins', sans-serif;
        }

        table,
        th,
        tr {
            text-align: center;
        }

        .title2 {
            text-align: center;
            color: #66afe9;
            background-color: #efefef;
            padding: 2%;
        }

        table th {
            background-color: #efefef;
        }

        #best-company-wrapper .best-company-content {
            padding: 0px;
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
            -- ─── NAVBAR ─────────────────────────────────────────────────────────────────────
            -->
    <div id="nav-wrapper">
        <nav class="navbar navbar-expand-lg bg-transparent custom-nav">
            <div class="container">
                <div class="logo-wrap">
                    <div class="logo">
                        <a class="navbar-brand" href="#0">
                            <img src="images/logo.svg" alt="cleaning-logo" class="img-fluid">
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


    <div id="best-company-wrapper">
        <div class="best-company-wrap">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-12">
                        <div class="best-company-content">
                            <h2>
                                Our Services
                            </h2>

                        </div>
                        <div class="row">
                            <?php
                            $query = "SELECT * FROM product ORDER BY id ASC ";
                            $result = mysqli_query($con, $query);
                            if (mysqli_num_rows($result) > 0) {

                                while ($row = mysqli_fetch_array($result)) {

                            ?>
                                    <div class="col-md-4">
                                        <div class="card custom-card p-3">
                                            <form method="post" action="product.php?action=add&id=<?php echo $row["id"]; ?>">

                                                <div class="product">
                                                    <img height="300px" src="<?php echo $row["image"]; ?>" class="img-responsive card-img-top custom-card-img">
                                                    <h5 class="text-info card-title custom-card-title "><?php echo $row["pname"]; ?></h5>
                                                    <h5 class="text-danger">$<?php echo $row["price"]; ?></h5>
                                                    <div class="row">
                                                        <div class="col-6 mt-2 ml-2">
                                                            <label>One or more projects</label>
                                                        </div>
                                                        <div class="col-4 mt-3">
                                                            <input  type="text" name="quantity" class="form-control" value="1">
                                                        </div>
                                                    </div>
                                                    <input type="hidden" name="hidden_name" value="<?php echo $row["pname"]; ?>">
                                                    <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>">
                                                    <input type="submit" name="add" style="margin-top: 5px;" class="btn btn-success" value="Add to Cart">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                            <?php
                                }
                            }
                            ?>

                        </div>
                    </div>
                    <div class="col-lg-12 col-12 py-5">
                        <div style="clear: both"></div>
                        <div class="best-company-content">
                            <h2>
                                Add Service Details
                            </h2>

                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tr>
                                    <th width="30%">Product Name</th>
                                    <th width="30%">Price Details</th>
                                    <th width="30%">Total Price</th>
                                    <th width="5%">Remove Item</th>
                                </tr>

                                <?php
                                if (!empty($_SESSION["cart"])) {
                                    $total = 0;
                                    foreach ($_SESSION["cart"] as $key => $value) {
                                ?>
                                        <tr>
                                            <td><?php echo $value["item_name"]; ?></td>
                                            <td>$ <?php echo $value["product_price"]; ?></td>
                                            <td>$ <?php echo number_format($value["item_quantity"] * $value["product_price"], 2); ?></td>
                                            <td><a href="product.php?action=delete&id=<?php echo $value["product_id"]; ?>"><span class="text-danger">Remove Item</span></a></td>

                                        </tr>
                                    <?php
                                        $total = $total + ($value["item_quantity"] * $value["product_price"]);
                                    }
                                    ?>
                                    <tr>
                                        <td colspan="3" align="right">Total</td>
                                        <th align="right">$ <?php echo number_format($total, 2); ?></th>
                                    </tr>
                                <?php
                                }
                                ?>
                            </table>
                        </div>
                        <a onclick="alert('Wow! Thank you Sir.')" href="index.php" class="btn custom-btn-2">
                          Send Money
                      </a>
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
                                    <h3>Navigation</h3>a
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
</body>

</html>