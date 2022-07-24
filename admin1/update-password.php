 <?php
include('partials/menu.php');
include('config/constants.php');
 ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Update Password</h1>

        

        <br><br> 
        <form action="" method="POST">
            <table>
                <tr>
                    <td>Old Password</td>
                    <td>
                        <input type="password" name ="current_password" placeholder="Old Password">
                    </td>
                </tr>
                <tr>
                    <td>New Password</td>
                    <td>
                    <input type="password" name ="new_password" placeholder="New Password">
                    </td>
                </tr>
                <tr>
                    <td>Confirm Password</td>
                    <td>
                        <input type="password" name="confirm_password" placeholder="Confirm Passwords">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Change Password">
                    </td>
                </tr>
            </table>
        </form>   
    </div>
</div>   

<?php

if(isset($_POST['submit']))
{
    $id=$_POST['id'];
    $current_password=md5($_POST['current_password']);
    $new_password= md5($_POST['new_password']);
    $confirm_password =md5($_POST['confirm_password']);


    $sql = "SELECT * FROM tbl_admin WHERE id=$id AND password ='$current_password'";

    $res = mysqli_query($conn, $sql);
    if($res==TRUE)
    {
        $count= mysqli_num_rows($res);

    }
}
?>
<?php
include('partials/footer.php');
 ?>