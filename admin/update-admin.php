<?php include_once "./partials/header.php"; ?>

<div class="main-content">

    <div class="wrapper">
        <div class="wrapper">
            <h1 class="h1-title">Update Admin</h1>

        <!-- GETTING THE DETAILS OF THE CURRENT ADMIN -->
        <?php
            $id = $_GET['id'];

            // setting a query to update the admin
            $sql = "SELECT * FROM tbl_admin WHERE id = $id";
            $res = mysqli_query($conn, $sql);
            if($res == true){
                $count  = mysqli_num_rows($res);
                if($count == 1){

                    while($rows = mysqli_fetch_assoc($res)){
                        
                        $fullName = $rows['full_name'];
                        $Username = $rows['username'];
                    }
                }else{
                    header('location:'.SITEURL.'admin/manage-admin.php');
                }
            }
            // echo $rows['full_name'];


        ?>


        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>FullName:</td>
                    <td><input type="text" value="<?php echo $fullName ?>" name="full_name"></td>
                </tr>
                
                <tr>
                    <td>Username:</td>
                    <td><input type="text" value="<?php echo $Username ?>" name="username"></td>
                </tr>
                <tr>
                    <td>
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="submit" value="Update Admin" class="btn-secondary" name="submit">
                    </td>
                </tr>
        </form>
            </table>

        </div>

    </div>
</div>
<?php  

if(isset($_POST['submit'])){
    // echo "You clicked a button";
    // 
    $id = $_POST['id'];
    $fullName =  mysqli_real_escape_string($conn, $_POST['full_name']);
    $Username =  mysqli_real_escape_string($conn, $_POST['username']);

    $sql = "UPDATE tbl_admin SET full_name = '$fullName', username = '$Username' WHERE id = $id";

    $res = mysqli_query($conn, $sql);
    if($res == true){
        $_SESSION['update'] = "<div class='success'>Admin Successfully Updated</div>";
        header('location:'.SITEURL.'admin/manage-admin.php');
    }else{
         $_SESSION['update'] = "<div class='error'>Failed to Update Admin</div>";
        header('location:'.SITEURL.'admin/manage-admin.php');

    }

}

?>






<?php include_once "./partials/footer.php";
