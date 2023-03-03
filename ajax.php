<?php include 'config.php' ?>
<?php

 if(isset($_POST['user_id']) ){ 

    $id = $_POST['user_id'];
    $sql = "SELECT * FROM payment_registration JOIN user_registration ON
            payment_registration.user_id=user_registration.user_id WHERE (payment_registration.user_id=$id) AND (payment_status ='active')";
    $result = mysqli_query($conn, $sql);

    if($result->num_rows>0){
    $rows = array();
    while($data = mysqli_fetch_assoc($result)){
        $rows[] = $data;
    }
    $out = array ( 'type' => 'success',
                    'data' => $rows
                    );
        echo json_encode($out);
        exit();
     }else{
        $out = '{"type":"failure"}';
        echo json_encode($out);
        exit();
     }
    //echo json_encode($out);
    
}

?>