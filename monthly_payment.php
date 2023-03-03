<?php include 'header.php'?>
<?php include 'config.php' ?>


<section class="content">
        <div class="container-fluid">
<!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                               MONTHLY USER PAYMENTS
                            </h2>
                        </div>

                        <div class="body">

<!-- form -->              
                <form action="" method="POST" enctype="multipart/form-data" >

          <div class="row">
            	<div class="col-md-4">
            		<!-- start date -->
                   			<div class="input-group">
                        <div class="form-line">
                            START DATE<input type="date" class="form-control" name="start_date" id="fromdate" value="" >
                        </div>
                    </div>
            	</div>
            	<div class="col-md-4">
            		<!-- end date -->
                    <div class="input-group">
                        <div class="form-line">
                            END DATE<input type="date" class="form-control" name="end_date" id="todate" value=""  >
                        </div>
                    </div>

            	</div>
            	<div class="col-md-4">
            		<input type="button" onclick="showUser()" value="SEARCH" />
            	</div>
            </div>   
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



            <!-- #END# Basic Examples -->
    </div>
</section>
<script type="text/javascript">
    
function showUser(){
    var fromdate = $( "#fromdate" ).val();
 	var todate= $( "#todate" ).val();
    console.log(fromdate);
    console.log(todate);
    if (fromdate && todate) {
    $.ajax({
    	type: 'POST',
    	url: '/nethaji_club/Admin/date_search.php',
    	data: {fromdate: fromdate,todate: todate},
    	dataType: "json",
    	success: function (response) {
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
                      '<button onclick="edittrigger('+value.payment_id+')">Edit</button>'
                    ]);

                 row++;
              });
            } else{
                alert("error");
              }
            
           },
           
    });
}
}
function edittrigger(id){
window.location.href="payment_edit.php?id="+id;
}

</script>
<?php include 'footer.php'?>