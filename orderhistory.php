<?php
session_start();
?>


<!DOCTYPE html>
<html lang="zxx">

<head>
	<title>Order History</title>
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
					<li>Order History</li>
				</ul>
			</div>
		</div>
	</div>
	<!-- //page -->
	<!-- contact page -->
	<div class="contact-w3l">
		<div class="container">
			<!-- tittle heading -->
			<h3 class="tittle-w3l">Order History
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
					<?php
					if(isset($_SESSION["email"]))
					{
						include_once("vars.php");
						$email=$_SESSION["email"];
						$conn=mysqli_connect(host,dbuser,dbpass,dbname)or die("error in connection".mysqli_connect_error());//for connection of database
						$q="select * from orderhistory where username='$email' order by srno desc";
						$res=mysqli_query($conn,$q) or die ("error in query".mysqli_error($conn));//for execute query
						$count=mysqli_affected_rows($conn);//for count data effect
						mysqli_close($conn);
						print"<table class='table table-striped'>
								<tr style='background-color:#000;color:#fff;'>
									<th>Order no</th>
									<th>Product Pic</th>
									<th>Product Name</th>
									<th>Price</th>
									<th>Quantity</th>
									<th>Total Price</th>
									<th>Status</th>
								</tr>";
						while($x=mysqli_fetch_array($res))
						{
							print"<tr>
									<td>$x[orderno]</td>
									<td><img src='userupload/$x[prodpic]' height='75'></td>
									<td>$x[prodname]</td>
									<td>$x[price]</td>
									<td>$x[qty]</td>
									<td>$x[tamt]</td>
									<td>$x[status]</td>
								</tr>";
						}
						print"</table>";
						
					}
					
					
					?>
					
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