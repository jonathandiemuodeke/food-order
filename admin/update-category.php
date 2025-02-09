<?php include_once "./partials/header.php"; ?>

<div class="main-content">
    <div class="wrapper">
        <h1 class="h1-title">Update category</h1>


        <!-- table to fetch the data to be updated -->

        <!-- FUNCTIONALITY -->
        <?php 

            if(isset($_GET['id'])){

                // gettingg the values
                $id = $_GET['id'];

                // crate sql query to fetch other details
                $sql = "SELECT * FROM tbl_category WHERE id = $id";
                // executing the query
                $res = mysqli_query($conn, $sql);

                // counting the number of rows of the data fetched
                $count = mysqli_num_rows($res);
                
                // if only one row is return, then execute the query 
                if($count == 1){

                    $rows = mysqli_fetch_assoc($res);
                    // 
                    // setting the values fetched
                    $title = $rows['title'];
                    $current_image = $rows['image_name'];
                    $featured = $rows['featured'];
                    $active = $rows['active'];

                    // else, redirect to the manage category page
                }else{
                    $_SESSION['no-record-found'] = "<div class='error text-center'>No record found</div>";
                    header('location:'.SITEURL.'admin/manage-category.php');

                }

            }else{
                // redirect to manage category page
                header('location:'.SITEURL.'admin/manage-category.php');

            }


        ?>
        <!-- FUNCTIONALITY -->



        <form action="" method="post" enctype="multipart/form-data">

            <table class="tbl-30">
                <tr>
                    <td>Title</td>
                    <td><input type="text" name="title" value="<?php echo $title; ?>" ></td>
                </tr>

                <tr>
                    <td>Current image</td>
                    <td>
                        <?php 
                            if($current_image != ''){

                                // display image
                                ?>
                                <img src="<?php echo SITEURL; ?>images/category/<?php echo $current_image; ?>" alt="" srcset="" class="img-width">

                                <?php

                            }else{
                                // echo no imaged was added
                                echo "<div class='error text-center'>No image added</div>;";
                            }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>Select New Image</td>
                    <td><input type="file" name="image" value="" id=""></td>
                </tr>

                <tr>
                    <td>Featured:</td>
                    <td>
                        <input <?php if($featured == 'yes'){echo 'checked';} ?> type="radio" name="featured" id="" value="yes">Yes
                        <input <?php if($featured == 'no'){echo 'checked';} ?> type="radio" name="featured" id="" value="no">No


                    </td>
                
                <tr>
                    <td>Active:</td>
                    <td>
                        <input <?php if($active == 'yes'){echo 'checked';} ?> type="radio" name="active" id="" value="yes">Yes

                        <input  <?php if($active == 'no'){echo 'checked';} ?>  type="radio" name="active" id="" value="no" >No
                    </td>
                </tr>
                </tr>

                <tr>
                    <td><input type="hidden" name="current_image" value="<?php echo $current_image; ?>"></td>
                    <td><input type="hidden" name="id" value="<?php echo $id; ?>"></td>
                    <td><input type="submit" name='submit' value="Update Category" class="btn-secondary"></td>
                </tr>
            </table>

        </form>

        <!-- updating code -->
        <?php

        if(isset($_POST['submit'])){
            $id = $_POST['id'];
            $current_image = $_POST['current_image'];
            $title =  mysqli_real_escape_string($conn, $_POST['title']);
            $featured = $_POST['featured'];
            $active = $_POST['active'];

            // updating new image if available

            if(isset($_FILES['image']['name'])){
                // getting image details
                $image_name = $_FILES['image']['name'];

                if($image_name != ""){ //checking if image is availale or not 


                        // A. UPLAODING THE NEW IMAGE
                        // there is an image availble, hence, upload the image
                        $ext = end(explode(".", $image_name));
                        // this fecth path after a dot in the image name
                        
                        // renaming the image authomatically
                        $image_name = "Food_category".rand(000, 999).'.'.$ext;
                        // 

                        $source_path = $_FILES['image']['tmp_name'];
                        $destination_path = "../images/category/".$image_name;
                        

                        // upload the image to the category folder only if the sql querry is executed
                        // if($res == true){
                            // }
                        $upload = move_uploaded_file($source_path, $destination_path);
                    
                    
                    
                            // to check if the image is uploaded successfully
                        if(!$upload){
                                $_SESSION['upload'] = "<div class='error text-center'>failed to upoad image</div>";
                                header('location:'.SITEURL.'admin/manage-category.php');    
                                die();
                        }

                    //  REMOVING THE CURRENT IMAGE
                        if($current_image != ""){
                            $remove_path = "../images/category/".$current_image;
                            $remove = unlink($remove_path);

                            // cheking if the image was removed successfully
                            if(!$remove){
                                $_SESSION['remove-img-failed'] = "<div class='error text-center'>failed to remove current image</div>";
                                header('location:'.SITEURL.'admin/manage-category.php');    
                                die();
                            }
                        }

                }else{
                    // set the image name to be empty
                    $image_name = $current_image;
                }
                
                
                
            }
            // else{
                // $image_name = "";
                // no new image was selected
            // }





            // sql query to update the database
            $sql2 = "UPDATE tbl_category SET 
            title = '$title',
            image_name = '$image_name',
            featured = '$featured',
            active = '$active' 
            WHERE id = $id
            ";

            $res2 = mysqli_query($conn, $sql2);
            // cheking if the query executing successfully

            if($res2){
                $_SESSION['updated'] = "<div class='success text-center'>category updated successfully</div>";
                header('location:'.SITEURL.'admin/manage-category.php');


            }else{
                $_SESSION['updated'] = "<div class='error text-center'>failed to update category y</div>";
                header('location:'.SITEURL.'admin/manage-category.php');
            }

            
        }




        ?>
    </div>
</div>













<?php include_once "./partials/footer.php"; ?>