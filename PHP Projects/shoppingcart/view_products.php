<?php
    include ('connect.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Products</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <?php include ('header.php');?>

    <div class="container">
        <section class="display_products">
            

                <?php

                    $display_product = "SELECT * FROM products";
                    $result_product = mysqli_query($conn,$display_product);
                    $num = 1;
                    if (mysqli_num_rows($result_product)>0){
                        echo "  <table>
                                    <thead>
                                        <th>S1 No</th>
                                        <th>Product Image</th>
                                        <th>Product Name</th>
                                        <th>Product Price</th>
                                        <th>Action</th>
                                    </thead>
                                    <tbody>";

                        //logic to fetch dataa

                        while($row = mysqli_fetch_assoc($result_product)){
                ?>
                
                    <tr>
                        <td><?php echo $num ?></td>
                        <td><img src="images/<?php echo $row['image'];?>" alt="<?php echo $row['name'];?>"></td>
                        <td><?php echo $row['name'];?></td>
                        <td><?php echo $row['price'];?></td>
                        <td>
                            <a href="delete.php?delete=<?php echo $row['id']?>" class="delete_product_btn" onclick="return confirm('Are you sure you want to delete this product');"><i class="fas fa-trash"></i></a>
                            <a href="update.php?edit=<?php echo $row['id']?>" class="update_product_btn"><i class="fas fa-edit"></i></a>
                        </td>
                    </tr>
                    
                <?php
                $num++;
                        }
                    }
                    else{
                        echo "<div class='empty_text'>No Products Available</div>";
                    }
                ?>
                    
                </tbody>
            </table>
        </section>
    </div>
</body>
</html>