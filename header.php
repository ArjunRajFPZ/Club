 <?php include 'config.php' ?>
<?php 
if (!isset($_SESSION) || !is_array($_SESSION)) {
    session_start();
  }
if(!isset($_SESSION['user_id'])){
header("Location: login.php"); 
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Admin</title>
    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <!-- <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css"> -->
   <!--  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css"> -->

    <!-- Bootstrap Core Css -->
    <link href="plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Bootstrap Select Css -->
    <link href="plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />

    <!-- Bootstrap Material Datetime Picker Css -->
    <link href="plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet" />

    <!-- Bootstrap DatePicker Css -->
    <link href="plugins/bootstrap-datepicker/css/bootstrap-datepicker.css" rel="stylesheet" />

    <!-- JQuery DataTable Css -->
    <link href="plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">
    <!-- Morris Chart Css-->
    <link href="plugins/morrisjs/morris.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="css/style.css" rel="stylesheet">
     <link href="css/font.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="css/themes/all-themes.css" rel="stylesheet" />
    <style type="text/css">
        li.active a {
            color: red !important;
        }
        .input-group .form-control {
            position: unset;
            z-index: 0;
        }
        .bootstrap-select{
            border-bottom: none !important;
        }
        #myDIV {
          width: 100%;
          padding: 50px 0;
          text-align: center;
          background-color: #ffffff;
          margin-top: 20px;
        }
    </style>
</head>

<body class="theme-red">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->

    <section>


        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">                                                                                                            
                <div class="image">
                    <img src="user image/user.png" width="48" height="48" alt="User" />
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['user_name']; ?></div>
                    <div class="email"><?php echo $_SESSION['user_email']; ?></div>
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="logout.php"><i class="material-icons">input</i>Sign Out</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <?php 
                $activePage = basename($_SERVER['PHP_SELF'], ".php");
            ?>

            <div class="menu">
                <ul class="list">
                    <li class="<?= ($activePage == 'index') ? 'active':''; ?>">
                        <a href="index.php">
                            <i class="material-icons">home</i>
                            <span>Home</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle <?= ($activePage == 'event_view' || $activePage == 'event_add') ? 'toggled':''; ?>">
                            <i class="material-icons">map</i>
                            <span>EVENT</span>
                        </a>
                        <ul class="ml-menu">
                            <li class="<?= ($activePage == 'event_add') ? 'active':''; ?>">
                                <a href="event_add.php">Event Add</a>
                            </li>
                            <li class="<?= ($activePage == 'event_view') ? 'active':''; ?>">
                                <a href="event_view.php">Event View</a>
                            </li>
                            
                        </ul>
                    </li>
                    <li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle <?= ($activePage == 'user_view' || $activePage == 'user_add') ? 'toggled':''; ?>">
                            <i class="material-icons">people</i>
                            <span>USER</span>
                        </a>
                        <ul class="ml-menu">
                            <li class="<?= ($activePage == 'user_add') ? 'active':''; ?>">
                                <a href="user_add.php">Add User</a>
                            </li>
                            <li class="<?= ($activePage == 'user_view' || $activePage == 'user_edit') ? 'active':''; ?>">
                                <a href="user_view.php">User View</a>
                            </li>
                            
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle <?= ($activePage == 'new_payment' || $activePage == 'search' || $activePage == 'expense' || $activePage == 'expense_view' || $activePage == 'monthly_payment') ? 'toggled':''; ?>">
                            <i class="material-icons">insert_comment</i>
                            <span>PAYMENT</span>
                        </a>
                        <ul class="ml-menu">
                            <li class="<?= ($activePage == 'new_payment') ? 'active':''; ?>">
                                <a href="new_payment.php">User Payment Add</a>
                            </li>
                            <li class="<?= ($activePage == 'search' || $activePage == 'payment_edit') ? 'active':''; ?>">
                                <a href="search.php">User Payment View</a>
                            </li>
                            <li class="<?= ($activePage == 'expense') ? 'active':''; ?>">
                                <a href="expense.php">Expenditure Add</a>
                            </li>
                            <li class="<?= ($activePage == 'expense_view' || $activePage == 'expense_edit') ? 'active':''; ?>">
                                <a href="expense_view.php">Expenditure View</a>
                            </li>
                            <li class="<?= ($activePage == 'monthly_payment') ? 'active':''; ?>">
                                <a href="monthly_payment.php">Monthly User Payments</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="javascript:void(0);" class="menu-toggle <?= ($activePage == 'revenue') ? 'toggled':''; ?>">
                            <i class="material-icons">assignment</i>
                            <span>ACCOUNTS</span>
                        </a>
                        <ul class="ml-menu">
                            <li class="<?= ($activePage == 'revenue') ? 'active':''; ?>">
                                <a href="revenue.php">Revenue</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal" style="text-align: center;">
                <div class="copyright">
                    &copy; 2020 - 2021 <a href="javascript:void(0);">NETHAJI CLUB</a>.
                </div>
            </div>
            <!-- #Footer -->
        </aside>
                <!-- #END# Left Sidebar -->
    </section>
