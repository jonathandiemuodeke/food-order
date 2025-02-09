<!-- including the database connection -->
<?php include_once "../config/constant.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login To Your Account</title>
    <link rel="stylesheet" href="../css/admin.css">
</head>
<body>
    <div class="main">
        <div class="wrapper">
            <h1 class="h1-title login-welcome">Welcome !</h1>
        </div>
    <!-- </div> -->
    <!-- the form div -->
    <div class="login">
        <h3 class="text-center">Login</h3>

        <!-- displaying the error message -->
        <?php
            if(isset($_SESSION['login'])){
                echo $_SESSION['login'];
                unset($_SESSION['login']);

            }
            if(isset($_SESSION['no-login-access'])){
                echo $_SESSION['no-login-access'];
                unset($_SESSION['no-login-access']);

            }
        ?>


        <form action="" method="post" class="admin-login">
            <label for="">Username:</label>
            <input type="text" name="username" id="" placeholder="Enter Your Username">
            <label for="">Password:</label>
            <input type="password" name="password" id="" placeholder="Enter Your Password">
            <input type="submit" value="Submit" name="submit" class="btn-primary">
            
        </form>
    </div>
    </div>
    <!-- the form div -->



    <!-- footer -->
    <!-- <div class="footer">
<div class="">
    <p class="text-center">2022 all rights reserved. built by Godson</p>

</div>
</div> -->

</body>
</html>

<?php
    if(isset($_POST['submit'])){
        // // grab the inputed data
        // $username = $_POST['username'];
        // $password = md5($_POST['password']); //these two were proned to sql injection
        
        $username =  mysqli_real_escape_string($conn, $_POST['username']);
        $raw_password = md5($_POST['password']);
        $password =  mysqli_real_escape_string($conn, $raw_password);



        // 

        // creating a sql query check if the username and password entered are correct

        $sql = "SELECT * FROM tbl_admin WHERE username = '$username' AND password = '$password' ";

        $res = mysqli_query($conn, $sql);

        // checking the number of data fetched
        $count = mysqli_num_rows($res);

        if($count == 1){
            // login admin
            $_SESSION['login'] = "<div class='success text-center'>Login Successfull</div>";
            $_SESSION['user'] = $username;
            // redirecting to admin page
            header('location:'.SITEURL.'admin/index.php');

        }
        else
        {

            $_SESSION['login'] = "<div class='error text-center'>Username or Password Does not Match</div>";
            // redirecting to admin page
            header('location:'.SITEURL.'admin/login.php');
            // dont login admin
        }


        

    }

?>