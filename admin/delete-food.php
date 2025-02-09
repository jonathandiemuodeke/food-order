<?php
include_once "../config/constant.php";


// checking if the user gets to this page by passing a valid id or not
if(isset($_GET['id']) && isset($_GET['image_name'])){
    // echo $id = $_GET['id'];
    // step1 get the id and image name if available
    $id = $_GET['id'];
    $image_name = $_GET['image_name'];
    // 
    // step2 remove the image if available
    // checking if the image_name has a value
   
    if($image_name != ""){
        // then it has an image
        // craete the image path
        $path = "../images/food/".$image_name;
        // 
        // remove the image from the folder
        $remove = unlink($path);
        // 
        // 
        // checking if the image was removed successfully
        if(!$remove){
            $_SESSION['img-removal-failed'] = "<div class='error text-center'>failed to remve image!</div>";
            // redirect to manage page
            header('location:'.SITEURL.'admin/manage-food.php');
            // end process here
            die();
        }

    }
    // step3 delete the food  from the database
    
    $sql = "DELETE FROM tbl_food WHERE id = $id";
    // 
    // 
    $res = mysqli_query($conn, $sql);

    if($res){
        // set session variable to output successful delete message
        $_SESSION['deleted'] = "<div class='success text-center'>Food deleted successfully</div>";
        // redirecting to manage page
        header('location:'.SITEURL.'admin/manage-food.php');

        
    }else{
        $_SESSION['deleted'] = "<div class='success text-center'>Failed to delete food!</div>";
        header('location:'.SITEURL.'admin/manage-food.php');
    }


}else{
    // redirect the user back to the manage admin page
    $_SESSION['delete'] = "<div class='error text-center'>No food with such info</div>";
    header('location:'.SITEURL.'admin/manage-food.php');
}


?>