<?php
// session_start();

$database_name = "product_details";
$mysqli = new mysqli('localhost', 'root', '', $database_name) or die(mysqli_error($mysqli));
$id = 0;
$update = false;
$name = '';
$image = '';
$price = '';

if (isset($_POST['save'])) {
    $name = $_POST['pname'];
    $image = $_POST['image'];
    $price = $_POST['price'];
    $mysqli->query("INSERT INTO product(pname,image,price) VALUES('$name','$image','$price')") or
        die($mysqli->error);
    $_SESSION['message'] = "Product Added Succesfully";
    $_SESSION['msg_type'] = "sucesss";
    header("location:admin.php");
}
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $mysqli->query("DELETE FROM product WHERE id=$id") or die($mysqli->error);
    $_SESSION['message'] = "Product Deleted Successfully";
    $_SESSION['msg_type'] = "danger";
    header("location:admin.php");
}
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $update = true;
    $result = $mysqli->query("SELECT * FROM product WHERE id=$id") or die($mysqli->error);
    if ($result) {
        $row = $result->fetch_array();
        $name = $row['pname'];
        $image = $row['image'];
        $price = $row['price'];
    }
}
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['pname'];
    $image = $_POST['image'];
    $price = $_POST['price'];

    $mysqli->query("UPDATE product SET pname='$name',image='$image',price='$price' WHERE id=$id") or die($mysqli->error);
    header('location:admin.php');
}
