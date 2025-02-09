<?php include_once "./partials-front/header.php"; ?>



    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            
            <form action="<?php SITEURL; ?>food-search.php" method="POST">
                <input type="search" name="search" placeholder="Search for Food.." required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->



    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>

            <!-- FUNCTIONALITY TO DISPLAY THE ACTIVE FOOD FROM THE DATABASE STARTS HERE-->

            <?php  
            // the sql query
            $sql = "SELECT * FROM tbl_food WHERE active = 'yes'";

            //executing the query 
            $res = mysqli_query($conn, $sql);

            // counting the number of rows fetched from the query
            $count = mysqli_num_rows($res);

            if($count > 0){
                // then there are data to be displayed
                while ($row = mysqli_fetch_assoc($res)){
                    $id = $row['id'];
                    $title = $row['title'];
                    $price = $row['price'];
                    $description = $row['description'];
                    $image_name = $row['image_name'];
                    ?>
                    <!-- displaying the fetched data from the database -->
                    <div class="food-menu-box">
                        <div class="food-menu-img">
                            <?php
                            if($image_name == ""){
                                // then there is no image available to display
                                echo "<div class='error text-center'>No image available</div>";
                                

                            }else{
                                // there is an image to display
                                ?>
                                <img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name; ?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                                <?php
                            }

                            ?>
                        </div>

                        <div class="food-menu-desc">
                            <h6><?php echo $title; ?></h6>
                            <p class="food-price"><?php echo $price; ?> NG</p>
                            <p class="food-detail">
                            <?php echo $description; ?></p>
                            <br>

                            <a href="<?php echo SITEURL; ?>pre_order.php?food_id=<?php echo $id; ?>" class="btn btn-primary btn-full">Order Now</a>
                        </div>
                    </div>

                    <?php
                }


            }else{
                // there are no data to be displayed
             echo "<div class='error text-center'>No food available</div>";
            }
            ?>

            <!-- FUNCTIONALITY TO DISPLAY THE ACTIVE FOOD FROM THE DATABASE ENDS HERE-->


            


            <div class="clearfix"></div>

            

        </div>

    </section>
    <!-- fOOD Menu Section Ends Here -->


   <?php include_once "./partials-front/footer.php"; ?>
