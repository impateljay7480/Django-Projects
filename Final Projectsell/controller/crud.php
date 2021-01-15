<?php
include_once 'lib_include.php';
 
$response=array();

if (isset($_POST['project'])) 
{
            $folder='../image/'; 
	        $ffname=$_FILES['mainimg']['name']; 
	        move_uploaded_file($_FILES['mainimg']['tmp_name'],$folder.$ffname);

	        $count= count($_FILES['img']['name']);          
	        $filetype=$_FILES['img']['type'];
	        for ($i=0; $i < $count ; $i++) 
	        {
               $folder='../image/';
               $filename = $_FILES['img']['name'][$i];
               move_uploaded_file($_FILES['img']['tmp_name'][$i],$folder.$filename);
               $img .= $filename.',';
               
	        }


		extract(array_map("test_input", $_POST));
		$m->set_data('ownername',$ownername);
		$m->set_data('phone',$phone);
		$m->set_data('email',$email);
        $m->set_data('projectname',$projectname);
        $m->set_data('projectdec',$projectdec);
		$m->set_data('technology',$technology);
		$m->set_data('projecttype',$projecttype);
		$m->set_data('component',$component);
		$m->set_data('report',$report);
		$m->set_data('presentation',$presentation);
		$m->set_data('psar',$psar);
		$m->set_data('ppr',$ppr);
		$m->set_data('bmc',$bmc);
		$m->set_data('aeiou',$aeiou);
		$m->set_data('pde',$pde);
		$m->set_data('nsr',$nsr);
		$m->set_data('mainimg',$ffname);
		$m->set_data('img',$img);
		$m->set_data('cost',$cost);



	    $a = array('ownername' => $m->get_data('ownername'),'phone' => $m->get_data('phone'),'email' => $m->get_data('email'),'projectname' => $m->get_data('projectname'),'projectdec' => $m->get_data('projectdec'),'technology' => $m->get_data('technology'),'projecttype' => $m->get_data('projecttype'),'component' => $m->get_data('component'),'report' => $m->get_data('report'),'presentation' => $m->get_data('presentation'),'psar' => $m->get_data('psar'),'ppr' => $m->get_data('ppr'),'bmc' => $m->get_data('bmc'),'aeiou' => $m->get_data('aeiou'),'pde' => $m->get_data('pde'),'nsr' => $m->get_data('nsr'),'mainimg' => $m->get_data('mainimg'),'img' => $m->get_data('img'),'cost' => $m->get_data('cost'));

	    $q=$d->insert("project_detail",$a);

			if($q==TRUE)
			{
				header("location:LISTOFPROJECT");
			}
				else
			{
				header("location:ADMINCONTROL");	
			}
}
elseif(isset($_POST['component'])) 
{
            $folder='../image/'; 
	        $ffname=$_FILES['mainimg']['name']; 
	        move_uploaded_file($_FILES['mainimg']['tmp_name'],$folder.$ffname);

	        $count= count($_FILES['image']['name']);          
	        $filetype=$_FILES['image']['type'];
	        for ($i=0; $i < $count ; $i++) 
	        {
               $folder='../image/';
               $filename2 = $_FILES['image']['name'][$i];
               $img .= $filename2.',';  
               move_uploaded_file($_FILES['image']['tmp_name'][$i],$folder.$filename2);
               
	        }

 
		extract(array_map("test_input", $_POST));
		$m->set_data('ownername',$ownername);
		$m->set_data('phone',$phone);
		$m->set_data('email',$email);
        $m->set_data('componentname',$componentname);
		$m->set_data('mainimg',$ffname);
		$m->set_data('image',$img);
		$m->set_data('cost',$cost);



	    $a = array('ownername' => $m->get_data('ownername'),'phone' => $m->get_data('phone'),'email' => $m->get_data('email'),'componentname' => $m->get_data('componentname'),'mainimg' => $m->get_data('mainimg'),'image' => $m->get_data('image'),'cost' => $m->get_data('cost'));

	    $q=$d->insert("component_detail",$a);

			if($q==TRUE)
			{   
				
				header("location:LISTOFCOMPONENT");
			}
				else
			{
				header("location:ADMINCONTROL");	
			}
}
elseif(isset($_POST['project_Update']))
{                 
	              extract(array_map("test_input", $_POST));
	              $m->set_data("ownername",$ownername);
                  $m->set_data("phone",$phone);
                  $m->set_data("projectname",$projectname);
                  $m->set_data("cost",$cost);
                  $z=array('ownername' => $m->get_data('ownername'),'phone' => $m->get_data('phone'),
                    'projectname' => $m->get_data('projectname'),'cost' => $m->get_data('cost'));
                  $q=$d->update("project_detail",$z,"id=$id");

                  if($q == true)
                    {
                      header("location:LISTOFPROJECT");
                    }
                  else{
                  	  header("location:LISTOFPROJECT");
                  }
}
elseif(isset($_POST['component_Update']))
{                 
	              extract(array_map("test_input", $_POST));
	              $m->set_data("ownername",$ownername);
                  $m->set_data("phone",$phone);
                  $m->set_data("componentname",$componentname);
                  $m->set_data("cost",$cost);
                  $z=array('ownername' => $m->get_data('ownername'),'phone' => $m->get_data('phone'),
                    'componentname' => $m->get_data('componentname'),'cost' => $m->get_data('cost'));
                  $q=$d->update("component_detail",$z,"id=$id");

                  if($q == true)
                    {
                      header("location:LISTOFCOMPONENT");
                    }
                  else{
                  	  header("location:LISTOFCOMPONENT");
                  }
}
elseif(isset($_POST['project_deletUser']))
{
	        extract(array_map("test_input", $_POST));
	        $m->set_data("id",$id);
			$q=$d->delete("project_detail","id ='$id'");
			if($q == true)
                {
                    header("location:LISTOFPROJECT");
                }
            else{
                    header("location:LISTOFPROJECT");
                }
}	
elseif(isset($_POST['component_deletUser']))
{
	        extract(array_map("test_input", $_POST));
	        $m->set_data("id",$id);
			$q=$d->delete("component_detail","id ='$id'");
			if($q == true)
                {
                    header("location:LISTOFCOMPONENT");
                }
            else{
                    header("location:LISTOFCOMPONENT");
                }
}
elseif (isset($_POST['signin'])) {
    			    		
     	 extract($_POST);
         $q=$d->select("admin","username='$username' and password ='$password'","");

         if($login=mysqli_fetch_array($q))
         {
         	$_SESSION['login']='true';
         	header("location:ADMINCONTROL");
         }
         else{
         	echo "string";
         }

}    			    	