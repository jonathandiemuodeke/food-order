
<?php
if(!isset($_GET['status'])){
    header('location:index.php?error=failed');
    die();
}else{
    $ref = $_GET['ref'];
}
?>
 
 <?php include_once "./partials-front/header.php"; ?>
 <?php include_once "./config/constant.php"; ?>
 <link rel="stylesheet" href="./user-side/pre_order.css">

 <style>
    input{
        border:none !important;
        background-color:transparent;
    }
    tr td:nth-child(1){
        font-weight:bold;
    }
    .proceed-btn{
        display:inline;
        width:fit-content;
    }
 </style>
<!-- <button type="button" id="print-receipt">Download Receipt</button> -->

 <main class="catering-service main-section">
        <h1 class="section-title"></h1>
        <!-- <div class="welcome">
            <h4 class="sales-time"></h4>
        </div> -->
        <h5 class="welcome">Please Print Your Order Ticket</h5>

        <!-- order details  -->
        <div class="order-quantity">
            <button type="button" class="proceed-btn show-btn" id="print-receipt">save</button>
        <div class="page">
            <!-- form -->

            <form action="" class="food" id="food">

            <!-- fetching the order details from the database -->
            <?php 
            $sql = "SELECT * FROM real_order WHERE reference = '$ref' ";

            $res = mysqli_query($conn, $sql);
            $count = mysqli_num_rows($res);

            if($count == 1){
                while($row = mysqli_fetch_assoc($res)){
                    $food_name = $row['food_name'];
                    $rice = $row['rice'];
                    $beans = $row['beans'];
                    $dodo = $row['dodo'];
                    $yam = $row['yam'];
                    $moimoi = $row['moimoi'];
                    $salad =$row['salad'];
                    $meat = $row['meat'];
                    $plates = $row['plates'];
                    $total = $row['total'];
                    $customer_name = $row['customer_name'];
                    // $phone =
                    // $address =
                    // $food_id =
                    $order_date =$row['date_ordered'];
                }
            }

            ?>



            <!-- number of plates and name of food -->
                <div class="menu-table">

                    <h3>Dear <span class="text-green"><?php echo $customer_name; ?></span>, you ordered</h3>
                    <h5 style="font-size: .8rem;"><span class="food-name"><?php echo $plates; ?></span> Plate(s) of <span class="food-name"><?php echo $food_name; ?></span>
                    on <?php echo $order_date; ?></h5>
                </div>
        
                <table class="menu-table" border="0px solid red">
                    <tr>
        
                    </tr>
                    <tr class="quantity-amount">
                        <td></td>
                    </tr>
                    <tr>
                        <td>rice</td>
                        <td class="quantity"></td>
                        <!-- <td class="amount">100</td> -->
                        <td class="td-amount">
                            <input type="number" name="" class="amount" id="" value="<?php echo $rice; ?>" readonly>
                        </td>
                    </tr>
                    <tr>
                        <td>beans</td>
                        <td class="quantity"></td>
                        <td class="td-amount">
                            <input type="number" name="" class="amount" id="" value="<?php echo $beans; ?>" readonly>
                        </td>
        
                    </tr>
                    <tr>
                        <td>dodo</td>
                        <td class="quantity"></td>
                        <!-- <td class="amount">100</td> -->
                        <td class="td-amount">
                            <input type="number" name="" class="amount" id="" value="<?php echo $dodo; ?>" readonly>
                        </td>
                    </tr>
                    <tr>
                        <td>yam</td>
                        <td class="quantity"></td>
                        <!-- <td class="amount">100</td> -->
                        <td class="td-amount">
                            <input type="number" name="" class="amount" id="" value="<?php echo $yam; ?>" readonly>
                        </td>
                    </tr>
                    <tr>
                        <td>moimoi</td>
                        <td class="quantity"></td>
                        <!-- <td class="amount">100</td> -->
                        <td class="td-amount">
                            <input type="number" name="" class="amount" id="" value="<?php echo $moimoi; ?>" readonly>
                        </td>
                    </tr>
                    <tr>
                        <td>salad</td>
                        <td class="quantity"></td>
                        <!-- <td class="amount">100</td> -->
                        <td class="td-amount">
                            <input type="number" name="" class="amount" id="" value="<?php echo $salad; ?>" readonly>
                        </td>
                    </tr>
                    <tr>
                        <td>meat</td>
                        <td class="quantity"></td>
                        <!-- <td class="amount">100</td> -->
                        <td class="td-amount">
                            <input type="number" name="" class="amount" id="" value="<?php echo $meat; ?>" readonly>
                        </td>
                    </tr>
                 
                    <tr>
                        <td>total paid</td>
                        <!-- <td></td> -->
                        <!-- <td><button class="menu-btn increase" style="display: none;"></button></td>
                        <td><button class="menu-btn decrease" style="display: none;"></button></td> -->
                        <td class="">
                            <input type="number" name="" id="" class="total" value="<?php echo $total; ?>" readonly>
                        </td>
                    </tr>
                </table>
                <p class="text-center">Thanks for your patronage.</p>
                <p class="text-center">Delivery in progress as delivery personnel will call you shortly..</p>

            </div>
                <!-- <button type="button" id="print-receipt" class="proceed-btn show-btn">print ticket</button>
                 -->
            </form>
        </div>
        <!-- order details  -->
       
        <!-- <div class="contact-info">
            <p>You can as well visit us at our sales point</p>
            <p><span><i class="fas fa-map-marker-alt"></i></span> 270 ughelli patani road, ughelli delta state</p>
            <p><span><i class="fas fa-phone-alt"></i></span> 08182828282</p>
            <p>Send us a message on whatsapp <br><a href="https://wa.me/message/3MIMKYGDO5OWK1"><i id="whatsapp"
                        class="fab fa-whatsapp"></i></a></p>
        </div> -->

        <!--  -->

    </main>

 <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.8.1/html2pdf.bundle.min.js" integrity="sha512-vDKWohFHe2vkVWXHp3tKvIxxXg0pJxeid5eo+UjdjME3DBFBn2F8yWOE0XmiFcFbXxrEOR1JriWEno5Ckpn15A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
      const pbtn = document.getElementById("print-receipt")
      pbtn.addEventListener("click",function(){
       const element = document.querySelector(".success")
            html2pdf(element);
      })
            
    </script> -->
    <script src="./js/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.8.1/html2pdf.bundle.min.js" integrity="sha512-vDKWohFHe2vkVWXHp3tKvIxxXg0pJxeid5eo+UjdjME3DBFBn2F8yWOE0XmiFcFbXxrEOR1JriWEno5Ckpn15A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
     <script>
      const pbtn = document.getElementById("print-receipt")
      pbtn.addEventListener("click",function(){
       const element = document.querySelector(".page")
       element.style.backgroundColor = "#f1f5f8";
    //    element.style.height = "150px";
            html2pdf(element);
      })
            
    </script>

<?php include_once "./partials-front/footer.php"; ?>