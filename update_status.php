<?php
session_start();
if(!isset($_SESSION["email"]))
{
	header("location:login.php");
}
else if(isset($_SESSION["utype"]))
{
	if($_SESSION["utype"]!="admin")
	{
		header("location:login.php");
	}
	
}
if(isset($_POST["s1"]))
{
	include_once("vars.php");
	$status=$_POST["status"];
	$orderno=$_POST["order"];
	$conn=mysqli_connect(host,dbuser,dbpass,dbname)or die("error in connection".mysqli_connect_error());//for connection of database
	$q="update orderhistory set status='$status' where orderno='$orderno'";
	mysqli_query($conn,$q) or die ("error in query".mysqli_error($conn));//for execute query
	$count=mysqli_affected_rows($conn);//for count data effect
	if($count==0)
	{
		$msg="Status not Successfully Updated,Please try again";
		
	}
	else
	{
		$msg="Status Successfully Updated";
	}
}
?>


<!DOCTYPE html>
<html lang="zxx">

<head>
	<title>Update Status</title>
	<!--/tags -->
	<?php
		include_once("linkfiles.php");
	?>
</head>

<body>
	
	<?php
		include_once("header.php");
		include_once("adminnavigation.php");
	?>
	
	<!-- banner-2 -->
	<div class="page-head_agile_info_w3l">

	</div>
	<!-- //banner-2 -->
	<!-- page -->
	<div class="services-breadcrumb">
		<div class="agile_inner_breadcrumb">
			<div class="container">
				<ul class="w3_short">
					<li>
						<a href="index.php">Home</a>
						<i>|</i>
					</li>
					<li>Update Status</li>
				</ul>
			</div>
		</div>
	</div>
	<!-- //page -->
	<!-- contact page -->
	<div class="contact-w3l">
		<div class="container">
			<!-- tittle heading -->
			<h3 class="tittle-w3l">Update Status
				<span class="heading-style">
					<i></i>
					<i></i>
					<i></i>
				</span>
			</h3>
			<!-- //tittle heading -->
			<!-- contact -->
			<div class="contact agileits">
				<div class="contact-agileinfo">
					<div class="contact-form wthree">
						<form method="post" >
						<input type="text" name="order" placeholder="Enter Order no"><br>
							<select name="status" class="form-control">
							<option>choose Status</option>
							<option>Packed</option>
							<option>Shipping</option>
							<option>Canceled</option>
							<option>Delivered</option>
							<option>Received</option>
							<option>Delayed</option>
							</select><br>
							<?php
							if(isset($msg))
							{
								print $msg;
							}
							?>
							<input type="submit" value="Submit" name="s1">
						</form>
					</div>
					
				</div>
			</div>
			<!-- //contact -->
		</div>
	</div>
	
	
	<?php
	include_once("footer.php");
	?>

</body>

</html>