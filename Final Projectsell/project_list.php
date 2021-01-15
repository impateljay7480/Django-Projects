<!-- Include Header -->
<?php include 'common/header.php'?>

<!-- Log In Session -->
<?php 

if (!isset($_SESSION["login"])) {
     header("location:SIGN_INPAGE");
    
    }
?>

<!-- Title Name -->
<title>:: MiddleMan :: project_list</title>

<!-- Main Code -->
<section class="content">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
                <h2>Project List
                <small>Welcome to MiddleMan</small>
                </h2>
            </div>
            <div class="col-lg-5 col-md-6 col-sm-12">
                <ul class="breadcrumb float-md-right">
                    <li class="breadcrumb-item">
                     <a href="SIGN-OUTPAGE"><i class="zmdi zmdi-power"></i></a>
                     </li>
                    <li class="breadcrumb-item"><a href="HOME"><i class="zmdi zmdi-home"></i></a></li>
                    <li class="breadcrumb-item"><a href="ADMINCONTROL">Admin</a></li>
                    <li class="breadcrumb-item active">Project List</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <!-- Hover Rows -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2><strong>Project List</strong></h2>
                        <ul class="header-dropdown">
                        </ul>
                    </div>
                    <div class="body table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Owner Name</th>
                                    <th>Mobile Number</th>
                                    <th>Project Name</th>
                                    <th>Project Cost</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $q1=$d->select("project_detail");  
                                    while($row = mysqli_fetch_array($q1)){
                                 ?>
                                <tr>
                                    <td><?php echo $row['id'];?></td>
                                    <td><?php echo $row['ownername'];?></td>
                                    <td><?php echo $row['phone'];?></td>
                                    <td><?php echo $row['projectname'];?></td>
                                    <td><?php echo $row['cost'];?></td>
                                    <td>
                          <form action="ADMINCONTROL" method="post">
                          <input type="hidden" name="id" value="<?php echo $row['id'];?>">
                          <button type="submit" value="project_editUser" name="project_editUser" class="btn btn-success btn-sm"><i class="zmdi zmdi-edit"></i></button>
                          </form></br>                       
                                    
                          <form action="CONTROL" method="post">
                          <input type="hidden" name="id" value="<?php echo $row['id'];?>">
                          <button type="submit" value="project_deletUser" name="project_deletUser" class="btn btn-danger btn-sm"><i class="zmdi zmdi-delete"></i></button>
                          </form>
                                    </td>
                                </tr>
                                <?php } ?> 
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Include Footer File -->
<?php include 'common/footer.php'?>