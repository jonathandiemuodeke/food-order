<?php include_once "./partials-front/header.php";?>

<!-- database connection -->
<?php include_once "./config/constant.php";?>

<link rel="stylesheet" href="./user-side/pre_order.css">    
<link rel="stylesheet" href="./user-side/style.css">    
    <main class="order-page main-section">
<style>
    .amount,.total{
        min-width: 65px;
    }
</style>
<?php
// fetching the data of the order
 if(!isset($_GET['id'])){

      header('location:'.SITEURL.'index.php');     
      die();   
      $_SESSION['try-again'] = "<div class='error text-center'>unsuccessfull, please try again!</div>";
}else{
    // we go the order id
     $order_id = $_GET['id'];

    //  we want to get the name of the buyer into this page
    $sql2 = "SELECT * FROM real_order WHERE food_id = $order_id ";
    $res2 = mysqli_query($conn, $sql2);

    // counting the number of rows returned from  the query
    $count2 = mysqli_num_rows($res2);
    if(!$count2 == 1){
        // that is more than one row is returned from the query
        header('location:'.SITEURL.'order.php');
        $_SESSION['customer_not_found'] = "<div class='error text-center'>customer details not found</div>";
    
    }else{
        // that means only one result is returned,
        $row2 = mysqli_fetch_assoc($res2);
        // 
        // get the name, phone number and add
        $name = $row2['customer_name'];
        // $phone = $row2['customer_contact'];
        // $address = $row2['customer_address'];
        $food_name = $row2['food_name'];
        $rice = $row2['rice'];
        $beans = $row2['beans'];
        $yam = $row2['yam'];
        $dodo = $row2['dodo'];
        $moimoi = $row2['moimoi'];
        $salad = $row2['salad'];
        $meat = $row2['meat'];
        $total = $row2['total'];
        $plates = $row2['plates'];
    }


}          

?>

<form id="paymentform">
              
                <table class="menu-table" border="0px solid red">
                    <tr >
                        <td>Dear <span class="customer-name tx-bold" id="full-name"><?php echo $name; ?></span>, 
                    </tr>
                    <tr>
                        </td>
                        <td class="tx-italics" style="font-size: .8rem;">this is what we will deliver:<br><span style="margin-right:4px;">
                        <?php 
                        if($plates == 0){
                            $plates = 1;
                        }else{
                            echo $plates ;
                        }
                        ?>
                        </span> plate of <input type="text" class="food-name" name="food-name" value="<?php echo $food_name; ?>">
                        </td>
                    </tr>
                    <tr class="quantity-amount">
                        <!-- <td></td> -->
                    <td></td>
                    <!-- <td></td> -->
                    <td>amount</td>
                </tr>
                    <tr>
                        <td>rice</td>
                        <td class="quantity"></td>
                       
                        <td class="td-amount">
                            <input type="number" name="rice" class="amount" id="" value="<?php echo $rice; ?>" readonly>
                        </td>
                    </tr>
                    <tr>
                        <td>beans</td>
                        <td class="quantity"></td>
                       
                        <td class="td-amount">
                            <input type="number" name="beans" class="amount" id="" value="<?php echo $beans; ?>" readonly>
                        </td>
                        
                    </tr>
                    <tr>
                        <td>dodo</td>
                        <td class="quantity"></td>
                       
                        <td class="td-amount">
                            <input type="number" name="dodo" class="amount" id="" value="<?php echo $dodo; ?>" readonly>
                        </td>
                    </tr>
                    <tr>
                        <td>yam</td>
                        <td class="quantity"></td>
                        
                        <td class="td-amount">
                            <input type="number" name="yam" class="amount" id="" value="<?php echo $yam; ?>" readonly>
                        </td>
                    </tr>
                    <tr>
                        <td>moimoi</td>
                        <td class="quantity"></td>
                       
                        <td class="td-amount">
                            <input type="number" name="moimoi" class="amount" id="" value="<?php echo $moimoi; ?>" readonly>
                        </td>
                    </tr>
                    <tr>
                        <td>salad</td>
                        <td class="quantity"></td>
                        <td class="td-amount">
                            <input type="number" name="salad" class="amount" id="" value="<?php echo $salad; ?>" readonly>
                        </td>
                    </tr>
                    <tr>
                        <td>meat</td>
                        <td class="quantity"></td>
                       
                        <td class="td-amount">
                            <input type="number" name="meat" class="amount" id="" value="<?php echo $meat; ?>" readonly>
                        </td>
                    </tr>
                   
                    
                    <tr>
                        <td>total</td>
                       
                       
                        <td class="">
                            <input type="number" name="total" id="payable" class="total" value="<?php echo $total; ?>" readonly>
                            </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="email">please enter your email to receive payment receipt</label>
                            <input type="email" name="email" class="amount regular-input" id="email-address" placeholder="Enter Your Email">
                        </td>
                    </tr>
                </table>
                <input type="hidden" id="order_id" name="order_id" value="<?php echo $order_id ?>">
                <button type="submit" class="btn-regular"  onclick="payWithPaystack()">proceed to make payment</button>
           
            </form>

            
            <script src="https://js.paystack.co/v1/inline.js"></script> 
    <!-- </main> -->


<script>

const paymentform = document.getElementById('paymentform');
const order_id = document.getElementById('order_id').value;
paymentform.addEventListener("submit", payWithPaystack, false);
  // const firstName = ;
  //     const lastName = ;
function payWithPaystack(e) {
  e.preventDefault();
  let handler = PaystackPop.setup({
    key: 'pk_test_8481a8116a3a2fbd71c415cf95b7cce72f53adf8', // Replace with your public key
    email: document.getElementById("email-address").value,
    first_name: document.getElementById("full-name").value,
    // last_name: document.getElementById("last-name").value,

    // amount: document.getElementById("amount").value * 100,
    amount: document.getElementById("payable").value * 100,
    ref: 'FoodOrdered'+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
    // label: "Optional string that replaces customer email"
    onClose: function(){
      alert('Transaction Cancelled');
      window.location = "http://localhost/food-order/index.php?error=TransactionCanceled";
    },
    callback: function(response){
      let message = 'Payment complete! Reference: ' + response.reference;  
      alert(message); 
    //   window.location = 'http://localhost/food-order/verify-transaction.php?reference=' + response.reference.'&food_id=' + order_id;
      window.location = `http://localhost/food-order/verify-transaction.php?reference=${response.reference}&food_id=${order_id}`;

    }
  });
  handler.openIframe();

}
</script>
</main>
<?php include_once "./partials-front/footer.php";?>

