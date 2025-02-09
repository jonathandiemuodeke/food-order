   <?php  include_once "./partials-front/header.php"; ?>

    <link rel="stylesheet" href="./user-side/style.css">    
    <link rel="stylesheet" href="./user-side/quick-order.css">    
    
    <title>Quick Order</title>
   <!--  -->
   <!--  -->
<main>
    <section class="order-section">
        <p class="alert-box"></p>
        <h3 class="title">Please fill in Your current Details</h3>
        <form  action="" class="order-details" method="POST">
            <div class="location">
                <label for="">Select Your City</label>
                <select  id="city" class="location" name="city" value="">
                    <option value="ughelli">Ughelli</option>
                    <option value="warri">Warri</option>
                    <option value="sapele">Sapele</option>
                    <option value="agbarha">Agbarha</option>
                </select>
                <!-- community -->
                <select name="area" id="" class="area" value="">
                    <option value="select">Select Area</option>
                    <option value="otovwodo">otovwodo</option>
                    <option value="afiesere">afiesere</option>
                    <option value="isoko-road">isoko-road</option>
                    <option value="market-road">market-road</option>
                    <option value="ekiugbo">ekiugbo</option>
                    <option value="amekpa">amekpa</option>
                    <option value="igwhreovie">igwhreovie</option>
                    <option value="express-raod">express-raod</option>
                    <option value="oteri">oteri</option>
                    <option value="oteri">oteri</option>
                </select>
            </div>
            <!-- address -->
            <div class="address">
                <label for="address">Full Address</label>
                <input class="input-address" type="text" name="full-address" placeholder="examlple: 270 ughelli patani road, before agofure motor park" value="">
            </div>
                <!-- phone numbers -->
                <div class="phone-numbers">
                    <label for="phone1">phone 1:</label>
                    <input type="number" name="num1" class="phone1" placeholder="07089765098" value="">
                    <label for="phone2">phone 2:</label>
                    <input type="number" name="num2" class="phone2" placeholder="07056748390" value="">
                </div>
                <input type="hidden" name="ID" class="ID" value="">
                <button class="submit show-btn">confirm</button>
                <button type="submit" class="p_btn2" name="submit">proceed</button>
        </form>

    </section>
    </main>
    <!--FOOTER  -->
   
    <!--**** FOOTER ****  -->
    <!-- javascript  -->
    <!-- <script src="./js/quick-order.js"></script> -->
    <script>

    </script>


<!-- PHP SCRIPT -->
<?php

if(isset($_POST['submit'])){

    $city = $_POST['city'];
    $area = $_POST['area'];
    $address = $_POST['full-address'];
    $num1 = $_POST['num1'];
    $num2 = $_POST['num2'];
    $id = $_POST['ID'];

    $food_id = random_int(8,100);


    
                $sql = "INSERT INTO quick (city, area, user_address, num1, num2, f_id) VALUES (?,?,?,?,?,?)";
                $stmt = mysqli_stmt_init($conn);

                // checking if the connection can be established

                if(!mysqli_stmt_prepare($stmt, $sql)){
                    header('location:'.SITEURL.'index.php');
                    $_SESSION['try-again'] = "<div class='error text-center'>Sql Error!</div>";
                    exit();

                }else{
                    //if the connection was established successfully 
                    mysqli_stmt_bind_param($stmt, "sssssi" , $city,$area,$address,$num1,$num2,$f_id);

                    // executing the stmt
                    mysqli_stmt_execute($stmt);

                    //  header("location:order-confirmation.php?id=$food_id");
                    //  header("location:pre_order.php?food_id=$food_id");
                     header('location:'.SITEURL.'quick-order.php');
                     var_dump($stmt);
                    // $_SESSION['order-successfull'] = "<div class='success text-center'>Your order has been received and is been processed!</div>";
                    // exit();

                
                // checking if the connection can be established



            }// if the order id is available
            mysqli_stmt_close($stmt);
            mysqli_close($conn);

}

?>
        <!--END OF PHP SCRIPT  -->


<script type="text/javascript" src="./js/quick-order.js"></script>
<?php include_once "./partials-front/footer.php"; ?>