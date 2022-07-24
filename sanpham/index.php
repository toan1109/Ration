<?php
    session_start();
    $logined=0;
    if(!isset($_SESSION['luottruycap'])) $_SESSION['luottruycap']=0;
    else $_SESSION['luottruycap']+=1;

    if(isset($_COOKIE['user'])&&isset($_COOKIE['pass'])){
        echo "Cookie đã đăng ký là: ".$_COOKIE['user']." - ".$_COOKIE['pass'];
    }

    if(isset($_GET['delc'])&&($_GET['delc']==1)){
        setcookie("user","",time()-(86400*7));
        setcookie("pass","",time()-(86400*7));
        echo "<br><font color='red'>Bạn đã xóa cookie</font>";
    }

    if(isset($_POST['login'])&&($_POST['login'])){
        $user=$_POST['user'];
        $pass=$_POST['pass'];
        if(($user=="demo")&&($pass=="demo")){
            $_SESSION['user']=$user;
            $_SESSION['pass']=$pass;
            $logined=1;
            $msg= "<br><font color='blue'>Các bạn đăng nhập thành công</font>";
        }else{
            $logined=0;
            $msg= "<br><font color='red'>Vui lòng đăng nhập</font>";
        }
        if(isset($_POST['ghinho'])&&($_POST['ghinho'])){
            setcookie("user",$user,time()+(86400*7));
            setcookie("pass",$pass,time()+(86400*7));
            $msgcookie="<br>Đã ghi nhận cookie!";
        }
    }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="../style/style.css">
</head>

<body>
    <!-- <div class="giohang">
        <a href="cart.html"><img src="images/cart.png"><span id="countsp">0</span></a>
    </div> -->
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
            <div class="boxtrai mr">
                <div class="row">
                    <div class="boxsp mr">
                        <div class="row img"><img src="../img/salad.png" alt=""></div>
                        <p>$<span>25</span></p>
                        <a href="#">Salad, Green</a>
                        <form action="cart.php" method="post">
                        <input type="number" name="soluong" min="1" max="25" value="1">
                        <input type="hidden" name="tensp" value="Salad">
                        <input type="hidden" name="gia" value="25">
                        <input type="hidden" name="hinh" value="../img/salad.png">
                        <input type="submit" name="addcart" value="Đặt hàng">
                        </form>
                    </div>
                    <div class="boxsp mr">
                        <div class="row img"><img src="../img/green.png" alt=""></div>
                        <p>$<span>20</span></p>
                        <a href="#">Chicken Wings</a>
                        <form action="cart.php" method="post">
                        <input type="number" name="soluong" min="1" max="25" value="1">
                        <input type="hidden" name="tensp" value="Salad, Greens">
                        <input type="hidden" name="gia" value="25">
                        <input type="hidden" name="hinh" value="../img/green.png">
                        <input type="submit" name="addcart" value="Đặt hàng">
                        </form>
                    </div>
                    <div class="boxsp ">
                        <div class="row img"><img src="../img/hamburger.png" alt=""></div>
                        <p>$<span>30</span></p>
                        <a href="#">Cheese Burger</a>
                        <form action="cart.php" method="post">
                        <input type="number" name="soluong" min="1" max="10" value="1">
                        <input type="hidden" name="tensp" value="Cheese Burger">
                        <input type="hidden" name="gia" value="30">
                        <input type="hidden" name="hinh" value="../img/hamburger.png">
                        <input type="submit" name="addcart" value="Đặt hàng">
                        </form>
                    </div>
                    <div class="boxsp mr">
                        <div class="row img"><img src="../img/rice.png" alt=""></div>
                        <p>$<span>15</span></p>
                        <a href="#">Chicken Biryani</a>
                        <form action="cart.php" method="post">
                        <input type="number" name="soluong" min="1" max="10" value="1">
                        <input type="hidden" name="tensp" value="Chicken Biryani">
                        <input type="hidden" name="gia" value="15">
                        <input type="hidden" name="hinh" value="../img/rice.png">
                        <input type="submit" name="addcart" value="Đặt hàng">
                    </div>
                    <div class="boxsp mr">
                        <div class="row img"><img src="../img/pizza.png" alt=""></div>
                        <p>$<span>25</span></p>
                        <a href="#">Spicy Pizza </a>
                        <form action="cart.php" method="post">
                        <input type="number" name="soluong" min="1" max="10" value="1">
                        <input type="hidden" name="tensp" value="Spicy Pizza">
                        <input type="hidden" name="gia" value="25">
                        <input type="hidden" name="hinh" value="../img/pizza.png">
                        <input type="submit" name="addcart" value="Đặt hàng">
                    </div>
                    <div class="boxsp ">
                        <div class="row img"><img src="../img/sandwich.png" alt=""></div>
                        <p>$<span>5</span></p>
                        <a href="#">Sandwiches</a>
                        <form action="cart.php" method="post">
                        <input type="number" name="soluong" min="1" max="10" value="1">
                        <input type="hidden" name="tensp" value="Sandwiches">
                        <input type="hidden" name="gia" value="5">
                        <input type="hidden" name="hinh" value="../img/sandwich.png">
                        <input type="submit" name="addcart" value="Đặt hàng">
                    </div>
                    
                </div>
            </div>
        </div>
    </div>

</body>

</html>