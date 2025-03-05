    <?php
session_start();
require('./connect.php');

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM admins WHERE username = '".$username."' ";
$qry = $conn->query($sql);
$res = mysqli_fetch_array($qry);




if($res['username'] == $username ){
if($password == $res['password'] ){
    $_SESSION['user_id'] = $res['user_id'];
    $_SESSION['username'] = $res['username'];
    $_SESSION['fname'] = $res['fname'];

    $ip_address = $_SERVER['REMOTE_ADDR'];
    $user_agent = $_SERVER['HTTP_USER_AGENT'];
    $time = date("Y-m-d")." ".date("h:i:sa");

    $sql_log = "INSERT INTO login_logs VALUES (NULL, '".$res['user_id']."', '$ip_address', '$user_agent', '$time')";
    $conn->query($sql_log);


    header('location:../homepage.php');
    
}else{
    header('location:../index.php?msg=รหัสผ่านไม่ถูกต้อง');
}
}else{
    header('location:../index.php?msg=ไม่พบบัญชีผู้ใช้');
}
?>