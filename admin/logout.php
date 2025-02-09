<!-- we will destroy all the session so that the user can be logged out upo clicking the logout button -->

<?php

include_once "../config/constant.php";
// we included the constant.php because we are using the site url
session_destroy();
header('location:'.SITEURL.'admin/login.php');

?>
