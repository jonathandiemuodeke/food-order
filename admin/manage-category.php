<?php include_once "./partials/header.php";  ?>


<div class="main-content">
        <div class="wrapper">
            <h1 class="h1-title">Manage Category</h1>
            
            <!-- display if the category is added successfully or not -->
            <?php 
            if(isset($_SESSION['add-category']))
             {
                echo $_SESSION['add-category'];
                unset($_SESSION['add-category']);
             } 
            if(isset($_SESSION['remove']))
             {
                echo $_SESSION['remove'];
                unset($_SESSION['remove']);
             } 
            if(isset($_SESSION['delete']))
             {
                echo $_SESSION['delete'];
                unset($_SESSION['delete']);
             } 
            if(isset($_SESSION['no-record-found']))
             {
                echo $_SESSION['no-record-found'];
                unset($_SESSION['no-record-found']);
             } 
            if(isset($_SESSION['updated']))
             {
                echo $_SESSION['updated'];
                unset($_SESSION['updated']);
             } 
            if(isset($_SESSION['upload']))
             {
                echo $_SESSION['upload'];
                unset($_SESSION['upload']);
             } 
            if(isset($_SESSION['remove-img-failed']))
             {
                echo $_SESSION['remove-img-failed'];
                unset($_SESSION['remove-img-failed']);
             } 
        ?>


<!-- add category button -->
            <a href="<?php echo SITEURL.'admin/add-category.php';  ?>" class="btn-primary add-admin">Add category</a>



            <!-- ADDING TABLE -->

            <table class="tbl-full" cellpadding="0" cellspacing="10">
                <tr class="tbl-margin">
                    <th>S/N</th>
                    <th>Title</th>
                    <th>Image</th>
                    <th>Active</th>
                    <th>featured</th>
                    <th>Action</th>
                </tr>
                <!--  -->
                <?php
                // sql query to fetch the data available in the database

                $sql = "SELECT * FROM tbl_category ";
                $res = mysqli_query($conn,$sql);
                $count = mysqli_num_rows($res);

                // serial number
                $sn = 1;

                if($count > 0){
                    
                    while($rows = mysqli_fetch_assoc($res)){
                        $id = $rows['id'];
                        $title = $rows['title'];
                        $image_name = $rows['image_name'];
                        $featured = $rows['featured'];
                        $active = $rows['active'];
                        ?>

                <tr>
                    <td><?php echo $sn++; ?></td>
                    <td><?php echo $title; ?></td>

                        <!-- checking the image if it has name or not -->
                    <td><?php
                        if($image_name != "" ){

                        ?>
                        <!-- displaying the image -->

                        <img src="<?php echo SITEURL; ?>images/category/<?php echo $image_name;?>" alt="" class="img-width">


                        <?php
                        }
                        else{
                            echo "<div class='error text-center'>No image found!</div>"; 
                        }
                            ?>
                    </td>



                    <td><?php echo $featured; ?></td>
                    <td><?php echo $active; ?></td>
                    <td><a href="<?php SITEURL; ?>update-category.php?id=<?php echo $id;?>" class="btn-secondary btn-update">Update</a></td>
                    <td><a href="<?php SITEURL; ?>delete-category.php?id=<?php echo $id;?>&image_name=<?php echo $image_name;?>" class="btn-danger btn-delete">Delete</a></td>
                </tr>
                <?php
                    }
                        }
                        else{
                    ?>

                            <tr>
                                <div class="error text-center">No Category Available</div>
                            </tr>
                            <?php
                 }
                ?>
                <!--  -->
                
                
            </table>

        </div>
    </div>








<?php include_once "./partials/footer.php"; ?>
