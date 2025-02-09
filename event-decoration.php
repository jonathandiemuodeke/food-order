<?php include_once "./partials-front/header.php"; ?>
 
<main class="catering-service main-section">
    <h1 class="section-title">Rosebie Events planner and decoration</h1>
    <div class="underline"></div>
    <h5>Rosebie event planner and decoration which is a multiple award winning decoration company is in partnership with
        gina's kitchen now offers an online booking service for our customers. every successfull event can be traced to the
        proper planning put in place to execute every activity of that event. at Rosebie Event planner and decoration we
        offer the following services at a pocket friendly rate.</h5>
    <ul>
        <li>Wedding planning and decoration</li>
        <li>Surprise event planning and decoration</li>
        <li>Birthday ceremony planning and decoration</li>
        <li>Buriale ceremony planning and decoration</li>
        <li>Graduation ceremony planning and decoration</li>
        <li>Anniversary planning and decoration</li>
    </ul>
    <p>Rosebie Event planner and decoration, decorates any kind of venue, both halls and open space venue for each
        event.below are some of the our recent decorations.</p>
    <div class="recent-decoration owl-carousel owl-theme">
        <div class="decoration-container" data-aos="fade-right" data-aos-delay="200">
            <img src="./images/design-image/deco-1.jpg" alt="">
            <h1>Wedding ceremony</h1>
        </div>
    
        <div class="decoration-container" data-aos="fade-right" data-aos-delay="200">
            <img src="./images/design-image/deco-2.jpg" alt="">
            <h1>Birthday ceremony</h1>
        </div>
        <div class="decoration-container" data-aos="fade-right" data-aos-delay="200">
            <img src="./images/design-image/deco-3.jpg" alt="">
            <h1>Wedding ceremony</h1>
        </div>
        <div class="decoration-container" data-aos="fade-right" data-aos-delay="200">
            <img src="./images/design-image/deco-4.jpg" alt="">
            <h1>Marriage Anniversary</h1>
        </div>
        <div class="decoration-container" data-aos="fade-right" data-aos-delay="200">
            <img src="./images/design-image/deco-5.jpg" alt="">
            <h1>Burial ceremony</h1>
        </div>
        <div class="decoration-container" data-aos="fade-right" data-aos-delay="200">
            <img src="./images/design-image/deco-6.jpg" alt="">
            <h1>Surprise ceremony</h1>
        </div>
        <div class="decoration-container" data-aos="fade-right" data-aos-delay="200">
            <img src="./images/design-image/deco-7.jpg" alt="">
            <h1>Surprise ceremony</h1>
        </div>
        <div class="decoration-container" data-aos="fade-right" data-aos-delay="200">
            <img src="./images/design-image/deco-7.jpg" alt="">
            <h1>Graduation ceremony</h1>
        </div>
        <div class="decoration-container" data-aos="fade-right" data-aos-delay="200">
            <img src="./images/design-image/deco-8.jpg" alt="">
            <h1>Church Program</h1>
        </div>
    </div>
    <!-- END OF DECORATION CAROUSEL -->
    <p>Again, No Strict mode, meaning the cost of every event is negotiable. so why not give us a try let us help you anchor
        that event that is giving you some sleepless night and have a peaceful "after ceremony". </p>
        <p>You can follow us on our social media platforms</p> 
        <div class="social-icon-decoration">
            <a href="facebook.com">
                <i class="fab fa-facebook"></i>
            </a>
            <a href="twitter.com">
                <i class="fab fa-twitter"></i>
            </a>
            <a href="instagram.com">
                <i class="fab fa-instagram"></i>
            </a>
            <a href="youtube.com">
                <i class="fab fa-youtube"></i>
            </a>
        </div>
        <p>or write us on whatsapp <br> <a href="https://wa.me/message/3MIMKYGDO5OWK1">
            <i class="fab fa-whatsapp" id="whatsapp"></i>
        </a></p>
        <p> Leave a message for us below if you want to make more inquiries.</p>
        
        <form action="event-decoration-handler.php" method="post" class="catering-service-form">
            
            <!-- <div class="alert-box"></div> -->
            <?php
               if(isset($_SESSION["error"])){
                echo $_SESSION["error"];
                unset($_SESSION["error"]);
               }
            ?>
            <input type="text" name="name" id="name" placeholder="Please Enter Your name">
            <input type="number" name="phone" id="number" placeholder="Please Enter Your number">
            <input type="email" name="email" id="email" placeholder="Email Address">
            <textarea name="composed-message" id="" cols="30" rows="5"
                placeholder="Please enter your messag here... " class="message"></textarea>
            <button type="submit" name="submit" class="proceed-btn" >submit</button>
            <!-- <button type="button" class="proceed-btn ">submit</button> -->
        </form>
    
</main>
   
   <!-- <script src="./js/event-decoration.js"></script> -->

   <?php include_once "./partials-front/footer.php"; ?>