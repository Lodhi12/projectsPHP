<?php
    include ('connect.php');
    if(isset($_GET['delete'])){
        $delete_id = $_GET['delete'];
        $delete_query = "DELETE FROM products WHERE id = $delete_id";
        $result_query = mysqli_query($conn,$delete_query);
        if ($delete_query){
            header('location:view_products.php');
        }
        else{
            echo "Product is not deleted";
            header('location:view_products.php');
        }
    }
?>