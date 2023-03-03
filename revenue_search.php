<?php include 'config.php' ?>
<?php

 if(isset($_POST['fromdate']) && isset($_POST['todate']) ){ 

	$fromdate=$_POST["fromdate"];
	$todate=$_POST["todate"];
    $sql = "SELECT * FROM payment_registration JOIN user_registration ON
            payment_registration.user_id=user_registration.user_id WHERE date(payment_month) between '$fromdate' and '$todate'";
    $result = mysqli_query($conn,$sql);

    if($result->num_rows>0){
    $rows = array();
     $total = 0;
     $registration_fee = 0;
     $monthly_fee = 0;
    while($data = mysqli_fetch_assoc($result)){
        	 $total += $data['payment_fee'];
        	if($data['registration_fee_type'] == 'registration_fee'){
        		$registration_fee += $data['payment_fee'];
        	}
        	if($data['registration_fee_type'] == 'monthly_fee'){
        		$monthly_fee += $data['payment_fee'];
        	}
    }
    $out = array ( 'type' => 'success',
                    'total' => $total,
                    'registration' => $registration_fee,
                    'monthly' => $monthly_fee
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
