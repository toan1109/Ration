<?php
session_start();

define('SITEURL','http://localhost/doan/');
define('LOCALHOST','localhost',);
define('DB_USERNAME','root');
define('DB_PASSWORD','');
define('DB_NAME','nhahang');

 $conn = mysqli_connect(LOCALHOST,DB_USERNAME,DB_PASSWORD);
 $db_select = mysqli_select_db($conn,DB_NAME);
?>