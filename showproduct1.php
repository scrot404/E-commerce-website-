
<!DOCTYPE html>
<html lang="zxx">

<head>
	<title>Grocery Shoppy an Ecommerce Category Bootstrap Responsive Web Template | Kitchen Products :: w3layouts</title>
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
						<a href="index.html">Home</a>
						<i>|</i>
					</li>
					<li>Kitchen Products</li>
				</ul>
			</div>
		</div>
	</div>
	<!-- //page -->
	<!-- top Products -->
	<div class="ads-grid">
		<div class="container">
			<!-- product right -->
			<div class="agileinfo-ads-display col-md-9 w3l-rightpro">
				<div class="wrapper">
					<!-- first section -->
					<div class="product-sec1">
					<?php
					include_once("vars.php");
					$name=$_POST["search"];
					$conn=mysqli_connect(host,dbuser,dbpass,dbname)or die("error in connection".mysqli_connect_error());//for connection of database
					$q="select * from addproduct where prodname like '%$name%'";
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
							$dis=($x["price"]*$x["discount"])/100;
							$tdis=$x["price"]-$dis;
							print'<div class="col-xs-4 product-men">
							<div class="men-pro-item simpleCart_shelfItem">
								<div class="men-thumb-item">
								<a href="product.php?pid='.$x["prodid"].'"><img src="userupload/'.$x["prodpic"].'" alt="" height="150"></a>
									
								</div>
								<div class="item-info-product ">
									<h4>
										<a href="product.php?pid='.$x["prodid"].'">'.$x["prodname"].'</a>
									</h4>
									<div class="info-product-price">
										<span class="item_price">'.$tdis.' Rs</span>
										<del>'.$x["price"].'</del>
									</div>
									

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
	include_once("crowsel.php");
	include_once("footer.php");
	?>
	

</body>

</html>