<?php
 include_once "../config/constant.php"; 
 include "login-check.php"; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>food order website home page</title>
    <link rel="stylesheet" href="../css/admin.css">
</head>
<body>
    <!-- menu section starts -->
    <div class="menu text-center">
        <button class="toggle-btn">
            <p class="bars"></p>
            <p class="bars"></p>
            <p class="bars"></p>
        </button>
        <div class="nav-wrapper">
            <!-- links -->
            <ul class="links-ul">
                <div class="explore">
                    <h4>Explore</h4>
                </div>
                <li class="links-li"><a href="index.php">Home</a></li>
                <li class="links-li"><a href="manage-admin.php">Admin</a></li>
                <li class="links-li"><a href="manage-category.php">Category</a></li>
                <li class="links-li"><a href="manage-food.php">Food</a></li>
                <li class="links-li"><a href="manage-order.php">Orders</a></li>
                <li class="links-li inquiry">
                    <button type="button" class="drop-down-btn">Inquiries ^ </button>
                    <div class="drop-down">
                    <a href="event-dec-inquiry.php">Event Decoration</a>
                    <a href="catering-inquiry.php">Catering inquiry</a>
                    <a href="contact-inquiry.php">contact</a>
                    </div>
                </li>
                <li class="links-li"><a href="logout.php">Logout</a></li>
            </ul>
        </div>
    </div>

    <script>
        // FOR THE SIDE BAR NAV 
        const navBtn = document.querySelector('.toggle-btn');
        const links_container = document.querySelector('.links-ul');
        navBtn.addEventListener('click',function(){
            links_container.classList.toggle('show-links')
        })

        // FOR THE DROP DOWN LINKS
        const dropBtn = document.querySelector('.drop-down-btn');
        const dropDownContainer = document.querySelector('.drop-down');
        dropBtn.addEventListener('click',function(e){
            // console.log(e.target);
            dropDownContainer.classList.toggle('display-block');
        })

    </script>

    