<?php
    include('../includes/connect.php');
    include('../functions/common_functions.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
    <style>
        body{
            overflow-x: hidden;
        }
    </style>

</head>
<body>
    <div class="container-fluid m-3">
        <h2 class="text-center mb-5">Admin Registration</h2>
        <div class="row d-flex justify-content-center">
            <div class="col-lg-6 col-xl-5">
                <img src="../images/adminreg.jpeg" alt="Admin Registration" class="img-fluid">
            </div>
            <div class="col-lg-6 col-xl-4">
                <form action="" method="post">
                    <div class="form-outline mb-4">
                        <label for="admin_name" class="form-label">Admin Name</label>
                        <input type="text" id="admin_name" name="admin_name" placeholder="Enter your name" required="required" class="form-control">
                    </div>
                    <div class="form-outline mb-4">
                        <label for="admin_email" class="form-label">Email</label>
                        <input type="text" id="admin_email" name="admin_email" placeholder="Enter your email" required="required" class="form-control">
                    </div>
                    <div class="form-outline mb-4">
                        <label for="admin_password" class="form-label">Password</label>
                        <input type="password" id="admin_password" name="admin_password" placeholder="Enter your password" required="required" class="form-control">
                    </div>
                    <div class="form-outline mb-4">
                        <label for="admin_conf_password" class="form-label">Confirm Password</label>
                        <input type="password" id="admin_conf_password" name="admin_conf_password" placeholder="Confirm Password" required="required" class="form-control">
                    </div>
                    <div>
                        <input type="submit" class="bg-info py-2 px-3 border-0" name="admin_register" value="Register">
                        <p class="small fw-bold mt-2 pt-1">Do you already have an account? <a href="admin_login.php" class="link-danger">Login</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
<?php
    if (isset($_POST['admin_register'])) {
        $admin_name = $_POST['admin_name'];
        $admin_email = $_POST['admin_email'];
        $admin_password = $_POST['admin_password'];
        $hash_password = password_hash($admin_password, PASSWORD_DEFAULT);
        $admin_conf_password = $_POST['admin_conf_password'];
    
        // Check if the provided admin name and email match the allowed admin
        if ($admin_name != 'Ammar' || $admin_email != 'ammarlodhi@live.com') {
            echo "<script>alert('You cannot register as admin')</script>";
        } else {
            // Check if Ammar is already registered
            $select_query = "SELECT * FROM admin_table WHERE admin_name = 'Ammar' AND admin_email = 'ammarlodhi@live.com'";
            $result = mysqli_query($con, $select_query);
            $rows_count = mysqli_num_rows($result);
    
            if ($rows_count > 0) {
                echo "<script>alert('Ammar is already registered as admin!')</script>";
                echo"<script>window.open('admin_login.php')</script>";
            } else if ($admin_password != $admin_conf_password) {
                echo "<script>alert('Passwords do not match')</script>";
            } else {
                // Insert Ammar as admin into the database
                $insert_query = "INSERT INTO admin_table (admin_name, admin_email, admin_password) VALUES ('$admin_name', '$admin_email', '$hash_password')";
                $sql_execute = mysqli_query($con, $insert_query);
    
                if ($sql_execute) {
                    echo "<script>alert('Admin registered successfully!')</script>";
                    echo"<script>window.open('admin_login.php')</script>";
                } else {
                    echo "<script>alert('Registration failed!')</script>";
                }
            }
        }
    }
    
?>