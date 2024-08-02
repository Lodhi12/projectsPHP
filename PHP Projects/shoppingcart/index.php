<?php
    include ('connect.php');
    if(isset($_POST['add_product'])){
        $product_name = $_POST['product_name'];
        $product_price = $_POST['product_price'];
        $product_image = $_FILES['product_image']['name'];
        $product_image_tmp_name = $_FILES['product_image']['tmp_name'];
        $product_image_folder = 'images/'.$product_image;

        $insert_query = "INSERT INTO products (name,price,image) VALUES ('$product_name','$product_price','$product_image')";
        $result_query = mysqli_query($conn,$insert_query);

        if($result_query){
            move_uploaded_file($product_image_tmp_name, $product_image_folder);
            $display_message = "Product inserted successfully!";
        }
        else{
            $display_message = "There is some error inserting product";
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>

    <link rel="stylesheet" href="css/style.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <?php
        include ('header.php');
    ?>
    <div class="container">
        <?php
            if (isset($display_message)){
                echo "  <div class='display_message'>
                            <span>$display_message</span>
                            <i class='fas fa-times' onclick='this.parentElement.style.display=`none`';></i>
                        </div>";
            }
        ?>
        
        <section>
            <h3 class="heading">Add Products</h3>
            <form action="" class="add_product" method="post" enctype="multipart/form-data">
                <input type="text" name="product_name" placeholder="Enter product name" class="input_fields" required>
                <input type="number" name="product_price" min="0" placeholder="Enter product price" class="input_fields" required>
                <input type="file" name="product_image" class="input_fields" required accept="image/png, image/jpg, image/jpeg">
                <input type="submit" name="add_product" class="submit_btn" value="Add Product">
            </form>
        </section>
    </div>
    <script> src="js/script.js"</script>
</body>
</html>