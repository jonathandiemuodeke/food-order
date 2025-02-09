<?php include_once "./partials/header.php";  ?>

 <?php
            if(isset($_GET['con-ref']) || isset($_GET['event-ref']) || isset($_GET['catering-ref'])){
                $ref;
                $sql;
                if(isset($_GET['con-ref'])){
                    $ref = $_GET['con-ref'];
                    $sql = "SELECT * FROM contact_us WHERE id = '$ref' ";
                }
                elseif(isset($_GET['event-ref'])){
                $ref = $_GET['event-ref'];
                $sql = "SELECT * FROM event_decoration_inquiry WHERE id = '$ref' ";
                }
                elseif(isset($_GET['catering-ref'])){
                $ref = $_GET['catering-ref'];
                $sql = "SELECT * FROM catering_inquiry WHERE id = '$ref' ";
                 }
                 else{
                header('location:'.SITEURL.'admin/index.php');
                 }
             }

    ?>

<style>
    body{
        /* width:100vw !important; */
        overflow-x: hidden;
    }
    .main-content{
        width: 100vw  !important;
        padding:10px !important;
    }
    .tb{
        width:100% !important;
        padding:10px !important;
        margin:0 auto !important;
    }
</style>
<div class="main-content">
        <div class="wrapper tb">
            <h1 class="h1-title">Inquiry Details</h1>
            <!-- for this back button, we need to use js to go back by one page  -->
             <a href="contact-inquiry.php" class="btn-primary add-admin">Back</a>
        </div>
     

    
<div class="main">
    <!-- DISPLAYING THE SPECIFIC ORDER -->
    <form id="paymentform" class="menu-table">
              
                <table class="" border="0px solid red">
                     <?php 
            

            // 
            $res = mysqli_query($conn, $sql);

            $count = mysqli_num_rows($res);
            $sn = 1;

            if($count == 1){
                // there are orders available
                while($row = mysqli_fetch_assoc($res)){
                    // get the details of the order
                    $id = $row['id'];
                    $name = $row['name'];
                    $phone = $row['phone'];
                    $email = $row['email'];
                    $message = $row['message'];

                }
            }
                ?>
                    

                    
                </table>
               <div class="personal">
                 <div class="ds-flex">
                        <h5>name</h5>
                        <p class="quantity bold">
                            <?php echo $name; ?>
                    </div>
                    <div class="ds-flex">
                        <h5>others</h5>
                        <p class="quantity bold">
                            <?php echo $phone; ?>
                            </p>
                    </div>
                    <div class="ds-flex mg-bottom">
                        <h5>email</h5>
                        <p class="quantity bold">
                            <?php echo $email; ?>
                            </p>
                    </div>
                    <div>
                        <h5 class="text-center">message</h5>
                        <p class="quantity bold">
                            <?php echo $message; ?>
                            </p>
                    </div>
                    
               </div>
           
            </form>
    </div>
    </div>
    <!-- DISPLAYING THE SPECIFIC ORDER -->

<?php include_once "./partials/footer.php"; ?>