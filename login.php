<?php include 'config.php' ?>
<?php 
session_start(); 

if(isset($_POST['submit'])){
$login_name = $_POST['login_name'];
$user_password = $_POST['user_password'];


    $sql="SELECT * FROM user_registration WHERE (login_name='$login_name' AND  user_password='$user_password');";
    $res=$conn->query($sql);
    if ($res->num_rows > 0){
    $mydata=$res->fetch_assoc();


    session_start();
    $_SESSION['user_id'] = $mydata["user_id"];
    $_SESSION['user_email'] = $mydata["user_email"];
    $_SESSION['user_type'] = $mydata["user_type"];
    $_SESSION['user_name'] =$mydata["user_name"];
    header("Location: index.php");             
    }else{
    $_SESSION['error_login'] = "UserName or Password Does Not Exist";
    }

}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Log In</title>
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

<body class="login-page">
    <div class="login-box">
        <div class="logo">
            <a href="javascript:void(0);"><b>login</b></a>
        </div>
        <div class="card">
            <div class="body">
<!-- Error Login -->
                        <?php
                        if(isset($_SESSION['error_login']) && !empty($_SESSION['error_login'])){
                            ?>
                    <!-- Alerts -->
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            <button type="button" class="close" style="background-color:#a94442;colo0r: white;"data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                          <?php echo $_SESSION['error_login']; ?>
                        </div>  
                        <?php
                        unset($_SESSION['error_login']);
                        }

                        ?>

                <form action="" method="POST">
                    <div class="input-group">

                        <div class="form-line">
                            USERNAME<input type="text" class="form-control" name="login_name" placeholder="Username" required autofocus>
                        </div>
                    </div>
                    <div class="input-group">
                        <div class="form-line">
                            PASSWORD<input type="password" class="form-control" name="user_password" placeholder="Password" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <button class="btn btn-block bg-pink waves-effect" type="submit" name="submit">SIGN IN</button>
                        </div>
                    </div>
                    <div class="row m-t-15 m-b--20">
                        <div class="col-xs-6">
                            <a href="sign_up.php">Register Now!</a>
                        </div>
                        <div class="col-xs-6 align-right">
                            <a href="forgot-password.php">Forgot Password?</a>
                        </div>
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

</body>

</html>
