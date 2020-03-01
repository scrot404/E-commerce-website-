<?php
session_start();
include_once("vars.php");
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
	<title>View products</title>
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
					<li>View products</li>
				</ul>
			</div>
		</div>
	</div>
	<!-- //page -->
	<!-- contact page -->
	<div class="contact-w3l">
		<div class="container">
			<!-- tittle heading -->
			<h3 class="tittle-w3l">View products
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
				<form method="post" enctype="multipart/form-data" name="form1">
				<select class="form-control" name="catid">
									<option>Choose Category</option>
									<?php
									$conn=mysqli_connect(host,dbuser,dbpass,dbname)or die("error in connection".mysqli_connect_error());//for connection of database
									$q="select * from addcat";
									$res=mysqli_query($conn,$q)or die ("error in query".mysqli_error($conn));//for execute query
									$count=mysqli_affected_rows($conn);//for count data effect
									mysqli_close($conn);
									if($count==0)
									{
										print"<option>no Category Available</option>";
									}
									else
									{
										while($x=mysqli_fetch_array($res))
										{
											print"<option value='$x[catid]'>$x[catname]</option>";
										}
									}
									
									?>
								</select>
								<input type="submit" value="Submit" name="s2"><br><br>
							
								<select class="form-control" name="subcatid">
									<option>Choose Subcategory</option>
									<?php
									if(isset($_POST["s2"]))
									{
										$catid=$_POST["catid"];
										$conn=mysqli_connect(host,dbuser,dbpass,dbname)or die("error in connection".mysqli_connect_error());//for connection of database
									$q="select * from addsubcat where catid='$catid'";
									
									$res=mysqli_query($conn,$q)or die ("error in query".mysqli_error($conn));//for execute query
									$count=mysqli_affected_rows($conn);//for count data effect
									mysqli_close($conn);
									if($count==0)
									{
										print"<option>no Category Available</option>";
									}
									else
									{
										while($x=mysqli_fetch_array($res))
										{
											print"<option value='$x[subcatid]'>$x[subcatname]</option>";
										}
									}
									
									}
									
									?>
								</select><br>
						
							
								<select class="form-control" name="brandid">
									<option>Choose Brand</option>
									<?php
										$conn=mysqli_connect(host,dbuser,dbpass,dbname)or die("error in connection".mysqli_connect_error());//for connection of database
									$q="select * from addbrand";
									
									$res=mysqli_query($conn,$q)or die ("error in query".mysqli_error($conn));//for execute query
									$count=mysqli_affected_rows($conn);//for count data effect
									mysqli_close($conn);
									if($count==0)
									{
										print"<option>no Brand Available</option>";
									}
									else
									{
										while($x=mysqli_fetch_array($res))
										{
											print"<option value='$x[brandid]'>$x[brandname]</option>";
										}
									}
									
									
									?>
								</select><br>
								<input type="submit" value="Submit" name="s1">
								</form>
					<?php
					if(isset($_POST["s1"]))
					{
						$catid=$_POST["catid"];
						$subcatid=$_POST["subcatid"];
						$brandid=$_POST["brandid"];
					$conn=mysqli_connect(host,dbuser,dbpass,dbname)or die("error in connection".mysqli_connect_error());//for connection of database
					$q="select * from addproduct where catid='$catid' and subcatid='$subcatid' and brandid='$brandid'";
					$res=mysqli_query($conn,$q) or die ("error in query".mysqli_error($conn));//for execute query
					$count=mysqli_affected_rows($conn);//for count data effect
					mysqli_close($conn);
					print"
					<font size='5'><table class='table table-striped'>
							<tr>
								<th>Name</th>
								<th>description</th>
								<th>Expiredate</th>
								<th>Update</th>
								<th>delete</th>
							</tr>";
					while($x=mysqli_fetch_array($res))
					{
						print"<tr>
								<td>$x[prodname]</td>
								<td>$x[description]</td>
								<td>$x[expiredate]</td>
								<td><a href='updateprod.php?pid=$x[0]'>Update</a></td>
								<td><a href='deleteprod.php?pid=$x[0]'>Delete</a></td>
							</tr>";
					}
					print"</table></font>";
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