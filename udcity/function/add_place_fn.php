<?php
    require('./connect.php');
    $id = $_REQUEST['id'];

    $sql = "SELECT * FROM places";
    $qry = $conn->query($sql);
    $row = mysqli_num_rows($qry);
    


    $place_name = $_POST['place_name'];
    $latitude = $_POST['latitude'];
    $longitude = $_POST['longitude'];
    $details = $_POST['details'];
    $type_id = $_POST['type_id'];
    $village_id = $_POST['village_id'];

    $filename = $row."_pic.png";
    move_uploaded_file($_FILES['img']['tmp_name'], '../place_img/'.$filename);

    $sql = "INSERT INTO places (place_id, place_name, latitude, longitude, details, place_img , type_id, village_id)VALUES(NULL,'$place_name','$latitude','$longitude','$details ','$filename','$type_id ','$village_id')";
    $conn->query($sql);

    header('location:../admin_info_thumbon.php?id='.$id);

  

    

?>