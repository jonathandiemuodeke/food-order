<?php include_once "./partials-front/header.php"; ?>


    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center margin-top">
        <div class="container">
            
            <form action="<?php echo SITEURL ?>food-search.php" method="POST">
                <input type="search" name="search" placeholder="Search for Food.." required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>
            <!-- getting the current sales status -->
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

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->
     <?php
            // if(isset($_SESSION['order'])){
            //     echo $_SESSION['order'];
            //     unset($_SESSION['order']);
            // }
            if(isset($_SESSION['login-attempt'])){
                unset($_SESSION['login-attempt']);
            }
            if(isset($_SESSION['try-again'])){
                echo $_SESSION['try-again'];
               unset($_SESSION['try-again']);
            }
            if(isset($_SESSION['order-successfull'])){
                echo $_SESSION['order-successfull'];
               unset($_SESSION['order-successfull']);
            }
            if(isset($_SESSION['logged-in'])){
               echo $_SESSION['logged-in'];
            }
            if(isset($_SESSION['sent'])){
                echo $_SESSION['sent'];
                unset($_SESSION['sent']);
            }


            ?>
<!-- GINAS KITCHEN HARD CODED HTML STARTS HERE -->
<main class="landing-page main-section">
    <div class="welcome">
        <h3>Welcome To Gina's Kitchen Online Store</h3>
        <p>we aim to serve you better with our newly lunched online food order system. No need to panick about staying on the queue to get your favourite lunch.</p>
        <input type="hidden" name="" id="sales-status" value="<?php echo $status; ?>">
        <h4 class="sales-time"></h4>
    </div>
    <!-- end of welcome message -->
        <!-- begining of carousel images -->
    <div class="carousel owl-carousel owl-theme" >
        <div class="food-images" data-aos="fade-right" data-aos-delay="200">
            <img src="./images/design-image/img-1.png" alt="">
        </div>
        <div class="food-images" data-aos="fade-right" data-aos-delay="200">
            <img src="./images/design-image/img-2.jpg" alt="">
        </div>
        <div class="food-images" data-aos="fade-right" data-aos-delay="200">
            <img src="./images/design-image/img-3.jpg" alt="">
        </div>
        <div class="food-images" data-aos="fade-right" data-aos-delay="200">
            <img src="./images/design-image/img-3.jpg" alt="">
        </div>
    </div>
    <a class="make-order" href="<?php echo SITEURL."foods.php"; ?>">Make Order</a>
</main>
<!-- CATERING SERVICE -->
<main class="catering-service main-section">
    <h1 class="section-title">Gina's Kitchen Catering service</h1>
    <div class="underline"></div>
    <h5>Do you know that gina's kitchen offers both work days and week end catering service for all kind of occassions ?, this is a good new as you can finally entertain your guest with that delicious meal you always tell them about.</h5>
    <!-- <p>over the years our customers has attest to the good taste of food we have provided when saddled with the responsibilty of entertainment of guest in any event. our service ranges from </p> -->
    <h3>our services includes cooking of ;</h3>
    <div class="catering-carousel owl-carousel owl-theme ">
        <div class="food" data-aos="fade-right" data-aos-delay="200">
            <img src="./images/design-image/img-2.jpg" alt="">
            <h1>Banga Soup</h1>
        </div>
        <div class="food" data-aos="fade-right" data-aos-delay="200">
            <img src="./images/design-image/egusi soup.jpg" alt="">
            <h1>Egusi Soup</h1>
        </div>
        <div class="food" data-aos="fade-right" data-aos-delay="200">
            <img src="./images/design-image/img-3.jpg" alt="">
            <h1>Owho Soup</h1>
        </div>
        <div class="food" data-aos="fade-right" data-aos-delay="200">
            <img src="./images/design-image/img-1.png" alt="">
            <h1>Banga Rice</h1>
        </div>
        <div class="food" data-aos="fade-right" data-aos-delay="200">
            <img src="./images/design-image/img-2.jpg" alt="">
            <h1>Jollof rice</h1>
        </div>
        <div class="food" data-aos="fade-right" data-aos-delay="200">
            <img src="./images/design-image/img-2.jpg" alt="">
            <h1>Fried rice</h1>
        </div>
        <div class="food" data-aos="fade-right" data-aos-delay="200">
            <img src="./images/design-image/img-1.png" alt="">
            <h1>Coconut Rice</h1>
        </div>
        <div class="food" data-aos="fade-right" data-aos-delay="200">
            <img src="./images/design-image/img-1.png" alt="">
            <h1>Assorted Meat (cow)</h1>
        </div>
        <div class="food" data-aos="fade-right" data-aos-delay="200">
            <img src="./images/design-image/img-2.jpg" alt="">
            <h1>Turkey Meat</h1>
        </div>
        <div class="food" data-aos="fade-right" data-aos-delay="200">
            <img src="./images/design-image/img-3.jpg" alt="">
            <h1>Fish</h1>
        </div>
    </div>
    <p>No Strict mode as the cost of every service is negotiable when you visit us or <a href="<?php echo SITEURL."catering-service.php"; ?>">contact us</a> if you want to make more inquiries.</p>
        <a class="make-order" href="<?php echo SITEURL."catering-service.php"; ?>">Make Inquiry</a>

