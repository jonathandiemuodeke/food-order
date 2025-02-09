<?php  include_once "./partials-front/header.php"; ?>
<div class="main-section">
    <div class="wrapper">
        <h4 >Welcome!</h4>
        <?php    
        $_SESSION['login-attempt'] = "";

        if(isset($_SESSION['reg-failed'])){
            echo $_SESSION['reg-failed'];
            unset($_SESSION['reg-failed']);
        }
        
        ?>
        <div class="form-div">
            <p class="text-center">Register to complete your order</p>
            
            <form action="register-handler.php" id="login-form" method="post">
                <div>
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" placeholder="Enter Your username..">
                </div>
                <div>
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" >
                </div>
                <div>
                    <label for="password">Confirm Password</label>
                    <input type="password" name="confirmpassword" id="password" >
                </div>
                <div>
                    <label for="phone">Phone</label>
                    <input type="number" name="phone" id="phone" >
                </div>

                <div>
                    <input type="submit" name="submit" value="Register" class="btn-login">
                </div>

                <div>
                    <p>Already have an account ?
                        <a href="user-login.php" class="register">Login</a>
                    </p>
                </div>

            </form>
        </div>

    </div>
</div>









<?php  include_once "./partials-front/footer.php"; ?>