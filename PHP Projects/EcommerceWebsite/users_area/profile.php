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
    <title>Welcome <?php echo $_SESSION['username']?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../stylesheet.css">
    <style>
        body{
            overflow-x: hidden;
        }
        .profile_img{
            width: 90%;
            margin: auto;
            display: block;
            height: 100%;
            object-fit: contain;
        }
        .edit_img{
            width: 100px;
            height: 100px;
            object-fit: contain;
        }
    </style>
</head>
<body>
    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg navbar-light bg-info">
            <div class="container-fluid">
                <img src="../images/logo.png" alt="" class="logo">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a href="../index.php" class="nav-link active" aria-current="page">Home</a>
                        </li>
                        <li class="nav-item">
                            <a href="../display_all.php" class="nav-link" aria-current="page">Products</a>
                        </li>
                        <li class="nav-item">
                            <a href="profile.php" class="nav-link" aria-current="page">My Account</a>
                        </li>
                        <li class="nav-item">
                            <a href="../index.php" class="nav-link" aria-current="page">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a href="../cart.php" class="nav-link"><i class="fa-solid fa-cart-shopping"></i><sup><?php cart_items();?></sup></a>
                        </li>
                        <li class="nav_item">
                            <a class="nav-link" href="#">Total Price: <?php total_cart_price();?>/-</a>
                        </li>
                    </ul>
                    <form class="d-flex" action="../search_product.php" method="get">
                        <input class="form-control me-2" type="search" placeholder="Search" class="btn btn-outline-light" name="search_data_product">
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
                        echo "  <li class = 'nav-item'>
                                    <a class = 'nav-link' href = '#'>Welcome Guest</a>
                                </li>";
                    }
                    else{
                        echo "  <li class = 'nav-item'>
                                    <a class = 'nav-link' href = '#'> Welcome ".$_SESSION['username']."</a>
                                </li>";
                    }
                    if(!isset($_SESSION['username'])){
                        echo "  <li class = 'nav-item'>
                                    <a class = 'nav-link' href = './users_area/user_login.php'>Login</a>
                                </li>";
                    }
                    else{
                        echo "  <li class = 'nav-item'>
                                    <a class = 'nav-link' href = './users_area/logout.php'>Logout</a>
                                </li>";
                    }
                ?>
            </ul>
        </nav>
        <div class="bg-light">
            <h3 class="text-center">Hidden Store</h3>
            <p class="text-center">Communication is at the heart of e-commerce and community</p>
        </div>
        <div class="row">
            <div class="col-md-2">
                <ul class="navbar-nav bg-seconday text-center" style="height:100vh">
                    <li class="nav-item bg-info">
                        <a href="#" class="nav-link text-light"><h4>Your Profile</h4></a>
                    </li>
                    <?php
                        $username = $_SESSION['username'];
                        $user_image = "SELECT * FROM user_table WHERE username = '$username'";
                        $result_image = mysqli_query($con,$user_image);
                        $row_image = mysqli_fetch_array($result_image);
                        $user_image = $row_image['user_image'];
                        echo "  <li class='nav-item bg-info'>
                                    <img src='./user_images/$user_image' alt='' class='profile_img'>
                                </li>";
                    ?>
                        
                    <li class="nav-item bg-info">
                        <a href="profile.php?orders" class="nav-link text-light">Pending Orders</a>
                    </li>
                    <li class="nav-item bg-info">
                        <a href="profile.php?edit_account" class="nav-link text-light">Edit Account</a>
                    </li>
                    <li class="nav-item bg-info">
                        <a href="profile.php?my_orders" class="nav-link text-light">My Orders</a>
                    </li>
                    <li class="nav-item bg-info">
                        <a href="profile.php?delete_account" class="nav-link text-light">Delete Account</a>
                    </li>
                    <li class="nav-item bg-info">
                        <a href="logout.php" class="nav-link text-light">Logout</a>
                    </li>
                        
                </ul>
            </div>
                <div class="col-md-10 text-center">
                    <?php get_user_order_details();
                    if(isset($_GET['edit_account'])){
                        include('edit_account.php');
                    }
                    if(isset($_GET['my_orders'])){
                        include('user_orders.php');
                    }
                    if(isset($_GET['delete_account'])){
                        include('delete_account.php');
                    }
                    if(isset($_GET))
                    ?>
                </div>
            </div>
            <?php
                include("../includes/footer.php");
            ?>
        </div>
    </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>