</main>
<!--XXX CATERING SERVICE XXX-->
<!--  -->
<!--  -->
<!-- EVENT DECORATION SERVICE -->
<main class="decoration main-section">
    <h1 class="section-title">Rosebie Event Planner And Decoration</h1>
    <div class="underline"></div>
    <h5>Rosebie event planner and decoration which is a multiple award winning decoration company is in partnership with gina's kitchen now offers an online booking service for our customers. every successfull event can be traced to the proper planning put in place to execute every activity of that event. at Rosebie Event planner and decoration we offer the following services at a pocket friendly rate.</h5>
    <ul>
        <li>Wedding planning and decoration</li>
        <li>Surprise event planning and decoration</li>
        <li>Birthday ceremony planning and decoration</li>
        <li>Buriale ceremony planning and decoration</li>
        <li>Graduation ceremony planning and decoration</li>
        <li>Anniversary planning and decoration</li>
    </ul>
    <p>Rosebie Event planner and decoration,  decorates any kind of venue, both halls and open space venue for each event.below are some of the our recent decorations.</p>
     <div class="recent-decoration owl-carousel owl-theme">
        <div class="decoration-container" data-aos="fade-right" data-aos-delay="200">
            <img src="./images/design-image/deco-1.jpg" alt="">
            <h1>Wedding ceremony</h1>
        </div>
     
        <div class="decoration-container" data-aos="fade-right" data-aos-delay="200">
            <img src="./images/design-image/deco-2.jpg" alt="">
            <h1>Birthday ceremony</h1>
        </div>
        <div class="decoration-container" data-aos="fade-right" data-aos-delay="200">
            <img src="./images/design-image/deco-3.jpg" alt="">
            <h1>Wedding ceremony</h1>
        </div>
        <div class="decoration-container" data-aos="fade-right" data-aos-delay="200">
            <img src="./images/design-image/deco-4.jpg" alt="">
            <h1>Marriage Anniversary</h1>
        </div>
        <div class="decoration-container" data-aos="fade-right" data-aos-delay="200">
            <img src="./images/design-image/deco-5.jpg" alt="">
            <h1>Burial ceremony</h1>
        </div>
        <div class="decoration-container" data-aos="fade-right" data-aos-delay="200">
            <img src="./images/design-image/deco-6.jpg" alt="">
            <h1>Surprise ceremony</h1>
        </div>
        <div class="decoration-container" data-aos="fade-right" data-aos-delay="200">
            <img src="./images/design-image/deco-7.jpg" alt="">
            <h1>Surprise ceremony</h1>
        </div>
        <div class="decoration-container" data-aos="fade-right" data-aos-delay="200">
            <img src="./images/design-image/deco-7.jpg" alt="">
            <h1>Graduation ceremony</h1>
        </div>
        <div class="decoration-container" data-aos="fade-right" data-aos-delay="200">
            <img src="./images/design-image/deco-8.jpg" alt="">
            <h1>Church Program</h1>
        </div>    
     </div>
     <!-- END OF DECORATION CAROUSEL -->
    <p>Again, No Strict mode, meaning the cost of every event is negotiable. so why not give us a try let us help you anchor that event that is giving you some sleepless night and have a peaceful "after ceremony". <a href="<?php echo SITEURL."event-decoration.php"; ?>">contact us</a> if you want
        to make more inquiries.</p>
    <a class="make-order" href="<?php echo SITEURL."event-decoration.php"; ?>">Make Inquiry</a>
