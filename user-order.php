<?php
if(!isset($_SESSION['sessionuser'])){
    header('location:index.php');
    ?>
<?php
}
else{
    $userID = $_SESSION['sessionuser'];
}
?>
<?php include_once "./config/constant.php";?>
<?php include_once "./partials-front/header.php";?>
<div class="main-content">
    <div class="wrapper">
        <h1 class="h1-title">See Your current order</h1>
    </div>
</div>




<?php include_once "./partials-front/footer.php";?>
<?php

?>