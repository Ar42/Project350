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
						
						$file= $_FILES['pp'];
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

							move_uploaded_file($filepath, $destfile);
							move_uploaded_file($filepath1, $destfile1);
							move_uploaded_file($filepath2, $destfile2);
							move_uploaded_file($filepath3, $destfile3);
							move_uploaded_file($filepath4, $destfile4);
							move_uploaded_file($filepath5, $destfile5);

							$updatequery = " UPDATE `cc` SET `pp`='$destfile' ,`pp1`='$destfile1' ,`pp2`='$destfile2' ,`pp3`='$destfile3' ,`pp4`='$destfile4' ,`pp5`='$destfile5' WHERE id=$idupdate ";
							header("location:Personal_Profile_CC.php");
							$query=mysqli_query($con, $updatequery);
							ob_end_flush();
						}
					}
					
				?>

	<div class="card-header bg-dark">
		<h1 class="text-white text-center" style="font-size: 1.5vw;">Edit</h1>
	</div>
	
	
	
 				<div class="row">
					
					<div class="col-2"></div>
					<div class="col-8">
						<div class="main-form">
							
							<div class="form-inline ">
								<div class="form-group img">
									<input type="file" name="pp" class="form-control" autocomplete="off"  placeholder=""  value=""/>
								</div>
								<div class="form-group img">
									<input type="file" name="pp1" class="form-control" autocomplete="off"  placeholder=""  value=""/>
								</div>
							</div>

							<div class="form-inline ">
								<div class="form-group img">
									<input type="file" name="pp2" class="form-control" autocomplete="off"  placeholder=""  value=""/>
								</div>
								<div class="form-group img">
									<input type="file" name="pp3" class="form-control" autocomplete="off"  placeholder=""  value=""/>
								</div>
							</div>

							<div class="form-inline ">
								<div class="form-group img">
									<input type="file" name="pp4" class="form-control" autocomplete="off"  placeholder=""  value=""/>
								</div>
								<div class="form-group img">
									<input type="file" name="pp5" class="form-control" autocomplete="off"  placeholder=""  value=""/>
								</div>
							</div>

							

							
							



							<button type="submit" name = "submit" class="btn btn-success">Create Account</button>
						</div>
					</div>
					<div class="col-2"></div>
				</div>

		   </form>
	   </div>
	</body>
</html>