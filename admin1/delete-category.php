<?php
include('partials/menu.php'); 
include('./config/constants.php');

if(isset($_GET['id']) AND isset($_GET['image_name']))
{
    $id = $_GET['id'];
    $image_name = $_GET['image_name'];

    if($image_name !="")
    {
        $path ="../img/".$image_name;
        $remove =unlink($path);
        if($remove==false)
        {
            $_SESSION['remove'] = "<div class='error'>Faile to remove Category Image</div>";
            header('location:manager-category.php');
            die();
        }
    }
    $sql ="DELETE FROM tbl_category WHERE id=$id";

    $res = mysqli_query($conn, $sql);

    if($res==true)
    {
        $_SESSION['Delete'] = "<div class='success'>Category Deleted Successfully</div>";
        header('location:manager-category.php');
    }
    else
    {
        $_SESSION['Delete'] = "<div class='error'>Faile to Delete Category</div>";
        header('location:manager-category.php');
    }
}

else
{
    header('location:manager-category.php');
}

?>