</main>
<!-- GINAS KITCHEN HARD CODED HTML ENDS HERE -->

    <!-- CAtegories Section Starts Here -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Explore Foods</h2>

           

            <!-- displaying the different categories of food from the database -->
            <?php 
                // sql query
                $sql = "SELECT * FROM tbl_category WHERE active = 'yes' AND featured ='yes' LIMIT 3";
                // executing the query
                $res = mysqli_query($conn, $sql);
                // counting the numer of rows returned from the query
                $count = mysqli_num_rows($res);

                if($count > 0){
                    // then there are data available to display
                    while($row = mysqli_fetch_assoc($res)){
                        $id = $row['id'];
                        $title = $row['title'];
                        $image_name = $row['image_name'];
                        // echo $id;
                        ?>
                        
                        <a href="<?php echo SITEURL; ?>category-foods.php?category_id=<?php echo $id;?>">
                            <div class="box-3 float-container">
                                <!-- checking if the returned data has image -->
                                <?php
                                if($image_name == ""){
                                    // there is no image
                                    echo  "<div class='error text-center'>No image available</div>";

                                }else{
                                    // there is image
                                    ?>
                                    <img src="<?php SITEURL; ?>images/category/<?php echo $image_name; ?>" alt="Pizza" class="img-responsive img-curve">
                                    <?php
                                }

                                ?>

                                <h3 class="float-text text-white"><?php echo $title; ?></h3>
                            </div>
                        </a>

                        <?php
                    }

                }else{
                    // there are no data to display
                    echo "<div class='error text-center'>No category available</div>";

                }

            ?>


            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Categories Section Ends Here -->

    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>

            <?php
                // functionality to fetch all the food, description, price and title

                // sql query
                $sql2 = "SELECT * FROM tbl_food WHERE active = 'yes' AND featured = 'yes' ";

                //executing the query 
                $res2 = mysqli_query($conn, $sql2);

                //counting the number of rows returned 
                $count2 = mysqli_num_rows($res2);

                //
                if($count2 > 0){
                    // there are data available
                    while($row2 = mysqli_fetch_assoc($res2)){
                        $id = $row2['id'];
                        $title = $row2['title'];
                        $description = $row2['description'];
                        $price = $row2['price'];
                        $image_name = $row2['image_name'];
                        ?>

                        <div class="food-menu-box">
                            <div class="food-menu-img">
                                <?php
                                    if($image_name == ""){
                                        // there is no image available
                                     echo "<div class='error text-center'>No image available</div>";

                                    }else{
                                        // there is image available
                                        ?>
                                        <img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name; ?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                                        <?php
                                    }
                                ?>
                            </div>

                            <div class="food-menu-desc">
                                <h4><?php echo $title; ?></h4>
                                <!-- <p class="food-price">$<?php //echo $price; ?></p> -->
                                <p class="food-detail"><?php echo $description; ?>
                                </p>
                                <br>

                                <a href="<?php echo SITEURL; ?>pre_order.php?food_id=<?php echo $id; ?>" class="btn btn-primary">Order Now</a>
                            </div>
                        </div>
                        <?php
                    }

                } else{
                    // no data is available
                 echo "<div class='error text-center'>No food available</div>";
                }



            ?>


           


            <div class="clearfix"></div>

            

        </div>

        <p class="text-center">
            <a href="#">See All Foods</a>
        </p>
    </section>
    <!-- fOOD Menu Section Ends Here -->



<script src="./js/special-js/real-time.js"></script>
    <?php include_once "./partials-front/footer.php"; ?>
