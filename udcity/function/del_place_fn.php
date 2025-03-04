<?php
    require('./connect.php');
    $place_id = $_REQUEST['place_id'];
    $t_id = $_REQUEST['t_id'];

    $sql = "DELETE FROM places WHERE place_id = '$place_id'";
    $conn->query($sql);

    header('location:../admin_info_thumbon.php?id='.$t_id);
    
    ?>