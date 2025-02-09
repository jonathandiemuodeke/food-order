<?php include_once "./partials/header.php";  ?>

<style>
    body{
        width:100vw !important;
    }
    .main-content{
        width: 100vw  !important;
        padding:10px !important;
    }
    .tb{
        width:100% !important;
        padding:10px !important;
        margin:0 auto !important;
    }
</style>
<div class="main-content">
        <div class="wrapper tb">
            <h1 class="h1-title">Manage Order</h1>

            <?php
            if(isset($_SESSION['update'])){
                echo $_SESSION['update'];
                unset($_SESSION['update']);
            }

            ?>
            
    <!-- add admin button -->
            <a href="#" class="btn-primary add-admin">Add order</a>


            <!-- ADDING TABLE -->
            
            <table class="tbl-full" cellpadding="10px" cellspacing="20px">
                <tr>
                    <th>S/N</th>
                    <th>Food</th>
                    <!-- <th>Price</th>
                    <th>Qty</th> -->
                    <th>Total</th>
                    <th>Date</th>
                    <th>status</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Action</th>
                </tr>
                
                <!-- FUNCTIONALITY TO DISPLAY THE ORDERS FROM THE DATABASE -->
            <?php 
            $sql = "SELECT * FROM tbl_order ORDER BY id DESC";

            // 
            $res = mysqli_query($conn, $sql);

            $count = mysqli_num_rows($res);
            $sn = 1;

            if($count > 0){
                // there are orders available
                while($row = mysqli_fetch_assoc($res)){
                    // get the details of the order
                    $id = $row['id'];
                    $food = $row['food'];
                    $price = $row['price'];
                    $qty = $row['qty'];
                    $total = $row['total'];
                    $date = $row['order_date'];
                    $status = $row['status'];
                    $name = $row['customer_name'];
                    $phone = $row['customer_contact'];
                    $email = $row['customer_email'];
                    $address = $row['customer_address'];
                
                ?>
                <tr>
                    <td><?php echo $sn++; ?></td>
                    <td><?php echo $food; ?></td>
                    <!-- <td> -->
                        <?php //echo $price; ?>
                <!-- </td> -->
                    <!-- <td> -->
                        <?php //echo $qty; ?>
                    <!-- </td> -->
                    <td><?php echo $total; ?></td>
                    <td><?php echo $date; ?></td>

                    
                    <td>
                        <?php
                        if($status == 'ordered'){
                            echo "<label class='ordered capitalize'>$status</label>";
                        }elseif($status == 'processing'){
                            echo" <label class='processing capitalize'>$status</label>";
                        }elseif($status == 'delivered'){
                            echo "<label class='delivered capitalize'>$status</label>";
                        }elseif($status == 'cancelled'){
                            echo "<label class='cancelled capitalize'>$status</label>";
                        }

                        ?>
                     </td>



                    <td><?php echo $name; ?></td>
                    <td><?php echo $phone; ?></td>
                    <td><?php echo $email; ?></td>
                    <td><?php echo $address; ?></td>
                    <td>
                        <a href="<?php echo SITEURL; ?>admin/update-order.php?id=<?php echo $id; ?>" class="btn-primary btn-update">View</a>
                    </td>
                    <td>
                        <a href="<?php echo SITEURL; ?>admin/update-order.php?id=<?php echo $id; ?>" class="btn-secondary btn-update">Update</a>
                    </td>
                    <td>
                        <a href="#" class="btn-danger btn-delete">Delete</a>
                    </td>
                <!-- </tr> -->
                <tr>

                <?php

                }
            }else{
                echo "<div class='error text-center'>no order currently available</div>";
                // there are no order available
            }
            ?>


            <!-- FUNCTIONALITY TO DISPLAY THE ORDERS FROM THE DATABASE -->


           
                <!--  -->
                <!-- <tr>
                    <td>1 </td>
                    <td>Emmanuel</td>
                    <td>Emmaray</td>
                    <td>Emmaray</td>
                    <td>Emmaray</td>
                    <td>Emmaray</td>
                    <td>Emmaray</td>
                    <td>Emmaray</td>
                    <td>Emmaray</td>
                    <td>Emmaray</td>
                    <td>Emmaray</td>
                    <td><a href="#" class="btn-secondary btn-update">Update</a></td>
                    <td><a href="#" class="btn-danger btn-delete">Delete</a></td>
                </tr>
                <tr>
                    <td>1 </td>
                    <td>Emmanuel</td>
                    <td>Emmaray</td>
                    <td><a href="#" class="btn-secondary btn-update">Update </a></td>
                    <td><a href="#" class="btn-danger btn-delete">Delete </a></td>
                </tr>
                <tr>
                    <td>1 </td>
                    <td>Emmanuel</td>
                    <td>Emmaray</td>
                    <td><a href="#" class="btn-secondary btn-update">Update </a></td>
                    <td><a href="#" class="btn-danger btn-delete">Delete </a></td>
                </tr> -->
           
            </table>


        </div>
    </div>

<?php include_once "./partials/footer.php"; ?>



