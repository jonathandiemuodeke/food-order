<?php
include_once ("../config/constant.php");

// steps to delete the admiin. 
// get the admin id
// select query to delete the admin
// redirect back to the previos page with success message or error message

$id = $_GET['id'];

$sql = "DELETE FROM tbl_admin WHERE id = $id";

$res = mysqli_query($conn , $sql);

if($res == true){
    $_SESSION['delete'] = "<div class='success'>Admin deleted successfully</div>";
    header('location:'.SITEURL.'admin/manage-admin.php');
}else{
    $_SESSION['delete'] = "<div class='error'>failed to delete admin</div>" ;
    header('location:'.SITEURL.'admin/manage-admin.php');
}
