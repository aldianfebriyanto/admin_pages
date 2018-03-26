<?php 
    require_once('login/config.php');
    session_start();
    var_dump($_SESSION);
    if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
        echo "<script> alert('Harap Login Dahulu')</script>";
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
                                           $count=$dbo->prepare("select * from plus_signup where username='$_SESSION[username]'");
                                            if(!($count->execute())){
                                            echo "Database Problem ";
                                            exit;
                                            }else{
                                            $show = $count->fetch(PDO::FETCH_OBJ);
                                            }
                                        }?>
                                <center class="m-t-30"> <img src="assets/images/users/login.png" class="img-circle" width="150" />
                                    <h4 class="card-title m-t-10"><?php echo $show->username; ?></h4><br>
                                    <h3 class="card-title m-t-10"><?php echo $show->division; ?></h3><br>
                                    <div class="row text-center justify-content-md-center">
                                    <!--<div class="col-4"><a href="javascript:void(0)" class="link"><i class="icon-people"></i> <font class="font-medium"><?php //echo $show['mem_id']; ?></font></a></div>-->
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
                                           $count=$dbo->prepare("select * from plus_signup where username='$_SESSION[username]'");
                                            if(!($count->execute())){
                                            echo "Database Problem ";
                                            exit;
                                            }else{
                                            $show = $count->fetch(PDO::FETCH_OBJ);
                                            }
                                        }?> <!-- DIBAWAH INI -->

                                        <label class="col-md-12">Name :</label>
                                        <div class="col-md-12">
                                            <h4><?php echo $show->nama;?></h4>
                                        </div><br>
                                    </div>


                                    <div class="form-group">
                                        <label for="example-email" class="col-md-12">Email :</label>
                                        <div class="col-md-12">
                                            <h4><?php echo $show->email; ?></h4>
                                        </div><br>
                                    </div>

                                    
                                    <div class="form-group">
                                            <label class="col-md-12">Phone Number :</label>
                                            <div class="col-md-12">
                                                <h4><?php echo $show->phone; ?></h4>
                                        </div><br><br><br>

                                       <!--<a role="button" href="#" class='open_modal btn btn-sm btn-primary' id='<?php //echo  $row['nik']; ?>'> <i class="glyphicon glyphicon-pencil"></i> Edit</a>&nbsp;-->

                                    </div>


                                <div class="dropdown">
                                    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Action
                                    <span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                      <li><a href="main/login/change-password.php">Change Password</a></li>
                                      <li style="size: -25px;"><a style="font-size: -25px;" href="main/login/logout.php">logout</a></li>
                                      <li><a href="main/login/update-profile.php">Update</a></li>
                                    </ul>
                                </div>

                                </div>


                                </form>
                                <!-- Modal Popup untuk Edit--> 
                                <div id="ModalEdit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                </div>

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
    <script src="../assets/js/jquery-1.12.4.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="../static/js/popper.min.js"></script>
    <script src="../static/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="../static/js/perfect-scrollbar.jquery.min.js"></script>
    <!--Wave Effects -->
    <script src="../static/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="../assets/js/jquery.sidebar.js"></script>
    <!--Custom JavaScript -->
    <script src="main/js/custom.min.js"></script>

    <script type="text/javascript"> 

    </script>

    <script type="text/javascript">
   $(document).ready(function () {
   $(".open_modal").click(function(e) {
      var m = $(this).attr("id");
           $.ajax({
                   url: "edit_profile/modal_edit.php",
                   type: "GET",
                   data : {nik: m,},
                   success: function (ajaxData){
                   $("#ModalEdit").html(ajaxData);
                   $("#ModalEdit").modal('show',{backdrop: 'true'});

               },

               error: function (xhr, ajaxOptions, thrownError) { // Ketika terjadi error
                alert(xhr.responseText); // munculkan alert
                }

               });
        });
      });
</script>
</body>

</html>