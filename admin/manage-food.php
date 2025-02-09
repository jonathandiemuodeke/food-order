<?php include_once "./partials/header.php";  ?>

<div class="main-content">
        <div class="wrapper">
            <h1 class="h1-title">Manage Food</h1>
            
    <!-- add admin button -->
            <a href="<?php echo SITEURL; ?>admin/add-food.php" class="btn-primary add-admin">Add Fod</a>

        <?php
            if(isset($_SESSION['uploaded'])){
                echo $_SESSION['uploaded'];
                unset($_SESSION['uploaded']);
            }
            if(isset($_SESSION['delete'])){
                echo $_SESSION['delete'];
                unset($_SESSION['delete']);
            }
            if(isset($_SESSION['img-removal-failed'])){
                echo $_SESSION['img-removal-failed'];
                unset($_SESSION['img-removal-failed']);
            }
            if(isset($_SESSION['deleted'])){
                echo $_SESSION['deleted'];
                unset($_SESSION['deleted']);
            }
            if(isset($_SESSION['img-update-failed'])){
                echo $_SESSION['img-update-failed'];
                unset($_SESSION['img-update-failed']);
            }
            if(isset($_SESSION['img-removal-failed'])){
                echo $_SESSION['img-removal-failed'];
                unset($_SESSION['img-removal-failed']);
            }
            if(isset($_SESSION['food-updated'])){
                echo $_SESSION['food-updated'];
                unset($_SESSION['food-updated']);
            }

        ?>

            <!-- ADDING TABLE -->

            <table class="tbl-full" cellpadding="10px" cellspacing="20px">
                <tr>
                    <th>S/N</th>
                    <th>Title</th>
                    <th>image</th>
                    <!-- <th>category</th> -->
                    <th>featured</th>
                    <th>active</th>
                    <th>action</th>
                </tr>
                <!--  -->
                <?php 
                $sql = "SELECT * FROM tbl_food";
                // 
                $res = mysqli_query($conn, $sql);
                // 
                // counting rows
                $count = mysqli_num_rows($res);
                // 
                // 
                $sn = 1;
                if($count > 0){
                    // then there are data available
                    while($rows = mysqli_fetch_assoc($res)){
                        $id = $rows['id'];
                        $title = $rows['title'];
                        $price = $rows['price'];
                        $image_name = $rows['image_name'];
                        // $category = $rows['category'];
                        $featured = $rows['featured'];
                        $active = $rows['active'];

                        ?>
                         <tr>
                            <td><?php echo $sn++; ?> </td>
                            <td><?php echo $title; ?></td>

                            
                            <td>
                            <?php 
                            if($image_name == ""){
                                echo "<div class='error text-center'>No image available yet</div>";


                            }else{

                            ?>
                                <img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name;?>"  class="img-width">
                                <?php
                                
                            }
                            ?>
                            </td>



                            <td><?php echo $featured; ?></td>
                            <td><?php echo $active; ?></td>
                            <td><a href="<?php echo SITEURL; ?>admin/update-food.php?id=<?php echo $id; ?>" class="btn-secondary btn-update">Update</a></td>
                            <td><a href="<?php echo SITEURL; ?>admin/delete-food.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>" class="btn-danger btn-delete">Delete</a></td>
                        </tr>
                        <?php
                    }

                }else{
                    // no data available yet
                    echo "<tr><td colspan='7'><div class='error'>No data available yet</div></td></tr>";
                }
                ?>
                <!--  -->

               
           
            </table>


        </div>
    </div>

<?php include_once "./partials/footer.php"; ?>


