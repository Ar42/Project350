<?php
ob_start();
session_start();
if(!isset($_SESSION['username'])){
header('location:Aut_Login.php');
}
?>
<!DOCTYPE html>
<html>
	<head>
		<title></title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	</head>
	<style>
		*{
			font-family: "Times New Roman", Times, serif;
		}
		.main-form{
			background: linear-gradient(#02aab0, #00cdac);
			font-size: 1.5vw;
			padding: 3vw;
			margin: auto;
			border-radius: 3vw;
			box-shadow: 5px 10px 8px 10px #888888;
		}
		.createtxttt{
			background: linear-gradient(#43cea2, #185a9d);
			margin-top: 2.5vw;
			margin-bottom: 3.5vw;
			
			color: #fff;
			font-size: 1.5vw;
			padding:.7vw 2vw .7vw 2vw;
			border-radius: 8vw;
			box-shadow: 5px 10px 8px 10px #888888;
		}
		label{
			color: white;
			font-size: 1.5vw;
		}
		.btn{
			background: red;
			color :#fff;
			font-weight: bold;
		}

		.btn:hover{
			background: #fff;
			color :red;
		}



	</style>
	<body>
		<div class="container-fluid">
			<form method="post" enctype="multipart/form-data">
				<?php
				ob_start();
					include 'conn.php';
					$ids = $_GET['id'];
					$showquery = " SELECT * FROM `cc` WHERE id=${ids} ";
					$showdata = mysqli_query($con,$showquery);
					$arrdata = mysqli_fetch_array($showdata);
					if(isset($_POST['submit'])){
						$idupdate = $_GET['id'];
						$mobile = $_POST['mobile'];
						$email = $_POST['email'];
						$address = $_POST['address'];
						$availibility = $_POST['availibility'];
						
						$capacity = $_POST['capacity'];
						$extra_facilities = $_POST['extra_facilities'];
						$avg_exp = $_POST['avg_exp'];
						


						$updatequery = " UPDATE `cc` SET `mobile`='$mobile',`email`='$email', `address`='$address', `availibility`='$availibility', `capacity`='$capacity', `extra_facilities`='$extra_facilities', `avg_exp`='$avg_exp' WHERE id=$idupdate ";
						header("location:Personal_Profile_CC.php");
						$query=mysqli_query($con, $updatequery);
						ob_end_flush();
						}
						
						?>
				<div class="d-flex justify-content-center">
					<p align="center" class=" text-center createtxttt">Edit Your Details</p>
				</div>
	
 				<div class="row">
					
					<div class="col-2"></div>
					<div class="col-8">
						<div class="main-form">
							
							<div class="form-group">
								<div class="form-inline">
									<input type="text" name="mobile" class="form-control" placeholder="mobile no" value="<?php echo $arrdata['mobile'];?>" style="margin-right: 10vw;"  autocomplete="off"  >
									<input type="email" name="email" class="form-control" placeholder="email" value="<?php echo $arrdata['email'];?>" autocomplete="off"  >
								</div>
							</div>
							
							<div class="form-group">
								<label>Address</label>
								<textarea name="address" class="form-control" autocomplete="off" ><?php echo $arrdata['address'];?></textarea>
							</div>
							<div class="form-group">
								<input type="text" name="availibility" class="form-control" placeholder="Availibility" value="<?php echo $arrdata['availibility'];?>" style="margin-right: 10vw;"  autocomplete="off"  >
							</div>
							<div class="form-group">
								<input type="text" name="capacity" class="form-control" placeholder="Capacity" value="<?php echo $arrdata['capacity'];?>" style="margin-right: 10vw;"  autocomplete="off"  >
							</div>
							<div class="form-group">
								<label>Extra Facilities</label>
								<textarea name="extra_facilities" class="form-control" autocomplete="off"  ><?php echo $arrdata['extra_facilities'];?></textarea>
							</div>
							<div class="form-group">
								<input type="text" name="avg_exp" class="form-control" placeholder="Average Expenditure" value="<?php echo $arrdata['avg_exp'];?>" style="margin-right: 10vw;"  autocomplete="off"  >
							</div>

							

							
							



							<button type="submit" name = "submit" class="btn">save</button>
						</div>
					</div>
					<div class="col-2"></div>
				</div>

		   </form>
	   </div>
	</body>
</html>