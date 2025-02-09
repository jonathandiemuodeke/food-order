  <?php  include_once "./partials-front/header.php"; ?>
<main class="catering-service main-section">
    <h3 class="section-title">insert Your order number to check your order status</h3>
    <div class="underline"></div>



     <!-- fOOD sEARCH Section Starts Here -->
        <div class="viewed-order">
            
            <!-- <form action="<?php echo SITEURL ?>food-search.php" method="POST"> -->
            <form action="" method="POST">
                <input type="search" name="search" class="status-input" placeholder="Enter Order number.." required>
                <input type="submit" name="submit" value="Check" class="proceed-btn">
            </form>
            <?php
            // GETTING THE SEARCHED KEYWORD
        //    $search = $_POST['search']; //this exposes our code to sql injection
        if(isset($_POST['search'])){
            $search = mysqli_real_escape_string($conn, $_POST['search']);
        }
         ?>
            
            
        </div>
    <!-- fOOD sEARCH Section Ends Here -->
   
    <!-- fOOD MEnu Section Starts Here -->
    <!-- <section class="food-menu"> -->
        <div class="container">
            <!-- <h2 class="text-center">Your Order</h2> -->

            <!-- THE SEARCH FUNCTIONALITY STARTS HERE -->
            <?php
            // CREATING AN SQL QUERY 
            // $sql = "SELECT * FROM real_order WHERE reference LIKE '%$search%' OR description LIKE '%$search%' ";
            if(isset($_POST['search'])){
            $search = mysqli_real_escape_string($conn, $_POST['search']);
                
            $sql = "SELECT * FROM real_order INNER JOIN paid_order ON real_order.reference = paid_order.reference WHERE real_order.reference = '$search'  ";

            //executing the query 
            $res = mysqli_query($conn, $sql); 

            // counting the number of data returned from the search
            $count = mysqli_num_rows($res);
            
            if($count == 1){
                // then there is a match
                while($row = mysqli_fetch_assoc($res)){
                    $ordered_date = $row['date_ordered'];
                    $food = $row['food_name'];
                    $rice = $row['rice'];
                    $total = $row['total'];
                    $name = $row['customer_name'];
                    $address = $row['customer_address'];
                    $beans = $row['beans'];
                    $yam = $row['yam'];
                    $dodo = $row['dodo'];
                    $salad = $row['salad'];
                    $moimoi = $row['moimoi'];
                    // $egg = $row['egg'];
                    // $fish = $row['fish'];
                    $meat = $row['meat'];
                    $plates = $row['plates'];
                    $status = $row['status'];

                    // displaying the seacrhed result
                    ?>


                   


                            <div class="viewed-order">
                                <h5 class="title">Dear <span><?php echo $name; ?>,</span> your order of <span><?php echo $food; ?></span> on <span><?php echo $ordered_date; ?></span> is ;</h5>
                                <div class="status <?php echo $status ?>"><?php if($status == "success"){
                                echo "<p class='ordered'>Ordered</p>";
                            }else{
                                echo $status;
                            }?></div>

                                <div class="details">
                                    <span>rice</span>
                                    <span class="name"><?php echo $rice; ?></span>
                                </div>
                                <div class="details">
                                    <span>beans</span>
                                    <span class="name"><?php echo $beans; ?></span>
                                </div>
                                <div class="details">
                                    <span>yam</span>
                                    <span class="name"><?php echo $yam; ?></span>
                                </div>
                                <div class="details">
                                    <span>dodo</span>
                                    <span class="name"><?php echo $dodo; ?></span>
                                </div>
                                <div class="details">
                                    <span>moimoi</span>
                                    <span class="name"><?php echo $moimoi; ?></span>
                                </div>
                                <div class="details">
                                    <span>salad</span>
                                    <span class="name"><?php echo $salad; ?></span>
                                </div>
                                <div class="details">
                                    <span>meat</span>
                                    <span class="name"><?php echo $meat; ?></span>
                                </div>
                                <div class="details">
                                    <span>total</span>
                                    <span class="name"><?php echo $total; ?></span>
                                </div>
                            </div>
                    </div>
                    <?php
                }


            }else{
                // there are ni match from the search
                 echo  "<div class='status text-center'>Order number not valid!</div>";
            }
        }
            ?>

            <!-- THE SEARCH FUNCTIONALITY ENDS HERE -->

              
            

            <div class="clearfix"></div>

            

        </div>

    <!-- </section> -->
    </main>
    <!-- fOOD Menu Section Ends Here -->
    
    <!-- catring service form  -->


    <!--  -->

</main>

  <?php  include_once "./partials-front/footer.php"; ?>