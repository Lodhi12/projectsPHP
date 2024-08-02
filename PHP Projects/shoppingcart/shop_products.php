<?php
    include ('connect.php');
    if(isset($_POST['add_to_cart'])){
        $product_name = $_POST['product_name'];
        $product_price = $_POST['product_price'];
        $product_image = $_POST['product_image'];
        $product_quantity = 1;

        //select cart data based on a condition

        $select_cart = "SELECT * FROM cart WHERE name = '$product_name'";
        $result_cart = mysqli_query($conn,$select_cart);
        if (mysqli_num_rows($result_cart)>0){
            $display_message[] = "Product has already been added to the cart";
        }
        else{
            $insert_query = "INSERT INTO cart (name,price,image,quantity) VALUES ('$product_name','$product_price','$product_image','$product_quantity')";
            $result_insert = mysqli_query($conn,$insert_query);
            $display_message[] = "Product has been added to the cart";
        }

        //insert cart data into cart table
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop Products</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <?php
        include ('header.php')
    ?>
  
        
    <div class="container">
    <?php if (isset($display_message)){
        foreach ($display_message as $display_message){

        echo "  <div class='display_message'>
                    <span>$display_message</span>
                    <i class='fas fa-times' onclick='this.parentElement.style.display = `none`';></i>
                </div>";
            }
        }
        ?>
        <section class="products">
            <h1 class="heading">Let's Shop</h1>
            <div class="product_container">
                <?php
                    $select_query = "SELECT * FROM products";
                    $result_select = mysqli_query($conn,$select_query);
                    if (mysqli_num_rows($result_select)>0){
                        while($fetch_product = mysqli_fetch_assoc($result_select)){
                            ?>
                            <form action="" method="post">
                                <div class="edit_form">
                                    <img src="images/<?php echo $fetch_product['image']?>" alt="">
                                    <h3><?php echo $fetch_product['name']?></h3>
                                        <div class="price">Price: <?php echo $fetch_product['price']?> </div>
                                            <input type="hidden" name="product_name" value="<?php echo $fetch_product['name']?>">
                                            <input type="hidden" name="product_price" value="<?php echo $fetch_product['price']?>">
                                            <input type="hidden" name="product_image" value="<?php echo $fetch_product['image']?>">
                                            <input type="submit" class="submit_btn cart_btn" value="Add to Cart" name="add_to_cart">
                                </div>
                            </form>
                            <?php
                        }
                    }else{
                        echo "<div class='empty_text'>No Products Available</div>";
                    }
                ?>
                
            </div>
        </section>
    </div>
</body>
</html>