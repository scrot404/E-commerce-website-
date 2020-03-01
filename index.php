<?php
session_start();
?>

<!DOCTYPE html>
<html lang="zxx">

<head>
	<title>Grocery Shop</title>
	<?php
	include_once("linkfiles.php");
	?>
</head>

<body>
	<?php
		require_once("header.php");
		include_once("navigation.php");
	?>
	
	<!-- banner -->
	<div id="myCarousel" class="carousel slide" data-ride="carousel">
		<!-- Indicators-->
		<ol class="carousel-indicators">
			<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
			<li data-target="#myCarousel" data-slide-to="1" class=""></li>
		</ol>
		<div class="carousel-inner" role="listbox">
			<div class="item active">
				<div class="container">
					<div class="carousel-caption">
						<h3>Big
							<span>Save</span>
						</h3>
						<p>Get flat
							<span>10%</span> Cashback</p>
					</div>
				</div>
			</div>
			<div class="item item2">
				<div class="container">
					<div class="carousel-caption">
						<h3>Healthy
							<span>Saving</span>
						</h3>
						<p>Get Upto
							<span>30%</span> Off</p>
					</div>
				</div>
			</div>
			
			
		</div>
		<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
			<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
			<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
	</div>
	<!-- //banner -->

	
	<!-- special offers -->
	<div class="featured-section" id="projects">
		<div class="container">
			<!-- tittle heading -->
			<br><h3 class="tittle-w3l">Latest Product
				<span class="heading-style">
					<i></i>
					<i></i>
					<i></i>
				</span>
			</h3>
			<!-- //tittle heading -->
			<div class="content-bottom-in">
				<ul id="flexiselDemo1">
				<?php
					include_once("vars.php");
					
					 
					$conn=mysqli_connect(host,dbuser,dbpass,dbname)or die("error in connection".mysqli_connect_error());//for connection of database
					$q="select * from addproduct order by rand() limit 7";
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
				?>
					<li>
						<div class="w3l-specilamk">
							<div class="speioffer-agile">
								<a href="single.html">
									<img src="userupload/<?php print $x["prodpic"]?>" alt="" width="150" height="100">
								</a>
							</div>
							<div class="product-name-w3l">
								<h4>
									<a href="single.html"><?php print $x["prodname"] ?></a>
								</h4>
								<div class="w3l-pricehkj">
									<h6><strike>Rs. <?php print $x["price"] ?></strike></h6>
									<p>Discount : Rs. <?php print $dis ?></p>
									<p>Remaining Amount : Rs. <?php print $tdis ?></p>
								</div>
							</div>
						</div>
					</li>
				<?php
						}
					}
				?>
				
				</ul>
			</div>
		</div>
	</div>
	<!-- //special offers -->
	<?php
		include_once("footer.php");
	?>

</body>

</html>