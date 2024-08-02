<?php
    include('connect.php');

    //update query

    if (isset($_POST['update_product_quantity'])){
        $update_value = $_POST['update_quantity'];
        $update_id = $_POST['update_quantity_id'];
        $update_quantity_query = "UPDATE cart SET quantity = $update_value WHERE id = $update_id";
        $result_update = mysqli_query($conn,$update_quantity_query);
        if($result_update){
            header('location:cart.php');
        }
    }

    if (isset($_GET['remove'])){
        $remove_id = $_GET['remove'];
        $remove_products = "DELETE FROM cart where id = $remove_id";
        $result_remove = mysqli_query($conn,$remove_products);
        header('location:cart.php');
    }

    if (isset($_GET['delete_all'])){
        $delete_query = "DELETE FROM cart";
        $result_delete = mysqli_query($conn,$delete_query);
        header('location:cart.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <?php 
        include ('header.php');
    ?>
    <div class="container">
        <section class="shopping_cart">
            <h1 class="heading">Cart</h1>
            <table>
                <?php
                    $select_cart_products = "SELECT * FROM cart";
                    $result_cart_products = mysqli_query($conn,$select_cart_products);
                    $num = 1;
                    $grand_total = 0;
                    if (mysqli_num_rows($result_cart_products)>0){
                        echo "  <thead>
                                    <th>S1 No</th>
                                    <th>Product Name</th>
                                    <th>Product Image</th>
                                    <th>Product Price</th>
                                    <th>Product Quantity</th>
                                    <th>Total Price</th>
                                    <th>Action</th>
                                </thead>
                                <tbody>";
                                while ($fetch_cart_products = mysqli_fetch_assoc($result_cart_products)){
                                    ?>
                                    <tr>
                                        <td><?php echo $num;?></td>
                                        <td><?php echo $fetch_cart_products['name'];?></td>
                                        <td>
                                            <img src="images/<?php echo $fetch_cart_products['image'];?>">
                                        </td>
                                        <td>Rs. <?php echo $fetch_cart_products['price'];?>/-</td>
                                        <td>
                                            <form action="" method="post">
                                                <input type="hidden" value="<?php echo $fetch_cart_products['id'];?>" name="update_quantity_id">
                                                <div class="quantity_box">
                                                    <input type="number" min="1" value="<?php echo $fetch_cart_products['quantity'];?>" name="update_quantity">
                                                    <input type="submit" class="update_quantity" value="Update" name="update_product_quantity">
                                                </div>
                                            </form>
                                        </td>
                                        <td>Rs. <?php echo $subtotal = number_format(($fetch_cart_products['price']) * ($fetch_cart_products['quantity']));?>/-</td>
                                        <td>
                                            <a href="cart.php?remove=<?php echo $fetch_cart_products['id'];?>" onclick="return confirm('Are you sure you want to remove this product?')">
                                                <i class="fas fa-trash"></i><br>Remove
                                            </a>
                                        </td>
                                    </tr>
                                    <?php
                                    $grand_total = $grand_total+(intval($fetch_cart_products['price'])*intval($fetch_cart_products['quantity']));
                                    $num++;
                                }
                    }
                    else{
                        echo "  <div class='empty_text'>Cart is empty</div>";
                    }
                ?>
                
                    
                </tbody>
            </table>

            <?php
                if ($grand_total > 0){
                    echo "  <div class='table_bottom'>
                                <a href='shop_products.php' class='bottom_btn'>Continue Shopping</a>
                                <h3 class='bottom_btn'>Grand Total: Rs. <span>$grand_total/-</span></h3>
                                <a href='checkout.php' class='bottom_btn'>Proceed to checkout</a>
                            </div>";
                
            ?>
            
            <a href="cart.php?delete_all" class="delete_all_btn" onclick="return confirm('Are you sure you want to delete evverything from the cart?')">
                <i class="fas fa-trash"></i>Delete All
            </a>
                <?php
                }
                else{
                    echo"";
                }
                ?>
        </section>
    </div>
</body>
</html>