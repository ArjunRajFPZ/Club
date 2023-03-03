<?php
ob_start();
?>

<?php include 'header.php'?>
<?php
$payment_fee = '';
$payment_month = '';
$user_id = '';

$user_sql = "SELECT * FROM user_registration";
$user_result = mysqli_query($conn, $user_sql);

//<!-- Getting id from url -->
$id = $_GET['id'];
//<!-- Alerts -->
$sql = "SELECT * FROM payment_registration WHERE payment_id='$id'";
 $result = mysqli_query($conn, $sql);


while($data = $result->fetch_array()) {

$payment_fee = $data['payment_fee'];
$payment_month = $data['payment_month'];
$user_id = $data['user_id'];
}

if(isset($_POST['submit'])){

$payment_fee = $_POST['payment_fee'];
$payment_month = $_POST['payment_month'];


if(isset($_POST['payment_fee']) && !empty($_POST['payment_fee'])&&
   isset($_POST['payment_month']) && !empty($_POST['payment_month'])){

        $sql =  "UPDATE payment_registration
                SET payment_fee= '$payment_fee',payment_month ='$payment_month'
                WHERE payment_id = '$id'";
        if ($conn->query($sql) === TRUE) {
        session_start();
        $_SESSION['success_message'] = "payment Successfully Updated";
        header("Location:search.php");
        exit;
        } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
}else{
    $_SESSION['error_message'] = "All Fields are required";    
}   
}
?>


<section class="content">
        <div class="container-fluid">
<!-- Horizontal Layout -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                              PAYMENT EDIT
                            </h2>
                        </div>
                        <div class="body">
<!-- Alerts -->
                         <?php
                        if(isset($_SESSION['error_message']) && !empty($_SESSION['error_message'])){
                            ?>
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                          <?php echo $_SESSION['error_message']; ?>
                        </div>  
                        <?php
                        unset($_SESSION['error_message']);
                        }

                        ?>                
                   
<!-- form -->              
                <form action="" method="POST" enctype="multipart/form-data" >
<!-- USER -->
                
<!-- MONTH -->
                    <div class="input-group">
                        <div class="form-line">
                            DATE<input type="date" class="form-control" name="payment_month" placeholder="Date" value="<?php echo $payment_month; ?>">
                        </div>
                    </div>
<!-- name -->
                    <div class="input-group">
                        <div class="form-line">
                            AMOUNT<input type="text" class="form-control" name="payment_fee" placeholder="$100" value="<?php echo $payment_fee; ?>" required autofocus>
                        </div>
                    </div>
<!-- Submit -->                      
                    <button class="btn btn-block btn-lg bg-pink waves-effect" name="submit" type="submit">ENTER</button>

                </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Horizontal Layout -->
    </div>
</section>

<?php include 'footer.php'?>