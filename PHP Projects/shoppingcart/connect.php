<?php
    $conn = mysqli_connect('localhost', 'root', '', 'myshopping_cart');
    if(!$conn){
        die(mysqli_error($conn));
    }
?>