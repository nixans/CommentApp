
<?php 

include 'dbconfig.php';

session_start();

if (!isset($_SESSION['email'])) {
    header("Location: index.php");
}

error_reporting(0);

if (isset($_POST['submit'])) { 
	$email = $_SESSION['email'];
	$comment = $_POST['comment']; 

		
	$sql = "INSERT INTO cmts (email, comments)
					VALUES ('$email', '$comment')";
					
	$result = mysqli_query($con, $sql);
	if ($result) {
		echo "<script>alert('Comment added successfully.')</script>";
	} else {
		echo "<script>alert('Comment does not add.')</script>";
	}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="style.css">
    <title>Comments App</title>
</head>
<body>
	
	<div class="wrapper">
		<form action="" method="POST" class="form">
			
			<div class="input-group textarea">
				<label for="comment">What would you like to share with world? </label>
				<textarea  name="comment"  required></textarea>
			</div>
			<div class="input-group">
				<button name="submit" class="btn">Submit</button>
			</div>
		</form>
		<div class="wrappercmd">
			<form action="" method="POST" class="form" >
			
					<label for="name"><b>Comments</b></label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					
					<button name="filter" class="btn">Filter</button>
		
			</form>
		
			<div class="prev-comments">
			<?php 
			
			$sql = "SELECT * FROM cmts";
			$result = mysqli_query($con, $sql);
			if (mysqli_num_rows($result) > 0) {
				while ($row = mysqli_fetch_assoc($result)) {

			?>
			<div class="single-item">
				<?php echo $row['email']; ?></a><br>
				<p><?php echo $row['comments']; ?></p>
			</div>
			<?php

				}
			}
			
			?>
			</div>
		</div>
		<a href="logout.php">Logout</a>
	</div>
</body>
</html>