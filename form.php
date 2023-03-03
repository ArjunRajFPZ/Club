  <?php include 'header.php'?>

    <section class="content">
        <div class="container-fluid">
  <!-- Horizontal Layout -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                               FORM
                            </h2>
                        </div>
                        <div class="body">
                            <!-- Alerts -->
                            <div class="alert alert-danger alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                             All Fields are required
                            </div>

                            <div class="alert bg-green alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                               Form Successfully Submitted
                            </div>
                        <!-- Alerts -->
                        <!-- Form -->
                            <form class="form-horizontal">
                                <!-- Email start-->
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="email_address">Email Address</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="email_address" class="form-control" placeholder="Enter your email address">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Email ENd -->
                                <!-- password start -->
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="password">Password</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="password" id="password" class="form-control" placeholder="Enter your password">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- password end -->
                                <!-- select start -->
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="select">Select</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <select class="form-control show-tick" id="select">
                                                    <option value="">-- Please select --</option>
                                                    <option value="10">10</option>
                                                    <option value="20">20</option>
                                                    <option value="30">30</option>
                                                    <option value="40">40</option>
                                                    <option value="50">50</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <!-- select end -->
                            <!-- date start -->
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="date">Date</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line" id="bs_datepicker_container">
                                            <input type="text" id="date" class="form-control" placeholder="Please choose a date...">
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            <!-- date end -->
                            <!-- datetime start -->
                              <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="datetime">DateTime</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                            <input type="text" id="datetime" class="datetimepicker form-control" placeholder="Please choose date & time...">
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            <!-- datetime end --> 
                            <!-- radio start -->
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="radio">Radio</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                             <div class="demo-radio-button">
                                                <input name="group1" type="radio" id="radio_1" checked />
                                                <label for="radio_1">Radio - 1</label>
                                                <input name="group1" type="radio" id="radio_2" />
                                                <label for="radio_2">Radio - 2</label>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        <!-- radio end -->
                        <!-- textare start -->
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="textarea">TextArea</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-line">
                                            <textarea rows="4" class="form-control no-resize" id="textarea" placeholder="Please type what you want..."></textarea>
                                        </div>
                                    </div>
                                </div>
                             <!-- textarea end --> 
                             <!-- file start -->      
                            <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="file">File Upload</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                            <input type="file" class="form-control">
                                        </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- file ennd -->
                                <!-- checkbox start -->
                                <div class="row clearfix">
                                    <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                                        <input type="checkbox" id="remember_me_3" class="filled-in">
                                        <label for="remember_me_3">Remember Me</label>
                                    </div>
                                </div>
                                <!-- checkbox end -->
                                <!-- button start -->
                                <div class="row clearfix">
                                    <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                                        <button type="button" class="btn btn-primary m-t-15 waves-effect">Submit</button>
                                    </div>
                                </div>
                                <!-- button end -->
                            </form>
                            <!-- form ENd -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Horizontal Layout -->
    </div>
</section>
<?php include 'footer.php'?>
