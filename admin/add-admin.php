<?php include_once "./partials/header.php" ; ?>


<div class="main-content">
        <div class="wrapper">
            <h1 class="h1-title">Add Admin</h1>

            <?php
                if(isset($_SESSION['add'])){
                    echo $_SESSION['add'];
                    unset($_SESSION['add']);
                }
            ?>
<!-- FORM TO ADD ADMIN -->

<form action="" method="post">
    <table class="tbl-30">
        <tr>
            <td>Full Name: </td>
            <td><input type="text" name="full_name" id="" placeholder="Enter Name"> </td>
        </tr>

        <tr>
            <td>Username: </td>
            <td><input type="text" name="username" id="" placeholder="Enter Username"></td>
        </tr>

        <tr>
            <td>Password: </td>
            <td><input type="password" name="password" id="" placeholder="Enter Password"></td>
        </tr>

        <tr>
            <td colspan="2"> <input type="submit" value="Add Admin" class="btn-secondary" name="submit"></td>
        </tr>
    </table>
</form>

<!-- FORM TO ADD ADMIN -->




</div>
</div>



<?php include_once "./partials/footer.php" ; ?>

<?php

if(isset($_POST["submit"])){
    $fullName =  mysqli_real_escape_string($conn, $_POST['full_name']);
    $username =  mysqli_real_escape_string($conn, $_POST['username']);
    $raw_password = md5($_POST['password']);
    $password =  mysqli_real_escape_string($conn, $raw_password);

    $sql = "INSERT INTO tbl_admin SET full_name = '$fullName',
    username = '$username',
    password = '$password' ";

// executing the query abd saving the data to the database
$res = mysqli_query($conn, $sql);
if($res == true){
    // data is inserted succesfully
    $_SESSION['add'] = "<div class='success'>Admin Added successfully</div>";
    header("location:".SITEURL."admin/manage-admin.php");
}else{
    // failed to insert data
    $_SESSION['add'] = "<div class='success'Failed to add Admin</div>";
    header("location:".SITEURL."admin/add-admin.php");
}

}

