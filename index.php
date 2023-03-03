<?php include 'config.php' ?>
<?php 
session_start();

$sql="SELECT COUNT(*) FROM user_registration WHERE user_status='active'";
$rs = mysqli_query($conn,$sql);
$result = mysqli_fetch_array($rs);
 //here you can echo the result of query
 echo $result[0];

 $sqli="SELECT COUNT(*) FROM event WHERE event_status='active'";
$rs = mysqli_query($conn,$sqli);
$res = mysqli_fetch_array($rs);
 //here you can echo the result of query
 echo $res[0];

$sql1="SELECT SUM(payment_fee) FROM payment_registration WHERE payment_status='active'";
$rs = mysqli_query($conn,$sql1);
$resul = mysqli_fetch_array($rs);
 //here you can echo the result of query
 echo $resul[0];
?>



<?php include 'header.php'?>

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>DASHBOARD</h2>
            </div>

            <!-- Widgets -->
             <div class="row clearfix">
                 <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-orange hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">person_add</i>
                        </div>
                        <div class="content">
                            <div class="text" a href="user_view.php">USERS</div>
                            <div class="number"><?php echo $result[0]; ?></div>
                        </div>
                    </div>
                </div>
                 <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-light-green hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">forum</i>
                        </div>
                        <div class="content">
                            <div class="text">EVENTS</div>
                            <div class="number"><?php echo $res[0]; ?></div>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-cyan hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">help</i>
                        </div>
                        <div class="content">
                            <div class="text">BALANCE</div>
                            <div class="number"><?php echo $resul[0]; ?></div>
                        </div>
                    </div>
                </div>
               
               
            </div>
            <!-- #END# Widgets -->
        </div>
    </section>

<?php include 'footer.php'?>
