<?php
// session_start();
// if(!isset($_SESSION['username'])){
// header('location:login.php');
// }
?>
<!DOCTYPE html>
<html>
	<head>
		<title></title>
		<?php include'links.php' ?>
		<link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&family=Libre+Baskerville:wght@700&display=swap" rel="stylesheet">
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<style>
			*{
			font-family: "Times New Roman", Times, serif;
		}
		p{
			font-size: 1.5vw;
		}
		.img-fluid{
			margin-top: .2vw;
			box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;
		}
		.infos{
			background: green;
		}
		.infos p{
			color: white;
		}
		button.back{
			background:black;
			color: white;
			font-size: 1.5vw;
			margin-right: 1vw;
			margin-top: 1vw;
			margin-bottom: 1vw;
		}
		button.back:hover{
			background: white;
			color: red;
			border-style: outset;
			border-color: green;
		}
		
		.total_restaurants, .cc_name{
			font-size: 1.5vw;
			color: #fff;
			background: red;
			margin-bottom: .7vw;
			padding:.5vw;
			box-shadow: 1vw 1vw 1.5vw black;
		}
		.cc_name{
			margin-right: 1vw;
		}
		.infos{
			box-shadow: 1vw 1vw 1.5vw black;
		}
		.interior{
			margin-bottom: 0.7vw;

		}
		.interior img{
			height: 10vw;
			width: 15vw;
		}
		.txt {
			padding: 2vw;
			border-radius: 6vw;
			background: #000;
			color: #FFF;
		    text-shadow: 0 .03vw 0 #ccc,
		               0 .06vw 0 #c9c9c9,
		               0 .09vw 0 #bbb,
		               0 .12vw 0 #b9b9b9,
		               0 .15vw 0 #aaa,
		               0 .24vw .1vw rgba(0,0,0,.1),
		               0 0 .1vw rgba(0,0,0,.1),
		               0 .05vw .05vw rgba(0,0,0,.3),
		               0 .05vw .05vw rgba(0,0,0,.2),
		               0 .02vw .05vw rgba(0,0,0,.25),
		               0 .05vw .05vw rgba(0,0,0,.2),
		               0 .01vw .01vw rgba(0,0,0,.15);
		}
		</style>
	</head>
	<body>
		<!-- <div class="container-fluid d-flex justify-content-end">
			<a href="index.php"><button class="btn back">Home</button></a>
			<a href="explore.php"><button class="btn back">Back to Explore</button></a>
		</div> -->
		<?php
			include'conn.php';
			
			if(isset($_POST['search'])){
				$searchKey = $_POST['search'];
				$sq = " select * from restaurants where address like '%$searchKey%' ";
			}
			else{
				$sq = " select * from restaurants ";
				$searchKey = "";
			}
			$query = mysqli_query($con, $sq);
			$total = "select count(id) as ttl from  restaurants";
			$t = mysqli_query($con, $total);
			$values = mysqli_fetch_assoc($t);
			$num_rows = $values['ttl'];
			
		?>
		<div class="container-fluid">
			
			<form action="" method="POST">
				<div class="row">
					<div class="col-6"></div>
					<div class="col-4">
						<input type="text" name="search" class="form-control" placeholder="Search by location" value="<?php echo $searchKey ?>" autocomplete="off"  style="font-size: 1.5vw; margin-top: .5vw;">
						<br>
					</div>
					
					<div class="col-2">
						<button class="btn btn-warning" style="font-size: 1.5vw; margin-top: .5vw;">Search</button>
					</div>
					<br><br>
				</div>
			</form>
		</div>
		<div class="container-fluid">
			<?php
			include 'conn.php';
			// $selectquery = "select * from restaurants";
			// $query = mysqli_query($con, $selectquery);
			// $res = mysqli_fetch_array($query);
			while($res = mysqli_fetch_array($query)) {
			?>
			<div class="container-fluid">
				<div class="d-flex justify-content-center">
					<h1 class="txt text-center " style="font-size: 1.5vw;">Restaurants</h1>
				</div>
				
				<table class="table table-striped table-hover table-bordered">

				<tr class="bg-danger text-white text-center">
					
					<th  style="font-size: 2vw;">Restaurant</th>
					<th style="font-size: 2vw;">Contact No</th>
					<th  style="font-size: 2vw;">Address</th>
					<th  style="font-size: 2vw;"></th>
				</tr>

				<?php

					include 'conn.php';

					
					while ($res= mysqli_fetch_array($query)) {
						
				?>

				<tr class="text-center">
					
					<td style="font-size: 2vw;"><?php echo $res['name'];?></td>
					<td style="font-size: 2vw;"><?php echo $res['mobile'];?></td>
					<td style="font-size: 2vw;"><?php echo $res['address'];?></td>
					<td style="font-size: 2vw;"><a href="Profile_Restaurant.php?id=<?php echo $res['id']; ?>"><button class="btn btn-success">visit</button></a></td>

					
				</tr>
				<?php
			}

				?>


			</table>
				
			</div>
			
			
			
			
			
			
			
			
			
			<?php
			
			}
			?>
		</div>
		
	</body>
</html>