<?php
session_start();

if(isset($_POST["s1"]))
{
	include_once("vars.php");
	$name=$_POST["name"];
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
		if(!move_uploaded_file($ftemp,"productpics/$fname"))
		{
			$fname="noimage.jpg";
		}
	}
	$conn=mysqli_connect(host,dbuser,dbpass,dbname)or die("error in connection".mysqli_connect_error());//for connection of database
	$q="insert into addcat(catname,picname) values('$name','$fname')";
	mysqli_query($conn,$q) or die ("error in query".mysqli_error($conn));//for execute query
	$count=mysqli_affected_rows($conn);//for count data effect
	if($count==1)
	{
		$msg="Category Successfully added";
	}
	else
	{
		$msg="Category not Successfully added,Please try again";
	}
}
?>


<!DOCTYPE html>
<html lang="zxx">

<head>
	<title>Add Category</title>
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
					<li>Add Category</li>
				</ul>
			</div>
		</div>
	</div>
	<!-- //page -->
	<!-- contact page -->
	<div class="contact-w3l">
		<div class="container">
			<!-- tittle heading -->
			<h3 class="tittle-w3l">Add Category
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
								<input type="text" name="name" placeholder="Name" required="">
							</div>
							<div class="">
							Choose Category Image
								<input type="file" name="ff">
							</div>
							
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