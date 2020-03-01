<?php
session_start();

$pid=$_GET["id"];
include_once("vars.php");
$conn=mysqli_connect(host,dbuser,dbpass,dbname);//for connection of database
	$q1="select * from addproduct where prodid='$pid'";
	$res1=mysqli_query($conn,$q1);//for execute query
	$count1=mysqli_affected_rows($conn);//for count data effect
	mysqli_close($conn);
	$x=mysqli_fetch_array($res1);
	$y1=$x["catid"];
	$y2=$x["subcatid"];
	$y3=$x["brandid"];
	$y4=$x[5];
	$y5=$x[6];
	$y6=$x[7];
	$y7=$x[8];
	$y8=$x[9];
	$y9=$x[10];
	$y10=$x["prodname"];
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
		$fname=$y9;
		
	}
	else if($err==0)
	{
		$date=date_create();
		$fname=date_timestamp_get($date).$_FILES["ff"]["name"];
		$ftemp=$_FILES["ff"]["tmp_name"];
		if(!move_uploaded_file($ftemp,"userupload/$fname"))
		{
			$fname=$y9;
		}
	}
	$conn=mysqli_connect(host,dbuser,dbpass,dbname);//for connection of database
	$q="update addproduct set 
	catid='$catid',
	subcatid='$subcatid',
	brandid='$brandid',
	prodname='$prodname',
	price='$price',
	stock='$stock',
	discount='$discount',
	description='$desc',
	expiredate='$expire',
	prodpic='$fname' where prodid='$pid'";
	mysqli_query($conn,$q);//for execute query
	$count=mysqli_affected_rows($conn);//for count data effect
	if($count==1)
	{
		header("location:manageproduct.php");
	}
	else
	{
		$msg="Product not Successfully updated,Please try again";
	}
}
?>


<!DOCTYPE html>
<html lang="zxx">

<head>
	<title>Update Product</title>
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
					<li>Update Product</li>
				</ul>
			</div>
		</div>
	</div>
	<!-- //page -->
	<!-- contact page -->
	<div class="contact-w3l">
		<div class="container">
			<!-- tittle heading -->
			<h3 class="tittle-w3l">Update Product
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
											if(isset($_POST["s2"]) || $_GET["id"])
											{
												if(isset($_POST["s2"]))
													$a=$_POST["catid"];
												else
													$a=$y1;
												
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
							
								<select class="form-control" name="subcatid">
									<option>Choose Subcategory</option>
									<?php
										if(isset($_POST["s2"]) || $_GET["id"])
										{
											if(isset($_POST["s2"]))
												$a1=$_POST["catid"];
											else
												$a1=$y1;
										
											$conn=mysqli_connect(host,dbuser,dbpass,dbname)or die("error in connection".mysqli_connect_error());//for connection of database
											$q="select * from addsubcat where catid='$a1'";
									
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
													if($x["subcatid"]==$y2)
														print"<option value='$x[subcatid]' selected>$x[subcatname]</option>";
													else
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
											if($x["brandid"]==$y3)
											{
												print"<option value='$x[brandid]' selected>$x[brandname]</option>";
											}
											else
											{
												print"<option value='$x[brandid]'>$x[brandname]</option>";
											}
											
										}
									}
									
									
									?>
								</select><br>
								<input type="text" name="prodname" placeholder="Product Name" value="<?php print $y10 ?>">
								<input type="text" name="price" placeholder="price" value="<?php print $y4 ?>">
								<input type="text" name="stock" placeholder="Stock" value="<?php print $y5 ?>">
								<input type="text" name="discount" placeholder="Discount" value="<?php print $y6 ?>">
								<textarea name="description" placeholder="Description"><?php print $y7 ?></textarea>
								<input type="date" name="expire" placeholder="Expire date" class="form-control" value="<?php print $y8 ?>">
								<br><br>
								<?php
									print"<img src='userupload/$y9' height='150'>";
								?><br>
								Choose Category Image
								<input type="file" name="ff">
							
							<input type="submit" value="Update" name="s1"><br>
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