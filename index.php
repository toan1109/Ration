<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/menu.css">
    <link rel="stylesheet" href="style/about.css">
    <link rel="stylesheet" href="style/footer.css">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@300&family=Pacifico&family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <header>
        <div class="logo">
            <h1><span>Rat</span><span style="color: #fe5000">ions.</span></h1>
        </div>
            <ul class="ul-header">
                <li><a class="hov" href="index.php">Home</a></li>
                <li><a class="hov" href="#about">About Us</a></li>
                <li><a class="hov" href="#menu">Menu</a></li>
                <li><a class="hov" href="sanpham/cart.php">Cart</a></li>
                <li><a class="hov" href="#contact">Contact Us</a></li>
            </ul>
        
        <div class="button">
            <?php 
            if (isset($_SESSION['username'])) {

                ?>
            <span class="name"><?php echo $_SESSION['username']; ?></span>   
            <a class="out" href="login1/logout.php">Log Out</a>
                <?php
            }
            else {?>
            <a class="log" href="login1/login.php">Log In</a>
            <a class="sign" href="login1/register.php">Sign Up</a>   
            <?php


            }
            
            ?>
             
        </div>
    </header>
    <section>
        <div class="text text-bg">
            <p class="del" >Delivering <br> Happiness.</p>   
            <p class="jus">Just order and wait for a while we’ll be there at your<br> door. Delivering the best foods for you. We are <br>deliverying the best foods.</p>
            <a href="#" class="exp">Explore Menu</a>
        </div>
            <img class="bg" src="img/Image.png" alt="">
        </div>
        <div class="countdown">
            <ul class="count">
                <li><b>2K+</b></li>
                <li>10K+</li>
                <li>100+</li>
                <li>20K+</li>
            </ul>
            <ul class="home">
                <li>Food Item</li>
                <li>Home Delivery</li>
                <li>Active Chef</li>
                <li>Our Custumer</li>
            </ul>
        </div>
        <div class="services">
            <h2>Our Services</h2>
            <p>All the features you want. Rations makes it easy to build<br> and manage your food order.</p>
            <div class="container services-container">
                <div class="item item1">
                    <i class="fas fa-truck radius"></i>
                    <h3>Free Delivery</h3>
                    <p>We are providing free home delivery services for our clients at anytime, anywhere of the corner.</p>
                </div>
                <div class="item item2">
                    <i class="fas fa-store radius"></i>
                    <h3>24/7 open</h3>
                    <p>Our restaurant is open 24 hours and we are providing the best services for our honorable clients.</p>
                </div>
                <div class="item item3">
                    <i class="fas fa-pizza-slice radius"></i>
                    <h3>Delicious Dishes</h3>
                    <p>We are providing delicious so many food items that you will love most to eat in your daily life.</p>
                </div>
            </div>
        </div>
        
        <div class="menu" id="menu">
            <h2>Explore Our Best Menu</h2>
            <p>Explore our best menu and order the suitable one. We are here to provide all the delicious dishes.</p>
                <div class="container menu-container">
                   <?php

                    $sql2 = "SELECT * FROM tbl_food WHERE active ='Yes' AND featured='Yes' LIMIT 6";

                    $res2 = mysqli_query($conn, $sql2);

                    if($count2>0){
                        while($row=mysqli_fetch_assoc($res2))
                        {
                            $id = $row['id'];
                            $title = $row['title'];
                            $price = $row['price'];
                            $description = $row['description'];
                            $image_name = $row['image_name'];
                            ?>
                                <div class="item-menu">
                                    <?php
                                        if($image_name=="")
                                        {
                                            echo " <div class='error'> Image not available</div>";
                                        }
                                        else
                                        {
                                            ?>
                                            <img class src="img/salad.png"<?php echo $image_name;?>>

                                            <?php
                                        }
                                    ?>
                                    <div class="rate">
                                        <i class="fas fa-star"></i>
                                        <p>4.8</p>
                                    </div>
                                    <h3><?php echo $title; ?></h3>
                                    <div class="flex-menu">
                                    <a href="sanpham/index.php"><button class="btn">Order Now</button></a>
                                    <p>$<?php echo $price; ?></p>
                                    </div>

                                </div> 
                            
                            <?php
                        }
                    }
                    else
                    {
                        echo "<div class= 'error'>Food not available</div>";
                    }

                    ?>
                    
                
                    

                    <div class="item-menu">
                        <img class src="img/green.png">
                        <div class="rate">
                            <i class="fas fa-star"></i>
                            <p>4.8</p>
                        </div>
                        <h3>Salad, Greens</h3>
                        <div class="flex-menu">
                        <a href="sanpham/index.php"><button class="btn">Order Now</button></a>
                        <p>$25.00</p>
                        </div>

                    </div>

                    <div class="item-menu">
                        <img class src="img/hamburger.png">
                        <div class="rate">
                            <i class="fas fa-star"></i>
                            <p>4.8</p>
                        </div>   
                        <h3>Cheese Burger</h3>
                        <div class="flex-menu">
                        <a href="sanpham/index.php"><button class="btn">Order Now</button></a>
                        <p>$25.00</p>
                        </div>

                    </div>
                </div>
                <div class="container menu-container">
                    <div class="item-menu">
                        <img class src="img/rice.png">
                        <div class="rate">
                            <i class="fas fa-star"></i>
                            <p>4.8</p>
                        </div>
                        <h3>Chicken Biryani</h3>
                        <div class="flex-menu">
                        <a href="sanpham/index.php"><button class="btn">Order Now</button></a>
                        <p>$25.00</p>
                        </div>

                        
                    </div> 

                    <div class="item-menu">
                        <img class src="img/pizza.png">
                        <div class="rate">
                            <i class="fas fa-star"></i>
                            <p>4.8</p>
                        </div>
                        <h3>Spicy Pizza</h3>
                        <div class="flex-menu">
                        <a href="sanpham/index.php"><button class="btn">Order Now</button></a>
                        <p>$25.00</p>
                        </div>

                    </div>

                    <div class="item-menu">
                        <img class src="img/sandwich.png">
                        <div class="rate">
                            <i class="fas fa-star"></i>
                            <p>4.8</p>
                        </div>   
                        <h3>Sandwiches</h3>
                        <div class="flex-menu">
                        <a href="sanpham/index.php"><button class="btn">Order Now</button></a>
                        <p>$25.00</p>
                        </div>

                    </div>
                </div>
        </div>
        <div class="about" id="about">
            <div class="box">
                <img src="img/cheerful-bearded-caucasian-male-with-gentle-smile-dressed-casual-outfit-shows-you-direction-nice-place-indicates-with-thumb-aside_ccexpress 1.png" alt="">    
            </div>
            <div class="text text-about">
                <h1>What Our Clients Say About Us.</h1>
                <p><i>“They are the best people. And this is the suitable platform to ordering food online. I have enjoyed a lot to order with them. They are very helpful and faster people.”</i></p>
                <h2>Kyle Mills</h2>
            </div>
        </div>
    </section>

    <footer>
        <div class="footer" id="contact">
            <div class="ready">
                <h1>Ready to order your favourite food?</h1>
                <div class="ra">
                    <h2><span style="color: #fff;">Rat</span><span style="color: #fe5000">ions.</span></h2>
                    <p>Food order now super easy for everyone. Let’s order your food through our website and enjoy your ordering.</p>
                </div>
            </div>
            <div class="btn-list">
                <div class="btn-footer">
                    <a href="sanpham/layout.html"><button class="btn">Order Now</button></a>
                    <button class="btn">Learn More</button>
                </div>
                <div class="list">
                    <ul>
                        <li class="bold">Company</li>
                        <li><a href="">Home</a></li>
                        <li><a href="">About us</a></li>
                        <li><a href="">Contact Us</a></li>
                    </ul>

                    <ul>
                        <li class="bold">Support</li>
                        <li><i class="fas fa-phone-alt"><a href="">+880 1706 499 216</a></i></li>
                        <li><i class="fas fa-envelope"><a href="">email@gmail.com</a></i></li>
                        <li><i class="fas fa-map-marker-alt"><a href="">4/5 Seddon Park, Hamilton New Zealand.</a></i></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container-footer">
            <p>© Copyright 2022 All Rights Reserved</p>
        </div>
    </footer>

</body>
</html>
 