<?php include 'config.php' ?>
<?php

 if(isset($_POST['fromdate']) && isset($_POST['todate']) ){ 

	$fromdate=$_POST["fromdate"];
	$todate=$_POST["todate"];
    $sql = "SELECT * FROM payment_registration JOIN user_registration ON
            payment_registration.user_id=user_registration.user_id WHERE date(payment_month) between '$fromdate' and '$todate'";
    $result = mysqli_query($conn,$sql);

    if(code here ){
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