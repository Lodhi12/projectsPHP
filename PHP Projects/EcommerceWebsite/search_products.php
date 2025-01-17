<?php
    include('includes/connect.php');
    include('functions/common_functions.php');
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial scale=1.0">
        <title>Ecommerce website</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
        <link rel="stylesheet" href="stylesheet.css">
        
    </head>
    <body>
        <div class="container-fluid p-0">
            <nav class="navbar navbar-expand-lg bg-info">
                <div class="container-fluid">
                    <img src="./images/logo.png" class="logo">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="/">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Products</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="./users_area/user_registration.php">Register</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Contact</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#"><i class="fa-solid fa-cart-shopping"></i><sup>1</sup></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Total Price: <?php total_cart_price();?>/-</a>
                            </li>
                        </ul>
                        <form class="d-flex" method="get" action="search_products.php">
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data_product">
                            <input type="submit" class="btn btn-outline-light" value="Search">
                        </form>

                  </div>
                </div>
            </nav>

            <?php
                cart();
            ?>
            <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
                <ul class="navbar-nav me-auto">
                    <?php
                    
                        if(!isset($_SESSION['username'])){
                            echo "<li class = 'nav-item'>
                            <a class = 'nav-link' href = '#'>Welcome Guest</a>
                            </li>";
                        }
                        else{
                            echo "<li class = 'nav-item'>
                            <a class = 'nav-link' href = '#'>Welcome ".$_SESSION['username']."</a>
                            </li>";
                        }
                        if(!isset($_SESSION['username'])){
                            echo "<li class = 'nav-item'>
                            <a class = 'nav-link' href = './users_area/user_login.php'>Login</a>
                            </li>";
                        }
                        else{
                            echo "<li class = 'nav-item'>
                            <a class = 'nav-link' href = './users_area/logout.php'>Logout</a>
                            </li>";
                        }
                    ?>
                </ul>
            </nav>
            <div class="bg-light">
                <h3 class="text-center">Ecommerce Store</h3>
                <p class="text-center">Communications are at the heart of e-commerce and community</p>
            </div>

            <div class="row px-1">
                <div class="col-md-10">
                    <div class="row">

                    <!--Fetching Data -->
                        <?php 
                            search_product();
                            get_unique_cat();
                            get_unique_brands();
                        ?>
                        
                    </div>
                </div>
                <div class="col-md-2 bg-secondary p-0">
                    <ul class="navbar-nav me-auto text-center">
                        <li class="nav-item bg-info">
                            <a href="#" class="nav-link text-light"><h4>Delivery Brands</a></h4>
                        </li>
                        <!--Fetching data from database to display it on the homepage-->
                        <?php 
                            getBrands();
                        ?>
                    </ul>
                    <ul class="navbar-nav me-auto text-center">
                        <li class="nav-item bg-info">
                            <a href="#" class="nav-link text-light"><h4>Categories</a></h4>
                        </li>
                        <?php 
                            getCategories();
                        ?>
                    </ul>

                </div>
            </div>
            


        <div class="bg-info p-3 text-center">
            <p>All rights reserved 2024</p>
        </div>      
        </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    </body>
</html>