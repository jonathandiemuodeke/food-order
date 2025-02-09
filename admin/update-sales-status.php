<?php
require('../config/constant.php');
// to set sales status to on

if(isset($_POST['on'])){
    $status = $_POST['sales'];
    $sql = "UPDATE sales_status SET 
    status = '$status'
    WHERE id = 1";
    $res = mysqli_query($conn, $sql);
    if($res){
        $_SESSION['updated'] = "<div class='updated text-center text-green'>Sales Status is turned On</div>";
        header('location:'.SITEURL.'admin/index.php');
    }
}
// to set sales status to off
if(isset($_POST['off'])){
    $status2 = $_POST['end'];
    $sql2 = "UPDATE sales_status SET 
    status = '$status2'
    WHERE id = 1";
    $res2 = mysqli_query($conn, $sql2);
    if($res2){
        $_SESSION['updated'] = "<div class='updated text-center text-green'>Sales Status is turned Off</div>";
        header('location:'.SITEURL.'admin/index.php');
    }
}
