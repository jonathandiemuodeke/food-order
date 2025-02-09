    <?php include_once "./partials/header.php"; ?>
        <!-- menu section ends -->
    <style>
        .main-body{
            padding-left:2rem;
            padding-right:2rem;
        }
    </style>
        <!-- main content starts -->
        <div class="main-content main-body">
            <div class="wrapper">
                <span class="ds-flex">

                    <h1 class="h1-title">DASHBOARD</h1>
                    <div class="sales-status-wrapper">
                    <h4>Sales status</h4>
                    <span class="sales-status">
                        <!-- form ON -->

                        <form action="update-sales-status.php" class="s-form" method="POST">
                            <button type="submit" name="on" id="sales-on" class="sales-btn">ON</button>
                            <input type="hidden" name="sales" value="on">
                        </form>
                        <!-- form END -->

                        <form action="update-sales-status.php" class="s-form" method="POST">
                            <input type="hidden" name="end" value="off">
                            <button id="sales-end" type="submit" name="off" class="sales-btn">OFF</button>
                        </form>
                        
                    </span>

                </div>
            </span>
                <div class="cat-flex">
                    <?php
                if(isset($_SESSION['login'])){
                    echo $_SESSION['login'];
                    unset($_SESSION['login']);
                }
                if(isset($_SESSION['updated'])){
                    echo $_SESSION['updated'];
                    unset($_SESSION['updated']);
                }
                
            ?>
  <!-- <div class="wrapper"> -->
            <div class="dashboard-content">
                <h4 class="">Today</h4>
            
            <?php
            $date = date('Y-m-d');

        $sql5 = "SELECT * FROM real_order WHERE date_ordered LIKE $date";

        //executing the query 
        $res5 = mysqli_query($conn, $sql5);
        $count5 = mysqli_num_rows($res5); //to count how many categories we have

        ?> 
        <div class="col-4 text-center">
                <h1><?php  echo $count5 ?></h1>
                Orders
        </div>
          <?php

        $sql6 = "SELECT * FROM real_order
        INNER JOIN paid_order 
        ON paid_order.reference = real_order.reference 
        WHERE real_order.date_ordered 
        LIKE $date 
        AND paid_order.status = 'delivered'";

        //executing the query 
        $res6 = mysqli_query($conn, $sql6);
        $count6 = mysqli_num_rows($res6); //to count how many categories we have

        ?>
           
            <div class="col-4 text-center">
                <h1><?php  echo $count6 ?></h1>
                Delivered
            </div>
          <?php

        $sql7 = "SELECT SUM(total) AS total FROM real_order WHERE date_ordered LIKE $date";

            $res7 = mysqli_query($conn, $sql7); 
            $row7 = mysqli_fetch_assoc($res7);

            $Today_revenue = $row7['total'];

      

        ?>
           
            <div class="col-4 text-center">
                <h1>#<?php  echo $Today_revenue ?></h1>
                Revenue
            </div>
            </div>
        <!-- </div> -->
                 

            <!-- we want to display the correct values of order, food categories abd revenue genrated on our dashboard with the following code -->
            <?php
            $sql1 = "SELECT * FROM tbl_category";

            //executing the query 
            $res1 = mysqli_query($conn, $sql1);
            $count1 = mysqli_num_rows($res1); //to count how many categories we have

            ?>
            <div class="dashboard-content">
                <h4 class="">All Day</h4>
                <div class="col-4 text-center">
                    <h1><?php echo $count1; ?></h1>
                    Categories
                </div>

                <?php
            $sql2 = "SELECT * FROM tbl_food";

            //executing the query 
            $res2 = mysqli_query($conn, $sql2);
            $count2 = mysqli_num_rows($res2); //to count how many categories we have

            ?>

                <div class="col-4 text-center">
                    <h1><?php echo $count2; ?></h1>
                    Food
                </div>

            <?php
            $sql3 = "SELECT * FROM paid_order";

            //executing the query 
            $res3 = mysqli_query($conn, $sql3);
            $count3 = mysqli_num_rows($res3); //to count how many categories we have

            ?>

                <div class="col-4 text-center">
                    <h1><?php  echo $count3 ?></h1>
                    Orders
                </div>

                <!-- to calculate the total revenue generated -->

            <?php
            $sql4 = "SELECT SUM(total) AS total FROM real_order WHERE reference !='not paid'";

            $res4 = mysqli_query($conn, $sql4); 
            $row4 = mysqli_fetch_assoc($res4);

            $revenue_generated = $row4['total'];

            ?>

                <div class="col-4 text-center">
                    <h1>#<?php  echo $revenue_generated; ?></h1>
                    Revenue
                </div>
                
                </div>
            </div>
        </div>
      
        <div class="clearfix"></div>
        
        <!-- main content ends -->

        <!-- main footer starts -->
        <?php include_once "./partials/footer.php"; ?>

        <!-- main footer ends -->




    </body>
    </html>
    <script >

    </script>

