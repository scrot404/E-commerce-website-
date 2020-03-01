
<?php
if(!isset($_SESSION["email"]))
{
	header("location:login.php");
}
else if($_SESSION["utype"]!="admin")
{
	header("location:login.php");
}
?>
<!-- top-header -->

	<!-- //top-header -->
	<!-- header-bot-->
	<div class="header-bot">
		<div class="header-bot_inner_wthreeinfo_header_mid">
			<!-- header-bot-->
			<div class="col-md-4 logo_agile">
				<h1>
					<a href="index.html">
						<span>G</span>rocery
						<span>S</span>hoppy
						<img src="images/logo2.png" alt=" ">
					</a>
				</h1>
			</div>
			<!-- header-bot -->
			<div class="col-md-8 header">
				
			
				<div class="clearfix"></div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<!-- shop locator (popup) -->

	<!-- //header-bot -->
	<!-- navigation -->
	<div class="ban-top">
		<div class="container">
			
			<div class="top_nav_left">
				<nav class="navbar navbar-default">
					<div class="container-fluid">
						<!-- Brand and toggle get grouped for better mobile display -->
						<div class="navbar-header">
							<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"
							    aria-expanded="false">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse menu--shylock" id="bs-example-navbar-collapse-1">
							<ul class="nav navbar-nav menu__list">
								<li class="active">
									<a class="nav-stylehead" href="adminindex.php">Home
										<span class="sr-only">(current)</span>
									</a>
								</li>
								<li class="dropdown">
									<a href="#" class="dropdown-toggle nav-stylehead" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Add
										<span class="caret"></span>
									</a>
									<ul class="dropdown-menu multi-column">
										<div class="agile_inner_drop_nav_info">
											<div class="col-sm-12 multi-gd-img">
												<ul class="multi-column-dropdown">
													<li>
														<a href="addcat.php">Category</a>
													</li>
													<li>
														<a href="addsubcat.php">Sub Category</a>
													</li>
													<li>
														<a href="addbrand.php">Brands</a>
													</li>
													<li>
														<a href="addproduct.php">Products</a>
													</li>
												</ul>
											</div>
											
											<div class="clearfix"></div>
										</div>
									</ul>
								</li>
								<li class="dropdown">
									<a href="#" class="dropdown-toggle nav-stylehead" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Manage
										<span class="caret"></span>
									</a>
									<ul class="dropdown-menu multi-column">
										<div class="agile_inner_drop_nav_info">
											<div class="col-sm-12 multi-gd-img">
												<ul class="multi-column-dropdown">
													<li>
														<a href="managecat.php">Category</a>
													</li>
													<li>
														<a href="managesubcat.php">Sub Category</a>
													</li>
													<li>
														<a href="managebrand.php">Brands</a>
													</li>
													<li>
														<a href="manageproduct.php">Products</a>
													</li>
												</ul>
											</div>
											
											<div class="clearfix"></div>
										</div>
									</ul>
								</li>
								<li class="dropdown">
									<a href="#" class="dropdown-toggle nav-stylehead" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">View
										<span class="caret"></span>
									</a>
									<ul class="dropdown-menu multi-column">
										<div class="agile_inner_drop_nav_info">
											<div class="col-sm-12 multi-gd-img">
												<ul class="multi-column-dropdown">
													<li>
														<a href="listofmember.php">List of members</a>
													</li>
													<li>
														<a href="searchmember.php">Search user</a>
													</li>
													<li>
														<a href="adminorderhistory.php">List of Orders</a>
													</li>
												</ul>
											</div>
											<div class="clearfix"></div>
										</div>
									</ul>
								</li>
								<li class="dropdown">
									<a href="#" class="dropdown-toggle nav-stylehead" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php
											if(isset($_SESSION["email"]))
											{
												$name=$_SESSION["n"];
												print"Welcome $name";
											}
											else
											{
												print"Welcome User";
											}
										?>
										<span class="caret"></span>
									</a>
									<ul class="dropdown-menu multi-column">
										<div class="agile_inner_drop_nav_info">
											<div class="col-sm-12 multi-gd-img">
												<ul class="multi-column-dropdown">
													<?php
														if(isset($_SESSION["email"]))
														{
															print'<li><a href="logout.php">
															<span class="fa fa-unlock-alt" aria-hidden="true"></span> Logout </a></li>
															<li>
																<a href="changepass.php">
																	<span class="fa fa-pencil-square-o" aria-hidden="true"></span>Change Password </a>
															</li>';
														}
														else
														{
															print'<li><a href="login.php">
															<span class="fa fa-unlock-alt" aria-hidden="true"></span> Login </a></li>
															<li>
																<a href="signup.php">
																	<span class="fa fa-pencil-square-o" aria-hidden="true"></span> Sign Up </a>
															</li>';
														}
													?>
												</ul>
											</div>
											<div class="clearfix"></div>
										</div>
									</ul>
								</li>
								
								
							</ul>
						</div>
					</div>
				</nav>
			</div>
		</div>
	</div>
	<!-- //navigation -->