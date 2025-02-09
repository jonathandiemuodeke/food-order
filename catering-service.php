  <?php  include_once "partials-front/header.php"; ?>
  
<main class="catering-service main-section">
    <h1 class="section-title">Gina's Kitchen Catering service</h1>
    <div class="underline"></div>
    <h5>Do you know that gina's kitchen offers both work days and week end catering service for all kind of occassions
        ?, this is a good new as you can finally entertain your guest with that delicious meal you always tell them
        about. <br>over the years our customers have attest to the good taste of food we have provided when saddled with the responsibilty
        of entertaining guest in any event. </h5>
    <!-- <p>over the years our customers has attest to the good taste of food we have provided when saddled with the responsibilty of entertainment of guest in any event. our service ranges from </p> -->
    <h3>our services includes cooking of ;</h3>
    <div class="catering-carousel owl-carousel owl-theme ">
        <div class="food" data-aos="fade-right" data-aos-delay="200">
            <img src="./images/design-image/img-2.jpg" alt="">
            <h1>Banga Soup</h1>
        </div>
        <div class="food" data-aos="fade-right" data-aos-delay="200">
            <img src="./images/design-image/img-1.png" alt="">
            <h1>Egusi Soup</h1>
        </div>
        <div class="food" data-aos="fade-right" data-aos-delay="200">
            <img src="./images/design-image/img-3.jpg" alt="">
            <h1>Owho Soup</h1>
        </div>
        <div class="food" data-aos="fade-right" data-aos-delay="200">
            <img src="./images/design-image/img-1.png" alt="">
            <h1>Banga Rice</h1>
        </div>
        <div class="food" data-aos="fade-right" data-aos-delay="200">
            <img src="./images/design-image/img-2.jpg" alt="">
            <h1>Jollof rice</h1>
        </div>
        <div class="food" data-aos="fade-right" data-aos-delay="200">
            <img src="./images/design-image/img-2.jpg" alt="">
            <h1>Fried rice</h1>
        </div>
        <div class="food" data-aos="fade-right" data-aos-delay="200">
            <img src="./images/design-image/img-1.png" alt="">
            <h1>Coconut Rice</h1>
        </div>
        <div class="food" data-aos="fade-right" data-aos-delay="200">
            <img src="./images/design-image/img-1.png" alt="">
            <h1>Assorted Meat (cow)</h1>
        </div>
        <div class="food" data-aos="fade-right" data-aos-delay="200">
            <img src="./images/design-image/img-2.jpg" alt="">
            <h1>Turkey Meat</h1>
        </div>
        <div class="food" data-aos="fade-right" data-aos-delay="200">
            <img src="./images/design-image/img-3.jpg" alt="">
            <h1>Fish</h1>
        </div>
    </div>

    <!--  -->
    <div class="ceremony">

        <h4>we provide quality catering services for all occassions such as</h4>
        <ul>
            <li>Marriage Ceremony</li>
            <li>Special Gathering</li>
            <li>Birthday Ceremony</li>
            <li>funeral ceremony</li>
            <li>Aniversaries</li>
            <li>Campaign</li>
            <li>at lots more</li>
        </ul>
    </div>
    <!--  -->

    <p>No Strict mode as the cost of every service is negotiable when you visit us or <a href="<?php echo SITEURL."contact.php"; ?>">contact us</a> if you
        want to make more inquiries.</p>
    <div class="ceremony">
        <div class="catering-carousel owl-carousel owl-theme ">
            <div class="food-images" data-aos="zoom-in-right" data-aos-delay="200">
                <img src="./images/design-image/catering-team.jpg" alt="">
            </div>
            <div class="food-images" data-aos="zoom-in-down" data-aos-delay="200">
                <img src="./images/design-image/catering-serving.jpg" alt="">
            </div>
            <div class="food-images" data-aos="zoom-in-down" data-aos-delay="200">
                <img src="./images/design-image/catering service img.jpg" alt="">
            </div>
        </div>
        <p>our catering service team are dedicated to serving you and your guest as best as possible</p>
    </div>
    <p>leave a message for us and we would get back to you</p>
    <!-- catring service form  -->
    <form action="catering-service-handler.php" method="post" class="catering-service-form">
        <div class="alert-box"></div>
            <?php
                if(isset($_SESSION['error'])){
                echo $_SESSION['error'];
                unset($_SESSION['error']);
                }
            ?>
        <input type="text" name="name" id="name" placeholder="Please Enter Your name">
        <input type="number" name="phone" id="number" placeholder="Enter a valid phone number">
        <input type="email" name="email" id="email" placeholder="Enter your Email Address">
        <textarea name="composed-message" id="" cols="30" rows="5"
            placeholder="Type your message here... minimum of 10 words" class="message"></textarea>
        <!-- <button type="submit"  name="submit" >submit</button> -->
        <button type="submit" class="proceed-btn" name="submit" >submit</button>
    </form>

    <!--  -->

</main>
<!-- <script src="./js/catering-service.js"></script> -->
  <?php  include_once "./partials-front/footer.php"; ?>