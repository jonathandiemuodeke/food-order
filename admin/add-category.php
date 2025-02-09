<?php   include_once "./partials/header.php"; ?>

<div class="main-content">
    <div class="wrapper">
        <h1 class="h1-title">Add New Category</h1>

        <!-- session variable to showw if the category is added successfully -->
        <?php 
        if(isset($_SESSION['add-category']))
        {
            echo $_SESSION['add-category'];
            unset($_SESSION['add-category']);
        } 
        if(isset($_SESSION['upload']))
        {
            echo $_SESSION['upload'];
            unset($_SESSION['upload']);
        } 
        ?>

        <!-- ADD  CATEGORY FORM BEGINS -->

        
        <div class="">
            <form action="" method="post" enctype="multipart/form-data">
                <table class="tbl-30">
                    <tr>
                        <td><label for="">Title</label></td>
                        <td ><input type="text" name="title" placeholder="Category title"></td>
                    </tr>

                    <tr>
                        <td>Select image:</td>
                        <td>
                            <input type="file" name="image" id="">
                        </td>
                    </tr>


                    <tr>
                        <td>Featured:</td>
                        <td>
                        <input type="radio" name="featured" id="" value="yes">Yes
                       
                            <input type="radio" name="featured" id="" value="no">No
                        </td>
                    </tr>

                    <tr>
                        <td>Active:</td>
                        <td>
                        <input type="radio" name="active" id="" value="yes">Yes
                       
                            <input type="radio" name="active" id="" value="no">No
                        </td>
                    </tr>

                    <td><input type="submit" name="add-category" value="Add Category" class="btn-secondary"></td>

                </table>
            </form>
        </div>

        <!-- ADD  CATEGORY FORM ENDS -->

<!-- functionality -->
<?php
if(isset($_POST['add-category'])){
    // grab the values if the button is clicked
    $title =  mysqli_real_escape_string($conn, $_POST['title']);

    //cecking if the radio button is clicked 
    if(isset($_POST['featured'])){
        $featured = $_POST['featured'];
    }
    else
    {
        $featured = "no";
    }

    if(isset($_POST['active']))
    {
        $active = $_POST['active'];
    }
    else
    {
        $active = "no";
    }
// $image

    if(isset($_FILES['image']['name'])){
        $img_name = $_FILES['image']['name'];
        // 
        // renaming the image to avoid replacing already existing one with thesame name 

        // uploading image onlt if selected
    if($img_name != ""){

        $ext = end(explode(".", $img_name));
        // this fecth path after a dot in the image name
        // renaming the image authomatically
        $image_name = "Food_category".rand(000, 999).'.'.$ext;
        //         echo $image_name;
        // die();




        $source_path = $_FILES['image']['tmp_name'];
        $destination_path = "../images/category/".$image_name;
        

        
       
        
        
        // upload the image to the category folder only if the sql querry is executed
        // if($res == true){
            // }
                $upload = move_uploaded_file($source_path, $destination_path);
                
                

                
                
                
                // to check if the image is uploaded successfully
                if(!$upload){
                    $_SESSION['upload'] = "<div class='error text-center'>failed to upoad image</div>";
                    header('location:'.SITEURL.'admin/add-category.php');    
                    die();
                }
     }


    }else{
        // dont upload image
        $image_name = "";
    }

// 
    // sql query to insert the grabbed data into the database
    $sql = " INSERT INTO tbl_category SET 
    title = '$title', 
    image_name = '$image_name',
    featured = '$featured',
    active = '$active'
    ";
    // 

    // checking if the querry executed successfully
    $res = mysqli_query($conn, $sql);

    if($res == true){
        $_SESSION['add-category'] = "<div class='success text-center'>Category Added Successfully</div>";
    // redirecting to admin page
        header('location:'.SITEURL.'admin/manage-category.php');    
    }
    else
    {
         $_SESSION['add-category'] = "<div class='error text-center'>failed to add category</div>";
    // redirecting to admin page
        header('location:'.SITEURL.'admin/manage-category.php');  
    }



    
}
?>




    </div>
</div>




<?php   include_once "./partials/footer.php"; ?>


