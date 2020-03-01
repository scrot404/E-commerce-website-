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
?>


<!DOCTYPE html>
<html lang="zxx">

<head>
	<title>Admin Panel</title>
	<!--/tags -->
	<?php
		include_once("linkfiles.php");
	?>
</head>
<style>
table td
{
	text-align:center;
}
</style>

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
						<a href="index.php">Home</a>
						<i>|</i>
					</li>
					<li>Admin Panel</li>
				</ul>
			</div>
		</div>
	</div>
	<!-- //page -->
	<!-- contact page -->
	<div class="contact-w3l">
		<div class="container">
			<!-- tittle heading -->
			<h3 class="tittle-w3l">Admin Panel
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
				<font size="5">
						<table class="table table-bordered table-hover table-condensed">
							<tr>
							
								<td>
									<a href="addcat.php">
										<i class="fa fa-plus" aria-hidden="true"></i>

										<br>
										Add Category
									</a>
								</td>
								<td>
									<a href="addsubcat.php">
										<i class="fa fa-plus" aria-hidden="true"></i>
										<br>
										Add subcategory
									</a>
								</td>
								<td>
									<a href="addbrand.php">
										<i class="fa fa-plus" aria-hidden="true"></i>
										<br>
										Add brand
									</a>
								</td>
							</tr>
							<tr>
								
								<td>
									<a href="addproduct.php">
										<i class="fa fa-plus" aria-hidden="true"></i>
										<br>
										Add Product
									</a>
								</td>
								<td>
									<a href="searchmember.php">
										<i class="fa fa-list" aria-hidden="true"></i>
										<br>
										Search Member
									</a>
								</td>
								<td>
									<a href="listofmember.php">
										<i class="fa fa-list" aria-hidden="true"></i><br>
										List of members
									</a>
								</td>
								
							</tr>
							<tr>
							
								<td>
									<a href="adminorderhistory.php">
										<i class="fa fa-list" aria-hidden="true"></i>
										<br>
										Order History
									</a>
								</td>
								
							</tr>
							
						</table>
						</font>
					
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