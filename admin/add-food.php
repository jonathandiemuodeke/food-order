<?php include_once "./partials/header.php"; ?>
<div class="main-content">
    <div class="wrapper">
        <h1 class="h1-title">Add Food</h1>
        <?php
            if(isset($_SESSION['upload-failed'])){
                echo $_SESSION['upload-failed'];
                unset($_SESSION['upload-failed']);
            }

        ?>

        <form action="" method="post" enctype="multipart/form-data">
            <table class="tbl-30">
                <tr>
                    <td>Title</td>
                    <td><input type="text" name="title" placeholder="Food Title"></td>
                </tr>

                <tr>
                    <td>Description</td>
                    <td><textarea name="description" id="" cols="22" rows="5" placeholder="Food Description"></textarea></td>
                </tr>

                <tr>
                    <td>Price</td>
                    <td><input type="number" name="price" id=""></td>
                </tr>

                <tr>
                    <td>image</td>
                    <td><input type="file" name="image" id=""></td>
                </tr>

                <tr>
                    <td>category</td>
                    <td>
                        <select name="category" id="">


                    <?php  
                    // code to display category from database

                    // 1.writing sql query to display the available categories
                    $sql = "SELECT * FROM tbl_category WHERE active='yes'";

                    // executing the query
                    $res = mysqli_query($conn,$sql);

                    // checking the number of rows returned from the query
                    $count = mysqli_num_rows($res);
                    if($count > 0){
                        // there are data available
                        while($rows = mysqli_fetch_assoc($res)){
                            // setting the details of the 
                            $id = $rows['id'];
                            $title = $rows['title'];

                            ?>
                                <option value="<?php echo $id; ?>"><?php echo $title; ?></option>
                            <?php
                        }
                    }else{
                        // there are no data avaialable
                        ?>
                        <option value="0">No Category Found</option>
                        <?php
                    }
                    ?>

                            <!-- <option value="1">Snacks</option>
                            <option value="2">Food</option> -->
                        </select>
                    </td>
                </tr>

                <tr>
                    <td>Featured</td>
                    <td>
                        <input type="radio" name="featured" id="" value="yes">Yes
                        <input type="radio" name="featured" id="" value="no">No
                    </td>
                </tr>

                <tr>
                    <td>Active</td>
                    <td>
                        <input type="radio" name="active" id="" value="yes">Yes
                        <input type="radio" name="active" id="" value="no">No
                    </td>
                </tr>

                <tr>
                    <td><input type="submit" name="submit" value="Add Food" class="btn-secondary"></td>
                </tr>
            </table>
        </form>


        <?php
        if(isset($_POST['submit'])){
            // 1. get the details of the data to be inserted into the database

            $title =  mysqli_real_escape_string($conn, $_POST['title']);
            $description =  mysqli_real_escape_string($conn, $_POST['description']);
            $price =  mysqli_real_escape_string($conn, $_POST['price']);
            $category =  mysqli_real_escape_string($conn, $_POST['category']);

            // checking if the featured radio button is checked or not
            if(isset($_POST['featured'])){

                $featured = $_POST['featured'];
            } else{ $featured = 'no';} // setting the default value}

            // checking if the active radio button is checked or not 
            if(isset($_POST['active'])){

                $active = $_POST['active'];
            } else{ $active = 'no';}  // setting the default value}

            // 
            // 
            // 2. select the image if available
            // checking if the image button is clicked or not
            if(isset($_FILES['image']['name'])){
                // get the image details
                $image_name = $_FILES['image']['name'];

                // checking if the image is selected
                if($image_name != ""){
                    //rename the image
                    // get the extention
                    $ext = end(explode('.' , $image_name));

                    $image_name = "food-name-".rand(000, 999).".".$ext;

                    // source path
                    $src = $_FILES['image']['tmp_name']; // the current source path of the image
                    // 
                    $destination = "../images/food/".$image_name;
                    // 

                    // moving the uploaded image into the database
                    $upload = move_uploaded_file($src, $destination);
                    // 
                    // checking if the image was uploaded 
                    if(!$upload){
                        // send error message
                        $_SESSION['upload-failed'] = "<div class='error text-center'>failed to upload image</div>";

                        // redirect to add-food page
                        header('location:'.SITEURL.'admin/add-food.php');

                        // stop process
                        die();

                    }
                }



            }else{
                // set the default value of the image to empty string
                $image_name = "";
            }

            // 3. insert the data into the database
            $sql = "INSERT INTO tbl_food SET
            title = '$title',
            description = '$description',
            category_id = $category,
            price = $price,
            image_name = '$image_name',
            featured = '$featured',
            active = '$active'
            ";


            $res2 = mysqli_query($conn, $sql);
            // redirect to add manage food page with message
            if($res2){
                // data was inserted successfully
                $_SESSION['uploaded'] = "<div class='success text-center'>Food added  successfully !</div>";
                header('location:'.SITEURL.'admin/manage-food.php');



            }else{
                // data was not inserted
                    $_SESSION['upload-failed'] = "<div class='error text-center'>failed to add new food !</div>";
                    header('location:'.SITEURL.'admin/manage-food.php');
                
            }





        }
        ?>












    </div>
</div>





<?php include_once "./partials/footer.php"; ?>