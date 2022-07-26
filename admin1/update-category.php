<?php
include('partials/menu.php');
include('./config/constants.php');

?>

<div class="main-content">
        <div class="wrapper">
            <h1>Update Category</h1>
            <br/><br/>

            <?php
            if(isset($_GET['id']))
            {
                $id = $_GET['id'];

                $sql = "SELECT * FROM tbl_category WHERE id=$id";

                $res = mysqli_query($conn, $sql);

                $count = mysqli_num_rows($res);

                if($count==1)
                {
                    $row = mysqli_fetch_assoc($res);
                    $title = $row['title'];
                    $current_image = $row['image_name'];
                    $featured = $row['featured'];
                    $active = $row['active'];
                }
                else
                {
                    $_SESSION['no-category-found'] = "<div class='error'>Category not Found</div>";
                    header('location: manager-category.php');
                }


            }
            else
            {

            }
            ?>

            <form action="" method="POST" enctype="multipart/form-data">
                <table class="tbl-30">
                    <tr>
                        <td>Title</td>
                        <td>
                            <input type="text" name="title" value=" <?php echo $title; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>Current Image</td>
                        <td>
                            <?php
                                if($current_image !="")
                                {
                                   ?>
                                   <img src="<?php echo SITEURL; ?>img/<?php echo $current_image ?>"width="150px">
                                   <?php 
                                }
                                else
                                {
                                    echo "<div class='error'>Image not Added</div>";
                                }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>New image</td>
                        <td>
                            <input type="file" name="image" >
                        </td>
                    </tr>
                    <tr>
                        <td>Featured</td>
                        <td>
                            <input <?php if($featured=="Yes"){echo"checked";} ?> type="radio" name="featured" value="Yes">Yes
                            <input <?php if($featured=="No"){echo"checked";} ?> type="radio" name="featured" value="No">No
                            

                        </td>
                    </tr>
                    <tr>
                        <td>Active</td>
                        <td>
                            <input <?php if($active=="Yes"){echo"checked";} ?> type="radio" name="active" value="Yes">Yes
                            <input <?php if($active=="No"){echo"checked";} ?> type="radio" name="active" value="No">No
                             

                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="hidden" name="current_image" value="<?php echo $current_image; ?>">
                            <input type="hidden" name="id" value="<?php echo $id;?>">
                            <input type="submit" name="submit" value="Update Category" class="btn-secondary">
                        </td>
                    </tr>
                </table>
            </form>
            <?php

                if(isset($_POST['submit']))
                {
                    $id = $_POST['id'];
                    $title =$_POST['title'];
                    $current_image = $_POST['current_image'];
                    $featured = $_POST['featured'];
                    $active = $_POST['active'];

                    if(isset($_FILES['image']['name']))
                    {
                        $image_name =$_FILES ['image']['name'];
                        if($image_name !="")
                        {

                            //Auto Rename our Image
                        //Get the Extension of our image (jpg, png, gif, etc) e.g. "specialfood1.jpg"
                        $ext = end(explode('.', $image_name));

                        //Rename the Image
                        $image_name = "Food_Category_".rand(000, 999).'.'.$ext; // e.g. Food_Category_834.jpg
                        

                        $source_path = $_FILES['image']['tmp_name'];

                        $destination_path = '../img/'.$image_name;

                        //Finally Upload the Image
                        $upload = move_uploaded_file($source_path, $destination_path);

                        //Check whether the image is uploaded or not
                        //And if the image is not uploaded then we will stop the process and redirect with error message
                        if($upload==false)
                        {
                            //SEt message
                            $_SESSION['upload'] = "<div class='error'>Failed to Upload Image. </div>";
                            //Redirect to Add CAtegory Page
                            header('location:manager_category.php');
                            //STop the Process
                            die();
                        }
                        if($current_image !=="")
                        {
                            
                        }
                        
                            
                        }
                        else
                        {
                            $image_name = $current_image;
                            
                        }
                    }
                    else
                    {
                        $image_name = $current_image;
                    }

                    $sql2 = "UPDATE tbl_category SET
                        title ='$title',
                        image_name = '$image_name',
                        featured = '$featured',
                        active = '$active'
                        WHERE id=$id
                    ";

                    $res2 = mysqli_query($conn, $sql2);

                    if($res2==TRUE)
                    {
                        $_SESSION['update'] = "<div class='success'>Category Update Successfully</div>";
                        header('location:manager-category.php');
                    }
                    else
                    {
                        $_SESSION['update'] = "<div class='error'>Faile to Delete Category</div>";
                        header('location:manager-category.php');
                    }
                }
                ?>
        </div>
</div>
<?Php
include('partials/footer.php')
?>
