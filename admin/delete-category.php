<?php

include_once "../config/constant.php";

// checking if the user pass in a valid id and image_name value
if(isset($_GET['id']) AND isset($_GET['image_name'])){
    // get category value and delete

    $id = $_GET['id'];
    $image_name = $_GET['image_name'];

    if($image_name != ""){ // then, there is an image
        
        // next, get the image path
        $path = '../images/category/'.$image_name;

        // removing the image using unlink function
        $remove = unlink($path); 
        // remove will return a true or false value

        if(!$remove){
            // set session to display failure to remove image
            $_SESSION['remove'] = "<div class='error text-center'>Failed to remove image</div>";
            
            // redirect to manage category page
            header('location:'.SITEURL.'admin/manage-category.php');

            // End the process
            die();
        }
    }

    // Delete data from the database
    // sql query to delete the category
    $sql = "DELETE FROM tbl_category WHERE id = $id";
    $res = mysqli_query($conn, $sql);

    if($res){
        // set session variable to display deletion successfull
        $_SESSION['delete'] = "<div class='success text-center'>category deleted successfully</div>";

        // redirect to manage category page
        header('location:'.SITEURL.'admin/manage-category.php');

    }else{ //redirect to manage catgory page with error message
        $_SESSION['delete'] = "<div class='error text-center'>failed to delete catgory</div>";

        // redirect to manage category page
        header('location:'.SITEURL.'admin/manage-category.php');

    }



// else statement
}else{
    // redirect to manage category page 
    header('location:'.SITEURL.'admin/manage-category.php');
}
?>