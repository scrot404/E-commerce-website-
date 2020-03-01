<?php
session_start();

$bid=$_GET["id"];

include_once("vars.php");
$conn=mysqli_connect(host,dbuser,dbpass,dbname)or die("error in connection".mysqli_connect_error());//for connection of database
$q1="select * from addbrand where brandid='$bid'";
$res1=mysqli_query($conn,$q1) or die ("error in query".mysqli_error($conn));//for execute query
$count1=mysqli_affected_rows($conn);//for count data effect
if($count1>=1)
{
	$ans=mysqli_fetch_array($res1);
}

if(isset($_POST["s1"]))
{
	include_once("vars.php");
	$name=$_POST["name"];
	$err=$_FILES["ff"]["error"];
	if($err==4)
	{
		$fname=$ans["brandpic"];
		
	}
	else if($err==0)
	{
		$date=date_create();
		$fname=date_timestamp_get($date).$_FILES["ff"]["name"];
		$ftemp=$_FILES["ff"]["tmp_name"];
		if(!move_uploaded_file($ftemp,"userupload/$fname"))
		{
			$fname=$ans["brandpic"];
		}
	}
	$conn=mysqli_connect(host,dbuser,dbpass,dbname)or die("error in connection".mysqli_connect_error());//for connection of database
	$q="update addbrand set brandname='$name',brandpic='$fname' where brandid='$bid'";
	mysqli_query($conn,$q) or die ("error in query".mysqli_error($conn));//for execute query
	$count=mysqli_affected_rows($conn);//for count data effect
	if($count==1)
	{
		header("location:managebrand.php");
	}
	else
	{
		$msg="Company not Successfully added,Please try again";
	}
}
?>


<!DOCTYPE html>
<html lang="zxx">

<head>
	<title>Update Company</title>
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
					<li>Update Brand</li>
				</ul>
			</div>
		</div>
	</div>
	<!-- //page -->
	<!-- contact page -->
	<div class="contact-w3l">
		<div class="container">
			<!-- tittle heading -->
			<h3 class="tittle-w3l">Update Brand
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
								<input type="text" value="<?php print $ans["brandname"]; ?>" name="name" placeholder="Brand Name" required="">
							</div>
							<div class="">
							Choose Brand Image<br>
							<img src="userupload/<?php print $ans["brandpic"] ?>" height="100" width="130" />
								<input type="file" name="ff">
							</div>
							
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