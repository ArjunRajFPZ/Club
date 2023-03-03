<?php
ob_start();
?>

<?php include 'header.php'?>
<?php
$expense_item = '';
$expense_amount = '';
$expense_date = '';
//<!-- Getting id from url -->
$id = $_GET['id'];
//<!-- Alerts -->
$sql = "SELECT * FROM expense WHERE expense_id='$id'";
 $result = mysqli_query($conn, $sql);


while($data = $result->fetch_array()) {

$expense_item = $data['expense_item'];
$expense_amount = $data['expense_amount'];
$expense_date = $data['expense_date'];

}

if(isset($_POST['submit'])){

$expense_item = $_POST['expense_item'];
$expense_amount = $_POST['expense_amount'];
$expense_date = $_POST['expense_date'];

if(isset($_POST['expense_item']) && !empty($_POST['expense_item'])&&
   isset($_POST['expense_amount']) && !empty($_POST['expense_amount'])&&
   isset($_POST['expense_date']) && !empty($_POST['expense_date'])){

        $sql = "UPDATE expense SET expense_item = '$expense_item',expense_amount= '$expense_amount',expense_date='$expense_date',expense_status='active'
                WHERE expense_id = '$id'";
        if ($conn->query($sql) === TRUE) {
        session_start();
        $_SESSION['success_message'] = "Entry Successfully";
        header("Location:expense_view.php");
        exit;
        } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
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
                              EXPENSE EDIT
                            </h2>
                        </div>
                        <div class="body">
<!-- Alerts -->                
      
<!-- form -->              
                <form action="" method="POST" >

                     <div class="input-group">
                        <div class="form-line">
                            EXPENDITURE ITEM<input type="text" class="form-control" name="expense_item" placeholder="Item Name" value="<?php echo $expense_item; ?>"required>
                        </div>
                    </div>

                    <div class="input-group">
                        <div class="form-line">
                            EXPENSE AMOUNT<input type="number" class="form-control" name="expense_amount" placeholder="$100" value="<?php echo $expense_amount; ?>"required autofocus>
                        </div>
                    </div>
                    <div class="input-group">
                        <div class="form-line">
                            DATE<input type="date" class="form-control" name="expense_date" placeholder="Date" value="<?php echo $expense_date; ?>">
                        </div>
                    </div>
<!-- sin in -->                      
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