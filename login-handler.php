<?php include_once "./config/constant.php" ;



if(isset($_POST['submit'])){
// creating connection to the database
    $username = $_POST['username'];
    $password = $_POST['password'];

// checking if the user leaves one of the input field empty
    if(empty($username) || empty($password)){
      header('location:'.SITEURL.'login.php?error=Emptyfield');
      exit();  
    }else{
        $sql = "SELECT * FROM customers WHERE username = ?"; //query

        // making reference to the database connection $conn
        $stmt = mysqli_stmt_init($conn);

        // running the sql statement and checking if it works in the database
        if(!mysqli_stmt_prepare($stmt,$sql)){
            //if the query does not work, return the error below
            header('location:'.SITEURL.'user-login.php?error=sqlerror');
            exit();  
        }else{
            mysqli_stmt_bind_param($stmt,"s" , $username);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            // using mysqli_fetch_assoc to fetch the result of the query and put it inside an associative array called row
            if($row = mysqli_fetch_assoc($result)){
                $passcheck = password_verify($password, $row['password']);
                // checking if the password in the database and the pasword entered matches
                if($passcheck == false){
                    header('location:'.SITEURL.'user-login.php?error=wrongpassword');
                    exit();
                }elseif($passcheck == true){
                    // if the password is correct, create a session 
                    session_start();
                    $_SESSION['sessionid'] = $row['id'];
                    $_SESSION['sessionuser'] = $row['username'];
                    // no session variable was created for password because we do not want to store the password

                    header('location:'.SITEURL.'index.php?login=successful');

                    exit();
                    //then, when the login is successfull, we want to redirect the user back to the index page with a success message  07:09:30
                }else{
                    header('location:'.SITEURL.'user-login.php?error=wrongpassword');
                    exit();
                }


            }else{
                header('location:'.SITEURL.'user-login.php?error=nouserfound');
                exit();
            }
        }
    }

}else{
    header('location:'.SITEURL.'user-login.php?error=accessforbidden');
     exit();
}

?>