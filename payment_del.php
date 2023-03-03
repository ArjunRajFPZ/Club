<?php include 'config.php' ?>
<?php

 if(isset($_POST['id']) ){ 

    $payment_id = $_POST['id'];
$sql = "UPDATE payment_registration SET payment_status = 'inactive'
     WHERE payment_id = '$payment_id'";
    if(mysqli_query($conn, $sql)){
        $out = array ( 'type' => 'success');
        echo json_encode($out);
    } 
 }
?>