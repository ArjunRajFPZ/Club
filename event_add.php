<?php
ob_start();
?>

<?php include 'header.php'?>
<?php

$event_name = '';

if(isset($_POST['submit'])){

$event_name = $_POST['event_name'];

if(isset($_POST['event_name']) && !empty($_POST['event_name'])){

        $sql = "INSERT INTO event (event_name,event_status)
        VALUES ('$event_name','active')";
        if ($conn->query($sql) === TRUE) {
        session_start();
        $_SESSION['success_message'] = "Event Successfully Submitted";
        header("Location:event_view.php");
        exit;
        } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
}    
}   
?>

<section class="content">
        <div class="container-fluid">
<!-- Horizontal Layout -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                              EVENT ADD
                            </h2>
                        </div>
                        <div class="body">
<!-- Alerts -->                
                   
                        
<!-- form -->              
                <form action="" method="POST" >

                     <div class="input-group">
                        <div class="form-line">
                            EVENT NAME<input type="text" class="form-control" name="event_name" placeholder="Enter Event Name" value="<?php echo $event_name; ?>"required>
                        </div>
                    </div>
<!-- sin in -->                      
                    <button class="btn btn-block btn-lg bg-pink waves-effect" name="submit" type="submit">ENTER</button>

                </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Horizontal Layout -->
    </div>
</section>

<?php include 'footer.php'?>