<h3 class="text-center text-success">All Payments</h3>
<table class="table able-bordered mt-5">
    <thead class="bg-info">

    <?php
        $get_payments = "SELECT * FROM user_payments";
        $result = mysqli_query($con,$get_payments);
        $row_count = mysqli_num_rows($result);
        

        if ($row_count == 0){
            echo "<h2 class='text-danger text-center mt-5'>No Payments Received Yet</h2>";
        }
        else{
            echo "  <tr>
                        <th>S1 no</th>
                        <th>Invoice number</th>
                        <th>Amount</th>
                        <th>Payment mode</th>
                        <th>Order Date</th>
                        <th>Delete</th>
                    </tr>
            </thead>
            <tbody class='bg-secondary text-light'>";
            $number = 0;
            while ($row_data=mysqli_fetch_assoc($result)){
                $order_id = $row_data['order_id'];
                $payment_id = $row_data['payment_id'];
                $amount = $row_data['amount'];
                $invoice_number = $row_data['invoice_number'];
                $payment_mode = $row_data['payment_mode'];
                $date = $row_data['date'];
                $number++;
                echo "  <tr>
                            <td>$number</td>
                            <td>$invoice_number</td>
                            <td>$amount</td>
                            <td>$invoice_number</td>
                            <td>$payment_mode</td>
                            <td>$date</td>
                            <td><a href='' class='text-light'><i class='fa-solid fa-trash'></i></a></td>
                        </tr>";
            }
        }
    ?>
        
        
    </tbody>
</table>