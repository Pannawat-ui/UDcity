<?php
require('./connect.php');
$product_name = $_POST['product_name'];
$detail = $_POST['detail'];
$price = $_POST['price'];
$village_id = $_POST['village_id'];

$sql = "SELECT * FROM products";
$qry = $conn->query($sql);
$row = mysqli_num_rows($qry);

$filename = $row."_pic.png";
move_uploaded_file($_FILES['img']['tmp_name'], '../product_img/'.$filename);


$sql = "INSERT INTO products(product_id, product_name, details, price, product_img, village_id) VALUES(NULL,'$product_name','$detail','$price','$filename',$village_id)";
$conn->query($sql);

header('location:../product_info.php');

?>