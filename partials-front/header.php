<?php include_once "./config/constant.php"; ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Important to make website responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gina's Kitchen</title>
    <!--XXX bootstrap XXX-->
    <!-- OTHER CSS -->
<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> -->
<!-- <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet"> -->

<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css"
    integrity="sha512-1cK78a1o+ht2JcaW6g8OXYwqpev9+6GqOkz9xmBN9iUUhIndKtxwILGWYOSibOKjLsEdjyjZvYDq/cZwNeak0w=="
    crossorigin="anonymous" referrerpolicy="no-referrer" /> -->
    

<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
    integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g=="
    crossorigin="anonymous" referrerpolicy="no-referrer" /> -->

<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css"
    integrity="sha512-OTcub78R3msOCtY3Tc6FzeDJ8N9qvQn1Ph49ou13xgA9VsH9+LRxoFU6EqLhW4+PKRfU+/HReXmSZXHEkpYoOA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"
    integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" /> -->
   
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css" integrity="sha512-OTcub78R3msOCtY3Tc6FzeDJ8N9qvQn1Ph49ou13xgA9VsH9+LRxoFU6EqLhW4+PKRfU+/HReXmSZXHEkpYoOA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  

    <!--XXX OTHER CSS XXX-->


    <!-- Link our CSS file -->
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./user-side/style.css">
    <link rel="stylesheet" href="user-side/pre_order.css">
   
     <link rel="stylesheet" href="user-side/all.min.css">
     <link rel="stylesheet" href="user-side/owl.carousel.min.css">
     <link rel="stylesheet" href="user-side/owl.carousel.theme.css">
</head>

<body>
    <!-- Navbar Section Starts Here -->
    <!-- <section class="navbar">
        <div class="container">
            <div class="logo">
                <a href="#" title="Logo">
                    <img src="images/logo.png" alt="Restaurant Logo" class="img-responsive">
                </a>
            </div>

            <div class="menu text-right">
                <ul>
                    <li>
                        <a href="<?php echo SITEURL; ?>">Home</a>
                    </li>
                    <li>
                        <a href="<?php echo SITEURL; ?>categories.php">Categories</a>
                    </li>
                    <li>
                        <a href="<?php echo SITEURL; ?>foods.php">Foods</a>
                    </li>
                    <li>
                        <a href="<?php echo SITEURL; ?>quick-order.php">Quick Order</a>
                    </li>
                    <li>
                        <?php 
                        if(isset($_SESSION['logged-in']) || isset($_SESSION['sessionuser'])){
                        echo "<a href='user-order.php'>My orders</a>";
                       
                        echo "<a href='user-logout.php' class='margin-left'>Log out</a>";
                        }else{
                             echo "<a href='user-login.php' class='display-none'>Login</a>";
                        // }
                        }
                        // else if(isset($_SESSION['login-attempt'])){
                        //  echo "<a href='user-login.php' class='display-none'>Login</a>";
                        // }
                        // else{
                        //     echo "<a href='user-login.php'>Login</a>";
                        // }
                        ?>

                       
                        
                    </li>
                </ul>
            </div>

            <div class="clearfix"></div>
        </div>
    </section> -->
    <nav>
        <div class="nav-center">
            <!-- nav header -->
            <div class="nav-header">
                <a href="index.php">
                    <img src="./images/design-image/logo_gina.svg" class="logo" alt="logo" />
                </a>
                <!-- <img src="./images/GINA'S KITCHEN LOGO.svg" class="logo" alt="logo" /> -->
                <button class="nav-toggle">
                    <i class="fas fa-bars"></i>
                </button>
            </div>
            <!-- links -->
            <!-- <div class="links-container"> -->

                <ul class="links">
                    <!-- <li>
                        <a href="<?php //echo SITEURL; ?>">Home</a>
                    </li> -->
                    <li>
                        <a href="<?php echo SITEURL; ?>foods.php">make order</a>
                    </li>
                    <li>
                        <!-- <a href="<?php //echo SITEURL; ?>//pre_order.php">order</a> -->
                        <a href="<?php echo SITEURL; ?>check-order.php">check order</a>
                    </li>
                    <!-- <li>
                        <a href="<?php //echo SITEURL; ?>quick-order.php">quick order</a>
                    </li> -->
                    <li>
                        <a href="<?php echo SITEURL; ?>catering-service.php">catering service</a>
                    </li>
                    <li>
                        <a href="<?php echo SITEURL; ?>event-decoration.php">Event decoration</a>
                    </li>
                    
                   
            </ul>
        <!-- </div> -->
           
        </div>
    </nav>
    <!-- Navbar Section Ends Here -->