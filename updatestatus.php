<?php
session_start();

require_once("vars.php");
$conn=mysqli_connect(host,dbuser,dbpass,dbname)or die("Error in connection".mysqli_connect_error());
$orderid=$_GET["id"];
$q="select * from orderhistory where orderno='$orderid'";
$res=mysqli_query($conn,$q) or die("Error in query".mysqli_error($conn));
$x=mysqli_fetch_array($res);

if(isset($_POST["s1"]))
{
	include_once("vars.php");
	$cstatus=$_POST["cstatus"];
	$nstatus=$_POST["nstatus"];
	
	$conn=mysqli_connect(host,dbuser,dbpass,dbname)or die("error in connection".mysqli_connect_error());//for connection of database
	
	$q="update orderhistory set status='$nstatus' where orderno='$orderid'";
	mysqli_query($conn,$q) or die ("error in query".mysqli_error($conn));//for execute query
	$count=mysqli_affected_rows($conn);//for count data effect
	if($count==1)
	{
		header("location:adminorderhistory.php");
	}
	else
	{
		$msg="Company not Successfully added,Please try again";
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
	<title>Update Status</title>
	<!--/tags -->
	<?php
		include_once("linkfiles.php");
	?>
</head>

<body>
	
	<?php
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
						<a href="adminindex.php">Home</a>
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
						<form method="post" enctype="multipart/form-data">
							<div class="">
								Order No
								<input type="text" name="orderno" class="text" id="orderno" value="<?php print $x["orderno"];	?>">
							</div>
							<div class="">
								Current Status
								<input type="text" name="cstatus" class="text" id="cstatus" value="<?php print $x["status"];	?>">
							</div>
							<div class="">
								New Status
								<select name="nstatus" id="nstatus" class="form-control">
									  <option selected="selected">Select</option>
									  <option>Ready to Dispatch</option>
									  <option>In Transit</option>
									  <option>Shipped</option>
									  <option>Cancelled</option>
								  </select>
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