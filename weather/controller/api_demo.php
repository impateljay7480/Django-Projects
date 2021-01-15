<?php
include_once'lib_include.php';

$response=array();


if (isset($_POST) && !empty($_POST))
{

	extract(array_map("test_input", $_POST));


		if(isset($_POST['contact_submit']))
		{

			$m->set_data('name',$name);
			$m->set_data('email',$email);
			$m->set_data('mobile',$mobile);
			$m->set_data('message1',$message1);
			

			$arryName=  array('name' => $m->get_data('name'), 'email'=> $m->get_data('email'),
				'mobile' => $m->get_data('mobile'),'message1' => $m->get_data('message1'));


			$q=$d->insert("pi_contact", $arryName);


			if($q=TRUE)
			{
				include 'mail.php';
				header("location:../contact.php");
				
			}
			else{
				$response["status"]=200;
				$response["messsage"]="something Wrong";
				echo json_encode($response);				
			}
		}
	}
		
else{
	$response["status"]=201;
	$response["messsage"]="Not valid";
	echo json_encode($response);
}


?>
