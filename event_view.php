<?php include 'header.php'?>
<?php include 'config.php' ?>

<?php
 $sql = "SELECT * FROM event WHERE event_status ='active'";
 $result = mysqli_query($conn, $sql);
 ?>

<section class="content">
        <div class="container-fluid">
<!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                               EVENTS
                            </h2>
                        </div>
                        <div class="body">
                    <!-- Alerts -->
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
                     
                            <div class="table-responsive">
                                <table class="table table-borderede table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>Sl No.</th>
                                            <th>Event Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                          $counter=1;
                                        while($data = $result->fetch_array()) {
                                            $name = $data['event_name'];
                                            $id = $data['event_id'];
                                            echo '
                                                <tr>
                                                    <td align="center">'.$counter.'</td>
                                                    <td align="center">'.$name.'</td>
                                                    <td align="center"><button onclick="deletevent(\'' . $name . '\',\'' . $id . '\')">Delete</button></td>
                                                </tr>
                                            ';
                                            $counter++;
                                        }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Basic Examples -->
    </div>
</section>
<script type="text/javascript">
   function deletevent(name,id)
{
    console.log(id);
    var x = confirm("Are you sure you want to delete "+ name +"?");
      if (x){
          if (id) {
        $.ajax({
           type: 'POST',
           url:'/nethaji_club/Admin/event_del.php',
           data: {id: id},
           //contentType: "application/json",
            dataType: "json",
            success: function (response) {
            if(response.type == 'success'){
                
                window.location.reload();
            }            
           
        }
          });
    }
      }else
        return false;
}
    
</script>

 <?php include 'footer.php'?>
