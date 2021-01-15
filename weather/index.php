<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">
		
		<title>Pi Weather | Home</title>
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
							<li class="menu-item current-menu-item"><a href="index.php">Home</a></li>
							<li class="menu-item"><a href="table.php">Data</a></li>
							<li class="menu-item"><a href="live-cameras.php">Live cameras</a></li>
							<li class="menu-item"><a href="contact.php">Contact</a></li>
						</ul> <!-- .menu -->
					</div> <!-- .main-navigation -->

					<div class="mobile-navigation"></div>

				</div>
			</div> <!-- .site-header -->

			<div class="hero" data-bg-image="images/133.jpg"></div>
			<?php include 'controller/lib_include.php';?>
            <?php 
     	
               $q11=$d->select("pi_data","","ORDER BY id DESC LIMIT 1");
			   while($data=mysqli_fetch_array($q11))
			   {
            ?>
			<div class="forecast-table">
				<div class="container">
					<div class="forecast-container">
						<div class="forecast">
							<div class="forecast-header">
								<div class="day">Temperature</div>
							</div> 
							<!-- .forecast-header -->
							<div class="forecast-content">
								<div class="degree">
									<div class="num"><?php echo $data['Temperature'] ;?><sup>o</sup>C</div>
									<div class="forecast-icon">
										<img src="images/icons/icon-1.svg" alt="" width=90>
									</div>	
								</div>
							</div>
						</div>
						<div class="forecast">
							<div class="forecast-header">
								<div class="day">Humidity</div>
							</div> <!-- .forecast-header -->
							<div class="forecast-content">
								<div class="degree">
									<div class="num"><?php echo $data['Humidity'] ;?> %</div>
									<div class="forecast-icon">
										<img src="images/icons/icon-6.svg" alt="" width=100>
									</div>	
								</div>
							</div>
						</div>
						<div class="forecast">
							<div class="forecast-header">
								<div class="day">Pressure</div>
							</div> <!-- .forecast-header -->
							<div class="forecast-content">
								<div class="degree">
									<div class="num"><?php echo $data['Pressure'] ;?> Pa</div>
									<div class="forecast-icon">
										<img src="images/icons/icon-13.svg" alt="" width=80>
									</div>	
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php  } ?>
			<main class="main-content">
				<div class="fullwidth-block">
					<div class="container">
						<h2 class="section-title">Live cameras</h2>
						<div class="row">
							<div class="col-md-3 col-sm-6">
								<div class="live-camera">
									<figure class="live-camera"><iframe width="262" height="184"
                                      src="https://www.youtube.com/embed/PQnDqvtS1-0?">
                                        </iframe></figure>
									
								</div>
							</div>
							<div class="col-md-3 col-sm-6">
								<div class="live-camera">
									<figure class="live-camera"><iframe width="262" height="184"
                                      src="https://www.youtube.com/embed/kB5GQ3YF-cw?">
                                        </iframe></figure>
									
								</div>
							</div>
							<div class="col-md-3 col-sm-6">
								<div class="live-camera">
									<figure class="live-camera"><iframe width="262" height="184"
                                      src="https://www.youtube.com/embed/JI63MU3AEMk?">
                                        </iframe></figure>
									
								</div>
							</div>
							<div class="col-md-3 col-sm-6">
								<div class="live-camera">
									<figure class="live-camera"><iframe width="262" height="184"
                                      src="https://www.youtube.com/embed/J6f-PWMTHTU?">
                                        </iframe></figure>
								
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="fullwidth-block" data-bg-color="#262936">
					<div class="container">
						<div class="row">
							<div class="col-md-4">
								<div class="news">
									<div class="date">06.10</div>
									<h3><a href="#">Doloremque laudantium totam sequi </a></h3>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illo saepe assumenda dolorem modi, expedita voluptatum ducimus necessitatibus. Asperiores quod reprehenderit necessitatibus harum, mollitia, odit et consequatur maxime nisi amet doloremque.</p>
								</div>
							</div>
							<div class="col-md-4">
								<div class="news">
									<div class="date">06.10</div>
									<h3><a href="#">Doloremque laudantium totam sequi </a></h3>
									<p>Nobis architecto consequatur ab, ea, eum autem aperiam accusantium placeat vitae facere explicabo temporibus minus distinctio cum optio quis, dignissimos eius aspernatur fuga. Praesentium totam, corrupti beatae amet expedita veritatis.</p>
								</div>
							</div>
							<div class="col-md-4">
								<div class="news">
									<div class="date">06.10</div>
									<h3><a href="#">Doloremque laudantium totam sequi </a></h3>
									<p>Enim impedit officiis placeat qui recusandae doloremque possimus, iusto blanditiis, quam optio delectus maiores. Possimus rerum, velit cum natus eos. Cumque pariatur beatae asperiores, esse libero quas ad dolorem. Voluptates.</p>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="fullwidth-block">
					<div class="container">
						<div class="row">
							<div class="col-md-4">
								<h2 class="section-title">Application features</h2>
								<ul class="arrow-feature">
									<li>
										<p>We can measure the current Weather Parameters from spacific location & It will show to our app or website.</p>
									</li>
									<li>
										<h3>Natus error sit voluptatem accusantium</h3>
										<p>Doloremque laudantium totam rem aperiam Inventore veritatis et quasi architecto beatae vitae.</p>
									</li>
									<li>
										<h3>Natus error sit voluptatem accusantium</h3>
										<p>Doloremque laudantium totam rem aperiam Inventore veritatis et quasi architecto beatae vitae.</p>
									</li>
								</ul>
							</div>
							<div class="col-md-4">
								<h2 class="section-title">Weather analyssis</h2>
								<ul class="arrow-list">
									<li><a href="#">Accusantium doloremque laudantium rem aperiam</a></li>
									<li><a href="#">Eaque ipsa quae ab illo inventore veritatis quasi</a></li>
									<li><a href="#">Architecto beatae vitae dicta sunt explicabo</a></li>
									<li><a href="#">Nemo enim ipsam voluptatem quia voluptas</a></li>
									<li><a href="#">Aspernatur aut odit aut fugit, sed quia consequuntur</a></li>
									<li><a href="#">Magni dolores eos qui ratione voluptatem sequi</a></li>
									<li><a href="#">Neque porro quisquam est qui dolorem ipsum quia</a></li>
								</ul>
							</div>
							<div class="col-md-4">
								<h2 class="section-title">Awesome Photos</h2>
								<div class="photo-grid">
									<a href="#"><img src="images/11.jpg" alt="#"></a>
									<a href="#"><img src="images/12.jpg" alt="#"></a>
									<a href="#"><img src="images/13.jpg" alt="#"></a>
									<a href="#"><img src="images/14.jpg" alt="#"></a>
									<a href="#"><img src="images/15.jpg" alt="#"></a>
									<a href="#"><img src="images/16.jpg" alt="#"></a>
									<a href="#"><img src="images/17.jpg" alt="#"></a>
									<a href="#"><img src="images/18.jpg" alt="#"></a>
									<a href="#"><img src="images/19.jpg" alt="#"></a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</main> <!-- .main-content -->
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
		<script src="js/plugins.js"></script>
		<script src="js/app.js"></script>
		
	</body>

</html>