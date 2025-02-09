<?php include_once "./partials-front/header.php"; ?>



    <!-- fOOD sEARCH Section Starts Here -->
    <main>
    <section class="food-search text-center">
        <div class="container">

        <?php
            // GETTING THE SEARCHED KEYWORD
        //    $search = $_POST['search']; //this exposes our code to sql injection
            $search = mysqli_real_escape_string($conn, $_POST['search']);
        ?>
            
            <h2>Foods Based on Your Search <a href="#" class="text-white">"<?php echo $search;?>"</a></h2>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->



    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>

            <!-- THE SEARCH FUNCTIONALITY STARTS HERE -->
            <?php
            // CREATING AN SQL QUERY 
            $sql = "SELECT * FROM tbl_food WHERE title LIKE '%$search%' OR description LIKE '%$search%' ";

            //executing the query 
            $res = mysqli_query($conn, $sql); 

            // counting the number of data returned from the search
            $count = mysqli_num_rows($res);
            
            if($count > 0){
                // then there is a match
                while($row = mysqli_fetch_assoc($res)){
                    $id = $row['id'];
                    $title = $row['title'];
                    $description = $row['description'];
                    $price = $row['price'];
                    $image_name = $row['image_name'];

                    // displaying the seacrhed result
                    ?>


                    <div class="food-menu-box">
                        <div class="food-menu-img">
                            <!-- checking if there is an image for the found item -->
                            <?php
                            if($image_name == ""){
                                // then there is no image for the searched item
                                echo  "<div class='error text-center'>No image available</div>";
                                
                            }else{
                                // there is an image
                                ?>

                                <img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name; ?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                                <?php
                            }
                            ?>
                        </div>

                        <div class="food-menu-desc">
                            <h4><?php echo $title; ?></h4>
                            <p class="food-price">$<?php echo $price; ?></p>
                            <p class="food-detail"><?php echo $description; ?></p>
                            <br>

                            <a href="#" class="btn btn-primary">Order Now</a>
                        </div>
                    </div>
                    <?php
                }


            }else{
                // there are ni match from the search
                 echo  "<div class='error text-center'>No available match for your search</div>";
            }

            ?>

            <!-- THE SEARCH FUNCTIONALITY ENDS HERE -->

            

            <div class="clearfix"></div>

            

        </div>

    </section>
    </main>
    <!-- fOOD Menu Section Ends Here -->


   <?php include_once "./partials-front/footer.php"; ?>
