<?php

require_once "./config/constant.php";

if(isset($_POST['submit'])){
    // creating a connection to the database


    // grabing the inputs from the users
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirmpassword = $_POST['confirmpassword'];
    $phone =  $_POST['phone'];

// Error handling

// 1. if the fields are empty
if(empty($username) || empty($password) || empty($confirmpassword) || empty($phone)){
    // redirect the user back to thesame page with the error
    // header("Location: ../register.php?error=Emptyfields&username=".$username);
    header('Location:'.SITEURL.'register.php?error=Emptyfields&username='.$username);
    $_SESSION['reg-failed'] = "<div class='error text-center'>Please fill all the fields</div>";
    exit();

 //2. setting the characters accepted in the password field   
}elseif (!preg_match("/^[a-zA-Z0-9]*/", $username)) {
    // the preg_match function search through a string for a pattern and returns true if it exist. it takes two parameter
    //  1. search pattern
    //  2. where you want to search
    # code...
    //  header("Location: ../register.php?error=InvalidUsername&username=".$username);
     header('location:'.SITEURL.'register.php?error=InvalidUsername&username='.$username);
  $_SESSION['reg-failed'] = "<div class='error text-center'>Please fill all the fields</div>";
     exit();

 //3. if the password do not match     
}elseif($password !== $confirmpassword){
    // header("Location: ../register.php?error=PasswordsDoNotMatch&username=".$username);
        header('location:'.SITEURL.'register.php?error=PasswordsDoNotMatch&username='.$username);
  $_SESSION['reg-failed'] = "<div class='error text-center'password does not match</div>";
    exit();

  //3. if the username already exist 
  
//|| strlen($phone) >11
}elseif(strlen($phone) < 11 || strlen($phone) > 11){
    // header("Location: ../register.php?error=invalidPhonenumber");
    header('location:'.SITEURL.'register.php?error=invalidPhonenumber');
  $_SESSION['reg-failed'] = "<div class='error text-center'>Please enter a valid 11 digit phone number</div>";
    exit(); 
}else{
    // creating a query
    $sql = "SELECT username FROM customers WHERE  username = ?"; //? => prepared statement
    // prepared statement is an sql stateement template that is used to replace the value with placeholder and it provides strong protection against hackers

    // STATEMENT
    $stmt = mysqli_stmt_init($conn); //initialize database connection


    // checking for error
    if(!mysqli_stmt_prepare($stmt, $sql)){
        // header("Location: ../register.php?error=");
                header('location:'.SITEURL.'register.php?error=sqlerror');
                  $_SESSION['reg-failed'] = "<div class='error text-center'>something went wrong, try again</div>";
        exit(); 
    }else{
        //  mysqli_stmt_bind_param() takes two param(the statement, the datatype s=string i=integer, b=boolean ) 
        mysqli_stmt_bind_param($stmt,"s" , $username);
        // mysqli_stmt_bind_param($stmt,"s" "s") // will not work
        // mysqli_stmt_bind_param($stmt,"ss") // use this instead when u are checking for two datatype

        // mysql execute function
        mysqli_stmt_execute($stmt);
        
        // to check if a user with same username already exist
        mysqli_stmt_store_result($stmt);

        $rowcount = mysqli_stmt_num_rows($stmt); // counting the numbers if rows gotten back from the database 0 = no match 1= there is a match
        
        if($rowcount > 0){
            // header("Location: ../register.php?error=usernametaken");
                header('location:'.SITEURL.'register.php?error=usernametaken');
                  $_SESSION['reg-failed'] = "<div class='error text-center'>Sorry, the username already Exist</div>";
        exit();
        }else{
            $sql = "INSERT INTO customers (username, password, phone) VALUES (?, ?, ?) ";
             $stmt = mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($stmt, $sql)){
                header('location:'.SITEURL.'register.php?error=sqlerror');
                $_SESSION['reg-failed'] = "<div class='error text-center'>something went wrong, try again</div>";
                exit(); 
            }else{
                        $hashpassword = password_hash($password,PASSWORD_DEFAULT );
                        mysqli_stmt_bind_param($stmt,"ssi" , $username, $hashpassword, $phone); //the second s is for password i.e ss(username, password)
                        mysqli_stmt_execute($stmt);
                        // redirecting the user back to the sign up page with success message
                         header('location:'.SITEURL.'index.php?registerationSuccessfully');
                         $_SESSION['logged-in'] = "<div class='success text-center'>Login successful</div>";
                        exit();
            }
        }

    }
}
mysqli_stmt_close($stmt);
mysqli_close($conn);





}


?>