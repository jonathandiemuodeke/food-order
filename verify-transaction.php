<?php


$ref = $_GET['reference'];
$order_id = $_GET['food_id'];

if($ref == ""){

    //returning the user back to its previous page
    header("location:javascript://history.go(-1)");
}
?>



<?php

  $curl = curl_init();
  
  curl_setopt_array($curl, array(
    CURLOPT_URL => "https://api.paystack.co/transaction/verify/" .  rawurlencode($ref),
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => array(
      "Authorization: Bearer sk_test_5f0f74c45644578e19dcf3e35e31ca27d5fe1e26",
      "Cache-Control: no-cache",
    ),
  ));
  
  $response = curl_exec($curl);
  $err = curl_error($curl);
  curl_close($curl);
  
  if ($err) {
    echo "cURL Error #:" . $err;
  } else {
    // echo $response;
    $result = json_decode($response);

  
  if ($result->data->status == "success") {
      # code...
      $status = $result->data->status;
      $reference = $result->data->reference;
      // $fname = $result->data->customer->first_name;
      // $lname = $result->data->customer->last_name;
      $fname = $result->data->customer->first_name;

      // $fullname = $lname . " " . $fname;
      $email = $result->data->customer->email;
      // date_default_timezone_set('Africa/Lagos');
      // $date = Date('m/d/Y h:i:s a', time()  );
        $paid_date = date('Y-m-d h:i:sa');

      require_once "./config/constant.php";
      $stmt = $conn->prepare(" INSERT INTO paid_order (status,  reference, name,  date_paid, email) VALUES(?,?, ?, ?,?)");
      $stmt->bind_param("sssss", $status,$reference,$fname, $paid_date,$email);
      $stmt->execute();
      if(!$stmt){
          echo "there is an error on your code". mysqli_error($conn);
      }else{
          header("location:update_payment_reference.php?status=success&ref=$reference&order_id=$order_id");
          exit();
      }
      $stmt-> close();
      $conn-> close();

      }else{
      // header("location:error.html"); 
      // echo "hello world";
      exit();
  }
}
?>