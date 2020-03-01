
<!DOCTYPE html>
<html lang="zxx">

<head>
	<title>Grocery Shop : Order Details</title>
	<!--/tags -->
	<?php
	session_start();
	ob_start();
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
					<li>Order Details</li>
				</ul>
			</div>
		</div>
	</div>
	<!-- //page -->
	<!-- contact page -->
	<div class="contact-w3l">
		<div class="container">
			<!-- tittle heading -->
			<h3 class="tittle-w3l">Order Details
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
					include_once("vars.php");
					$email=$_SESSION["email"];
					$conn=mysqli_connect(host,dbuser,dbpass,dbname)or die("error in connection".mysqli_connect_error());//for connection of database
					$q="select * from checkout where username='$email' order by orderno desc";
					$res=mysqli_query($conn,$q) or die ("error in query".mysqli_error($conn));//for execute query
					$count=mysqli_affected_rows($conn);//for count data effect		
					
					if($count>=1)
					{
						$x=mysqli_fetch_array($res);
						$q1="select * from addtocart where username='$email'";
						$res1=mysqli_query($conn,$q1) or die ("error in query".mysqli_error($conn));//for execute query
						
						$count1=mysqli_affected_rows($conn);
						$status="order received,Processing";
					
						if($count1>0)
						{
							while($y=mysqli_fetch_array($res1))
							{
								$y1=mysqli_real_escape_string($conn,$y[1]);
								$q2="insert into orderhistory(prodname,price,qty,tamt,prodpic,username,orderno,status) values('$y1','$y[2]','$y[3]','$y[4]','$y[5]','$y[6]','$x[1]','$status')";
								mysqli_query($conn,$q2) or die ("error in query".mysqli_error($conn));//for execute query
								$q10="select * from addproduct where prodid='$y[prodid]'";
								$res10=mysqli_query($conn,$q10) or die ("error in query".mysqli_error($conn));//for execute query
								$s=mysqli_fetch_array($res10);
								$abc=$s["stock"]-$y["qty"];
								$q10="update addproduct set stock='$abc' where prodid='$y[prodid]'";
								mysqli_query($conn,$q10) or die ("error in query".mysqli_error($conn));//for execute query
							}
							
							$q3="delete from addtocart where username='$email'";
							mysqli_query($conn,$q3) or die ("error in query".mysqli_error($conn));//for execute query
						}
						print"<h1>Your order history</h1>
						your order number is :- $x[orderno]<br>
						Your Address is :- $x[0]<br>
						Your Status is :- $status
						";
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