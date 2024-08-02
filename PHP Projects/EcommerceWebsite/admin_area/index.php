<?php
    include('../includes/connect.php');
    include('../functions/common_functions.php');
    session_start();

    // Check if admin is logged in and get the admin name
    if (isset($_SESSION['admin_name'])) {
        $admin_name = $_SESSION['admin_name'];
    } else {
        // If not logged in, redirect to login page
        header('Location: admin_login.php');
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial scale=1.0">
        <title>Admin Dashboard</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="../stylesheet.css">  
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
        <style>
            .admin_img{
                width: 100px;
                object-fit: contain;
            }
            .footer{
                position: absolute;
                bottom: 0;
            }
            body{
                overflow-x: hidden;
            }
            .product_img{
                width: 100px;
                object-fit: contain;
            }
        </style>
    </head>
    <body>
        <div class="container-fluid p-0">
            <nav class="navbar navbar-expand-lg navbar-light bg-info">
                <div class="container-fluid">
                    <img src="../images/logo.png" alt="" class="logo">
                    <nav class="navbar navbar-expand-lg">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a href="#" class="nav-link">Welcome <?php echo $admin_name; ?></a>
                            </li>   
                        </ul>
                    </nav>
                </div>
            </nav>

            <div class="bg-light">
                <h3 class="text-center p-2">Manage Details</h3>
            </div>

            <div class="row d-flex align-items-center">
                <div class="col-md-12 bg-secondary p-1">
                    <div class="p-3 text-center">
                        <img src="../images/adminreg.jpeg" class="admin_img" alt="Admin Image">
                        <p class="text-light"><?php echo $admin_name; ?></p>                    
                    </div>
                    <div class="button text-center">
                        <button class="my-3"><a href="insert_product.php" class="nav-link text-light bg-info my-1">Insert Products</a></button>
                        <button><a href="index.php?view_products" class="nav-link text-light bg-info my-1">View Products</a></button>
                        <button><a href="index.php?insert_category" class="nav-link text-light bg-info my-1">Insert Categories</a></button>
                        <button><a href="index.php?view_categories" class="nav-link text-light bg-info my-1">View Categories</a></button>
                        <button><a href="index.php?insert_brand" class="nav-link text-light bg-info my-1">Insert Brands</a></button>
                        <button><a href="index.php?view_brands" class="nav-link text-light bg-info my-1">View Brands</a></button>
                        <button><a href="index.php?list_orders" class="nav-link text-light bg-info my-1">All orders</a></button>
                        <button><a href="index.php?list_payments" class="nav-link text-light bg-info my-1">All payments</a></button>
                        <button><a href="index.php?list_users" class="nav-link text-light bg-info my-1">List users</a></button>
                        <button><a href="index.php?admin_logout" class="nav-link text-light bg-info my-1">Logout</a></button>
                    </div>
                </div>
            </div>
            <div class="container my-3">
                <?php 
                    if (isset($_GET['insert_product'])){
                        include('insert_product.php');
                    }
                    if (isset($_GET['insert_category'])){
                        include('insert_categories.php');
                    }
                    if (isset($_GET['insert_brand'])){
                        include('insert_brands.php');
                    }
                    if (isset($_GET['view_products'])){
                        include('view_products.php');
                    }
                    if (isset($_GET['edit_products'])){
                        include('edit_products.php');
                    }
                    if (isset($_GET['delete_products'])){
                        include('delete_products.php');
                    }
                    if (isset($_GET['view_categories'])){
                        include('view_categories.php');
                    }
                    if (isset($_GET['view_brands'])){
                        include('view_brands.php');
                    }
                    if (isset($_GET['edit_category'])){
                        include('edit_category.php');
                    }
                    if (isset($_GET['edit_brand'])){
                        include('edit_brand.php');
                    }
                    if (isset($_GET['delete_category'])){
                        include('delete_category.php');
                    }
                    if (isset($_GET['delete_brand'])){
                        include('delete_brand.php');
                    }
                    if (isset($_GET['list_orders'])){
                        include('list_orders.php');
                    }
                    if (isset($_GET['list_payments'])){
                        include('list_payments.php');
                    }
                    if (isset($_GET['list_users'])){
                        include('list_users.php');
                    }
                    if (isset($_GET['admin_logout'])){
                        include('admin_logout.php');
                    }
                ?>
            </div>
            <?php
                include('../includes/footer.php')
            ?>
        </div>
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>
</html>
