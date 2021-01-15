<?php
include_once'lib_include.php';

$response=array();

	extract(array_map("test_input", $_POST));

		$q11=$d->select("pi_data","","");
		if($q11==TRUE){
			$response["pi_data"]=array();
			while($data=mysqli_fetch_array($q11)){
				$pi_data=array();
			        $pi_data["Date"]=$data['Date'];
				$pi_data["Time"]=$data['Time'];
				$pi_data["Temperature"]=$data['Temperature'];
				$pi_data["Humidity"]=$data['Humidity'];
				$pi_data["Pressure"]=$data['Pressure'];
				array_push($response["pi_data"],$pi_data);

			}

			$response["status"]=200;
			$response["messsage"]="get Data";
			echo json_encode($response);
        }
		else{
			$response["status"]=201;
			$response["messsage"]="wrong tag..!";
			echo json_encode($response);
		}



?>