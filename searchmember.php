<?php
session_start();

?>

<!DOCTYPE html>
<html lang="zxx">

<head>
	<title>Search User</title>
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
					<li>Search User</li>
				</ul>
			</div>
		</div>
	</div>
	<!-- //page -->
	<!-- contact page -->
	<div class="contact-w3l">
		<div class="container">
			<!-- tittle heading -->
			<h3 class="tittle-w3l">Search User
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
						<form method="post">
								<input type="email" name="name" placeholder="Enter Email" required="">
							<input type="submit" value="Submit" name="s1">
						</form>
					</div>
					
				</div>
				
			</div><br><br>
			<!-- //contact -->
			<?php
					if(isset($_POST["s1"]))
					{
						include_once("vars.php");
					$email=$_POST["name"];
					$conn=mysqli_connect(host,dbuser,dbpass,dbname)or die("error in connection".mysqli_connect_error());//for connection of database
					$q="select * from signup where email='$email'";
					$res=mysqli_query($conn,$q) or die ("error in query".mysqli_error($conn));//for execute query
					$count=mysqli_affected_rows($conn);//for count data effect
					mysqli_close($conn);
					print"
					<table class='table table-striped'>
							<tr style='background-color:#000;color:#fff;'>
								<th>Name</th>
								<th>Phone no</th>
								<th>Email</th>
								<th>Date of Birth</th>
								<th>Gender</th>
							</tr>";
					while($x=mysqli_fetch_array($res))
					{
						print"<tr>
								<td>$x[name]</td>
								<td>$x[phone]</td>
								<td>$x[email]</td>
								<td>$x[dob]</td>
								<td>$x[gender]</td>
							</tr>";
					}
					print"</table>";
					
					}
					
					
					?>
		</div>
	</div>
	
					
	
	<?php
	include_once("footer.php");
	?>

</body>
</html>