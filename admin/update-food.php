<?php  include_once "./partials/header.php"; ?>


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
        <!-- UPDATE GOES HERE -->

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

                                    //echo "<option value='$category_id'>$category_title</option>";
                                    ?>

                                    <option  value="<?php echo $category_id ?>"><?php echo $category_title?></option>

                                    <option <?php //if($current_category == $category_id){echo 'selected';} ?> value="<?php///echo $category_id ?>"><?php //echo $category_title?></option>

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
                        <input <?php if($active == 'no'){echo 'checked';} ?> type="radio" name="active" id="" value="no" >No
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
            // 1 GET ALL THE DETAILS 

            $id = $_POST['id'];
            $title =  mysqli_real_escape_string($conn, $_POST['title']);
            $description =  mysqli_real_escape_string($conn, $_POST['description']);
            $price =  mysqli_real_escape_string($conn, $_POST['price']);
            $current_image = $_POST['current_image'];
            $category =  mysqli_real_escape_string($conn, $_POST['category']);
            $featured = $_POST['featured'];
            $active = $_POST['active'];
            // details fetched
            // 

             // 2 UPLOAD THE IMAGE IF SELECTED
            if(isset($_FILES['image'])){
                // if the button is clicked, then a new image is about to be uploaded
                $image_name = $_FILES['image']['name'];

                // cheking if the data[image] is available
                if($image_name != ""){
                    // this means that, there is an image
                    // rename the image
                    $ext = end(explode(".", $image_name));
                    // renamed image name now becomes
                    $image_name = "food-name-".rand(000, 999).'.'.$ext;
                    // 
                    // getting the src path and destination path
                    $src_path = $_FILES['image']['tmp_name'];
                    
                    // getting the destination path and destination path
                    $des_path = "../images/food/".$image_name; 

                    // uploading the image
                    $upload = move_uploaded_file($src_path, $des_path);
                    if($upload == false){
                        $_SESSION['img-update-failed'] = "<div class='error'>failed to update image</div";
                        header('location:'.SITEURL.'admin/manage-food.php');
                        die();
                    }
                    // 3 REMOVE THE EXISTING IMAGE IF A NEW ONE IS SELECTED
                    // part b
                    if($current_image!=""){
                        // remove the current image
                        $remove_path = "../images/food/".$current_image;
                        $remove = unlink($remove_path);
                        // 
                        // checking if the current image is removed successfully
                        if($upload == false){
                             $_SESSION['img-removal-failed'] = "<div class='error'>failed to remove current image</div";
                            header('location:'.SITEURL.'admin/manage-food.php');
                            die();
                        }
                    }

                    // if the button is clicked but the image is not replaced
                }else{
                $image_name = $current_image;
                }

            }
            // if the image button is not clicked
            else{
                $image_name = $current_image;
                

            }
           
            // 4 UODATE THE FOOD IN THE DATABASE
            // sql query to update the item in the database
            $sql3 = "UPDATE tbl_food SET 
            id = $id,
            title = '$title',
            description = '$description',
            price = $price,
            image_name = '$image_name',
            category_id = '$category',
            featured = '$featured',
            active = '$active' 
            WHERE id = $id ";
            // REDIRECT TO THE MANAGE FOOD PAGE

            $res3 = mysqli_query($conn, $sql3);
            
            if($res3 == true){
                $_SESSION['food-updated'] = "<div class='success text-center'>food updated successfully!</div";
                header('location:'.SITEURL.'admin/manage-food.php');

            }else{
            $_SESSION['food-updated'] = "<div class='error'>Failed to update food</div";
            header('location:'.SITEURL.'admin/manage-food.php');    
            }

        }


?>





        <!-- UPDATE END HERE -->
    </div>
</div>














<?php  include_once "./partials/footer.php"; ?>