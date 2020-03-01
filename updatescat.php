<?php
session_start();
$scat=$_GET["id"];
						
include_once("vars.php");
$conn=mysqli_connect(host,dbuser,dbpass,dbname)or die("error in connection".mysqli_connect_error());//for connection of database
$q1="select * from addsubcat where subcatid='$scat'";
$res1=mysqli_query($conn,$q1) or die ("error in query".mysqli_error($conn));//for execute query
$count1=mysqli_affected_rows($conn);//for count data effect
if($count1==1)
{
	$ans=mysqli_fetch_array($res1);
}

if(isset($_POST["s1"]))
{
	$catid=$_POST["catid"];
	$subname=$_POST["subcatname"];
	$conn=mysqli_connect(host,dbuser,dbpass,dbname);//for connection of database
	$q="update addsubcat set catid='$catid',subcatname='$subname' where subcatid='$scat'";
	mysqli_query($conn,$q);//for execute query
	$count=mysqli_affected_rows($conn);//for count data effect
	if($count==1)
	{
		header("location:managesubcat.php");
	}
	else
	{
		$msg="Sub Category not Successfully update,Please try again";
	}
}
?>


<!DOCTYPE html>
<html lang="zxx">

<head>
	<title>Update Sub Category</title>
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
					<li>Update Sub Category</li>
				</ul>
			</div>
		</div>
	</div>
	<!-- //page -->
	<!-- contact page -->
	<div class="contact-w3l">
		<div class="container">
			<!-- tittle heading -->
			<h3 class="tittle-w3l">Update Sub Category
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
											if($ans["catid"]==$x["catid"])
												print"<option value='$x[catid]' selected>$x[catname]</option>";
											else
												print"<option value='$x[catid]'>$x[catname]</option>";
										}
									}
									
									?>
								</select>
							</div>
							<div class="">
								<br><input type="text" value="<?php print $ans["subcatname"]; ?>" name="subcatname" placeholder="Sub Category Name" required="">
							</div>
							<div class="">
								<img src="productpics/<?php print $ans["subcatpic"] ?>" height="100" width="100" />
								<input type="file" name="subcatpic" >
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