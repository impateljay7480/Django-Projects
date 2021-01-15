<?php
	require_once("perpage.php");	
	require_once("dbcontroller.php");
	$db_handle = new DBController();
	
	$Date = "";	
	$queryCondition = "";
	if(!empty($_POST["search"])) {
		foreach($_POST["search"] as $k=>$v){
			if(!empty($v)) {

				$queryCases = array("Date");
				if(in_array($k,$queryCases)) {
					if(!empty($queryCondition)) {
						$queryCondition .= " AND ";
					} else {
						$queryCondition .= " WHERE ";
					}
				}
				switch($k) {
					case "Date":
						$Date = $v;
						$queryCondition .= "Date LIKE '" . $v . "%'";
						break;
				}
			}
		}
	}
	$orderby = " ORDER BY ID ASC"; 
	$sql = "SELECT * FROM pi_data " . $queryCondition;
	$href = 'table.php';					
		
	$perPage = 10; 
	$page = 1;
	if(isset($_POST['page'])){
		$page = $_POST['page'];
	}
	$start = ($page-1)*$perPage;
	if($start < 0) $start = 0;
		
	$query =  $sql . $orderby .  " limit " . $start . "," . $perPage; 
	$result = $db_handle->runQuery($query);
	
	if(!empty($result)) {
		$result["perpage"] = showperpage($sql, $perPage, $href);
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


				<form name="frmSearch" method="post" action="table.php">
					<div class="search-box">
						<p>
							<input type="date" placeholder="Date" name="search[Date]" class="demoInputBox" value="<?php echo $Date; ?>"	/>
							<input type="submit" name="go" class="btnSearch" value="Search">
							<input type="reset" class="btnSearch" value="Reset" onclick="window.location='table.php'">
						</p>
					</div></br>

			
                
                <table id="table1"class="table table-dark table-hover">
					<thead>
					  <tr>
					    <th class="text-center">#</th>
					    <th class="text-center">Date</th>
					    <th class="text-center">Time</th>
					    <th class="text-center">Tempreture<sub>(In Celsius)</sub></th>
					    <th class="text-center">Humidity<sub>(In Percentage)</sub></th>
					    <th class="text-center">Pressure<sub>(In Pascal)</sub></th>
					  </tr>	
					</thead>
					<tbody>                        
     	
                           <?php
								if(!empty($result)) {
									foreach($result as $k=>$v) {
						 		     	if(is_numeric($k)) {
					        ?>

					  <tr>
					  	<td><?php echo $result[$k]["ID"]; ?></td>
					  	<td><?php echo $result[$k]["Date"]; ?></td>
					  	<td><?php echo $result[$k]["Time"]; ?></td>
	                    <td><?php echo $result[$k]["Temperature"]; ?></td>
	                    <td><?php echo $result[$k]["Humidity"]; ?></td>
	                    <td><?php echo $result[$k]["Pressure"]; ?></td>
					  </tr>

					        <?php
								}
					 				}
                    					} ?>
                </tbody>
			</table>
										<?php	if(isset($result["perpage"])) {
							?>
					  
					    <p colspan="6" align=right> <?php echo $result["perpage"]; ?></p>
					  
				
				        	<?php } ?>

				
                   
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

</html>