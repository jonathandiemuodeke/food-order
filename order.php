<?php include_once "./partials-front/header.php"; ?>



    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search">
        <div class="container">
            <!-- FETCHING THE DETAILS OF THE SELECTED FOOD FOR ORDER STARTS HERE  -->

            <?php
                if(isset($_GET['food_id'])){
                    // then the user got here by passing an order id
                    $food_id = $_GET['food_id'];

                    // sql query to fetch the details of the selected food
                    $sql = "SELECT * FROM tbl_food WHERE id = $food_id";

                    $res = mysqli_query($conn, $sql);

                    $count = mysqli_num_rows($res);

                    if($count == 1){
                        // then the food is available
                        $row = mysqli_fetch_assoc($res);

                        // so we need to get the food details accordingly
                        $food_title = $row['title'];
                        $food_price = $row['price'];
                        $food_image = $row['image_name'];
                    
                        

                    }else{
                        // the food is not availbale
                    echo  "<div class='error text-center'>food not available!</div>";
                    }

                    

                }else{
                    // then the user did not get here by passing an order id
                    header('location:'.SITEURL);

                }

            ?>



            <!-- FETCHING THE DETAILS OF THE SELECTED FOOD FOR ORDER ENDS HERE  -->
            
            <h2 class="text-center text-white">Fill this form to confirm your order.</h2>

            <form action="" class="order" method="post">
                <fieldset>
                    <legend>Selected Food</legend>

                    <div class="food-menu-img">
                        <!-- checking if there is an image for the food -->
                        <?php
                        if($food_image == ""){
                            // then, there is no image 
                            echo  "<div class='error text-center'>food not available!<div>";

                        }else{
                            // there is an image
                            ?>
                            <img src="<?php echo SITEURL ?>images/food/<?php echo $food_image; ?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                            <?php
                        }
                        ?>
                    </div>
    
                    <div class="food-menu-desc">
                        <input type="hidden" name="title" value="<?php echo $food_title; ?>">
                        <h3><?php echo $food_title ?></h3>

                        <input type="hidden" name="price" value="<?php echo $food_price; ?>">
                        <p class="food-price">$<?php echo $food_price ?></p>

                        <div class="order-label">Quantity</div>
                        <input type="number" name="qty" class="input-responsive" value="1" required>
                        
                    </div>

                </fieldset>
                
                <fieldset>
                    <legend>Delivery Details</legend>
                    <div class="order-label">Full Name</div>
                    <input type="text" name="full-name" placeholder="E.g. Vijay Thapa" class="input-responsive" required>

                    <div class="order-label">Phone Number</div>
                    <input type="tel" name="contact" placeholder="E.g. 9843xxxxxx" class="input-responsive" required>

                    <div class="order-label">Email</div>
                    <input type="email" name="email" placeholder="E.g. hi@vijaythapa.com" class="input-responsive" required>

                    <div class="order-label">Address</div>
                    <textarea name="address" rows="10" placeholder="E.g. Street, City, Country" class="input-responsive" required></textarea>

                    <input type="submit" name="submit" value="Confirm Order" class="btn btn-primary">
                </fieldset>

            </form>
            <!-- functionality to capture the order -->
            <?php 

            $pid = $_GET['food_id'];

            if(isset($_POST['submit'])){
                // the submit button is clicked
                
                $rand = random_int(8,100);
                // get the data




                $food =  mysqli_real_escape_string($conn, $_POST['title']);
                $price =  mysqli_real_escape_string($conn, $_POST['price']);
                $qty =  mysqli_real_escape_string($conn, $_POST['qty']);
                $total = $price * $qty;
                $order_date = date('Y-m-d h:i:sa');
                $status = "ordered"; //order on delivery, delivered, cancelled
                $customer_name =  mysqli_real_escape_string($conn, $_POST['full-name']);
                $customer_contact =  mysqli_real_escape_string($conn, $_POST['contact']);
                $customer_email =  mysqli_real_escape_string($conn, $_POST['email']);
                $customer_address =  mysqli_real_escape_string($conn, $_POST['address']);

                $random_id = $pid * $rand;

                // writing the sql query to insert the data into the database
                $sql2 = "INSERT INTO tbl_order SET
                food = '$food',
                price = $price,
                qty = $qty,
                total = $total,
                order_date = '$order_date',
                status = '$status',
                customer_name = '$customer_name',
                customer_contact = '$customer_contact',
                customer_email = '$customer_email',
                customer_address = '$customer_address',
                random_id = $random_id

                 ";

                //  executing the query
                $res2 = mysqli_query($conn, $sql2);

                // checking if the query executed successfully
                if($res2){
                    $_SESSION['order'] = "<div class='success text-center'>food ordered successfully</div>";
                    // header('location:'.SITEURL.'pre_order.php');
                    header("location:pre_order.php?id=$random_id");
                    // then, the query executed successfully
                    
                }else{
                    $_SESSION['order'] = "<div class='error text-center'>failed to complete the order!</div>";
                    header('location:'.SITEURL);
                        // then, the query  did not execute successfull                    

                }

            }
            
            
            ?>


            <!-- functionality to capture the order -->


        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->


   <?php include_once "./partials-front/footer.php"; ?>
