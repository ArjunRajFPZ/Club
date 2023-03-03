<?php include 'config.php' ?>
<?php

if(isset($_POST['id'])){

	$expense_id = $_POST['id'];
$sql = "UPDATE expense SET expense_status = 'inactive' 
WHERE expense_id = '$expense_id'";
	if(mysqli_query($conn, $sql)){
        $out = array ( 'type' => 'success');
        echo json_encode($out);
	}
}
?>