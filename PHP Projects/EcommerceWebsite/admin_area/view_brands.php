<h3 class="text-center text-success">All Brands</h3>
<table class="table table-bordered mt-5">
    <thead class="text-center">
        <tr>
            <th class="bg-info">S1no</th>
            <th class="bg-info">Brand Title</th>
            <th class="bg-info">Edit</th>
            <th class="bg-info">Delete</th>
        </tr>
    </thead>
    <tbody class="text-light">
        <?php
            $select_brand = "SELECT * FROM brands";
            $result_brand = mysqli_query($con,$select_brand);
            $number = 0;
            while($row = mysqli_fetch_assoc($result_brand)){
                $brand_id = $row['brand_id'];
                $brand_title = $row['brand_title'];
                $number++;
        ?>
        <tr class="text-center">
            <td class="bg-secondary"><?php echo $number ?></td>
            <td class="bg-secondary"><?php echo $brand_title?></td>
            <td class="bg-secondary"><a href='index.php?edit_brand=<?php echo $brand_id?>' class='text-light'><i class='fa-solid fa-pen-to-square'></i></a></td>
            <td class="bg-secondary"><a href='index.php?delete_brand=<?php echo $brand_id?>' class="text-light"><i class='fa-solid fa-trash'></i></a></td>
        </tr>
        <?php
            }
        ?>
    </tbody>
</table>

