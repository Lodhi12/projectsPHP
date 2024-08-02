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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecommerce website</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="stylesheet.css">
    <style>
        .cart_img{
            width: 50px;
            height: 50px;
            object-fit: contain;
        }
    </style>
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
                            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="display_all.php">Products</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./users_area/user_registration.php">Register</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"></i><sup><?php cart_items();?></sup></a>
                        </li>
                    </ul>
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
                        echo "<li class='nav-item'>
                        <a class='nav-link' href='#'>Welcome Guest</a>
                        </li>";
                    }
                    else{
                        echo "<li class='nav-item'>
                        <a class='nav-link' href='#'>Welcome ".$_SESSION['username']."</a>
                        </li>";
                    }

                    if(!isset($_SESSION['username'])){
                        echo "<li class='nav-item'>
                        <a class='nav-link' href='./users_area/user_login.php'>Login</a>
                        </li>";
                    }
                    else{
                        echo "<li class='nav-item'>
                        <a class='nav-link' href='./users_area/logout.php'>Logout</a>
                        </li>";
                    }
                ?>
            </ul>
        </nav>
        <div class="bg-light">
            <h3 class="text-center">Ecommerce Store</h3>
            <p class="text-center">Communications are at the heart of e-commerce and community</p>
        </div>

        <div class="container">
            <div class="row">
                <form action="" method="post">
                    <table class="table table-bordered text-center">
                        <thead>
                            <tr>
                                <th>Product Title</th>
                                <th>Product Image</th>
                                <th>Quantity</th>
                                <th>Product Price</th>
                                <th>Remove</th>
                                <th colspan='2'>Operations</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $total_price = 0;
                                $get_ip_add = $_SERVER['REMOTE_ADDR'];
                                $cart_query = "SELECT * FROM cart_details WHERE ip_address = '$get_ip_add'";
                                $result_query = mysqli_query($con, $cart_query);
                                if(mysqli_num_rows($result_query) > 0){
                                    while ($row = mysqli_fetch_assoc($result_query)){
                                        $product_id = $row['product_id'];
                                        $select_product = "SELECT * FROM products WHERE product_id = $product_id";
                                        $result_product = mysqli_query($con, $select_product);
                                        if($result_product && mysqli_num_rows($result_product) > 0){
                                            $row_product = mysqli_fetch_assoc($result_product);
                                            $product_title = $row_product['product_title'];
                                            $product_image1 = $row_product['product_image1'];
                                            $price_table = $row_product['product_price'];
                                            $quantity = $row['quantity'];
                                            $total_price += $price_table * $quantity;
                            ?>
                            <tr>
                                <td><?php echo $product_title; ?></td>
                                <td><img src="./admin_area/product_images/<?php echo $product_image1; ?>" class="cart_img"></td>
                                <td><input type="text" name="qty[<?php echo $product_id; ?>]" class="form-input w-50" value="<?php echo $quantity; ?>"></td>
                                <td><?php echo $price_table; ?>/-</td>
                                <td><input type="checkbox" name="removeitem[]" value="<?php echo $product_id; ?>"></td>
                                <td>
                                    <input type="submit" name="update_cart" value="Update Cart" class="bg-info px-3 py-2 border-0 mx-3">
                                    <input type="submit" name="remove_cart" value="Remove Cart" class="bg-info px-3 py-2 border-0 mx-3">
                                </td>
                            </tr>
                            <?php
                                        }
                                    }
                                } else {
                                    echo "<tr><td colspan='6' class='text-center text-danger'>Cart is empty</td></tr>";
                                }
                            ?>
                        </tbody>
                    </table>
                    <div class="d-flex mb-5">
                        <?php
                            if(mysqli_num_rows($result_query) > 0){
                                echo "<h4 class='px-3'>
                                        Subtotal: <strong class='text-info'>$total_price</strong>
                                    </h4>
                                    <input type='submit' value='Continue Shopping' class='bg-info px-3 py-2 border-0 mx-3' name='continue_shopping'>
                                    <button class='bg-secondary px-3 py-2 border-0 text-light'><a href='./users_area/checkout.php' class='text-light text-decoration-none'>Checkout</a></button>";
                            } else {
                                echo "<input type='submit' value='Continue Shopping' class='bg-info px-3 py-2 border-0 mx-3' name='continue_shopping'>";
                            }
                            if(isset($_POST['continue_shopping'])){
                                echo "<script>window.open('index.php','_self')</script>";
                            }
                        ?>
                    </div>
                </form>
                <?php 
                    function remove_cart_item(){
                        global $con;
                        if(isset($_POST['remove_cart']) && isset($_POST['removeitem'])){
                            foreach ($_POST['removeitem'] as $remove_id){
                                $delete_query = "DELETE FROM cart_details WHERE product_id = $remove_id";
                                $run_delete = mysqli_query($con, $delete_query);
                                if($run_delete){
                                    echo "<script>window.open('cart.php','_self')</script>";
                                } else {
                                    echo "Error removing item: " . mysqli_error($con);
                                }
                            }
                        }
                    }
                    remove_cart_item();

                    if(isset($_POST['update_cart']) && isset($_POST['qty'])){
                        foreach($_POST['qty'] as $product_id => $quantity){
                            $update_query = "UPDATE cart_details SET quantity = $quantity WHERE product_id = $product_id AND ip_address = '$_SERVER[REMOTE_ADDR]'";
                            $result_update = mysqli_query($con, $update_query);
                            if(!$result_update){
                                echo "Error updating cart: " . mysqli_error($con);
                            }
                        }
                        // Redirect to prevent resubmission on refresh
                        echo "<script>window.location = 'cart.php';</script>";
                    }
                ?>
            </div>
        </div>
    </div>
    <?php 
        include('includes/footer.php');    
    ?>     
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
