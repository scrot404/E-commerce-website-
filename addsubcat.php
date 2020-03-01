<?php
session_start();

include_once("vars.php");
if(isset($_POST["s1"]))
{
	$catid=$_POST["catid"];
	$subname=$_POST["subcatname"];
	$err=$_FILES["subcatpic"]["error"];
	if($err==4)
	{
		$fname="noimage.jpg";
	}
	else if($err==0)
	{
		$date=date_create();
		$fname=date_timestamp_get($date).$_FILES["subcatpic"]["name"];
		$ftemp=$_FILES["subcatpic"]["tmp_name"];
		if(!move_uploaded_file($ftemp,"productpics/$fname"))
		{
			$fname="noimage.jpg";
		}
	}
	
	$conn=mysqli_connect(host,dbuser,dbpass,dbname);//for connection of database
	$q="insert into addsubcat(catid,subcatname, subcatpic) values('$catid','$subname', '$fname')";
	mysqli_query($conn,$q);//for execute query
	$count=mysqli_affected_rows($conn);//for count data effect
	if($count==1)
	{
		$msg="Sub Category Successfully added";
	}
	else
	{
		$msg="Sub Category not Successfully added,Please try again";
	}
}
?>


<!DOCTYPE html>
<html lang="zxx">

<head>
	<title>Add Sub Category</title>
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
					<li>Add Sub Category</li>
				</ul>
			</div>
		</div>
	</div>
	<!-- //page -->
	<!-- contact page -->
	<div class="contact-w3l">
		<div class="container">
			<!-- tittle heading -->
			<h3 class="tittle-w3l">Add Sub Category
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
							</div>
							<div class="">
								<br><input type="text" name="subcatname" placeholder="Sub Category Name" required="">
							</div>
							<div class="">
								<input type="file" name="subcatpic" >
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