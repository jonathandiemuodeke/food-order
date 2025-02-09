<?php  include_once "./partials/header.php" ?>

<div class="main-content">
    <div class="wrapper">
        <h1 class="h1-title">Update Order</h1>
        <!--  -->

        <?php
        if(isset($_GET['id'])){
            // the food id is avaialable
            $id = $_GET['id'];

            //sql query to fetch the other data
            $sql = "SELECT * FROM tbl_order WHERE id = '$id' ";

            $res = mysqli_query($conn, $sql);

            $count = mysqli_num_rows($res);

            if($count == 1){
                //  then, there is an order to be updated
                $row = mysqli_fetch_assoc($res);

                //feching the who other details
                $food = $row['food']; 
                $price = $row['price']; 
                $qty = $row['qty']; 
                $status = $row['status']; 
                $customer_name = $row['customer_name']; 
                $customer_contact = $row['customer_contact']; 
                $customer_email = $row['customer_email']; 
                $customer_address = $row['customer_address']; 

                // echo $food;
                // die();


            }else{
                // there is no order available to be updated
            }


        }else{
            // the food id is not available hence we redirect back to the manage order page
            header('location:'.SITEURL.'admin/manage-food.php');
        }

        ?>

        <form action="" method="post">
            <table class="tbl-30">
                <tr>
                    <td>Food name:</td>
                    <td><?php echo $food; ?></td>
                </tr>

                <tr>
                    <td>Price</td>
                    <td><input type="number" name="price" id="" value="<?php echo $price; ?>"></td>
                </tr>
                <tr>
                    <td>Qty</td>
                    <td><input type="number" name="qty" id="" value="<?php echo $qty; ?>"></td>
                </tr>

                <tr>
                    <td>Status</td>
                    <td>
                        <select name="status" id="">
                            <option <?php if($status == "ordered"){ echo "selected";}?> value="ordered">Ordered</option>

                            <option <?php if($status == "processing"){ echo "selected";} ?> value="processing">Processing</option>

                            <option <?php if($status == "delivered"){ echo "selected";} ?> value="delivered">Delivered</option>

                            <option <?php if($status == "cancelled"){ echo "selected";} ?>value="cancelled">Cancelled</option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td>Customer Name:</td>
                    <td><input type="text" name="customer_name" id="" value="<?php echo $customer_name; ?>"></td>
                </tr>
                
                <tr>
                    <td>Customer Contact:</td>
                    <td><input type="text" name="customer_contact" id="" value="<?php echo $customer_contact; ?>"></td>
                </tr>
                
                <tr>
                    <td>Customer Email:</td>
                    <td><input type="text" name="customer_email" id="" value="<?php echo $customer_email; ?>"></td>
                </tr>
                
                <tr>
                    <td>Customer Address:</td>
                    <td><input type="text" name="customer_address" id="" value="<?php echo $customer_address; ?>"></td>
                </tr>

                <tr>
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <input type="hidden" name="price" value="<?php echo $price; ?>">
                    <td><input type="submit" name="submit" value="Update Food" class="btn-secondary"></td>
                </tr>
            </table>
        </form>
        <!--  -->

        <?php

        if(isset($_POST['submit'])){
            $id = $_POST['id'];
            $price =  mysqli_real_escape_string($conn, $_POST['price']);
            $qty =  mysqli_real_escape_string($conn, $_POST['qty']);

            $total = $qty * $price;

            $status =  mysqli_real_escape_string($conn, $_POST['status']);

            $customer_name =  mysqli_real_escape_string($conn, $_POST['customer_name']);
            $customer_contact =  mysqli_real_escape_string($conn, $_POST['customer_contact']);
            $customer_email =  mysqli_real_escape_string($conn, $_POST['customer_email']);
            $customer_address =  mysqli_real_escape_string($conn, $_POST['customer_address']);
            // 

                $sql2 = "UPDATE tbl_order SET
                price = $price,
                qty = $qty,
                total = $total,
                status = '$status',
                customer_name = '$customer_name',
                customer_contact = '$customer_contact',
                customer_email = '$customer_email',
                customer_address = '$customer_address'
                WHERE id = $id
                ";

                // executing the query
                $res2 = mysqli_query($conn, $sql2);

                if($res){
                    // the query exected successfully
                    $_SESSION['update'] = "<div class='success text-center'>order updated successfully</div>";
                    header('location:'.SITEURL.'admin/manage-order.php');

                }else{
                    // the query did not execute 
                    $_SESSION['update'] = "<div class='error text-center'>Failed to update order</div>";
                    header('location:'.SITEURL.'admin/manage-order.php');
                }

        }







        ?>




    </div>
</div>


















<?php  include_once "./partials/footer.php" ?>