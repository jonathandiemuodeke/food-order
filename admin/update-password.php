<?php include_once "./partials/header.php"; ?>

<?php $id = $_GET['id']; ?>

<div class="main-content">
    <div class="wrapper">
        <h1 class="h1-title">Change Password</h1>

        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>Old Password:</td>
                    <td><input type="password" name="old_password" id="" placeholder="Current password"></td>
                </tr>
                <tr>
                    <td>new Password:</td>
                    <td><input type="password" name="new_password" id="" placeholder="New password"></td>
                </tr>
                <tr>
                    <td>confirm Password:</td>
                    <td><input type="password" name="confirm_password" id="" placeholder="confirm password"></td>
                </tr>
                <tr>
                    <td>
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="submit" value="Change Password" name="submit" class="btn-secondary">
                    </td>
                </tr>




            </table>
        </form>




    </div>
</div>

<?php 
if(isset($_POST['submit'])){
    // getting the user input
// echo $id;
    $id = $_POST['id'];
    $current_password_raw = md5($_POST['old_password']);
    $new_password_raw = md5($_POST['new_password']);
    $confirm_password_raw = md5($_POST['confirm_password']);

    $current_password = mysqli_real_escape_string($conn, $current_password_raw);
    $new_password =  mysqli_real_escape_string($conn, $new_password_raw);
    $confirm_password =  mysqli_real_escape_string($conn, $confirm_password_raw);

    // querying the database
    $sql = "SELECT * FROM tbl_admin WHERE id = $id AND password = '$current_password'";
    $res = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($res);

    // checking if the query fetched any data
    if($count == 1){
        // there is data available
        // echo "Admin Data Fetched successfully";

        // if the new password and the confirm password bith match
        if($new_password == $confirm_password){
            $sql2 = "UPDATE tbl_admin SET password = '$new_password' WHERE id = $id";

            // executing the query 

            $res2 = mysqli_query($conn, $sql2);
            if($res2 == true){
                $_SESSION['pwd-changed'] = "<div class='success'>password changed Successffully</div>";
                header('location:'.SITEURL.'admin/manage-admin.php');
            }
            else
            {
                $_SESSION['pwd-changed'] = "<div class='error'>Failed to Change password</div>";
                 header('location:'.SITEURL.'admin/manage-admin.php');

            }



        }else{
             $_SESSION['user-not-found'] = "<div class='error'>password does not match</div>";
            header('location:'.SITEURL.'admin/manage-admin.php');

        }


    }else{
        // redirect to the manage admin page
        $_SESSION['user-not-found'] = "<div class='error'>No Match Found</div>";
        header('location:'.SITEURL.'admin/manage-admin.php');
    }



}

 ?>

<?php include_once "./partials/footer.php"; ?>
