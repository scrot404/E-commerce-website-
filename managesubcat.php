<?php
session_start();

?>



<!DOCTYPE html>
<html lang="zxx">

<head>
	<title>Manage Subcategory</title>
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
					<li>Manage Subcategory</li>
				</ul>
			</div>
		</div>
	</div>
	<!-- //page -->
	<!-- contact page -->
	<div class="contact-w3l">
		<div class="container">
			<!-- tittle heading -->
			<h3 class="tittle-w3l">Manage Subcategory
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
									include_once("vars.php");
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
							<input type="submit" value="Submit" name="s1"><br>
						
						</form>
					</div><br><br>
					<?php
					if(isset($_POST["s1"]))
					{
						$scat=$_POST["catid"];
						
						include_once("vars.php");
						$conn=mysqli_connect(host,dbuser,dbpass,dbname)or die("error in connection".mysqli_connect_error());//for connection of database
						$q="select * from addsubcat where catid='$scat'";
						$res=mysqli_query($conn,$q) or die ("error in query".mysqli_error($conn));//for execute query
						$count=mysqli_affected_rows($conn);//for count data effect
						if($count>=1)
						{
							
							print"<table class='table table-striped'>
										<tr style='background-color:#000;color:#fff;'>
											<th>Subcategory Name</th>
											<th>Update</th>
											<th>Delete</th>
										</tr>";
								while($x=mysqli_fetch_array($res))
								{
									print"<tr>
											<td>$x[subcatname]</td>
											<td><a href='updatescat.php?id=$x[subcatid]'>Update</a></td>
											<td><a href='deletescat.php?id=$x[subcatid]'>Delete</a></td>
										</tr>";
								}
								print"</table>";
								
						
						}
						else
						{
							print"No Category Available";
						}
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