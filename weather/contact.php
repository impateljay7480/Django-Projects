<!DOCTYPE html>

<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">
		
		<title>Pi Weather | Contact</title>
		<link rel="icon" href="images/logo.png" type="image/x-icon">

		<!-- Loading third party fonts -->
		<link href="http://fonts.googleapis.com/css?family=Roboto:300,400,700|" rel="stylesheet" type="text/css">
		<link href="fonts/font-awesome.min.css" rel="stylesheet" type="text/css">

		<!-- Loading main css file -->
		<link rel="stylesheet" href="style.css">
		
		<!--[if lt IE 9]>
		<script src="js/ie-support/html5.js"></script>
		<script src="js/ie-support/respond.js"></script>
		<![endif]-->
	</head>


	<body>
		
		<div class="site-content">
			<div class="site-header">
				<div class="container">
					<a href="index.php" class="branding">
						<img src="images/logo.png" alt="" class="logo">
						<div class="logo-type">
							<h1 class="site-title">Pi Weather</h1>
							<small class="site-description">RaspberryPi Device</small>
						</div>
					</a>

					<!-- Default snippet for navigation -->
					<div class="main-navigation">
						<button type="button" class="menu-toggle"><i class="fa fa-bars"></i></button>
						<ul class="menu">
							<li class="menu-item"><a href="index.php">Home</a></li>
							<li class="menu-item"><a href="table.php">Data</a></li>
							<li class="menu-item"><a href="live-cameras.php">Live cameras</a></li>
							<li class="menu-item current-menu-item"><a href="contact.php">Contact</a></li>
						</ul> <!-- .menu -->
					</div> <!-- .main-navigation -->

					<div class="mobile-navigation"></div>

				</div>
			</div> <!-- .site-header -->

			<main class="main-content">
				<div class="container">
					<div class="breadcrumb">
						<a href="index.php">Home</a>
						<span>Contact</span>
					</div>
				</div>

				<div class="fullwidth-block">
					<div class="container">
						<div class="col-md-5">
							<div class="contact-details">
								<div class="map" data-latitude="23.794308" data-longitude="72.336401"></div>
								<div class="contact-info">
									<address>
										<img src="images/icon-marker.png" alt="">
										<p>Pi Weather Technologies Pvt Ltd.<br>
										Smt. S. R. Patel Engineering College,Dabhi</p>
									</address>
									
									<a href="tel:+91 960 19 32899"><img src="images/icon-phone.png" alt="">+91 960 19 32899</a>
									<a href="mailto:piweather192@gmail.com"><img src="images/icon-envelope.png" alt="">piweather192@gmail.com</a>
								</div>
							</div>
						</div>
						<div class="col-md-6 col-md-offset-1">
							<h2 class="section-title">Contact us</h2>
							<p>The weather stations have helped to take the precautionary measures against the destructive rains, winds, severe high or low temperature, diseases and pests.</p>
							<form action="controller/api_demo.php" id="pi_contact" class="contact-form" method="post" novalidate>
								<div class="row">
									<div class="col-md-12"><input type="text" name="name" id="name" placeholder="Your Name..."></div>
								</div>
								<div class="row">
									<div class="col-md-12"><input type="text" name="email" placeholder="Email Address..."></div>
								</div>
								<div class="row">
									<div class="col-md-12"><input type="text" name="mobile" placeholder="Mobile Number..."></div>
								</div>
								<textarea style="resize: none;" name="message1" placeholder="Raise Your Query About PI Weather..."></textarea>
								<div class="text-right">
									<input type="submit" name="contact_submit" placeholder="Send message">
								</div>
							</form>

						</div>
					</div>
				</div>
				
			</main> 
			<!-- .main-content -->
			<footer class="site-footer">
				<div class="container">
					<div class="row">
						<div class="col-md-8">
							<p class="colophon">Copyright 2020 Company name. Designed by Pi Weather. All rights reserved</p>
						</div>
						<div class="col-md-3 col-md-offset-1">
							<div class="social-links">
								<a href="https://www.facebook.com/pi.weather.1"><i class="fa fa-facebook"></i></a>
								<a href="https://twitter.com/PATELJA0947"><i class="fa fa-twitter"></i></a>
								<a href="mailto:piweather192@gmail.com"><i class="fa fa-google-plus"></i></a>
							</div>
						</div>
					</div>
					
				</div>
			</footer>

		</div>
		
		<script src="js/jquery-1.11.1.min.js"></script>
		<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false&amp;language=en"></script>
		<script src="js/plugins.js"></script>
		<script src="js/app.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.11.1/jquery.validate.min.js"></script>	
		<script src="js/validation.js"></script>
	</body>
</html>