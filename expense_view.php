<?php include 'header.php'?>
<?php include 'config.php' ?>

<?php
 $sql = "SELECT * FROM expense WHERE expense_status ='active'";
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
                               EXPENSE VIEW
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
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>Sl NO</th>
                                            <th>Item Name</th>
                                            <th>Amount</th>
                                            <th>Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php

                                        while($data = $result->fetch_array()) {
                                            $name = $data['expense_item'];
                                            $id = $data['expense_id'];
                                            echo '
                                                <tr>
                                                    <td align="center">'.$data['expense_id'].'</td>
                                                    <td align="center">'.$data['expense_item'].'</td>
                                                    <td align="center">'.$data['expense_amount'].'</td>
                                                    <td align="center">'.$data['expense_date'].'</td>
                                                    <td align="center"><button onclick="editexpense(\'' . $id . '\')">Edit</button>  <button onclick="deleteexpense(\'' . $name . '\',\'' . $id . '\')">Delete</button></td>
                                                </tr>
                                            ';
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
<script>
   function editexpense(data){
    window.location.href="expense_edit.php?id="+data;
    }

    function deleteexpense(name,id){
        
        console.log(id);
        var x= confirm("Are you sure you want to delete "+ name +"?");
        if(x){
            if(id){
                $.ajax({
                    type: 'POST',
                    url:'/nethaji_club/Admin/expense_del.php',
                    data: {id: id},
                    dataType:"json",
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
