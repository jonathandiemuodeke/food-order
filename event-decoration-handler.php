<?php
include_once "./config/constant.php"; 

if(isset($_POST['submit'])){
    $name =  $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $message = $_POST['composed-message'];

    if($name == "" ){
        $_SESSION['error'] = "<div class='text-red text-center'>Please enter your  name</div>";
        header('location:'.SITEURL.'event-decoration.php?error=name_field_is_empty');
    }elseif($phone == "" || strlen($phone) != 11){
        $_SESSION['error'] = "<div class='text-red text-center'>Please enter a Invalid phone number</div>";
        header('location:'.SITEURL.'event-decoration.php?error=phone_number_is_empty');
    }elseif($email == ""){
        $_SESSION['error'] = "<div class='text-red text-center'>Invalid Email</div>";
        header('location:'.SITEURL.'event-decoration.php?error=email_field_is_empty');
    }elseif($message == ""){
        $_SESSION['error'] = "<div class='text-red text-center'>Enter Your message</div>";
        header('location:'.SITEURL.'event-decoration.php?error=message_field_is_empty');
    }else{
        $sql = "INSERT INTO event_decoration_inquiry (name, phone, email, message) VALUES (?,?,?,?)";
          $stmt = mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($stmt, $sql)){
                header('Location:'.SITEURL.'event-decoration.php?error=sqlerror');
            exit(); 
            }else{
                 mysqli_stmt_bind_param($stmt,"ssss" , $name, $phone, $email,$message); 
                        mysqli_stmt_execute($stmt);
                        
                        $_SESSION['sent'] = "<div class='text-green text-center'>Inquiry Sent Successfully</div>";

                         header('Location:'.SITEURL.'index.php?success=sent');
                        exit();
            }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);


}