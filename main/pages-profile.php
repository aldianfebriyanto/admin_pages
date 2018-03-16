<?php 
    require_once('login/config.php');
    session_start();
    if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
        header("Location: login/index.php");
        exit;
    }
?>

            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h1 class="text-themecolor">Profile</h1>
                        
                    </div>
                    
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <!-- Row -->
                <div class="row">
                    <!-- Column -->
                    <div class="col-lg-4 col-xlg-3 col-md-5">
                        <div class="card">
                            <div class="card-body">
                                <?php
                                        if($_SESSION['username'])
                                        { 
                                            $session = $_SESSION['username'];
                                            $sql = mysqli_query($link, "SELECT * FROM `biodata_it` where `username` = '$session' ");
                                            $show = mysqli_fetch_assoc($sql);
                                        }?>
                                <center class="m-t-30"> <img src="assets/images/users/login.png" class="img-circle" width="150" />
                                    <h4 class="card-title m-t-10"><?php echo $show['username']; ?></h4>
                                    <h5 class="card-title m-t-10"><?php echo $show['position']; ?></h5>
                                    <h5 class="card-title m-t-10"><?php echo $show['division']; ?></h5>
                                    <div class="row text-center justify-content-md-center">
                                        <div class="col-4"><a href="javascript:void(0)" class="link"><i class="icon-people"></i> <font class="font-medium"><?php echo $show['nik']; ?></font></a></div>
                                    </div>
                                </center>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-lg-8 col-xlg-9 col-md-7">
                        <div class="card">
                            <!-- Tab panes -->
                            <div class="card-body">
                                <form class="form-horizontal form-material">
                                    <div class="form-group">


                                        
                                    <?php
                                        if($_SESSION['username'])
                                        { 
                                            $session = $_SESSION['username'];
                                            $sql = mysqli_query($link, "SELECT * FROM `biodata_it` where `username` = '$session' ");
                                            $show = mysqli_fetch_assoc($sql);
                                        }?> <!-- DIBAWAH INI -->







                                        <label class="col-md-12">Name</label>
                                        <div class="col-md-12">
                                            <h4><?php echo $show['fname']." ". $show ['lname']; ?></h4>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="example-email" class="col-md-12">Email</label>
                                        <div class="col-md-12">
                                            <h4><?php echo $show['email']; ?></h4>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="col-md-12">Phone Number</label>
                                        <div class="col-md-12">
                                            <h4><?php echo $show['phone']; ?></h4>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                </div>
                <!-- Row -->
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer text-center">© 2018 KFC Admin Page by error 404</footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="static/js/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/0.8.1/js/perfect-scrollbar.jquery.js"></script>
    <!--Wave Effects -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/node-waves/0.7.6/waves.js"></script>
    <!--Menu sidebar -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-sidebar/3.3.2/jquery.sidebar.js"></script>
    <!--Custom JavaScript -->
    <script src="js/custom.min.js"></script>
</body>

</html>