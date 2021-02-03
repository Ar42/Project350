<?php
session_start();

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
		
		.bg{
			background-image: url("images/talha.jpg");
			height: 100%;
			filter: blur(1px);
			background-position: center;
  			background-repeat: no-repeat;
 			background-size: cover;
		}
		.container{
			padding: 50px;
			display: flex;
			justify-content: center;
			align-items: center;
			background-image: url("images/talha.jpg");\background-position: center;
  			background-repeat: no-repeat;
 			background-size: cover;
		}
		.form-group{
			background: #ffe6ff;
			border: 7px solid #ffe6ff; 
			border-radius: 10px;
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
				<h1>Login Form</h1>
				<p class="bg-success px-1 text-white"></p>
				<form action=" <?php echo $_SERVER['PHP_SELF']; ?>" method="post">
					
					<input type="username" name="username"   autocomplete="off" class="form-control" placeholder="Username" required>
					
					<input type="password" name="password"   autocomplete="off" class="form-control" placeholder="Password" required>
					
					
					<button type="submit" class="btn btn-primary btn-block" name="submit">Login</button>
				</form>
			</div>	
		</div>
	</body>
</html>






