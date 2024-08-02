<?php
    include ('connect.php');
    if (isset($_GET['deleteid'])){
        $id = $_GET['deleteid'];
        $sql = "DELETE FROM crud WHERE id = $id";
        $result = mysqli_query($con,$result);
        if($result){
            //echo "Deleted Successfully!";
            header('location:display.php');
        }
        else{
            die(mysqli_error($con));
        }
    }
?>