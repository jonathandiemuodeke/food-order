<?php
include_once "./config/constant.php"; 

if(isset($_POST['submit'])){
    $name =  $_POST['name'];
    $city = $_POST['city'];
    $email_input = $_POST['email'];
    $message = $_POST['composed-message'];

    $email = filter_var($email_input, FILTER_SANITIZE_EMAIL);

    if($name == "" ){
        $_SESSION['error'] = "<div class='text-red text-center'>Please enter your  name</div>";
        header('location:'.SITEURL.'contact.php?error=name_field_is_empty');
    }elseif($city == ""){
        $_SESSION['error'] = "<div class='text-red text-center'>Please enter your city</div>";
        header('location:'.SITEURL.'contact.php?error=city_field_is_empty');
    }elseif($email == ""){
        $_SESSION['error'] = "<div class='text-red text-center'>Enter Your Email</div>";
        header('location:'.SITEURL.'contact.php?error=email_field_is_empty');
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $_SESSION['error'] = "<div class='text-red text-center'>Invalid Email</div>";
        header('location:'.SITEURL.'contact.php?error=invalid_email');
        }
    }elseif($message == ""){
        $_SESSION['error'] = "<div class='text-red text-center'>Enter Your message</div>";
        header('location:'.SITEURL.'contact.php?error=message_field_is_empty');
    }else{
        $sql = "INSERT INTO contact_us (name, phone, email, message) VALUES (?,?,?,?)";
          $stmt = mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($stmt, $sql)){
                header('Location:'.SITEURL.'contact.php?error=sqlerror');
            exit(); 
            }else{
                 mysqli_stmt_bind_param($stmt,"ssss" , $name, $city, $email,$message); 
                        mysqli_stmt_execute($stmt);
                        
                        $_SESSION['sent'] = "<div class='text-green text-center'>Inquiry Sent Successfully</div>";

                         header('Location:'.SITEURL.'index.php?success=sent');
                        exit();
            }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);


}