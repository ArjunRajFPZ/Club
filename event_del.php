<?php include 'config.php' ?>
<?php

 if(isset($_POST['id']) ){ 

    $event_id = $_POST['id'];
$sql = "UPDATE event SET event_status = 'inactive'
     WHERE event_id = '$event_id'";
    if(mysqli_query($conn, $sql)){
        $out = array ( 'type' => 'success');
        echo json_encode($out);
    } 
    
        
       
 }
?>
