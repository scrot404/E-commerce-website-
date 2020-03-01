
<!-- top-header -->
	<div class="header-most-top">
		<p>&nbsp;</p>
	</div>
	<!-- //top-header -->
	<!-- header-bot-->
	<div class="header-bot">
		<div class="header-bot_inner_wthreeinfo_header_mid">
			<!-- header-bot-->
			<div class="col-md-4 logo_agile">
				<h1>
					<a href="index.php">
						<span>G</span>rocery
						<span>S</span>hoppy
						<img src="images/logo2.png" alt=" ">
					</a>
				</h1>
			</div>

			<!-- header-bot -->
			<div class="col-md-8 header">
				<!-- header lists -->
				<ul>
					
					<li>
					<?php
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
						
					</li>
					
					
					
				</ul>
				<!-- //header lists -->
			
				<div class="clearfix"></div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<!-- shop locator (popup) -->
