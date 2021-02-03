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
		<link href="https://fonts.googleapis.com/css2?family=Kufam:wght@400;500&display=swap" rel="stylesheet">
	</head>
	<style>
		*{
			font-family: "Times New Roman", Times, serif;
		}
		.container{
			display: flex;
			justify-content: center;
			align-items: center;
		}
		.form-group{
			margin-top: 1vw;
			background: #D5CEB4;
			border: 7px solid #D5CEB4; 
			padding:0 1vw 0 1vw;
		}
		input{
			margin: 10px auto;
		}

	</style>
	<body>
		<?php
		include 'conn.php';
		if(isset($_POST['submit'])){
			$username = $_POST['username'];
			$password = $_POST['password'];
			$usernamesearch = " select * from registration where username='$username' ";
			$query = mysqli_query($con, $usernamesearch);
			$username_count = mysqli_num_rows($query);
			if($username_count){
				$username_pass = mysqli_fetch_assoc($query);


				$db_pass = $username_pass['password'];
				$_SESSION['username'] = $username_pass['username'];



				$pass_decode = password_verify($password, $db_pass);
				if($pass_decode){
					?>
					<script>
						alert('Login Successful');
						location.replace("manage.php");
					</script>
					<?php
				}

				else{
					?>
					<script>
						alert('Incerroect Password!');
					</script>
					<?php
				}
			}
			else{
				?>
					<script>
						alert('Invalid username!');
					</script>
					<?php

			}

		}


		?>
		
		
		<div class="container">
			<div class="form-group">
				<h1 style="font-size:2vw;">Login</h1>
				
				<form action=" <?php echo $_SERVER['PHP_SELF']; ?>" method="post">
					
					<input type="text" name="username"   autocomplete="off" class="form-control" placeholder="username" required style="font-size:1.5vw;">
					
					<input type="password" name="password"   autocomplete="off" class="form-control" placeholder="Password" required style="font-size:1.5vw;">

					<button type="submit" class="btn btn-primary" name="submit" style="font-size:1.5vw;">Login</button>
					<div>
						<p style="font-size:1.7vw;">Not have an account? <a href="Aut_Registration.php">Signup here</a></p>
					</div>
				</form>
			</div>
		</div>
		
	</body>
</html>