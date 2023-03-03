<?php include 'config.php' ?>

<?php
session_start();
$user_name = '';
$user_age = '';
$user_dob = '';
$user_gender = '';
$user_address = '';
$user_phone = '';
$user_email = '';
$user_aadhaar = '';
$user_photo = '';
$user_id_proof = '';
$login_name = '';                                 
$user_password = '';
$confirm_password = '';
$registration_fee = '';
$payment_month = '';
$event_id = '';


$event_sql = "SELECT * FROM event";
$event_result = mysqli_query($conn, $event_sql);

if(isset($_POST['submit'])){

$user_name = $_POST['user_name'];
$user_age = $_POST['user_age'];
$user_dob = $_POST['user_dob'];
$user_gender = $_POST['user_gender'];
$user_address = $_POST['user_address'];
$user_phone = $_POST['user_phone'];
$user_email = $_POST['user_email'];
$user_aadhaar = $_POST['user_aadhaar'];
$login_name = $_POST['login_name'];
$user_password = $_POST['user_password'];
$confirm_password = $_POST['confirm_password'];
$registration_fee = $_POST['registration_fee'];
$event1 = $_POST['event_id']; 
foreach($event1 as $event12)  
   {  
      $event_id .= $event12.",";  
   }



$payment_month = date("Y-m-d",$Current_date);;

if(isset($_POST['user_name']) && !empty($_POST['user_name']) && 
   isset($_POST['user_age']) && !empty($_POST['user_age']) &&
   isset($_POST['user_dob']) && !empty($_POST['user_dob']) &&
   isset($_POST['user_gender']) && !empty($_POST['user_gender']) &&
   isset($_POST['user_address']) && !empty($_POST['user_address']) &&
   isset($_POST['user_phone']) && !empty($_POST['user_phone']) &&
   isset($_POST['user_email']) && !empty($_POST['user_email']) &&
   isset($_POST['user_aadhaar']) && !empty($_POST['user_aadhaar']) &&
   isset($_POST['login_name']) && !empty($_POST['login_name']) &&
   isset($_POST['user_password']) && !empty($_POST['user_password']) &&
   isset($_POST['confirm_password']) && !empty($_POST['confirm_password']) &&
   isset($_POST['registration_fee']) && !empty($_POST['registration_fee'])){



    if (empty($_FILES['user_photo']['tmp_name']) && !file_exists($_FILES['user_photo']['tmp_name'])&&
        (empty($_FILES['user_id_proof']['tmp_name']) && !file_exists($_FILES['user_id_proof']['tmp_name']))) {
       $_SESSION['error_message'] = "Please upload file";
    }else{ 

    $filename = $_FILES["user_photo"]["name"];
    $tempname = $_FILES["user_photo"]["tmp_name"];    
    $folder = "image/photo/".$filename;

    $idfilename = $_FILES["user_id_proof"]["name"];
    $idtempname = $_FILES["user_id_proof"]["tmp_name"];    
    $idfolder = "image/idproof/".$idfilename;


    if($_POST['user_password'] == $_POST['confirm_password']){
        //INSERT DATA
        $sql = "INSERT INTO user_registration (user_name,user_age,user_dob,user_gender,user_address,user_phone,user_email,user_aadhaar,user_photo,user_id_proof,login_name,user_password,registration_fee,event_id,user_type,user_status)
        VALUES ('$user_name','$user_age','$user_dob','$user_gender','$user_address','$user_phone','$user_email','$user_aadhaar','$filename','$idfilename','$login_name','$user_password','$registration_fee','$event_id','user','active')";

        if ($conn->query($sql) === TRUE){
          
          $last_id = $conn->insert_id;
          $sql1 = "INSERT INTO payment_registration (user_id,payment_fee,registration_fee_type,payment_month,payment_status) VALUES ('$last_id','$registration_fee','registration_fee','$payment_month','active')";

         if ($conn->query($sql1) === TRUE){
           // Now let's move the uploaded image into the folder: image
          if ((move_uploaded_file($tempname, $folder))&&
             (move_uploaded_file($idtempname, $idfolder)))  {
              //session_start();
              $_SESSION['success_message'] = "Form Successfully Submitted";
              header("Location:login.php");
              exit;
          }else{
             //session_start();
              $_SESSION['error_message'] = "Error while file uploading";
           }

         }else{
          echo "Error: " . $sql . "<br>" . $conn->error;
         }
       
        } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    }else{
         $_SESSION['form_error_message'] = "password mismatch";
    }
    }
}else{
    $_SESSION['error_message'] = "All Fields are required";

}
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Sign Up</title>
    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body class="signup-page">
    <div class="signup-box">
        <div class="logo">
            <a href="javascript:void(0);"><b>Registration</b></a>
        </div>
        <div class="card">
            <div class="body">
<!-- Alerts -->
                    <?php
                        if(isset($_SESSION['form_error_message']) && !empty($_SESSION['form_error_message'])){
                            ?>
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                          <?php echo $_SESSION['form_error_message']; ?>
                        </div>  
                        <?php
                        unset($_SESSION['form_error_message']);
                        }

                        ?>
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
<!-- name -->
                    <div class="input-group">
                        <div class="form-line">
                            NAME<input type="text" class="form-control" name="user_name" placeholder="Name" value="<?php echo $user_name; ?>"required autofocus>
                        </div>
                    </div>
<!-- ae -->
                      <div class="input-group">
                        <div class="form-line">
                            AGE<input type="text" class="form-control" name="user_age" placeholder="age" value="<?php echo $user_age; ?>">
                        </div>
                    </div>
<!-- dob -->
                      <div class="input-group">
                        <div class="form-line">
                            DOB<input type="date" class="form-control" name="user_dob" placeholder="Date of birth" value="<?php echo $user_dob; ?>">
                        </div>
                    </div>
<!-- gender -->
                    <div class="input-group">
                        <div class="form-line">
                            GENDER
                         <select class="form-control"  id="sel1" name="user_gender">
                            <option value="">Select Gender</option>
                           <option value="male" <?php if ($user_gender == 'male') echo ' selected="selected"'; ?>>Male</option>
                            <option value="female" <?php if ($user_gender == 'female') echo ' selected="selected"'; ?>>Female</option>
                             <option value="transgender" <?php if ($user_gender == 'transgender') echo ' selected="selected"'; ?>>Transgender</option>
                          </select>
                        </div>
                    </div>
<!-- address -->                     
                    <div class="input-group">                      
                        <div class="form-line">

                            ADDRESS<textarea class="form-control" name="user_address" placeholder="Address"><?php echo $user_address; ?></textarea>

                        </div>
                    </div>
<!-- phone -->
                    <div class="input-group">
                        <div class="form-line">
                            PHONE<input type="number" class="form-control" name="user_phone" placeholder="1234567890" value="<?php echo $user_phone; ?>" required>
                        </div>
                    </div>
<!-- email -->                    
                     <div class="input-group">
                        <div class="form-line">
                            EMAIL<input type="email" class="form-control" name="user_email" placeholder="Email" value="<?php echo $user_email; ?>"required>
                        </div>
                    </div>
<!-- aadhaar -->
                      <div class="input-group">
                        <div class="form-line">
                            AADHAAR<input type="number" class="form-control" name="user_aadhaar" placeholder="Aadhaar number" value="<?php echo $user_aadhaar; ?>"required>
                        </div>
                    </div>
<!-- photo -->
 					
                     <div class="form-group">
                         <div class="form-line">
                                 PHOTO<input type="file" class="form-control" name="user_photo">
                         </div>
                     </div>
                                
<!-- id proof -->
                     <div class="form-group">
                         <div class="form-line">
                                 ID PROOF<input type="file" class="form-control" name="user_id_proof">
                         </div>
                     </div>
<!-- login name -->
                    <div class="input-group">
                        <div class="form-line">
                            USERNAME<input type="text" class="form-control" name="login_name" placeholder="User Name" value="<?php echo $login_name; ?>" required >
                        </div>
                    </div>                   
<!-- password -->
                     <div class="input-group">
                        <div class="form-line">
                            PASSWORD<input type="password" class="form-control" name="user_password" placeholder="Password" value="<?php echo $user_password; ?>" required>
                        </div>
                    </div> 
                   <div class="input-group">
                        <div class="form-line">
                             CONFIRM PASSWORD<input type="password" class="form-control" name="confirm_password" placeholder="Password" value="<?php echo $confirm_password; ?>"required>
                        </div>
                    </div>
<!-- fee -->
                    <div class="input-group">
                        <div class="form-line">
                            REGISTRATION FEE<input type="number" min="100" class="form-control" name="registration_fee" placeholder="₹100" value="<?php echo $registration_fee; ?>"required autofocus>
                        </div>
                    </div>
<!-- checkbox -->
                    <?php 
                      if ($event_result->num_rows > 0) {
                        // output data of each row
                        while($row = $event_result->fetch_assoc()) {
                          echo '<div class="input-group" style="margin-bottom:0px;">
                      <input type="checkbox" id="'. $row["event_id"].'" value="'. $row["event_id"].'" name="event_id[]">
                      <label for="'. $row["event_id"].'">'. $row["event_name"].'</label><br>
                      </div>';
                          //echo "id: " . $row["event_id"]. " - Name: " . $row["event_name"]. "<br>";
                        }
                      }

                      ?>
                    <!--   <div class="input-group">
                      <input type="checkbox" id="event" value="1" name="event_id[]">
                      <label for="event">cricket</label><br>
                      <input type="checkbox" id="remember_me" value="2" name="event_id[]">
                      <label for="remember_me">football</label><br>
                      </div> -->
<!-- sin in -->                      
                    <button class="btn btn-block btn-lg bg-pink waves-effect" name="submit" type="submit">SIGN UP</button>

                    <div class="m-t-25 m-b--5 align-center">
                        <a href="login.php">Already a member?</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Jquery Core Js -->
    <script src="plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="plugins/node-waves/waves.js"></script>

    <!-- Validation Plugin Js -->
    <script src="plugins/jquery-validation/jquery.validate.js"></script>

    <!-- Custom Js -->
    <script src="js/admin.js"></script>
    <script src="js/pages/examples/sign-up.js"></script>
</body>

</html>