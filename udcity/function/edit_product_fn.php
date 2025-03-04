<?php
require('./connect.php');
$id = $_POST['id'];

$product_name = $_POST['product_name'];
$detail = $_POST['detail'];
$price = $_POST['price'];
$village_id = $_POST['village_id'];

$sql = "SELECT * FROM products WHERE product_id = '$id'";
$qry = $conn->query($sql);
$row = mysqli_fetch_assoc($qry);

if(isset($_FILES['img'])){

$filename = $row['product_img'];
move_uploaded_file($_FILES['img']['tmp_name'], '../product_img/'.$filename);

$sql = "UPDATE products SET product_name='$product_name',details='$detail',price='$price ',product_img='$filename',village_id='$village_id' WHERE '$id'";
$conn->query($sql);

header('location:../product_info.php');
}else{
$sql = "UPDATE products SET product_name='$product_name',details='$detail',price='$price ',village_id='$village_id' WHERE '$id'";
$conn->query($sql);
}
?>