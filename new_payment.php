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

if(isset($_POST['submit'])){

$payment_fee = $_POST['payment_fee'];
$payment_month = $_POST['payment_month'];
$user_id = $_POST['user_id'];

if(isset($_POST['payment_fee']) && !empty($_POST['payment_fee'])&&
   isset($_POST['payment_month']) && !empty($_POST['payment_month'])&&
   isset($_POST['user_id']) && !empty($_POST['user_id'])){

        $sql = "INSERT INTO payment_registration (user_id,payment_fee,registration_fee_type,payment_month,payment_status) VALUES ('$user_id','$payment_fee','monthly_fee','$payment_month','active')";
        if ($conn->query($sql) === TRUE) {
        session_start();
        $_SESSION['success_message'] = "payment Successfully Submitted";
        header("Location:new_payment.php");
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
                              NEW PAYMENT
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
                    <?php
                        if(isset($_SESSION['success_message']) && !empty($_SESSION['success_message'])){
                            ?>
                        <div class="alert bg-green alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                               <?php echo $_SESSION['success_message']; ?>
                            </div>
                        <?php
                        unset($_SESSION['success_message']);
                        }

                        ?>
<!-- form -->              
                <form action="" method="POST" enctype="multipart/form-data" >
<!-- USER -->
                    
                    <div class="input-group">
                     <div class="form-line">
                     User Name
                      <select class="form-control"  id="sel1" name="user_id">
                        <option value="">Select User</option>
                    <?php
                    if ($user_result->num_rows > 0) {
                    while($row = $user_result->fetch_assoc()) {
                    echo '<option value="' . $row['user_id'] . '">' . $row['user_name'] . '</option>';
                     }
                    }

                    ?>
                      </select>
                     </div>
                    </div>
<!-- MONTH -->
                    <div class="input-group">
                        <div class="form-line">
                            DATE<input type="date" class="form-control" name="payment_month" placeholder="Date" value="<?php echo $payment_month; ?>">
                        </div>
                    </div>
<!-- name -->
                    <div class="input-group">
                        <div class="form-line">
                            AMOUNT<input type="text" class="form-control" name="payment_fee" placeholder="$100" required autofocus>
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