<html>
 <head>
  <title>Data Table User</title>
  <script src="static/js/jquery-1.12.0.min.js"></script>
  <script src="static/js/jquery.validate.min.js"></script>
  <script src="static/js/bootstrap.min.js"></script>
  <script src="static/js/dataTables.bootstrap.min.js"></script>
  <link rel="stylesheet" href="static/css/bootstrap-datepicker.css" />
  <script src="static/js/bootstrap-datepicker.js"></script>
  
    <link rel="stylesheet" href="static/css/bootstrap.min.css" />
    <script src="static/js/jquery.dataTables.min.js"></script>  
    <link rel="stylesheet" href="static/css/jquery.dataTables.min.css" />
    <link href="static/css/style.css" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="static/css/default.css" id="theme" rel="stylesheet">
    
  <style>
   body
   {
    margin:0;
    padding:0;
    background-color:#f1f1f1;
   }
   .box
   {
    width:1270px;
    padding:20px;
    background-color:#fff;
    border:1px solid #ccc;
    border-radius:5px;
    margin-top:25px;
   }
  </style>
  
  

 </head>


 <body class="fix-header fix-sidebar card-no-border">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->

        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
                <!-- logo -->
                <img src="assets/images/kaefce.png" style="max-height: 100px; width: 250px; margin-left: 5px; margin-top: -70px;"/>

            <div class="scroll-sidebar" >
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li> <a class="waves-effect waves-dark" href="#"onclick="openPage('main.html')" aria-expanded="false"><i class="fa fa-home"></i><span class="hide-menu">Home</span></a>
                        </li>
                        <li> <a class="waves-effect waves-dark" href="#" onclick="openPage('pages-profile.php')" aria-expanded="false"><i class="fa fa-user-circle-o"></i><span class="hide-menu">Profile</span></a>
                        </li>
                        <li> <a class="waves-effect waves-dark" href="#"onclick="openPage('home1.html')" aria-expanded="false"><i class="fa fa-tables"></i><span class="hide-menu">Tables</span></a>
                        </li>
                        <li> <a class="waves-effect waves-dark" href="#" onclick="openPage('map-google.html')" aria-expanded="false"><i class="fa fa-location-arrow"></i><span class="hide-menu">Location</span></a>
                        </li>
                        <li> <a class="waves-effect waves-dark" href="#" onclick="openPage('pages-blank.html')" aria-expanded="false"><i class="fa fa-bookmark-o"></i><span class="hide-menu">Blank</span></a>
                        </li>
                        <li> <a class="waves-effect waves-dark" href="#" onclick="openPage('pages-error.html')" aria-expanded="false"><i class="fa fa-question-circle"></i><span class="hide-menu">404</span></a>
                        </li>
                    </ul>
                    
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper" id="page-content" style="margin-top: -60px;">
            
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
 </body>
 </html>

 <script type="text/javascript">
  $(document).ready(function() {
   $("#page-content").load("main/main.html");
 });
   function openPage(page){
    $("#page-content").load("main/"+page);
   }
 </script>