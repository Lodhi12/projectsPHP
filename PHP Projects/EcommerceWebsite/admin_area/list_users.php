<h3 class="text-center text-success">All Users</h3>
<table class="table able-bordered mt-5">
    <thead class="bg-info">

    <?php
        $get_payments = "SELECT * FROM user_table";
        $result = mysqli_query($con,$get_payments);
        $row_count = mysqli_num_rows($result);
        

        if ($row_count == 0){
            echo "<h2 class='text-danger text-center mt-5'>No Users Yet</h2>";
        }
        else{
            echo "  <tr>
                        <th>S1 no</th>
                        <th>Username</th>
                        <th>User email</th>
                        <th>User Image</th>
                        <th>User address</th>
                        <th>User mobile</th>
                        <th>Delete</th>
                    </tr>
            </thead>
            <tbody class='bg-secondary text-light'>";
            $number = 0;
            while ($row_data=mysqli_fetch_assoc($result)){
                $user_id = $row_data['user_id'];
                $username = $row_data['username'];
                $user_email = $row_data['user_email'];
                $user_image = $row_data['user_image'];
                $user_address = $row_data['user_address'];
                $user_mobile = $row_data['user_mobile'];
                $number++;
                ?>
                  <tr>
                            <td><?php echo $number?></td>
                            <td><?php echo $username?></td>
                            <td><?php echo $user_email?></td>
                            <td><img src='../users_area/user_images/<?php echo $user_image?>' alt='$username' class='product_img'/></td>
                            <td><?php echo $user_address?></td>
                            <td><?php echo $user_mobile?></td>
                            <td><a href='index.php?delete_user=<?php echo $user_id?>' class='text-dark'><i class='fa-solid fa-trash'></i></a></td>
                        </tr>;
                        <?php
            }
        }
        ?>
    ?>
        
        
    </tbody>
</table>