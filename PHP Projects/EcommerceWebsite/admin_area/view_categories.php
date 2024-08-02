<h3 class="text-center text-success">All Categories</h3>
<table class="table table-bordered mt-5">
    <thead class="text-center">
        <tr>
            <th class="bg-info">S1no</th>
            <th class="bg-info">Category Title</th>
            <th class="bg-info">Edit</th>
            <th class="bg-info">Delete</th>
        </tr>
    </thead>
    <tbody class="text-light">
        <?php
            $select_category = "SELECT * FROM categories";
            $result_category = mysqli_query($con,$select_category);
            $number = 0;
            while($row = mysqli_fetch_assoc($result_category)){
                $category_id = $row['category_id'];
                $category_title = $row['category_title'];
                $number++;
        ?>
        <tr class="text-center">
            <td class="bg-secondary"><?php echo $number ?></td>
            <td class="bg-secondary"><?php echo $category_title?></td>
            <td class="bg-secondary"><a href='index.php?edit_category=<?php echo $category_id?>' class="text-light"><i class='fa-solid fa-pen-to-square'></i></a></td>
            <td class="bg-secondary"><a href='index.php?delete_category=<?php echo $category_id?>' class="text-light"><i class='fa-solid fa-trash'></i></a></td>
        </tr>
        <?php
            }
        ?>
    </tbody>
</table>