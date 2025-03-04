<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "udcity_db";

$conn = mysqli_connect($host,$user,$pass,$db);

if(!$conn){
    die("err" .mysqli_connect_error());
}
date_default_timezone_set("America/New_York");

?>