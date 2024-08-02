<header class="header">
    <div class="header_body">
        <a href="index.php" class="logo">TechnoBling</a>
        <nav class="navbar">
            <a href="index.php">Add Products</a>
            <a href="view_products.php">View Products</a>
            <a href="shop_products.php">Shopit</a>
        </nav>

        <?php
            $select_product = "SELECT * FROM cart";
            $result_product = mysqli_query($conn,$select_product);
            $row_count = mysqli_num_rows($result_product);
        ?>

        <a href="cart.php" class="cart"><i class="fa-solid fa-cart-shopping"></i><span><sup><?php echo $row_count?></sup></span></a>
            <!--<div id="menu-btn" class="fas fa-bars"></div>-->
    </div>
</header>