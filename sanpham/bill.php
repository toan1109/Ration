<?php
    session_start();
    include "thuvien.php";
    if(isset($_POST['dongydathang'])&&($_POST['dongydathang'])){
        //lấy thông tin kh từ form để tạo đơn hàng
        $name=$_POST['hoten'];
        $address=$_POST['diachi'];
        $tel=$_POST['dienthoai'];
        $email=$_POST['email'];
        $total=tongdonhang();
        $pttt=0;

        //insert đơn hàng - tạo đơn hàng mới
        $idbill=taodonhang($name,$address,$tel,$email,$total,$pttt);

        
        //lấy thông tin giỏ hàng từ session + id đơn hàng vừa tạo
        //insert vào bảng giỏ hàng

        for ($i=0; $i < sizeof($_SESSION['giohang']); $i++) { 
            $tensp=$_SESSION['giohang'][$i][1];
            $hinhsp=$_SESSION['giohang'][$i][0];
            $dongia=$_SESSION['giohang'][$i][2];
            $soluong=$_SESSION['giohang'][$i][3];
            $thanhtien=$dongia*$soluong;
            taogiohang($tensp,$hinhsp,$dongia,$soluong,$thanhtien,$idbill);
        }

        //show confirm đơn hàng

        $ttkh='Bạn đã đặt hàng thành công<br><h1>Mã đơn hàng: '.$idbill.'</h1>
                <h2>THÔNG TIN NHẬN HÀNG</h2>
                <table class="thongtinnhanhang">
                
                <tr>
                    <td width="20%">Họ tên</td>
                    <td>'.$name.'</td>
                </tr>
                <tr>
                    <td>Địa chỉ</td>
                    <td>'.$address.'</td>
                </tr>
                <tr>
                    <td>Điện thoại</td>
                    <td>'.$tel.'</td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>'.$email.'</td>
                </tr>
            </table>';
            $ttgh=showgiohang();


        //unset giỏ hàng session

        unset($_SESSION['giohang']);

       // echo "Bạn đã đặt hàng thành công. Đơn hàng của bạn là!";
    }
    
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
    <div class="boxcenter">

        <div class="row mb ">
            <div class="boxtrai mr" id="bill">
                <div class="row" >
                    
                   <?php echo $ttkh;?> 
                </div>
                <div class="row mb">
                    <h2>GIỎ HÀNG</h2>
                    <table>
                        <tr>
                            <th>STT</th>
                            <th>Hình</th>
                            <th>Tên sản phẩm</th>
                            <th>Đơn giá</th>
                            <th>Số lượng</th>
                            <th>Thành tiền ($)</th>
                            <th>Xóa</th>
                        </tr>
                        <?php echo $ttgh; ?>
                        
                    </table>
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
        <div class="row mb footer">
            Copyright © 2021 - HOTB
        </div>
    </div>

</body>

</html>