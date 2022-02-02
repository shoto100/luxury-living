<?php

include 'config.php';

session_start();

error_reporting(0);

if (isset($_SESSION['username'])) {
  header("Location: product.php");
}


if (isset($_POST['submit'])) {
  $email = $_POST['email'];
  $password = md5($_POST['password']);

  $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
  $result = mysqli_query($conn, $sql);
  if ($result->num_rows > 0) {
    $row = mysqli_fetch_assoc($result);
    $_SESSION['username'] = $row['username'];
    header("Location: index.php");
  } else {
    echo "<script>alert('Woops! Email or Password is Wrong.')</script>";
  }
  if ($email === 'admin@admin.com') {
    header("Location:adminIndex.php");
  }
}

?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="description" content="Satodhru Das, Developer, satodhrunondon@gmail.com">
  <meta name="keywords" content="Satodhru Das, Front End Developer, satodhrunondon@gmail.com">
  <meta name="developer" content="Satodhru Das">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Luxury Living || LogIn</title>

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="assets/plugins/css/bootstrap.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">
  <!-- Fontawesome -->
  <!-- <link rel="stylesheet" href="assets/plugins/css/all.min.css"> -->
  <script src="https://kit.fontawesome.com/53b23fd92a.js" crossorigin="anonymous"></script>
  <!-- Custom CSS -->
  <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>


  <div>

    <section class="vh-100" style="background-color: #eee;">
      <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col-lg-12 col-xl-11">
            <div class="card text-black" style="border-radius: 25px;">
              <div class="card-body p-md-5">
                <div class="row justify-content-center">
                  <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                    <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Log in</p>

                    <form class="mx-1 mx-md-4" action="" method="POST">
                      <div class="d-flex flex-row align-items-center mb-4">
                        <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                        <div class="form-outline flex-fill mb-0">
                          <input type="email" id="form3Example3c" class="form-control" placeholder="Email" name="email" value="<?php echo $email; ?>" required />

                        </div>
                      </div>

                      <div class="d-flex flex-row align-items-center mb-4">
                        <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                        <div class="form-outline flex-fill mb-0">
                          <input type="password" id="form3Example4c" class="form-control" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required />

                        </div>
                      </div>

                      <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                        <button name="submit" class="btn btn-primary custom-btn-2">Login</button>
                      </div>
                      <p class="login-register-text">Don't have an account? <a href="register.php">Register Here</a>.</p>

                    </form>

                  </div>
                  <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                    <img src="assets/images/img-1.svg" class="img-fluid" alt="Sample image">

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</body>

</html>