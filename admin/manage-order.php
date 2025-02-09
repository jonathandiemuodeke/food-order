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
    .underline{
        border:2px solid red;
        color:green;
    }
    .btn-flex{
        display:flex;
        /* flex-direction: row !important; */
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
            
            <table class="tbl-full" cellpadding="5px" cellspacing="10px">
                <tr>
                    <!-- <th>S/N</th> -->
                    <th>Food</th>
                    <!-- <th>Price</th>
                    <th>Qty</th> -->
                    <!-- <th>Total</th> -->
                    <!-- <th>Date</th> -->
                    <th>status</th>
                    <th>Name</th>
                    <!-- <th>Phone</th> -->
                    <!-- <th>Email</th> -->
                    <!-- <th>Address</th> -->
                    <th>Action</th>
                </tr>
               
                <!-- FUNCTIONALITY TO DISPLAY THE ORDERS FROM THE DATABASE -->
            <?php 
            // $sql = "SELECT * FROM real_order ORDER BY id DESC";
            $sql = "SELECT * FROM real_order INNER JOIN paid_order ON real_order.reference = paid_order.reference";
            // $sql = "SELECT real_order.*, paid_order.email ORDER BY id DESC";

           
            // 
            $res = mysqli_query($conn, $sql);

            $count = mysqli_num_rows($res);
            $sn = 1;

            if($count > 0){
                // there are orders available
                while($row = mysqli_fetch_assoc($res)){
                    // get the details of the order
                    $id = $row['id'];
                    $food = $row['food_name'];
                    $total = $row['total'];
                    // $status = $row['status'];
                    $name = $row['customer_name'];
                    $contact = $row['customer_contact'];
                    $address = $row['customer_address'];
                    $date = $row['date_ordered'];
                    $reference = $row['reference'];
                    $email = $row['email'];
                    $status = $row['status'];
                
                ?>
                <tr>
                    <td><?php echo $food; echo "<br>"; echo $date; ?></td>
                    
                    <td>
                        <?php
                        if($status == 'success'){
                            echo "<label class='ordered capitalize'>ordered</label>";
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
                    <td>
                        <a href="<?php echo SITEURL; ?>admin/paid.php?ref=<?php echo $reference; ?>" class="btn-primary btn-update">View</a>
                    </td>
                    <!-- <td>
                        <a href="<?php //echo SITEURL; ?>admin/update-order.php?id=<?php //echo $reference; ?>" class="btn-secondary btn-update">Update</a>
                    </td> -->
                    <!-- <td>
                        <a href="#" class="btn-danger btn-delete">Delete</a>
                    </td> -->
                    <!-- </td> -->
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


           
                
           
            </table>
            
            
        </div>
    </div>
    <!-- FORM TO SHOW THE SPECIFIC ORDER -->
    

<?php include_once "./partials/footer.php"; ?>



