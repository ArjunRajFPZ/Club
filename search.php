<?php
ob_start();
?>

<?php include 'header.php'?>
<?php include 'config.php' ?>


<?php
 $user_sql = "SELECT * FROM user_registration WHERE user_status ='active'";
 $user_result = mysqli_query($conn, $user_sql);


 ?>
<section class="content">
        <div class="container-fluid">
<!-- Horizontal Layout -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                              USER PAYMENT SEARCH
                            </h2>
                        </div>
                        <div class="body">
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
                <form action="" enctype="multipart/form-data" >
<!-- USER -->
                    
                    <div class="input-group">
                     <div class="form-line">
                     User Name
                      <select class="form-control"  id="user_id" name="user_id">
                        <option value="">Select User</option>
                    <?php
                    if ($user_result->num_rows > 0) {
                    while($row = $user_result->fetch_assoc()) {
                    echo '<option value="' . $row['user_id'] . '">' . $row['user_name'] . '</option>';
                     }
                    }

                    ?>
                      </select>
                     </div>
                    </div>

<!-- Submit -->                  
                    <input type="button" onclick="test()" value="SEARCH" />
                    
                </form>

                <div id="myDIV">
                    <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example1 dataTable" id="SearchTable">
                                  <thead>
                                    <tr>
                                      <th>Sl No</th>
                                      <th>User Name</th>
                                      <th>Fee Type</th>
                                      <th>Amount</th>
                                      <th>Actions</th>
                                    </tr>
                                  </thead>
                                </table>
                            </div>
                    </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Horizontal Layout -->
    </div>
</section>
<script type="text/javascript">
    
function test(){
    var user_id = document.getElementById('user_id').value;
    if (user_id) {
        $.ajax({
           type: 'POST',
           url:'/nethaji_club/Admin/ajax.php',
           data: {user_id: user_id},
           //contentType: "application/json",
            dataType: "json",
            success: function (response) {
            console.log(response.data)
            if(response.type == 'success'){
              var len = response.data;
              $("#SearchTable").DataTable().clear();
              var row = 1;
              $.each(response.data, function (index, value) {
                  $('#SearchTable').dataTable().fnAddData( [
                      row,
                      value.user_name,
                      value.registration_fee_type ? value.registration_fee_type =='registration_fee' ? 'Registration Fees' : 'Monthly Fees' : '',
                      value.payment_fee,
                      '<button onclick="edittrigger('+value.payment_id+')">Edit</button> <button onclick="deletetrigger('+value.payment_id+')">Delete</button>'
                    ]);

                 row++;
              });
            } else{
                alert("error");
              }
            
           },
           error: function(jqXHR, exception) {
            if (jqXHR.status === 0) {
                alert('Not connect.\n Verify Network.');
            } else if (jqXHR.status == 404) {
                alert('Requested page not found. [404]');
            } else if (jqXHR.status == 500) {
                alert('Internal Server Error [500].');
            } else if (exception === 'parsererror') {
                alert('Requested JSON parse failed.');
            } else if (exception === 'timeout') {
                alert('Time out error.');
            } else if (exception === 'abort') {
                alert('Ajax request aborted.');
            } else {
                alert('Uncaught Error.\n' + jqXHR.responseText);
            }
        }
          });
        
    }else{
      alert("User not selected");
    }
}

function edittrigger(id){
window.location.href="payment_edit.php?id="+id;
}

function deletetrigger(id){
     
    console.log(id);
    var x = confirm("Are you sure you want to delete ?");
    if (x){
        if(id){
            $.ajax({
                type: 'POST',
                url:'/nethaji_club/Admin/payment_del.php',
                data: {id: id},
                dataType: "json",
                success: function(response){
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