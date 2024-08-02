<?php
    include('../includes/connect.php');
    include('../functions/common_functions.php');
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
    <style>
        body {
            overflow-x: hidden;
        }
    </style>
</head>
<body>
    <div class="container-fluid m-3">
        <h2 class="text-center mb-5">Admin Login</h2>
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
                        <label for="admin_email" class="form-label">Admin Email</label>
                        <input type="email" id="admin_email" name="admin_email" placeholder="Enter your email" required="required" class="form-control">
                    </div>
                    <div class="form-outline mb-4">
                        <label for="admin_password" class="form-label">Admin Password</label>
                        <input type="password" id="admin_password" name="admin_password" placeholder="Enter your password" required="required" class="form-control">
                    </div>
                    <div>
                        <input type="submit" class="bg-info py-2 px-3 border-0" name="admin_login" value="Login">
                        <p class="small fw-bold mt-2 pt-1">Don't have an account? <a href="admin_registration.php" class="link-danger">Register</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>

<?php
    if (isset($_POST['admin_login'])) {
        $admin_name = mysqli_real_escape_string($con, $_POST['admin_name']);
        $admin_email = mysqli_real_escape_string($con, $_POST['admin_email']);
        $admin_password = $_POST['admin_password'];
        
        $select_query = "SELECT * FROM admin_table WHERE admin_email = '$admin_email' AND admin_name = '$admin_name'";
        $result = mysqli_query($con, $select_query);
        $row_count = mysqli_num_rows($result);
        
        if ($row_count == 1) {
            $row_data = mysqli_fetch_assoc($result);
            if (password_verify($admin_password, $row_data['admin_password'])) {
                $_SESSION['admin_name'] = $admin_name;
                echo "<script>alert('Login Successful!')</script>";
                echo "<script>window.open('index.php','_self')</script>";
            } else {
                echo "<script>alert('Incorrect password!')</script>";
            }
        } else {
            echo "<script>alert('Admin not found!')</script>";
        }
    }
?>
