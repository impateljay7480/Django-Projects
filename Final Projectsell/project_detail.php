<!-- Include Header -->
<?php include 'common/header.php'?>
<!-- Title Name -->
<title>:: MiddleMan :: Project_detail</title>

<!-- Main Code -->
<section class="content ecommerce-page">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
                <h2>Project Detail
                <small>Welcome to MiddleMan</small>
                </h2>
            </div>
            <div class="col-lg-5 col-md-6 col-sm-12">
                <ul class="breadcrumb float-md-right">
                    <li class="breadcrumb-item"><a href="HOME"><i class="zmdi zmdi-home"></i></a></li>
                    <li class="breadcrumb-item"><a href="PROJECTS">Project</a></li>
                    <li class="breadcrumb-item active">Project Detail</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <?php extract($_POST);
            if(isset($detail)){
            $q1=$d->select("project_detail","id = '$id'");  
            while($row = mysqli_fetch_array($q1)){
        ?>
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card">
                    <div class="body">
                        <div class="row">
                            <div class="preview col-lg-4 col-md-12">
                                <div class="preview-pic tab-content">
                                    <div class="tab-pane active" id="product"><?php echo '<img src="image/'.$row['mainimg'].'" alt="Products" class="img-fluid" />' ?></div>
                                    
                                    <?php
                                      $a=explode(",",$row['img']);
                                      $j = count($a);
                                      for ($i=0; $i<$j -1 ; $i++) {                                               
                                    ?>
                                    
                                    <div class="tab-pane" id=<?php echo 'product_'.$i.'';?>><?php echo '<img src="image/'.$a[$i].'" alt="Products" class="img-fluid" />' ?></div>

                                    <?php } ?>
                                </div>
                                <ul class="preview-thumbnail nav nav-tabs">
                                    <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#product"><?php echo '<img src="image/'.$row['mainimg'].'" alt="Products" class="img-fluid" />' ?></a></li>

                                    <?php
                                      $a=explode(",",$row['img']);
                                      $j = count($a);
                                      for ($i=0; $i<$j -1; $i++) {                                            
                                    ?>
                                    <li class="nav-item"><a class="nav-link" data-toggle="tab" href=<?php echo '#product_'.$i.'';?>><?php echo '<img src="image/'.$a[$i].'" alt="Products" class="img-fluid" />' ?></a>
                                    </li>   

                                    <?php } ?>

                                </ul>                
                            </div>
                            <div class="details col-lg-8 col-md-12">
                                <h3 class="product-title m-b-0"><?php echo $row['projectname'];?></h3>
                                <hr>
                                <h4 class="price m-t-0">Price&nbsp;:&nbsp;₹<span class="col-amber"><?php echo $row['cost'];?></span></h4>
                                
                                <p class="product-description"><h4>Description:</h4><h5><?php echo $row['projectdec'];?></h5></p>
                                <hr>
                                <p>If You Buy/Sell Project So <a href="CONTACT">Contact Us.</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="card">
                    <ul class="nav nav-tabs">
                        <li class="nav-item"><a class="nav-link active" data-toggle="tab" >Included With Project</a></li>
                    </ul>
                </div>
                <div class="card">
                    <div class="body">                        
                        <div class="tab-content">
                            <div class="tab-pane active" id="description">
                                <div class="row clearfix">
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="card">
                                            <div class="body table-responsive">
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>Project Description</th>
                                                            <th>Yes/No</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <th>Technology used in project</th>
                                                            <td><?php echo $row['technology'];?></td>
                                                        </tr><tr>
                                                            <th>Project Type (Hardware/Software)</th>
                                                            <td><?php echo $row['projecttype'];?></td>
                                                        </tr><tr>
                                                            <th>Component Used (If Hardware)</th>
                                                            <td><?php echo $row['component'];?></td>
                                                        </tr><tr>
                                                            <th>Project Report </th>
                                                            <td><?php echo $row['report'];?></td>
                                                        </tr><tr>   
                                                            <th>Presentation</th>
                                                            <td><?php echo $row['presentation'];?></td>
                                                        </tr><tr>
                                                            <th>PSAR (Sem7/8) </th>
                                                            <td><?php echo $row['psar'];?></td>
                                                        </tr><tr>
                                                            <th>PPR (Sem8) </th>
                                                            <td><?php echo $row['ppr'];?></td>
                                                        </tr><tr>
                                                            <th>BMC Canvas & Report</th>
                                                            <td><?php echo $row['bmc'];?></td>
                                                        </tr><tr>
                                                            <th>AEIOU Pic</th>
                                                            <td><?php echo $row['aeiou'];?></td>
                                                        </tr><tr>
                                                            <th>PDE Form </th>
                                                            <td><?php echo $row['pde'];?></td>
                                                        </tr><tr>
                                                            <th>Novelty Search Report </th>             <td><?php echo $row['nsr'];?></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>            
        </div>
        <?php }  } ?>
    </div>   
</section>

<!-- Include Footer File -->
<?php include 'common/footer.php'?>