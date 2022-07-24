<?php

//get id
if(isset($_GET['id'])) $id=$_GET['id']; else $id=0;
//connect & get data
    
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "hop";
    
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    
    //cập nhật lượt xem
    $sql = "UPDATE sanpham SET luotxem=luotxem+1 WHERE id=".$id;
    if (mysqli_query($conn, $sql)) {
        //echo "Record updated successfully";
    } else {
        //echo "Error updating record: " . mysqli_error($conn);
    }

    //lấy thông tin sp từ database
    $sql = "SELECT * FROM sanpham WHERE id=".$id;
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
      // output data of each row
      $kq="";
      while($row = $result->fetch_assoc()) {
        //echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
        $kq.= '<tr>
                    <td width="20%">Tên sản phẩm</td>
                    <td>'.$row["tensp"].'</td>
                </tr>
                <tr>
                    <td>Mô tả</td>
                    <td>'.$row["mota"].'</td>
                </tr>
                <tr>
                    <td>Lượt xem</td>
                    <td>'.$row["luotxem"].'</td>
                </tr>
                <tr>
                    <td>Giá</td>
                    <td>'.$row["giasp"].'</td>
                </tr>';
      }
    } else {
      echo "0 results";
    }
    //đóng kết nối
    $conn->close();


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart | View Cart</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="../style/style.css">
</head>

<body>
    <div class="boxcenter">
    <header>
        <div class="logo">
            <h1><span>Rat</span><span style="color: #fe5000">ions.</span></h1>
        </div>
            <ul class="ul-header">
            <li><a class="hov" href="../index.php">Home</a></li>
                <li><a class="hov" href="../index.php#about">About Us</a></li>
                <li><a class="hov" href="../index.php#menu">Menu</a></li>
                <li><a class="hov" href="cart.php">Cart</a></li>
                <li><a class="hov" href="../index.php#contact">Contact Us</a></li>
            </ul>
        
        <div class="button">
            <?php 
            if (isset($_SESSION['username'])) {

                ?>
            <span class="name"><?php echo $_SESSION['username']; ?></span>   
            <a class="out" href="../login1/logout.php">Log Out</a>
                <?php
            }
            else {?>
            <a class="log" href="../login1/login.php">Log In</a>
            <a class="sign" href="../login1/register.php">Sign Up</a>   
            <?php


            }
            
            ?>
             
        </div>
    </header>
        <div class="row mb ">
            <div class="boxtrai mr">
                <div class="row">
                    <h1>THÔNG TIN SẢN PHẨM</h1>
                    <table class="thongtinnhanhang">
                        <?php echo $kq;?>
                    </table>
                </div>
                
            </div>
            <div class="boxphai">
                <div class="row mb ">
                    <div class="boxtitle">TÀI KHOẢN</div>
                    <div class="boxcontent formtaikhoan">
                        <form action="#" method="post">
                            <div class="row mb10">
                                Tên đăng nhập<br>
                                <input type="text" name="user">
                            </div>
                            <div class="row mb10">
                                Mật khẩu<br>

                                <input type="password" name="pass">
                            </div>
                            <div class="row mb10">
                                <input type="checkbox" name=""> Ghi nhớ tài khoản?</div>
                            <div class="row mb10">
                                <input type="submit" value="Đăng nhập">
                            </div>
                        </form>
                        <li>
                            <a href="#">Quên mật khẩu</a>
                        </li>
                        <li>
                            <a href="#">Đăng ký thành viên</a>
                        </li>
                    </div>
                </div>
                <div class="row mb">

                    <div class="boxfooter searbox">
                        <form action="#" method="post">
                            <input type="text" name="" id="">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb footer">
            Copyright © 2021 - HOTB
        </div>
    </div>

</body>

</html>