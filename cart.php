
<!DOCTYPE html>
<html lang="zxx">

<head>
	<title>Grocery Shop :Add to Cart</title>
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
					<li>Add to Cart</li>
				</ul>
			</div>
		</div>
	</div>
	<!-- //page -->
	<!-- contact page -->
	<div class="contact-w3l">
		<div class="container">
			<!-- tittle heading -->
			<h3 class="tittle-w3l">Add to Cart
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
				<form name='form1' method='post'>
					<?php
					if(isset($_SESSION["email"]))
					{
						include_once("vars.php");
						$email=$_SESSION["email"];
						$conn=mysqli_connect(host,dbuser,dbpass,dbname)or die("error in connection".mysqli_connect_error());//for connection of database
						$q="select * from addtocart where username='$email'";
						$res=mysqli_query($conn,$q) or die ("error in query".mysqli_error($conn));//for execute query
						$count=mysqli_affected_rows($conn);//for count data effect
						//mysqli_close($conn);
						if($count==0)
						{
							print"<h1>Your cart is Empty</h1>";
						}
						else
						{
							print"
							<font size='5'><table class='table table-striped'>
									<tr>
										<th>Image</th>
										<th>Product</th>
										<th>Price</th>
										<th>Quantity</th>
										<th>Total</th>
										<th>Delete</th>
									</tr>";
									$tbill=0;
							while($x=mysqli_fetch_array($res))
							{
								print"<tr>
										<td><img src='userupload/$x[prodpic]' height='100'></td>
										<td>$x[prodname]</td>
										<td>$x[price]</td>
										<td>$x[qty]</td>
										<td>$x[tamt]</td>
										<td><a href='deletecart.php?cart=$x[0]'>Delete</a></td>
									</tr>";
									$tbill+=$x["tamt"];
									
							}
							print"</table><br><br>";
							print"Your total bill is : $tbill<br><br>";
							print"
							<input type='submit' name='s2' value='Continue shopping'><br>
							
								<input type='submit' name='s1' value='Checkout'>
							";
						
						}
						
					}
					else
					{
						print"<h1>Please Login</h1>";
					}
					if(isset($_POST["s1"]))
					{
						header("location:checkout.php");
					}
					if(isset($_POST["s2"]))
					{
						header("location:index.php");
					}
					
					
					?>
					</form>
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