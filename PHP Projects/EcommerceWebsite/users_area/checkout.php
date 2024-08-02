<?php
    include('../includes/connect.php');
    @session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial scale=1.0">
        <title>Ecommerce website - Checkout</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
        <link rel="stylesheet" href="stylesheet.css">
        <style>
            .logo{
                width: 7%;
                height: 7%;
            }
        </style>    
    </head>
    <body>
        <div class="container-fluid p-0">
            <nav class="navbar navbar-expand-lg bg-info">
                <div class="container-fluid">
                    <img src="../images/logo.png" class="logo">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="../display_all.php">Products</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="user_registration.php">Register</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Contact</a>
                            </li>
                            
                        </ul>
                    <form class="d-flex" method="get" action="search_products.php">
                      <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                      <input type="submit" class="btn btn-outline-light" name="search_data_product" value="Search">
                    </form>
                  </div>
                </div>
            </nav>
            
            <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Welcome Guest</a>
                    </li>
                    <?php
                        if(!isset($_SESSION['username'])){
                            echo"   <li class='nav-item'>
                                        <a class='nav-link' href='./user_login.php'>Login</a>
                                    </li>";
                        }
                        else{
                            echo"   <li class='nav-item'>
                                        <a class='nav-link' href='logout.php'>Logout</a>
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
                <div class="col-md-12">
                    <div class="row">
                        <?php 
                            if(!isset($_SESSION['username'])){
                                include('user_login.php');
                            }
                            else{
                                include('payment.php');
                            }
                        ?>
                        
                    </div>
                </div>
                
            </div>
            


        <?php 
            include('../includes/footer.php');    
        ?>     
        </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    </body>
</html>