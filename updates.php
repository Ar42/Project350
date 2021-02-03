<?php
ob_start();

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
<body>
	<div class="col-lg-6 m-auto">
		<form method="post">
			<?php
            ob_start();
				include 'conn.php';
				$ids = $_GET['id'];
				$showquery = " SELECT * FROM `cc` WHERE id=${ids} ";
				$showdata = mysqli_query($con,$showquery);
				$arrdata = mysqli_fetch_array($showdata);


				if(isset($_POST['submit'])){
					$name = $_POST['name'];
	$email = $_POST['email'];
	$mobile = $_POST['mobile'];
	$address = $_POST['address'];
	$availibility = $_POST['availibility'];
	$capacity = $_POST['capacity'];
	$extra_facilities = $_POST['extra_facilities'];
	$avg_exp = $_POST['avg_exp'];

	$file= $_FILES['pp'];
	$file1= $_FILES['pp1'];
	$file2= $_FILES['pp2'];
	$file3= $_FILES['pp3'];
	$file4= $_FILES['pp4'];
	$file5= $_FILES['pp5'];

	// print_r($file);
	$filename = $file['name'];
	$filepath = $file['tmp_name'];
	$fileerror = $file['error'];

	$file1= $_FILES['pp1'];
	$filename1 = $file1['name'];
	$filepath1 = $file1['tmp_name'];
	$fileerror1 = $file1['error'];

	$file2= $_FILES['pp2'];
	$filename2 = $file2['name'];
	$filepath2 = $file2['tmp_name'];
	$fileerror2 = $file2['error'];

	$file3= $_FILES['pp3'];
	$filename3 = $file3['name'];
	$filepath3 = $file3['tmp_name'];
	$fileerror3 = $file3['error'];

	$file4= $_FILES['pp4'];
	$filename4 = $file4['name'];
	$filepath4 = $file4['tmp_name'];
	$fileerror4 = $file4['error'];

	$file5= $_FILES['pp5'];
	$filename5 = $file5['name'];
	$filepath5 = $file5['tmp_name'];
	$fileerror5 = $file5['error'];



	if($fileerror == 0 && $fileerror1 == 0 && $fileerror2 == 0 && $fileerror3 == 0 && $fileerror4 == 0 && $fileerror5 == 0){
		$destfile = 'upload/'.$filename;
		$destfile1 = 'upload/'.$filename1;
		$destfile2 = 'upload/'.$filename2;
		$destfile3 = 'upload/'.$filename3;
		$destfile4 = 'upload/'.$filename4;
		$destfile5 = 'upload/'.$filename5;
		// echo "$destfile";
		move_uploaded_file($filepath, $destfile);
		move_uploaded_file($filepath1, $destfile1);
		move_uploaded_file($filepath2, $destfile2);
		move_uploaded_file($filepath3, $destfile3);
		move_uploaded_file($filepath4, $destfile4);
		move_uploaded_file($filepath5, $destfile5);


		$updatequery = " UPDATE `cc` SET `name`='$name',`email`='$email',`mobile`'$mobile',`address`='address',`availibility`='$availibility',`capacity`='$capacity',`extra_facilities`='$extra_facilities',`avg_exp`='$avg_exp',`pp`='$pp',`pp1`='$pp1',`pp2`='$pp2',`pp3`='$pp3',`pp4`='$pp4',`pp5`='$pp5' WHERE id=$idupdate ";
		
		$query=mysqli_query($con, $updatequery);
		header('location:CC_Feed.php');
		ob_end_flush();
	}

            
			?>

			<div class="container-fluid">
				<div class="card-header bg-dark">
					<h1 class="text-white text-center" style="font-size: 1.5vw;">Edit</h1>
				</div>
				<br>
				<form action=""></form>
				<form action="uploadRCC.php" method="post" enctype="multipart/form-data">
				
				<div class="row">
					
					<div class="col-2"></div>
					<div class="col-8">
						<div class="main-form">
							<div class="form-group">
								<label>Name</label>
								<input type="text" name="mobile" class="form-control" placeholder="Community Centre Name" value="<?php echo $arrdata['mobile'];?>" style="margin-right: 10vw;"  autocomplete="off"  >
							</div>
							
							<div class="form-inline ">
								<div class="form-group img">
									<input type="file" name="pp" class="form-control" autocomplete="off"  placeholder=""  value="<?php echo $arrdata['pp'];?>"/>
								</div>
								


							<button type="submit" name = "submit" class="btn btn-success">Update</button>
						</div>
					</div>
					<div class="col-2"></div>
				</div>
			</form>





				

				<button class="btn btn-success" type="submit"class="form-control" name="submit"  style="font-size: 1.5vw;">Update</button>
				
			</div>
			
		</form>
	</div>

</body>
</html>