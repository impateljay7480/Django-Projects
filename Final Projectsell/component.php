<!-- Include Header -->
<?php include 'common/header.php'?>
<!-- Title Name -->
<title>:: MiddleMan :: Component</title>

<!-- Main Code -->
<section class="content ecommerce-page">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
                <h2>Components
                <small>Welcome to MiddleMan</small>
                </h2>
            </div>
            <div class="col-lg-5 col-md-6 col-sm-12">
                <ul class="breadcrumb float-md-right">
                    <li class="breadcrumb-item"><a href="HOME"><i class="zmdi zmdi-home"></i></a></li>
                    <li class="breadcrumb-item active">Components</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row clearfix">
                <?php
                    $q1=$d->select("component_detail");  
                    while($row = mysqli_fetch_array($q1)){
                ?>
            <div class="col-lg-3 col-md-4 col-sm-12">
                <div class="card product_item">
                    <div class="body">
                        <div class="cp_img">
                            <?php echo '<img src="image/'.$row['mainimg'].'" alt="Component" class="img-fluid" />' ?>
                        </div>
                        <div class="product_details">
                            <h5><a><?php echo $row['componentname'];?></a></h5>
                            <ul class="product_price list-unstyled">
                                <form action="COMPONENT_DETAIL" method="post">
                                <input type="hidden" name="id" value="<?php echo $row['id'];?>">
                                <button class="btn btn-raised btn-primary btn-round waves-effect" type="submit" name="detail" >View Component</li></button>
                                </form>
                            </ul>
                        </div>
                    </div>
                </div>                
            </div>
           <?php } ?>
        </div>
    </div>   
</section>

<!-- Include Footer File -->
<?php include 'common/footer.php'?>