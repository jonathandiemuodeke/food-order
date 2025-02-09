<?php include_once "./partials/header.php" ?>


<?php
    if(isset($_GET['id'])){
        
        $id =  $_GET['id'];

        $sql2 = "SELECT * FROM tbl_food WHERE id = $id ";

        $res2 = mysqli_query($conn, $sql2);

        // $count2 = mysqli_num_rows($res2);

            $rows2 = mysqli_fetch_assoc($res2);
                
            $title =  $rows2['title'];
            $description =  $rows2['description'];
            $price =  $rows2['price'];
            $current_image =  $rows2['image_name'];
            $current_category =  $rows2['category_id'];
            $featured =  $rows2['featured'];
            $active =  $rows2['active'];
            
    }else{
        header('location:'.SITEURL.'admin/manage-food.php');
    }
?>

<div class="main-content">
    <div class="wrapper">
        <h1 class="h1-title">Update Food</h1>
        <!--  -->
        <form action="" method="post" enctype="multipart/form-data">
            <table class="tbl-30">
                <tr>
                    <td>Title</td>
                    <td><input type="text" name="title" placeholder="Food Title" value="<?php echo $title;?>"></td>
                </tr>

                <tr>
                    <td>Description</td>
                    <td><textarea name="description" id="" cols="22" rows="5" placeholder="Food Description" ><?php echo $description;?></textarea></td>
                </tr>

                <tr>
                    <td>Price</td>
                    <td><input type="number" name="price" id="" value="<?php echo $price;?>"></td>
                </tr>

                <tr>
                    <td>Current Image</td>
                    <td>

                    <?php
                    if($current_image == ""){
                        // then there is no image
                        echo "<div class='error'>No image available</div>";
                        
                    }else{
                        ?>
                        <img src="<?php echo SITEURL;?>images/food/<?php echo $current_image; ?>" class="img-width" >

                        <?php
                    }
                    
                    ?>

                    </td>
                </tr>

                <tr>
                    <td>image</td>
                    <td><input type="file" name="image" id=""></td>
                </tr>

                <tr>
                    <td>category</td>
                    <td>
                        <select name="category">
                            <?php  
                            $sql = "SELECT * FROM tbl_category WHERE active = 'yes' ";

                            $res = mysqli_query($conn, $sql);

                            $count = mysqli_num_rows($res);

                            if ($count > 0){
                                while($rows = mysqli_fetch_assoc($res) ){
                                    $category_id = $rows['id'];
                                    $category_title = $rows['title'];

                                    // echo "<option value='$category_id'>$category_title</option>";
                                    ?>
                                    <option <?php if($current_category == $category_id){echo 'selected';} ?> value="<?php echo $category_id ?>"><?php echo $category_title?></option>

                                    <?php

                                }



                            }else{
                                echo "<option value='0'>No category found</option>";

                            }

                            ?>
                           
                        </select>
                    </td>
                </tr>

                <tr>
                    <td>Featured</td>
                    <td>
                        <input <?php if($featured == 'yes'){echo 'checked';} ?> type="radio" name="featured" id="" value="yes" >Yes
                        <input <?php if($featured == 'no'){echo 'checked';} ?> type="radio" name="featured" id="" value="no" >No
                    </td>
                </tr>

                <tr>
                    <td>Active</td>
                    <td>
                        <input <?php if($active == 'yes'){echo 'checked';} ?> type="radio" name="active" id="" value="yes" >Yes
                        <input <?php if($active == 'no'){echo 'checked';} ?> type="radio" name="active" id="" value="" >No
                    </td>
                </tr>

                <tr>
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <input type="hidden" name="current_image" value="<?php echo $current_image; ?>">
                    <td><input type="submit" name="submit" value="Update Food" class="btn-secondary"></td>
                </tr>
            </table>
        </form>


        <?php

        if(isset($_POST['submit'])){
            // 
            // 1. get all the details to be updated

            $id = $_POST['id'];
            $title = $_POST['title'];
            $description = $_POST['description'];
            $price = $_POST['price'];
            $current_image = $_POST['current_image'];
            $category = $_POST['category'];
            $featured = $_POST['featured'];
            $active = $_POST['active'];


            // 2. upload the image if selcted
            if(isset($_FILES['image']['name'])){
                // the image button is clicked
                $image_name = $_FILES['image']['name'];
                // 
                // checking if the file is available
                if($image_name != ""){
                    // then the image file is selected

                    $ext = end(explode(".", $image_name));
                    $image_name = "food-name-".rand(000, 999).'.'.$ext;

                    $src_path = $_FILES['image']['tmp_name'];

                    $dst_path = "../images/food/".$image_name;

                    $uplaod = move_uploaded_file($src_path, $dst_path);

                    // check if the image uploaded successfully
                    if(!$uplaod){
                        $_SESSION['img-update-failed'] = "<div class='error'>failed to upload image</div";
                        header('location:'.SITEURL.'admin/manage-food.php');
                        die();
                    }
                    // 
                    // 3. remove the existing image if a new image is selected
                    //Removing the current image if it is available
                    if ($current_image != ""){
                        $remove_path = "../images/food/".$current_image;
                        $remove = unlink($remove_path);

                        if(!$remove){
                        $_SESSION['img-removal-failed'] = "<div class='error'>failed to remove image</div";
                        header('location:'.SITEURL.'admin/manage-food.php');
                        die();
                        }

                    }
                }

            }else{
                // image button is not clicked 
                if($current_image == ""){
                    $image_name = "";
                }else{
                    $image_name = $current_image;
                }
                echo $image_name;
            }
            die();


            // 4. redirect to manage page
            $sql3 = "UPDATE tbl_food SET title = '$title',description = '$description', price = $price, image_name = '$new_image', category_id = '$category', featured = '$featured', active = '$active' WHERE id = $id ";
            // var_dump($sql3);
            // die();

            // $res3 = mysqli_query($conn, $sql3);
            $res3 = mysqli_query($conn, $sql3);

            //  query executed and food updated
            if($res3){
                $_SESSION['food-updated'] = "<div class='success text-center'>Food updated successfully</div";
                header('location:'.SITEURL.'admin/manage-food.php');

            //  failed to update food
            }else{
                $_SESSION['food-updated'] = "<div class='error text-center'>failed to update food</div";
                header('location:'.SITEURL.'admin/manage-food.php');
            }
        }



        ?>



        <!--  -->
    </div>
</div>



<?php include_once "./partials/footer.php" ?>