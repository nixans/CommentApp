<?php 

include 'dbconfig.php';

error_reporting(0);

session_start();

if (isset($_SESSION['username'])) {
    header("Location: index.php");
}

if (isset($_POST['submit'])) {
	$email = $_POST['email'];
	$password = md5($_POST['password']);
	$secret = md5($_POST['secret']);

		
			$sql = "INSERT INTO signup (email, password, secret)
					VALUES ('$email', '$password', '$secret')";
			$result = mysqli_query($con, $sql);
			if ($result) {
				echo "<script>alert('Sign up success')</script>";
				$email = "";
				$_POST['password'] = "";
				$_POST['secret'] = "";
			} else {
				echo "<script>alert('Woops! Something Wrong Went.')</script>";
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

	<title>Sign Up</title>
</head>
<body>
	<div class="container">
		<form action="" method="POST" class="login-email">
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">Sign Up</p>
			
			<p class="text-left">Already have an account? <a href="index.php">Sign In</a>.</p> <br>
			
			<p class="login-register-text">Email</a></p>
			<div class="input-group">
				<input type="email" name="email" value="<?php echo $email; ?>" required>
			</div>
			
			<p class="login-register-text">Password</a></p>
			<div class="input-group">
				<input type="password"  name="password" value="<?php echo $_POST['password']; ?>" required>
            </div>
			
			<p class="login-register-text">Secret</a></p>
            <div class="input-group">
				<input type="password" name="secret" value="<?php echo $_POST['secret']; ?>" required>
			</div>
			<div class="input-group">
				<button name="submit" class="btn">Sign Up</button>
			</div>
			<p class="text-left">By clicking the "Sign up" button ,you are creating an account, and you agree to the terms of use.</a>.</p> <br>
		</form>
	</div>
</body>
</html>