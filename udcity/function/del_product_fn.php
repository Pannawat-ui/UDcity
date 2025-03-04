<?php
    require('./connect.php');
    $product_id = $_REQUEST['product_id'];

    $sql = "DELETE FROM products WHERE product_id = '$product_id'";
    $conn->query($sql);

    header('location:../product_info.php');
    
    ?>