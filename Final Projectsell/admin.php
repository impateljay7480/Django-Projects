<!-- Include Header -->
<?php include 'common/header.php'?>

<!-- Log In Session -->
<?php 
if (!isset($_SESSION["login"])) {
     header("location:SIGN_INPAGE");
    
    }
?>

<!-- Title Name -->
<title>:: MiddleMan :: Admin</title>

<!-- Main Code -->
<section class="content">

<!-- Projects Update Form -->
    <?php
      extract($_POST);
      if (isset ($_POST['project_editUser'])) {
      $q1=$d->select("project_detail","id = '$id'");  
      $row = mysqli_fetch_array($q1)
    ?>
    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
                <h2>Project List Update
                    <small>Welcome to MiddleMan</small>
                </h2>
            </div>
            <div class="col-lg-5 col-md-6 col-sm-12">
                <ul class="breadcrumb float-md-right">
                    <li class="breadcrumb-item">
                     <a href="OUTPAGE"><i class="zmdi zmdi-power"></i></a>
                    </li>
                    <li class="breadcrumb-item">
                      <a href="HOME"><i class="zmdi zmdi-home"></i></a>
                    </li>
                    <li class="breadcrumb-item">Update Project List</a></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2><strong>Update Project</strong></h2>
                    </div>
                    <div class="body">
                        <form id="form_registration" action="CONTROL"method="POST" 
                          enctype="multipart/form-data" >
                          
                          <div class="form-group col-lg-6 col-md-12">
                            <input type="hidden" value="<?php echo $id;?>" name="id">
                            <input type="text" class="form-control" placeholder="Owner Name" name="ownername" value="<?php echo $row['ownername'];?>" >
                          </div>
                          </br>

                          <div class="form-group col-lg-3 col-md-6">
                            <input type="tel" class="form-control"  placeholder="Mobile Number" name="phone" value="<?php echo $row['phone'];?>">
                          </div>
                          </br>
                          <div class="form-group col-lg-6 col-md-12">
                            <input type="text" class="form-control" placeholder="Project Name" name="projectname" value="<?php echo $row['projectname'];?>" >
                          </div>
                          </br>
                          <div class="form-group col-lg-6 col-md-12">
                            <input type="text" class="form-control" placeholder="Project Cost" name="cost" value="<?php echo $row['cost'];?>" >
                          </div>
                          </br>
                          <div class="form-group col-lg-6 col-md-12">
                            <div class="checkbox">
                                <input id="checkbox" type="checkbox" >
                                <label for="checkbox">I have read and accept the terms</label>
                            </div>
                          </div>
                          <div class="form-group col-lg-6 col-md-12">
                          <button class="btn btn-raised btn-primary btn-round waves-effect" name="project_Update" type="submit">   UPDATE</button>
                          </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- Component Update Form -->
    <?php }
      elseif(isset ($_POST['component_editUser'])) {
        $q1=$d->select("component_detail","id='$id'");  
        $row = mysqli_fetch_array($q1)
     ?>
    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
                <h2>Component List Update
                    <small>Welcome to MiddleMan</small>
                </h2>
            </div>
            <div class="col-lg-5 col-md-6 col-sm-12">
                <ul class="breadcrumb float-md-right">
                    <li class="breadcrumb-item">
                     <a href="OUTPAGE" ><i class="zmdi zmdi-power"></i></a>
                     </li>
                    <li class="breadcrumb-item"><a href="HOME"><i class="zmdi zmdi-home"></i></a></li>
                    <li class="breadcrumb-item">Update Component List</a></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2><strong>Update Component</strong></h2>
                    </div>
                    <div class="body">

                        <form id="form_registration" action="CONTROL"method="POST" 
                          enctype="multipart/form-data" >
                          
                          <div class="form-group col-lg-6 col-md-12">
                            <input type="hidden" value="<?php echo $id;?>" name="id">
                            <input type="text" class="form-control" placeholder="Owner Name" name="ownername" value="<?php echo $row['ownername'];?>" >
                          </div>
                          </br>

                          <div class="form-group col-lg-3 col-md-6">
                            <input type="tel" class="form-control"  placeholder="Mobile Number" name="phone" value="<?php echo $row['phone'];?>">
                          </div>
                          </br>
                          <div class="form-group col-lg-6 col-md-12">
                            <input type="text" class="form-control" placeholder="Component Name" name="componentname" value="<?php echo $row['componentname'];?>" >
                          </div>
                          </br>
                          <div class="form-group col-lg-6 col-md-12">
                            <input type="text" class="form-control" placeholder="Component Cost" name="cost" value="<?php echo $row['cost'];?>" >
                          </div>
                          </br>
                          <div class="form-group col-lg-6 col-md-12">
                            <div class="checkbox">
                                <input id="checkbox" type="checkbox" >
                                <label for="checkbox">I have read and accept the terms</label>
                            </div>
                          </div>
                          <div class="form-group col-lg-6 col-md-12">
                          <button class="btn btn-raised btn-primary btn-round waves-effect" name="component_Update" type="submit">   UPDATE</button>
                          </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- Project And Component Form -->  
    <?php } 
    else {  ?>

    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
                <h2>Admin
                    <small>Welcome to MiddleMan</small>
                </h2>
            </div>
            <div class="col-lg-5 col-md-6 col-sm-12">
                <ul class="breadcrumb float-md-right">  
                    <li class="breadcrumb-item"><a href="LISTOFCOMPONENT">Component List</a></li>
                    <li class="breadcrumb-item"><a href="LISTOFPROJECT">Project List</a></li>
                    <li class="breadcrumb-item">
                    <a href="controller/logout.php" ><i class="zmdi zmdi-power"></i></a>
                     </li>
                    <li class="breadcrumb-item"><a href="HOME"><i class="zmdi zmdi-home"></i></a></li>
                    <li class="breadcrumb-item">Add Project</a></li>    
                </ul>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2><strong>Registration Form</strong></h2>
                    </div>
                    <div class="body">
                        <div>
                          <button class="btn btn-raised btn-primary waves-effect btn-round" onclick="openProj()">Project</button>
                          <button class="btn btn-raised btn-primary waves-effect btn-round" name="component"  onclick="openCompo()" >Component</button>
                          </br>
                          </br>
                        </div>

                        <div id="project_detail" style="display: none;">
                          <form  action="CONTROL"  method="POST" enctype="multipart/form-data">

                          <div class="form-group col-lg-6 col-md-12">
                            <input type="text" class="form-control" placeholder="Owner Name" name="ownername" >
                          </div>
                          </br>

                          <div class="form-group col-lg-6 col-md-12">
                            <input type="tel" class="form-control" placeholder="Mobile number" name="phone" >
                          </div>
                          </br>
                          <div class="form-group col-lg-6 col-md-6">
                            <input type="email" class="form-control"  placeholder="Email Id" name="email">
                          </div>
                          </br>
                          <div class="form-group col-lg-6 col-md-12">
                            <input type="text" class="form-control" placeholder="Project/Component Name" name="projectname">
                          </div>
                          </br>
                          <div class="form-group col-lg-6 col-md-12">
                          <textarea class="form-control" rows="10" placeholder="Project/Component Description" name="projectdec"></textarea></div> 
                          </br>
                          <div class="form-group col-lg-6 col-md-12">
                            <input type="text" class="form-control" placeholder="Technology used in project" name="technology" >
                          </div>
                          </br>
                          <div class="form-group col-lg-6 col-md-12">
                            <input type="text" class="form-control" placeholder="Project Type" name="projecttype" >
                          </div>
                          </br> 
                          <div class="form-group col-lg-6 col-md-12">
                            <input type="text" class="form-control" placeholder="Component Used" name="component" >
                          </div>
                          </br>
                          <div class="form-group col-lg-3 col-md-6">
                            <a> Project Report:</a>
                              <div class="inlineblock m-r-20">
                                <input type="radio" name="report" id="yes" class="with-gap" value="Yes">
                                <label for="yes">Yes</label>
                              </div>                                
                              <div class="inlineblock">
                                <input type="radio" name="report" id="no" class="with-gap" value="No">
                                <label for="no">No</label>
                              </div>
                          </div>
                          </br>
                          <div class="form-group col-lg-3 col-md-6">
                            <a> Project Presentation:</a>
                              <div class="inlineblock m-r-20">
                                <input type="radio" name="presentation" id="yes" class="with-gap" value="Yes">
                                <label for="yes">Yes</label>
                              </div>                                
                              <div class="inlineblock">
                                <input type="radio" name="presentation" id="no" class="with-gap" value="No">
                                <label for="no">No</label>
                              </div>
                          </div>
                          </br>
                          <div class="form-group col-lg-3 col-md-6">
                            <a> PSAR:</a>
                              <div class="inlineblock m-r-20">
                                <input type="radio" name="psar" id="yes" class="with-gap" value="Yes">
                                <label for="yes">Yes</label>
                              </div>                                
                              <div class="inlineblock">
                                <input type="radio" name="psar" id="no" class="with-gap" value="No">
                                <label for="no">No</label>
                              </div>
                          </div>
                          </br>
                          <div class="form-group col-lg-3 col-md-6">
                            <a> PPR:</a>
                              <div class="inlineblock m-r-20">
                                <input type="radio" name="ppr" id="yes" class="with-gap" value="Yes">
                                <label for="yes">Yes</label>
                              </div>                                
                              <div class="inlineblock">
                                <input type="radio" name="ppr" id="no" class="with-gap" value="No">
                                <label for="no">No</label>
                              </div>
                          </div>
                          </br>
                          <div class="form-group col-lg-3 col-md-6">
                            <a> BMC:</a>
                              <div class="inlineblock m-r-20">
                                <input type="radio" name="bmc" id="yes" class="with-gap" value="Yes">
                                <label for="yes">Yes</label>
                              </div>                                
                              <div class="inlineblock">
                                <input type="radio" name="bmc" id="no" class="with-gap" value="No">
                                <label for="no">No</label>
                              </div>
                          </div>
                          </br>
                          <div class="form-group col-lg-3 col-md-6">
                            <a> AEIOU:</a>
                              <div class=" inlineblock m-r-20">
                                <input type="radio" name="aeiou" id="yes" class="with-gap" value="Yes">
                                <label for="yes">Yes</label>
                              </div>                                
                              <div class="inlineblock">
                                <input type="radio" name="aeiou" id="no" class="with-gap" value="No">
                                <label for="no">No</label>
                              </div>
                          </div>
                          </br>
                          <div class="form-group col-lg-3 col-md-6">
                            <a> PDE:</a>
                              <div class="inlineblock m-r-20">
                                <input type="radio" name="pde" id="yes" class="with-gap" value="Yes">
                                <label for="yes">Yes</label>
                              </div>                                
                              <div class="inlineblock">
                                <input type="radio" name="pde" id="no" class="with-gap" value="No">
                                <label for="no">No</label>
                              </div>
                          </div>
                          </br>
                          <div class="form-group col-lg-3 col-md-6">
                            <a> NSR  :  </a>
                              <div class=" inlineblock m-r-20">
                                <input type="radio" name="nsr" id="yes" value="Yes">
                                <label for="yes">Yes</label>
                              </div>                                
                              <div class=" inlineblock">
                                <input type="radio" name="nsr" id="no"  value="No">
                                <label for="no">No</label>
                              </div>
                          </div>
                          </br>
                          <div class="form-group col-lg-6 col-md-12">
                          <input type="file" class="form-control" name="mainimg"  />
                          </div> 

                          <div class="form-group col-lg-6 col-md-12">
                          <input type="file" class="form-control" name="img[]" multiple />
                          </div>
                          </br>
                          <div class="form-group col-lg-6 col-md-12">
                            <input type="text" class="form-control" placeholder="Project/Component Cost" name="cost" >
                          </div>
                          </br>
                          <div>
                          <button class="btn btn-raised btn-primary waves-effect btn-round" data-type="" name="project">Project</button>
                          </div>
                          </form>
                        </div>
                      
                        <div id="component_detail" style="display: none;">
                          <form id="component_detail" action="CONTROL"  method="POST" enctype="multipart/form-data">

                          <div class="form-group col-lg-6 col-md-12">
                            <input type="text" class="form-control" placeholder="Owner Name" name="ownername" >
                          </div>
                          </br>

                          <div class="form-group col-lg-6 col-md-12">
                            <input type="tel" class="form-control" placeholder="Mobile number" name="phone" >
                          </div>
                          </br>
                          <div class="form-group col-lg-6 col-md-6">
                            <input type="email" class="form-control"  placeholder="Email Id" name="email">
                          </div>
                          </br>
                          <div class="form-group col-lg-6 col-md-12">
                            <input type="text" class="form-control" placeholder="Component Name" name="componentname" >
                          </div>
                          </br>
                          <div class="form-group col-lg-6 col-md-12">
                          <input type="file" class="form-control" name="mainimg"  />
                          </div> 

                          <div class="form-group col-lg-6 col-md-12">
                          <input type="file" class="form-control" name="image[]" multiple="multiple" />
                          </div>
                          </br>
                          <div class="form-group col-lg-6 col-md-12">
                            <input type="text" class="form-control" placeholder="Component Price" name="cost" >
                          </div>
                          </br>
                          <div>
                            <button class="btn btn-raised btn-primary waves-effect btn-round" name="component">Component</button>
                          </div>
                          </form>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>
</section>

<script>
function openCompo() {
  document.getElementById("component_detail").style.display = "block";
  document.getElementById("project_detail").style.display = "none";
}

function openProj() {
  document.getElementById("project_detail").style.display = "block";
  document.getElementById("component_detail").style.display = "none";
}

</script>
<?php include 'common/footer.php'?>