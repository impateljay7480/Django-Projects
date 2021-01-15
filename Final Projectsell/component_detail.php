<!-- Include Header -->
<?php include 'common/header.php'?>
<!-- Title Name -->
<title>:: MiddleMan :: Component_Detail</title>

<!-- Main Code -->
<section class="content ecommerce-page">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
                <h2>Component Detail
                <small>Welcome to MiddleMan</small>
                </h2>
            </div>
            <div class="col-lg-5 col-md-6 col-sm-12">
                <ul class="breadcrumb float-md-right">
                    <li class="breadcrumb-item"><a href="HOME"><i class="zmdi zmdi-home"></i></a></li>
                    <li class="breadcrumb-item"><a href="COMPONENTS">Component</a></li>
                    <li class="breadcrumb-item active">Component Detail</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <?php extract($_POST);
            if(isset($detail)){
            $q1=$d->select("component_detail","id = '$id'");  
            while($row = mysqli_fetch_array($q1)){
        ?>
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card">
                    <div class="body">
                        <div class="row">
                            <div class="preview col-lg-4 col-md-12">
                                <div class="preview-pic tab-content">
                                    <div class="tab-pane active" id="component"><?php echo '<img src="image/'.$row['mainimg'].'" alt="Component" class="img-fluid" />' ?></div>
                                    <?php
                                      $a=explode(",",$row['image']);
                                      $j = count($a);
                                      for ($i=0; $i<$j -1 ; $i++) {                                               
                                    ?>
                                    <div class="tab-pane" id=<?php echo 'component_'.$i.'';?>><?php echo '<img src="image/'.$a[$i].'" alt="Component" class="img-fluid" />' ?></div>

                                    <?php } ?>
                                </div>
                                <ul class="preview-thumbnail nav nav-tabs">
                                    <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#component"><?php echo '<img src="image/'.$row['mainimg'].'" alt="Component" class="img-fluid" />' ?></a></li>
                                    <?php
                                      $a=explode(",",$row['image']);
                                      $j = count($a);
                                      for ($i=0; $i<$j -1; $i++) {                                            
                                    ?>
                                    <li class="nav-item"><a class="nav-link" data-toggle="tab" href=<?php echo '#component_'.$i.'';?>><?php echo '<img src="image/'.$a[$i].'" alt="Component" class="img-fluid" />' ?></a>
                                    </li>   

                                    <?php } ?>                       
                                </ul>                
                            </div>
                            <div class="details col-lg-8 col-md-12">
                                <h3 class="product-title m-b-0"><?php echo $row['componentname'];?></h3>
                                <hr>
                                <h4 class="price m-t-0">Price&nbsp;:&nbsp;₹<span class="col-amber"><?php echo $row['cost'];?></span></h4>
                                <hr>
                                <p>If You Buy/Sell Project So <a href="CONTACT">Contact Us.</a></p>
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