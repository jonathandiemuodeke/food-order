<?php
if(!isset($_GET['ref'])){
    header('location:index.php?error=nostatusset');
}else{
    
    //  SCRIPT TO UPDATE THE REAL ORDER TABLE WITH THE REFERENCE 
// <?php  
    $order_id = $_GET['order_id'];
    $ref = $_GET['ref'];
    if($ref = ''){
        die();
        header("location:index.php?error=no_order_id");

    }else{
      $order_id2 = $_GET['order_id'];
      $ref2 = $_GET['ref'];
      require_once "./config/constant.php";
      // $stmt2 = $conn->prepare(" UPDATE real_order WHERE food_id = $order_id SET payment_reference = $ref");
      $sql = "UPDATE real_order SET reference = '$ref2' WHERE food_id = $order_id2";
      $res = mysqli_query($conn, $sql);

      // $stmt2->bind_param("s", $ref);
      // $stmt2->execute();

      if(!$res){
          echo "there is an error on your code". mysqli_error($conn);
      }
      else{
        header("location:print_order_ticket.php?status=success&ref=$ref2");
        exit();
      }
      // $stmt-> close();
      // $conn-> close();
    }

  //     }else{
  //     // header("location:error.html"); 
  //     echo "hello world";
  //     exit();
  // }

// 
//  SCRIPT TO UPDATE THE REAL ORDER TABLE WITH THE REFERENCE
}