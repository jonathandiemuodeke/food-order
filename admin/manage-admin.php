<?php include_once "./partials/header.php";  ?>
    <!-- menu section ends -->
    
   
    <!-- main content starts -->
    <div class="main-content">
        <div class="wrapper">
            <h1 class="h1-title">Manage Admin</h1>

            <?php
                if(isset($_SESSION['add'])){
                    echo $_SESSION['add'];
                    unset($_SESSION['add']);
                }
                if(isset($_SESSION['delete'])){
                    
                    echo $_SESSION['delete'];
                    unset($_SESSION['delete']);
                }
                if(isset($_SESSION['update'])){
                    
                    echo $_SESSION['update'];
                    unset($_SESSION['update']);
                }
                if(isset($_SESSION['user-not-found'])){
                    
                    echo $_SESSION['user-not-found'];
                    unset($_SESSION['user-not-found']);
                }
                if(isset($_SESSION['pwd-changed'])){
                    
                    echo $_SESSION['pwd-changed'];
                    unset($_SESSION['pwd-changed']);
                }
            ?>

            <!-- add admin button -->
            <a href="add-admin.php" class="btn-primary add-admin">Add Admin</a>



            <!-- ADDING TABLE -->

            <table  class="tbl-full" cellspacing="12px" cellpadding="5px" >
                <tr >
                    <th>S/N</th>
                    <!-- <th>Full Name</th> -->
                    <th>Username</th>
                    <th>Action</th>
                </tr>
                <!--  -->

                <?php 
                $sql = 'SELECT * FROM tbl_admin';
                $res = mysqli_query($conn,$sql);

                if($res == true){
                    // count the  numbers of rows of the data available for display
                    $count = mysqli_num_rows($res);
                    $SN = 1;

                    if($count > 0 ){
                        // there are admins available
                        while($rows = mysqli_fetch_assoc($res)){
                            // assign each data fetched to a variale
                            $id = $rows['id'];
                            $fullName = $rows['full_name'];
                            $username = $rows['username'];
// displaying the data from the database in the table
                            ?>
                                 <tr>
                    <td><?php echo $SN++ ?></td>
                    <!-- <td><?php //echo $fullName ?></td> -->
                    <td><?php echo $username ?></td>
                    <td><a href="<?php echo SITEURL; ?>admin/update-password.php?id=<?php echo $id; ?>" class="btn-primary">Password</a></td>
                    <td><a href="<?php echo SITEURL; ?>admin/update-admin.php?id=<?php echo $id; ?>" class="btn-secondary btn-update">Update</a></td>
                    <td><a href="<?php echo SITEURL; ?>admin/delete-admin.php?id=<?php echo $id; ?>" class="btn-danger btn-delete">Delete</a></td>
                </tr>
                            <?php


                        }
                    }else{
                        // there are no admin availabale
                    }

                }
                ?>





                
           
            </table>
        </div>
    </div>
    <!-- main content ends -->

    <!-- main footer starts -->
<?php include_once "./partials/footer.php"; ?>
    <!-- main footer ends -->




</body>
</html>