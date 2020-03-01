
<!DOCTYPE html>
<html lang="zxx">

<head>
	<title>Grocery Shoppy</title>
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
					<li>Kitchen Subcategory</li>
				</ul>
			</div>
		</div>
	</div>
	<!-- //page -->
	<!-- top Products -->
	<div class="ads-grid">
		<div class="container">
			<!-- product right -->
			<div class="agileinfo-ads-display col-md-12 w3l-rightpro">
				<div class="wrapper">
					<!-- first section -->
					<div class="product-sec1">
					<?php
					include_once("vars.php");
					
					$conn=mysqli_connect(host,dbuser,dbpass,dbname)or die("error in connection".mysqli_connect_error());//for connection of database
					
					$catid=$_POST["cat"];
					if($catid=="all")
					{
						$q="select * from addsubcat";
					}
					else
					{
						$q="select * from addsubcat where catid='$catid'";
					}
					
					$res=mysqli_query($conn,$q) or die ("error in query".mysqli_error($conn));//for execute query
					$count=mysqli_affected_rows($conn);//for count data effect
					mysqli_close($conn);
					if($count==0)
					{
						print"<h1>Products not found</h1>";
					}
					else
					{
						while($x=mysqli_fetch_array($res))
						{
							print'<div class="col-xs-4 product-men">
							<div class="men-pro-item simpleCart_shelfItem">
								<div class="men-thumb-item">
								<a href="product.php?pid='.$x["subcatid"].'"><img src="productpics/'.$x["subcatpic"].'" alt="" height="150"></a>
									
								</div>
								<div class="item-info-product ">
									<h4>
										<a href="product.php?pid='.$x["subcatid"].'">'.$x["subcatname"].'</a>
									</h4><br>
									

								</div>
							</div>
						</div>';
						}
						
					}
					
					
					
						
					?>
						
					
						<div class="clearfix"></div>
					</div>
					<!-- //first section -->

				</div>
			</div>
			<!-- //product right -->
		</div>
	</div>
	<!-- //top products -->
	<?php
	include_once("footer.php");
	?>
	

</body>

</html>