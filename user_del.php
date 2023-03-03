<?php include 'config.php' ?>
<?php

 if(isset($_POST['id']) ){ 

    $user_id = $_POST['id'];
$sql = "UPDATE user_registration SET user_status = 'inactive'
     WHERE user_id = '$user_id'";
    if(mysqli_query($conn, $sql)){
        $out = array ( 'type' => 'success');
        echo json_encode($out);
    } 
 }
?>
