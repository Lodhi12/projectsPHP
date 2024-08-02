<?php
    $username = $_SESSION['username'];
    $get_user = "SELECT * FROM user_table WHERE username = '$username'";
    $result = mysqli_query($con,$get_user);
    $row_fetch = mysqli_fetch_assoc($result);
    $user_id = $row_fetch['user_id'];
    echo $user_id;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial scale=1.0">
    <title>My Orders</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="stylesheet.css"> <!-- Adjust path as per your file structure -->
</head>
<body>
    <div class="container">
        <h3 class="text-success mt-3 mb-4">All My Orders</h3>
        <table class="table table-bordered">
            <thead class="bg-info text-white">
                <tr>
                    <th>Sl no</th>
                    <th>Amount Due</th>
                    <th>Total Products</th>
                    <th>Invoice Number</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    // Query to fetch user orders
                    $get_order_details = "SELECT * FROM user_orders WHERE user_id = $user_id";
                    $result_orders = mysqli_query($con, $get_order_details);
                    if(mysqli_num_rows($result_orders) > 0) {
                        $number = 1;
                        while ($row_orders = mysqli_fetch_assoc($result_orders)){
                            $order_id = $row_orders['order_id'];
                            $amount_due = $row_orders['amount_due'];
                            $total_products = $row_orders['total_products'];
                            $invoice_number = $row_orders['invoice_number'];
                            $order_date = $row_orders['order_date'];
                            $order_status = $row_orders['order_status'];
                            
                            // Determine status display
                            $status_display = ($order_status == 'pending') ? 'Incomplete' : 'Complete';

                            echo "<tr>
                                    <td>$number</td>
                                    <td>$amount_due</td>
                                    <td>$total_products</td>
                                    <td>$invoice_number</td>
                                    <td>$order_date</td>
                                    <td>$status_display</td>
                                    <td>";
                            
                            // Display action based on order status
                            if($order_status == 'pending'){
                                echo "<a href='confirm_payment.php?order_id=$order_id' class='btn btn-sm btn-primary'>Confirm Payment</a>";
                            } else {
                                echo "Paid";
                            }

                            echo "</td></tr>";
                            $number++;
                        }
                    } else {
                        echo "<tr><td colspan='7' class='text-center'>No orders found.</td></tr>";
                    }
                ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
