<?php
session_start();
if(isset($_POST["s1"]))
{
	include_once("vars.php");
	$hname=$_POST["hname"];
	$add=$_POST["address"];
	$pay=$_POST["payment"];
	$month=$_POST["month"];
	$year=$_POST["year"];
	$cardno=$_POST["cardno"];
	$cvvno=$_POST["cvvno"];
	$email=$_SESSION["email"];
	$conn=mysqli_connect(host,dbuser,dbpass,dbname)or die("error in connection".mysqli_connect_error());//for connection of database
	$q="insert into checkout(holdername, method,address,username,expire,cardno,cvvno) values('$hname', '$pay','$add','$email','$month/$year','$cardno','$cvvno')";
	mysqli_query($conn,$q) or die ("error in query".mysqli_error($conn));//for execute query
	$count=mysqli_affected_rows($conn);//for count data effect
	if($count==1)
	{
		header("location:orderdetail.php");
	}
	else
	{
		$msg="Checkout Failed,Please try again";
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
	<title>Grocery Shop : Checkout</title>
	<!--/tags -->
	<?php
		include_once("linkfiles.php");
	?>
</head>

<body>
	
	<?php
		include_once("header.php");
		include_once("navigation.php");
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
					<li>Checkout</li>
				</ul>
			</div>
		</div>
	</div>
	<!-- //page -->
	<!-- contact page -->
	<div class="contact-w3l">
		<div class="container">
			<!-- tittle heading -->
			<h3 class="tittle-w3l">Checkout
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
							<input type="text" name="hname" placeholder="Holder Name" required >
							<textarea name="address" placeholder="Address" required></textarea>
								<select name="payment" class="form-control" required>
								<option value="">choose payment mode</option>
								<option value="card">Debit Card</option>
								<option value="cash">Cash on delivery</option>
								</select><br>
								<input type="text" name="cardno" placeholder="Card number" >
								<select name="month" class="form-control">
								<option value="">choose Month</option>
								<?php
								for($i=1;$i<=12;$i++)
								{
									print"<option>$i</option>";
								}
								?>
								</select><br>
								<input type="text" name="cvvno" placeholder="CVV No" >
								<select name="year" class="form-control">
								<option value="">choose Year</option>
								<?php
								for($i=2000;$i<=2045;$i++)
								{
									print"<option>$i</option>";
								}
								?>
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