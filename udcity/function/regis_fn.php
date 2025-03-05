<?php
require('./connect.php');

$username = $_POST['username'];
$fname = $_POST['fname'];
$password = $_POST['password'];
$c_password = $_POST['c_password'];

    if($password == $c_password ){
        $sql = "INSERT INTO admins VALUES('','".$username."','".$fname."','".$password."')";
        $conn->query($sql);
        header('location:../index.php?msg=สมัครสมาชิกสำเร็จ');
    }else{
        header('location:../register.php?msg=รหัสผ่านไม่ตรงกัน');
    }
?>