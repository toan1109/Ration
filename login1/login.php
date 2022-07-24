<?php 

include 'config.php';

session_start();

error_reporting(0);

if (isset($_POST['submit'])) {
	$email = $_POST['email'];
	$password = md5($_POST['password']);

	$sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
	$result = mysqli_query($conn, $sql);
	if ($result==true) {
		$row = mysqli_fetch_assoc($result);
		$fullname = $row['username'];
		$id = $row['id'];
		$type = $row['type'];

		if ($type == 'user') {
			$_SESSION['id'] = $id;
			$_SESSION["username"] = "$fullname";
			header("location: ../index.php");
		}

		if ($type == 'admin'){
			$_SESSION['admin'] = "$fullname";
			header("location:../admin1/admin.php");
		}
	} else {
		echo "<script>alert('Woops! Email or Password is Wrong.')</script>";
		header("Location: ../index.php");
	}

}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="style.css">

	<title>Login Form</title>
</head>
<body>
	<header>
        <div class="logo">
            <h1><span>Rat</span><span style="color: #fe5000">ions.</span></h1>
        </div>
            <ul class="ul-header">
                <li><a class="hov" href="../index.php">Home</a></li>
                <li><a class="hov" href="">About Us</a></li>
                <li><a class="hov" href="#menu">Menu</a></li>
                <li><a class="hov" href="">Review</a></li>
                <li><a class="hov" href="">Contact Us</a></li>
            </ul>
	</header>
	<div class="container">
		<form action="" method="POST" class="login-email">
			<p class="login-text" style="font-size: 2rem; font-weight: 800;">Login</p>
			<div class="input-group">
				<input type="email" placeholder="Email" name="email" value="<?php echo $email; ?>" required>
			</div>
			<div class="input-group">
				<input type="password" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required>
			</div>
			<div class="input-group">
				<button name="submit" class="btn">Login</button>
			</div>
			<p class="login-register-text">Don't have an account? <a href="register.php">Sign Up Here</a>.</p>
		</form>
	</div>

</body>
</html>