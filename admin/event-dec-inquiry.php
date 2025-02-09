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
            <h1 class="h1-title">Customer Contact Inquiry</h1>

            <?php
            if(isset($_SESSION['update'])){
                echo $_SESSION['update'];
                unset($_SESSION['update']);
            }

            ?>
            
    <!-- add admin button -->
            <a href="#" class="btn-primary add-admin">All Contact Us inquiry</a>


            <!-- ADDING TABLE -->
            
            <table class="tbl-full" cellpadding="10px" cellspacing="20px">
                <tr>
                    <th>S/N</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
               
                <!-- FUNCTIONALITY TO DISPLAY THE ORDERS FROM THE DATABASE -->
            <?php 
            // $sql = "SELECT * FROM real_order ORDER BY id DESC";
            $sql = "SELECT * FROM event_decoration_inquiry ORDER BY id DESC";
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
                    $name = $row['name'];
                    $phone = $row['phone'];
                    $email = $row['email'];
                
                ?>
                

                    <td><?php echo $sn++; ?></td>
                    <td><?php echo $name; ?></td>
                    <td><?php echo $phone; ?></td>
                    <td><?php echo $email; ?></td>
                    <!-- <td><?php //echo $address; ?></td> -->
                    <!-- <td class="btn-flex"> -->
                    <td>
                        <a href="<?php echo SITEURL; ?>admin/view-message.php?event-ref=<?php echo $id; ?>" class="btn-primary btn-update">View</a>
                    </td>
                    
                <tr>

                <?php

                }
            }else{
                echo "<div class='error text-center'>no inquiry currently available</div>";
                // there are no order available
            }
            ?>

           
            </table>
            
            
        </div>
    </div>
    

<?php include_once "./partials/footer.php"; ?>



