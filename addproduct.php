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
include_once("vars.php");
if(isset($_POST["s1"]))
{
	$catid=$_POST["catid"];
	$subcatid=$_POST["subcatid"];
	$brandid=$_POST["brandid"];
	$prodname=$_POST["prodname"];
	$price=$_POST["price"];
	$stock=$_POST["stock"];
	$discount=$_POST["discount"];
	$desc=$_POST["description"];
	$expire=$_POST["expire"];
	$err=$_FILES["ff"]["error"];
	if($err==4)
	{
		$fname="noimage.jpg";
		
	}
	else if($err==0)
	{
		$date=date_create();
		$fname=date_timestamp_get($date).$_FILES["ff"]["name"];
		$ftemp=$_FILES["ff"]["tmp_name"];
		if(!move_uploaded_file($ftemp,"userupload/$fname"))
		{
			$fname="noimage.jpg";
		}
	}
	
	$conn=mysqli_connect(host,dbuser,dbpass,dbname) or die("error in connection".mysqli_connect_error());//for connection of database
	$prodname=mysqli_real_escape_string($conn,$prodname);
	$q="insert into addproduct(catid,subcatid,brandid,prodname,price,stock,discount,description,expiredate,prodpic) values('$catid','$subcatid','$brandid','$prodname','$price','$stock','$discount','$desc','$expire','$fname')";
	
	mysqli_query($conn,$q)or die("error in query".mysqli_error($conn));//for execute query
	$count=mysqli_affected_rows($conn);//for count data effect
	if($count==1)
	{
		$msg="Product Successfully added";
	}
	else
	{
		$msg="Product not Successfully added,Please try again";
	}
}
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
	<title>Add Product</title>
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
						<a href="index.php">Home</a>
						<i>|</i>
					</li>
					<li>Add Product</li>
				</ul>
			</div>
		</div>
	</div>
	<!-- //page -->
	<!-- contact page -->
	<div class="contact-w3l">
		<div class="container">
			<!-- tittle heading -->
			<h3 class="tittle-w3l">Add Product
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
						<form method="post" enctype="multipart/form-data" name="form1">
							
								<select class="form-control" name="catid" required>
									<option value="">Choose Category</option>
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
											if(isset($_POST["s2"]))
											{
												$a=$_POST["catid"];
												if($x["catid"]==$a)
													print"<option value='$x[catid]' selected>$x[catname]</option>";
												else
													print"<option value='$x[catid]'>$x[catname]</option>";
											}
											else
												print"<option value='$x[catid]'>$x[catname]</option>";
										}
									}
									
									?>
								</select>
								<input type="submit" value="Go" formnovalidate name="s2"><br><br>
							
								<select class="form-control" name="subcatid" required>
									<option value="">Choose Subcategory</option>
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
						
							
								<select class="form-control" name="brandid" required>
									<option value="">Choose Brand</option>
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
								<input type="text" name="prodname" placeholder="Product Name" required>
								<input type="text" name="price" placeholder="price" required>
								<input type="text" name="stock" placeholder="Stock" required>
								<input type="text" name="discount" placeholder="Discount" required>
								<textarea name="description" placeholder="Description" required></textarea>
								<input type="date" name="expire" placeholder="Expire date" class="form-control" required>
								<br>Choose Category Image
								<input type="file" name="ff">
							
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