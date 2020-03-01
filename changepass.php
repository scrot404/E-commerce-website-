<?php
session_start();
if(isset($_POST["s1"]))
{
	require_once("vars.php");
	
	$cpass=$_POST["cpass"];
	$newpass=$_POST["newpass"];
	$cnewpass=$_POST["cnewpass"];
	$un=$_SESSION["email"];
	if($newpass==$cnewpass)
	{
		$conn=mysqli_connect(host,dbuser,dbpass,dbname)or die("error in connection".mysqli_connect_error());//for connection of database
		$q="update signup set password='$newpass' where email='$un' and password='$cpass'";
		$res=mysqli_query($conn,$q) or die("Error in query".mysqli_error($conn));
		$cnt=mysqli_affected_rows($conn);
		if($cnt==1)
		{
			$msg="Password changed successfully";
		}
		else
		{
			$msg="Current Password Invalid";
		}
	}
	else
	{
		$msg="Password does not match";
	}
}
?>


<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html lang="zxx">

<head>
	<title>Login</title>
	<!--/tags -->
	<?php
		include_once("linkfiles.php");
	?>
</head>

<body>
	
	<?php
		if($_SESSION["utype"]=="admin")
			include_once("adminnavigation.php");
		else
		{
			include_once("header.php");
			include_once("navigation.php");
		}
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
					<li>Change Password</li>
				</ul>
			</div>
		</div>
	</div>
	<!-- //page -->
	<!-- contact page -->
	<div class="contact-w3l">
		<div class="container">
			<!-- tittle heading -->
			<h3 class="tittle-w3l">Change Password
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
						<form name="form1" method="post">
							<div class="">
								<input type="password" class="form-control" name="cpass" id="cpass" class="text" required><br>
							</div>
							<div class="">
								<input type="password" class="form-control" name="newpass" id="newpass" class="text" required><br>
							</div>
							<div class="">
								<input type="password" class="form-control" name="cnewpass" id="cnewpass" class="text" required><br>
							</div>
							
							<input type="submit" value="Submit" name="s1"><br>
							
							<?php
								if(isset($msg))
								{
									print $msg;
								}
							?>	
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