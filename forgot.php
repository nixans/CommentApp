<?php 

include 'dbconfig.php';

session_start();

error_reporting(0);

if (isset($_SESSION['email'])) {
    header("Location: comment.php");
}

if (isset($_POST['submit'])) {
	$email = $_POST['email'];
	$secret = md5($_POST['secret']);

	$sql = "SELECT * FROM signup WHERE email='$email' AND secret='$secret'";
	$result = mysqli_query($con, $sql);
	
	if ($result->num_rows > 0) {
		$row = mysqli_fetch_assoc($result);
		$_SESSION['email'] = $row['email'];
		header("Location: comment.php");
	} else {
		echo "<script>alert('Woops! Email or Secret is Wrong.')</script>";
	}
}
?> 

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="style.css">

	<title>forgot Password</title>
</head>
<body>
	<div class="container">
		<form action="" method="POST" class="login-email">
			<p class="login-text" style="font-size: 2rem; font-weight: 800;">Forgot Password</p>
			
			<p class="login-register-text">Email</a></p>
			
			<div class="input-group">
				<input type="email"name="email" value="<?php echo $email; ?>" required>
			</div>
			
			<p class="login-register-text">Secret</a></p>
			
			<div class="input-group">
				<input type="password" name="secret" value="<?php echo $_POST['secret']; ?>" required>
			</div>
			
			<div class="input-group">
				<button name="submit" class="btn">Sign In</button>
			</div>
		
		</form>
	</div>
</body>
</html>