    <?php  include_once "./partials-front/header.php"; ?>
    <?php  include_once "./config/constant.php"; ?>

    <!-- <link rel="stylesheet" href="./user-side/style.css">     -->
    <link rel="stylesheet" href="./user-side/pre_order.css">    
    <main class="order-page main-section">

    <?php 
         if(!isset($_GET['food_id'])){

            header('location:'.SITEURL.'index.php');
            $_SESSION['try-again'] = "<div class='error text-center'>unsuccessfull, please try again!</div>";
        }else{
             $order_id = $_GET['food_id'];
        }

    ?>
   


        <h3 class="title">Make Your Order</h3>
        <div class="food-btn-container">
            <button class="rice-btn banga">banga rice</button>
            <button class="rice-btn jollof">jollof rice</button>
            <button class="rice-btn fried">fried rice</button>
            </div>
               <?php  
            $sql3 = "SELECT status FROM sales_status WHERE id = 1";
            $res3 = mysqli_query($conn,$sql3);
            $count3 = mysqli_num_rows($res3);
            if($count3 == 1){
                while($row3 = mysqli_fetch_assoc($res3)){
                    $status = $row3['status'];
                }
            }
                ?>
            <input type="hidden" name="" id="sales-status" value="<?php echo $status; ?>">

        <div id="food" class="order-quantity" >
            <?php 
            if(isset($_SESSION['select-food'])){
                echo $_SESSION['select-food'];
               unset($_SESSION['select-food']);
            }
            ?>
            <!-- form -->
            <form action="" class="food" method="POST" >
              
                <table class="menu-table" border="0px solid red">
                    <h4 style="font-size: .8rem;">You are Ordering: <input type="text" class="food-name" name="food-name"></h4>
                    <tr >
                        
                    </tr>
                    <tr class="quantity-amount">
                        <td></td>
                        <td></td>
                    <!-- <td></td> -->
                    <td></td>
                    <td>amount</td>
                </tr>
                    <tr>
                        <td>rice</td>
                        <td class="quantity"></td>
                        <td><button class="menu-btn increase">+ 100</button></td>
                        <td><button class="menu-btn decrease">- 100</button></td>
                        <!-- <td class="amount">100</td> -->
                        <td class="td-amount">
                            <input type="number" name="rice" class="amount" id="" value="" readonly>
                        </td>
                    </tr>
                    <tr>
                        <td>beans</td>
                        <td class="quantity"></td>
                        <td><button class="menu-btn increase">+ 100</button></td>
                        <td><button class="menu-btn decrease">- 100</button></td>
                        <td class="td-amount">
                            <input type="number" name="beans" class="amount" id="" value="" readonly>
                        </td>
                        
                    </tr>
                    <tr>
                        <td>dodo</td>
                        <td class="quantity"></td>
                        <td><button class=" menu-btn increase">+ 100</button></td>
                        <td><button class=" menu-btn decrease">- 100</button></td>
                        <!-- <td class="amount">100</td> -->
                        <td class="td-amount">
                            <input type="number" name="dodo" class="amount" id="" value="" readonly>
                        </td>
                    </tr>
                    <tr>
                        <td>yam</td>
                        <td class="quantity"></td>
                        <td><button class="menu-btn increase">+ 100</button></td>
                        <td><button class="menu-btn decrease">- 100</button></td>
                        <!-- <td class="amount">100</td> -->
                        <td class="td-amount">
                            <input type="number" name="yam" class="amount" id="" value="" readonly>
                        </td>
                    </tr>
                    <tr>
                        <td>moimoi</td>
                        <td class="quantity"></td>
                        <td><button class="menu-btn increase">+ 100</button></td>
                        <td><button class="menu-btn decrease">- 100</button></td>
                        <!-- <td class="amount">100</td> -->
                        <td class="td-amount">
                            <input type="number" name="moimoi" class="amount" id="" value="" readonly>
                        </td>
                    </tr>
                    <tr>
                        <td>salad</td>
                        <td class="quantity"></td>
                        <td><button class="menu-btn increase">+ 100</button></td>
                        <td><button class="menu-btn decrease">- 100</button></td>
                        <!-- <td class="amount">100</td> -->
                        <td class="td-amount">
                            <input type="number" name="salad" class="amount" id="" value="" readonly>
                        </td>
                    </tr>
                    <tr>
                        <td>meat</td>
                        <td class="quantity"></td>
                        <td><button class="menu-btn increase">+ 100</button></td>
                        <td><button class="menu-btn decrease">- 100</button></td>
                        <!-- <td class="amount">100</td> -->
                        <td class="td-amount">
                            <input type="number" name="meat" class="amount" id="" value="" readonly>
                        </td>
                    </tr>
                    <tr>
                        <td>delivery</td>
                        <!-- <td></td> -->
                        <td><button class="menu-btn increase" style="display: none;"></button ></td>
                        <td><button class="menu-btn decrease" style="display: none;"></button></td>
                        <td class="">
                            <input type="number" name="delivery" class="delivery"  readonly id="" value="100">
                        </td>
                    </tr>
                    <!--  -->
                     <tr>
                        <td>how many plates ?</td>
                        <td class="quantity"></td>
                        <td><button class="menu-btn increase">+ 1</button></td>
                        <td><button class="menu-btn decrease">- 1</button></td>
                        <!-- <td class="amount">100</td> -->
                        <td class="td-amount">
                            <input type="number" name="plates" class="amount" id=""  value="1"  readonly>
                        </td>
                    </tr>
                    <!--  -->
                    <tr>
                        <td>total</td>
                        <!-- <td></td> -->
                        <td><button class="menu-btn increase" style="display: none;"></button></td>
                        <td><button class="menu-btn decrease" style="display: none;"></button></td>
                        <td class="">
                            <input type="number" name="total" id="" class="total" value="" readonly>
                            </td>
                    </tr>
                </table>
                <button type="button" class="proceed-btn regular-btn">See total</button>



                <!-- buyer details goes here -->
            <div class="customer-details">
            <table>

                <tr>
                    <td>Full Name</td>
                        <td class="quantity"></td>
                        <!-- <td><button class="menu-btn increase">+ 100</button></td> -->
                        <!-- <td><button class="menu-btn decrease">- 100</button></td> -->
                        <!-- <td class="amount">100</td> -->
                        <td class="td-amount">
                            <input type="text" name="name" class="amount regular-input" id="" value="">
                        </td>
                    </tr>
                <!-- buyer details goes here -->
                <tr>
                        <td>Phone Number</td>
                        <td class="quantity"></td>
                        <!-- <td><button class="menu-btn increase">+ 100</button></td> -->
                        <!-- <td><button class="menu-btn decrease">- 100</button></td> -->
                        <!-- <td class="amount">100</td> -->
                        <td class="td-amount">
                            <input type="number" name="phone" class="amount regular-input" id="" value="">
                        </td>
                    </tr>
                <!-- buyer details goes here -->
                <tr>
                        <td>Address</td>
                        <td class="quantity"></td>
                        <!-- <td><button class="menu-btn increase">+ 100</button></td> -->
                        <!-- <td><button class="menu-btn decrease">- 100</button></td> -->
                        <!-- <td class="amount">100</td> -->
                        <td class="td-amount">
                            <textarea  name="address" class="amount regular-input" id="" ></textarea>
                        </td>
                    </tr>
                </table>
                </div>
                <!-- buyer details ends here -->



                <button type="submit" name="submit" id="" class="p_btn2 regular-btn" >Review order</button>
            </form>

            <!-- getting the order id from the url -->
       

        <!-- validating the form -->
        <?php
        
      
        
        if(isset($_POST['submit'])){
        

                $food_name = $_POST['food-name'];
                $rice = $_POST['rice'];
                $beans = $_POST['beans'];
                $dodo = $_POST['dodo'];
                $yam = $_POST['yam'];
                $moimoi = $_POST['moimoi'];
                $salad = $_POST['salad'];
                $meat = $_POST['meat'];
                $delivery = $_POST['delivery'];
                $total = $_POST['total'];
                $order_date = date('Y-m-d h:i:sa');
                $name = $_POST['name'];
                $phone = $_POST['phone'];
                $address = $_POST['address'];
                $payment_reference = "not paid";
                
                
                $plates = $_POST['plates'];
                
                $food_id = random_int(8,100);

                //DATA OF THE BUYER GOTTEN FROM ORDER TABLE 

                // $name 
                // $phone
                // $address


                //DATA OF THE BUYER GOTTEN FROMORDER TABLE 


                if(empty($rice)){
                    $rice = 0;
                }
                if(empty($beans)){
                    $beans = 0;
                }
                if(empty($yam)){
                    $yam = 0;
                }
                if(empty($dodo)){
                    $dodo = 0;
                }
                if(empty($moimoi)){
                    $moimoi = 0;
                }
                if(empty($salad)){
                    $salad = 0;
                }
                if(empty($meat)){
                    $meat = 0;
                }
                if(empty($plates)){
                    $plates = 1;
                }
                
                
                if(empty($food_name)){
                     header("location:pre_order.php?food_id=$order_id");
                    $_SESSION['select-food'] = "<div class='error text-center'>Please select either <span class='banga'>Banga</span>, <span class='jollof'>Jollof</span> or <span class='fried'>Fried</span> rice</div>";
                    exit();
                }
                if(empty($name)){
                     header("location:pre_order.php?food_id=$order_id");
                    $_SESSION['select-food'] = "<div class='error text-center'>Please enter your full name</div>";
                    exit();
                }
                if(empty($phone)){
                     header("location:pre_order.php?food_id=$order_id");
                    $_SESSION['select-food'] = "<div class='error text-center'>Please enter your phone number</div>";
                    exit();
                }
                if(empty($address)){
                     header("location:pre_order.php?food_id=$order_id");
                    $_SESSION['select-food'] = "<div class='error text-center'>Please enter the delivery address</div>";
                    exit();
                }
               



                $sql = "INSERT INTO real_order  
                (food_name, rice, beans, dodo, yam, moimoi, salad, meat, delivery,plates,total,customer_name,customer_contact,customer_address,food_id,date_ordered,reference) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
                $stmt = mysqli_stmt_init($conn);

                // checking if the connection can be established

                if(!mysqli_stmt_prepare($stmt, $sql)){
                    header('location:'.SITEURL.'index.php');
                    $_SESSION['try-again'] = "<div class='error text-center'>Sql Error!</div>";
                    exit();

                }else{
                    //if the connection was established successfully 
                    mysqli_stmt_bind_param($stmt,"siiiiiiiiiisssiss" , $food_name,$rice,$beans,$dodo,$yam,$moimoi,$salad,$meat,$delivery,$plates,$total,$name,$phone,$address,$food_id,$order_date,$payment_reference);

                    // executing the stmt
                    mysqli_stmt_execute($stmt);

                    //  header("location:order-confirmation.php?id=$food_id");
                     header("location:order-confirmation.php?id=$food_id");
                    // $_SESSION['order-successfull'] = "<div class='success text-center'>Your order has been received and is been processed!</div>";
                    // exit();

                
                // checking if the connection can be established



            }// if the order id is available
            mysqli_stmt_close($stmt);
            mysqli_close($conn);
        }
    // }

        ?>



        </div>
    </main>
    
    <script src="./js/order.js"></script>


<!-- paystack integration script -->



<?php include_once "./partials-front/footer.php"; ?>

<script>
    const main = document.querySelector("main");
    const footer = document.querySelector(".footer-fixed");
    if(!main.style.height > "200px"){
        footer.classList.add("fixed");
    }
</script>