<?php  include_once "./partials-front/header.php"; ?>
<div class="main-section">
    <div class="wrapper">
        <h4 >Welcome!</h4>
        <?php    //$_SESSION['login-attempt'] = "";?>
        <div class="form-div">
            <p class="text-center">Sign in To See your orders</p>
            
            <form action="login-handler.php" method="POST" id="login-form">
                <div>
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" placeholder="Enter Your username..">
                </div>
                <div>
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" >
                </div>

                <div>
                    <input type="submit" name="submit" value="Login" class="btn-login">
                </div>

                <div>
                    <p>Don't have an account ?
                        <a href="register.php" class="register">Register</a>
                    </p>
                </div>

            </form>
        </div>

    </div>
</div>









<?php  include_once "./partials-front/footer.php"; ?>