<?php
session_start();
if(isset($_SESSION['username'])){
header('location:manage.php');
}
?>
<!DOCTYPE html>
<html>
	<head>
		<title></title>
		<?php include'links.php' ?>
		<?php include'conn.php' ?>
		<link href="https://fonts.googleapis.com/css2?family=Kufam:wght@400;500&display=swap" rel="stylesheet">
	</head>
	<style>
			margin: 0;padding: 0;box-sizing: border-box;
			}
	.container{
	
	display: flex;
	justify-content: center;
	align-items: center;
	position: absolute;
	}
	.form-group{
	background: #D5CEB4;
	border: 7px solid #D5CEB4;
	max-width: 27vw;
	position: relative;
	left: 30vw;
	font-size:1.5vw;
	}
	input{
	margin: 10px auto;
	}
	</style>
	<body>
		<?php
		if(isset($_POST['submit'])){
			header('location:Aut_Login.php');
			$username = mysqli_real_escape_string($con, $_POST['username']);
			$password = mysqli_real_escape_string($con, $_POST['password']);
			$cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
			$pass = password_hash($password, PASSWORD_BCRYPT);
			$cpass = password_hash($cpassword, PASSWORD_BCRYPT);
			$usernamequery = "select * from registration where username = '$username' ";
			$query = mysqli_query($con, $usernamequery);
			$usernamecount= mysqli_num_rows($query);
			if($usernamecount>0){
		?>
		<script>
			alert('username already Exists!!!');
		</script>
		<?php
		}
		else{
		if($password === $cpassword){
			$insertquery = " INSERT INTO registration (username, password, cpassword) VALUES ('$username', '$pass', '$cpass') ";
			$iquery = mysqli_query($con, $insertquery);
		}
		else{
		?>
		<script>
			alert('Password didnot match');
		</script>
		<?php
		}
		}
		}
		?>
		
		<div class="container">
			<div class="form-group">
				<h1 style="font-size:1.5vw;">Registration Form</h1>
				<form action=" <?php echo $_SERVER['PHP_SELF']; ?>" method="post">
					<input type="text" name="username"   autocomplete="off" class="form-control" placeholder="Username" required  style="font-size:1.5vw;">
					
					
					
					
					<input type="password" name="password"   autocomplete="off" class="form-control" placeholder="Password" required  style="font-size:1.5vw;">
					<input type="password" name="cpassword"   autocomplete="off" class="form-control" placeholder="Confim Password" required  style="font-size:1.5vw;">
					
					
					<button type="submit" class="btn btn-primary" name="submit"  style="font-size:1.5vw;">Create Account</button>
					<div>
						<p style="font-size:1.5vw;">Already have an account? <a href="Aut_Login.php">Login here</a></p>
					</div>
					
					
				</form>
			</div>
		</div>
		
		
	</body>
</html>