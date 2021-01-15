<?php

if(isset($_POST['search']))
{
    $valueToSearch = $_POST['valueToSearch'];
    // search in all table columns
    // using concat mysql function
    $query = "SELECT * FROM `pi_data`  WHERE CONCAT(`date`) LIKE '%".$valueToSearch."%'";
    $search_result = filterTable($query);
    
}
 else {
    $query = "SELECT * FROM `pi_data` ORDER BY id DESC;
";
    $search_result = filterTable($query);
}

// function to connect and execute the query
function filterTable($query)
{
    $connect = mysqli_connect("localhost", "root", "imjaypatel", "pi_weather");
    $filter_Result = mysqli_query($connect, $query);
    return $filter_Result;
}

?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">
		
		<title>Pi Weather | Data</title>
		<link rel="icon" href="images/logo.png" type="image/x-icon">


		<!-- Loading third party fonts -->

		
        		<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>


         
        

		<!-- Loading main css file -->
		<link rel="stylesheet" href="table.css">
		<link href="fonts/font-awesome.min.css" rel="stylesheet" type="text/css">
		
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
							<li class="menu-item current-menu-item"><a href="table.php">Data</a></li>
							<li class="menu-item"><a href="live-cameras.php">Live cameras</a></li>
							<li class="menu-item"><a href="Contact.php">Contact</a></li>
							
						</ul> <!-- .menu -->
					</div> <!-- .main-navigation -->

					<div class="mobile-navigation"></div>

				</div>
			</div> <!-- .site-header -->

			<main class="main-content">
				<div class="container">
					<div class="breadcrumb">
						<a href="index.php">Home</a>
						<span>Data</span>
					</div>
				</div>
				

			        <div class="fullwidth-block">
					<div class="container">
				<form action="table.php" method="post">	
					<input type="date" name="valueToSearch" placeholder="Value To Search">
                    <input type="submit" name="search" value="Filter"><br><br>	
                 <div>
                <table id="myTable"class="table table-dark table-hover" >
					<thead>
					  <tr>
					    <th class="text-center">#</th>
					    <th class="text-center">Date</th>
					    <th class="text-center">Tempreture<sub>(In Celsius)</sub></th>
					    <th class="text-center">Humidity<sub>(In Percentage)</sub></th>
					    <th class="text-center">Pressure<sub>(In Pascal)</sub></th>
					  </tr>
					</thead>
					<tbody>                        
     	
                            <?php while($row = mysqli_fetch_array($search_result)):?>
					  <tr>
					    <td><?php echo $row['id'] ;?></td>
					    <td><?php echo $row['date'] ;?></td>
					    <td><?php echo $row['tempreture'] ;?></td>
					    <td><?php echo $row['humidity'] ;?></td>
					    <td><?php echo $row['pressure'] ;?></td>
					  </tr>
					 <?php  endwhile; ?>
					</tbody>
				</table>
                    </div>
                    </form>
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

			
		</div>
		
       
		<script src="js/jquery-1.11.1.min.js"></script>
		<script src="js/plugins.js"></script>
		<script src="js/app.js"></script>
		
	</body>

</script>
</html>