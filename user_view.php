<?php include 'header.php'?>
<?php include 'config.php' ?>

<?php
 $sql = "SELECT * FROM user_registration WHERE user_status ='active'";
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
                               USERS
                            </h2>
                        </div>
                        <div class="body">
                            <!-- Alerts -->
                              <?php
                        if(isset($_SESSION['user_success_message']) && !empty($_SESSION['user_success_message'])){
                            ?>
                        <div class="alert bg-green alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                               <?php echo $_SESSION['user_success_message']; ?>
                            </div>
                        <?php
                        unset($_SESSION['user_success_message']);
                        }

                        ?>
                    
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>User Name</th>
                                            <th>Age</th>
                                            <th>DOB</th>
                                            <th>Adderss</th>
                                            <th>Aadhaar</th>
                                            <th>Events</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php

                                        while($data = $result->fetch_array()) {
                                            $name = $data['user_name'];
                                            $id = $data['user_id'];
                                        
                                            echo '
                                                <tr>
                                                    <td align="center">'.$name.'</td>
                                                    <td align="center">'.$data['user_age'].'</td>
                                                    <td align="center">'.$data['user_dob'].'</td>
                                                    <td align="center">'.$data['user_address'].'</td>
                                                    <td align="center">'.$data['user_aadhaar'].'</td>
                                                    <td align="center">'.$data['event_id'].'</td>
                                                    <td align="center"><button onclick="edituser(\'' . $id . '\')">Edit</button>  <button onclick="deleteuser(\'' . $name . '\',\'' . $id . '\')">Delete</button></td>
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
<script type="text/javascript">
   function edituser(data){
    window.location.href="user_edit.php?id="+data;
    }
 function deleteuser(name,id){
     {
    console.log(id);
    var x = confirm("Are you sure you want to delete "+ name +"?");
    if (x){
        if(id){
            $.ajax({
                type: 'POST',
                url:'/nethaji_club/Admin/user_del.php',
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
  }
</script>
 <?php include 'footer.php'?>