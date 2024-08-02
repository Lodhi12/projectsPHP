<?php 
    include ("connection.php");
    $name = $_POST['name'];
    $mobile = $_POST['mobile'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $address = $_POST['address'];
    $image = $_FILES['name']['photo'];
    $tmp_name = $$_FILES['tmp_name']['photo'];
    $role = $_POST['role'];
    
    if($password==$cpassword){
        move_uploaded_file($tmp_namem,"../uploads/$image");
        $insert = mysqli_query($connect, "INSERT INTO user(name, mobile, address, password, photo, role, status, votes) VALUES ('$name', '$mobile',' '$address', '$password', '$image', '$role',0,0)");
        if ($insert){
            echo'
            <script>
                alert("Registration Successful");
                window.location="login.html";
            </script>
            ';}
        else{
            echo'
            <script>
                alert("Some error occured!");
                window.location="register.html";
            </script>'
            ;}    
        }
    else{
        echo'
            <script>
                alert("Password and confirm password do not match");
                window.location="register.html";
            </script>
        ';
    }

?>