<!-- creating an authorization which checks if the user logged in before accessing the admin panel -->

<?php

if(!isset($_SESSION['user'])){
                $_SESSION['no-login-access'] = "<div class='error text-center'>Please 
                Login to continue</div>";
                header('location:'.SITEURL.'admin/login.php');

}


?>