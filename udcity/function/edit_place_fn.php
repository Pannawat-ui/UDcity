<?php
    require('./connect.php');
    $id = $_REQUEST['id'];
    $t_id = $_REQUEST['t_id'];
    $sql = "SELECT * FROM places WHERE place_id = '$id' ";
    $qry = $conn->query($sql);
    $row = mysqli_fetch_assoc($qry);
    


    $place_name = $_POST['place_name'];
    $latitude = $_POST['latitude'];
    $longitude = $_POST['longitude'];
    $details = $_POST['details'];
    $type_id = $_POST['type_id'];
    $village_id = $_POST['village_id'];

    if(isset($_FILES['img'])){

    $filename = $row['place_img'];
    move_uploaded_file($_FILES['img']['tmp_name'], '../place_img/'.$filename);

    $sql = "UPDATE places SET place_name = '$place_name',latitude = '$latitude',longitude = '$longitude', details = '$details', place_img = '$filename', type_id = '$type_id', village_id = '$village_id' WHERE place_id = '$id' ";
    $conn->query($sql);

    header('location:../admin_info_thumbon.php?id='.$t_id);

    }else{
        $sql = "UPDATE places SET place_name = '$place_name',latitude = '$latitude',longitude = '$longitude', details = '$details',  type_id = '$type_id', village_id = '$village_id' WHERE place_id = '$id' ";
        $conn->query($sql);
    
        header('location:../admin_info_thumbon.php?id='.$t_id);
    }

    echo $t_id;

    

?>