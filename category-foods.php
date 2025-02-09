<?php include_once "./partials-front/header.php"; ?>

<?php
    if(isset($_GET['category_id'])){
        // get the id
        $category_id = $_GET['category_id'];

        // writing an sql query to display the category clicked
        $sql = "SELECT title FROM tbl_category WHERE id = $category_id";

        // executing the query
        $res = mysqli_query($conn, $sql);

        $row = mysqli_fetch_assoc($res);

        $category_title = $row['title'];


    }else{
        // no id passed and hence, redirect to the home page
        header('location:'.SITEURL);
    }
?>



    <!-- fOOD sEARCH Section Starts Here -->
    <main>
    <section class="food-search text-center">
        <div class="container">
            
            <h2>Foods on <a href="#" class="text-white">"<?php echo $category_title; ?>"</a></h2>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->



    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>

            <!-- DISPLAYING THE FOOD BASED ON THE CATEGORY CLICKED STARTS HERE -->

<?php

// SLQ QUERY
$sql2 = "SELECT * FROM tbl_food WHERE category_id = $category_id";

// executing the query
$res2 = mysqli_query($conn, $sql2);

$count2 = mysqli_num_rows($res2);

if($count2 > 0){
    // there are similar food categor to be displayed
    while($row2 = mysqli_fetch_assoc($res2)){
        // getting the data from the database
        $id = $row2['id'];
        $title = $row2['title'];
        $description = $row2['description'];
        $price = $row2['price'];
        $image_name = $row2['image_name'];

        ?>

        <div class="food-menu-box">
            <div class="food-menu-img">
                <!-- checking if image is added or not -->
                <?php

                if($image_name == ""){
                    // there is no image availale to display
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
                <p class="food-price">$<?php echo $price ?></p>
                <p class="food-detail"><?php echo $description ?></p>
                <br>

                <a href="<?php echo SITEURL; ?>order.php?food_id=<?php echo $id; ?>" class="btn btn-primary">Order Now</a>
            </div>
        </div>
        <?php

    }

}
?>

<!-- DISPLAYING THE FOOD BASED ON THE CATEGORY CLICKED ENDS HERE -->




            <div class="clearfix"></div>

            

        </div>

    </section>
    <!-- fOOD Menu Section Ends Here -->
    </main>


   <?php include_once "./partials-front/footer.php"; ?>
