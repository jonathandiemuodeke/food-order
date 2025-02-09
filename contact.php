  <?php  include_once "./partials-front/header.php"; ?>
<main class="catering-service main-section">
        <h1 class="section-title">contact us today</h1>
        <div class="welcome">
            <h4 class="sales-time"></h4>
        </div>
        <h5>We wish to serve you better. Your feedback will go a long way for us to improve our service to you and all our customers overall. <br>Please leave a message or suggestion for us below</h5>
    
        <!-- catring service form  -->
        <form action="contact-handler.php" class="catering-service-form" method="post">
            <?php
                if(isset($_SESSION['error'])){
                echo $_SESSION['error'];
                unset($_SESSION['error']);
                }
            ?>
            <input type="text" name="name" id="name" placeholder="Please Enter Your name">
            <input type="email" name="email" id="email" placeholder="Email Address">
            <input type="text" name="city" id="city" placeholder="City. e.g Ughelli">
            <textarea name="composed-message" id="" cols="30" rows="5"
                placeholder="Please enter your feedback or suggestion here... " class="message"></textarea>
            <button type="sunmit" name="submit" class="proceed-btn ">submit</button>
        </form>
        <div class="contact-info">
            <p>You can as well visit us at our sales point</p>
            <p><span><i class="fas fa-map-marker-alt"></i></span> 270 ughelli patani road,beside agofure motor park in ughelli delta state</p>
            <p><span><i class="fas fa-phone-alt"></i></span> 08182828282</p>
            <p>Send us a message on whatsapp <br><a href="https://wa.me/message/3MIMKYGDO5OWK1"><i id="whatsapp" class="fab fa-whatsapp"></i></a></p>
        </div>

        <!--  -->

    </main>
    <?php include_once "./partials-front/footer.php"; ?>