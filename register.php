<?php

include 'config.php';

error_reporting(0);

session_start();

if (isset($_SESSION['username'])) {
  header("Location: index.php");
}

if (isset($_POST['submit'])) {
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = md5($_POST['password']);
  $cpassword = md5($_POST['cpassword']);

  if ($password == $cpassword) {
    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $sql);
    if (!$result->num_rows > 0) {
      $sql = "INSERT INTO users (username, email, password)
					VALUES ('$username', '$email', '$password')";
      $result = mysqli_query($conn, $sql);
      if ($result) {
        echo "<script>alert('Wow! User Registration Completed.')</script>";
        echo "<script>location.href='login.php'</script>";
        $username = "";
        $email = "";
        $_POST['password'] = "";
        $_POST['cpassword'] = "";
      } else {
        echo "<script>alert('Woops! Something Wrong Went.')</script>";
      }
    } else {
      echo "<script>alert('Woops! Email Already Exists.')</script>";
    }
  } else {
    echo "<script>alert('Password Not Matched.')</script>";
  }
}

?>

<!DOCTYPE html>
<html>

<head>
  <meta name="description" content="Satodhru Das, Developer, satodhrunondon@gmail.com">
  <meta name="keywords" content="Satodhru Das, Front End Developer, satodhrunondon@gmail.com">
  <meta name="developer" content="Satodhru Das">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Luxury Living || Register</title>

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

                    <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign up</p>

                    <form action="" method="POST" class="mx-1 mx-md-4 login-email">

                      <div class="d-flex flex-row align-items-center mb-4">
                        <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                        <div class="form-outline flex-fill mb-0">
                          <input type="text" id="form3Example1c" placeholder='Your Name' class="form-control" name="username" value="<?php echo $username; ?>" required />

                        </div>
                      </div>

                      <div class="d-flex flex-row align-items-center mb-4">
                        <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                        <div class="form-outline flex-fill mb-0">
                          <input type="email" id="form3Example3c" placeholder='Your Email' class="form-control" name="email" value="<?php echo $email; ?>" required />
                        </div>
                      </div>

                      <div class="d-flex flex-row align-items-center mb-4">
                        <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                        <div class="form-outline flex-fill mb-0">
                          <input type="password" id="form3Example4c" placeholder='Password' class="form-control" name="password" value="<?php echo $_POST['password']; ?>" required />
                        </div>
                      </div>

                      <div class="d-flex flex-row align-items-center mb-4">
                        <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                        <div class="form-outline flex-fill mb-0">
                          <input type="password" id="form3Example4cd" placeholder='Confirm Password' class="form-control" name="cpassword" value="<?php echo $_POST['cpassword']; ?>" required />

                        </div>
                      </div>

                      <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                        <button name="submit" class="btn btn-primary custom-btn-2">Register</button>
                      </div>
                      <p class="login-register-text">Have an account? <a href="login.php">Login Here</a>.</p>

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