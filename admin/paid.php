<?php include_once "./partials/header.php";  ?>

 <?php
            if(!isset($_GET['ref'])){
            header('location:'.SITEURL.'admin/manage-food.php');
            }
            $ref = $_GET['ref'];
    ?>

<style>
    body{
        /* width:100vw !important; */
        overflow-x: hidden;
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
            <h1 class="h1-title">Order Details</h1>
             <a href="manage-order.php" class="btn-primary add-admin">Back</a>
        </div>
            <?php
            // if(isset($_SESSION['update'])){
            //     echo $_SESSION['update'];
            //     unset($_SESSION['update']);
            // }

            ?>
            
    <!-- add admin button -->
           


            <!-- ADDING TABLE -->
            
        


    
<div class="main">
    <!-- DISPLAYING THE SPECIFIC ORDER -->
    <form id="paymentform" class="menu-table">
              
                <table class="" border="0px solid red">
                     <?php 
            $sql = "SELECT * FROM real_order INNER JOIN paid_order ON real_order.reference = paid_order.reference  WHERE real_order.reference = '$ref' ";
            // $sql = "SELECT * FROM real_order INNER JOIN paid_order ON real_order.reference = paid_order.reference  WHERE reference = '$ref' ";

            // 
            $res = mysqli_query($conn, $sql);

            $count = mysqli_num_rows($res);
            $sn = 1;

            if($count == 1){
                // there are orders available
                while($row = mysqli_fetch_assoc($res)){
                    // get the details of the order
                    $id = $row['id'];
                    $plate = $row['plates'];
                    $food = $row['food_name'];
                    $rice = $row['rice'];
                    $beans = $row['beans'];
                    $yam = $row['yam'];
                    $dodo = $row['dodo'];
                    $moimoi = $row['moimoi'];
                    $salad = $row['salad'];
                    $meat = $row['meat'];
                    $total = $row['total'];
                    $contact = $row['customer_contact'];
                    $address = $row['customer_address'];
                    $email = $row['email'];
                    $reference = $row['reference'];

                    //$chicken = $row['chicken'];
                    //$egg = $row['egg'];
                }
            }
                ?>
                    <!-- <tr >
                        <td>Dear <span class="customer-name tx-bold" id="full-name"><?php //echo $name; ?></span>, 
                    </tr>
                    <tr>
                        </td>
                        <td class="tx-italics" style="font-size: .8rem;">this is what we will deliver:<br><span style="margin-right:4px;">
                        <?php 
                        //if($plates == 0){
                          //  $plates = 1;
                        //}else{
                            //echo $plates ;
                        //}
                        ?>
                        </span> plate of <input type="text" class="food-name" name="food-name" value="<?php //echo $food_name; ?>">
                        </td>
                    </tr> -->
                    <!-- <tr class="quantity-amount">
                    <td></td>
                    <td>amount</td>
                </tr> -->
                
                    <tr>
                        <td>rice</td>
                        <td class="quantity"></td>
                       
                        <td class="td-amount">
                            <input type="number" name="rice" class="amount" id="" value="<?php echo $rice; ?>" readonly>
                        </td>
                    </tr>
                    <tr>
                        <td>beans</td>
                        <td class="quantity"></td>
                       
                        <td class="td-amount">
                            <input type="number" name="beans" class="amount" id="" value="<?php echo $beans; ?>" readonly>
                        </td>
                        
                    </tr>
                    <tr>
                        <td>dodo</td>
                        <td class="quantity"></td>
                       
                        <td class="td-amount">
                            <input type="number" name="dodo" class="amount" id="" value="<?php echo $dodo; ?>" readonly>
                        </td>
                    </tr>
                    <tr>
                        <td>yam</td>
                        <td class="quantity"></td>
                        
                        <td class="td-amount">
                            <input type="number" name="yam" class="amount" id="" value="<?php echo $yam; ?>" readonly>
                        </td>
                    </tr>
                    <tr>
                        <td>moimoi</td>
                        <td class="quantity"></td>
                       
                        <td class="td-amount">
                            <input type="number" name="moimoi" class="amount" id="" value="<?php echo $moimoi; ?>" readonly>
                        </td>
                    </tr>
                    <tr>
                        <td>salad</td>
                        <td class="quantity"></td>
                        <td class="td-amount">
                            <input type="number" name="salad" class="amount" id="" value="<?php echo $salad; ?>" readonly>
                        </td>
                    </tr>
                    <tr>
                        <td>meat</td>
                        <td class="quantity"></td>
                       
                        <td class="td-amount">
                            <input type="number" name="meat" class="amount" id="" value="<?php echo $meat; ?>" readonly>
                        </td>
                    </tr>
                   
                    
                    <tr>
                        <td>total</td>
                        <td class="quantity"></td>
                        <td class="quantity">
                            <input type="number" name="total" id="payable" class="total" value="<?php echo $total; ?>" readonly>
                            </td>
                    </tr>
                   

                    <!-- <td>
                        <a href="<?php //echo SITEURL; ?>admin/update-order.php?id=<?php //echo $reference; ?>" class="btn-secondary btn-update">Update</a>
                    </td> -->
                    <!-- <td>
                        <a href="#" class="btn-danger btn-delete">Delete</a>
                    </td> -->
                    <!-- </td> -->
                    <!-- <tr>
                        <td>
                            <label for="email">please enter your email to receive payment receipt</label>
                            <input type="email" name="email" class="amount regular-input" id="email-address" placeholder="Enter Your Email">
                        </td>
                    </tr> -->
                </table>
               <div class="personal">
                 <div>
                        <h5>address</h5>
                        <p class="quantity bold">
                            <?php echo $address; ?>
                    </div>
                    <div>
                        <h5>phone</h5>
                        <p class="quantity bold">
                            <?php echo $contact; ?>
                            </p>
                    </div>
                    <div>
                    <a href="<?php echo SITEURL; ?>admin/update-order.php?id=<?php echo $reference; ?>" class="btn-secondary btn-update">Update</a>
                        <!-- <td class="quantity"></td> -->
                        <!-- <td class="quantity">
                            <a href="#" class="btn-danger btn-delete">Delete</a>
                            </td> -->
                    </div>
               </div>
           
            </form>
    </div>
    </div>
    <!-- DISPLAYING THE SPECIFIC ORDER -->

<?php include_once "./partials/footer.php"; ?>