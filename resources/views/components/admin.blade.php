<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Admin Dashboard</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

        <link rel="shortcut icon" href="{{asset("assets/images/favicon_1.ico")}}">

        <link href="../plugins/sweetalert2/sweetalert2.css" rel="stylesheet" type="text/css">

        <!-- Custom Files -->
        <link href="{{asset("assets/css/bootstrap.min.css")}}" rel="stylesheet" type="text/css" />
        <link href="{{asset("assets/css/icons.css")}}" rel="stylesheet" type="text/css" />
        <link href="{{asset("assets/css/style.css")}}" rel="stylesheet" type="text/css" />

        <script src="{{asset("assets/js/modernizr.min.js")}}"></script>
        
    </head>


    <body class="fixed-left">
        
        <!-- Begin page -->
        <div id="wrapper">

            <!-- Top Bar Start -->
            <div class="topbar">
                <!-- LOGO -->
                <div class="topbar-left">
                    <div class="text-center">
                        <a href="index.html" class="logo"><i class="md md-terrain"></i> <span>Moltran </span></a>
                    </div>
                </div>
                <!-- Button mobile view to collapse sidebar menu -->
                
                <nav class="navbar navbar-default">
                    <div class="container-fluid justify-content-end">
                        <ul class="nav navbar-right float-right list-inline">
                            <li class="dropdown open">
                                <a href="" class="dropdown-toggle profile" data-toggle="dropdown" aria-expanded="true"><img src="{{asset("assets/images/user-icon.png")}}" alt="user-icon" class="rounded-circle"></a>
                                <ul class="dropdown-menu">
                                    <li><a href="javascript:void(0)" class="dropdown-item"><i class="md md-face-unlock mr-2"></i> Profile</a></li>
                                    <li>
                                        <form action="/logout/admin" class="dropdown-item" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-primary" style="border-radius: 1rem;"><i class="md md-settings-power mr-2"></i> Logout</button>
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
            <!-- Top Bar End -->

            <!-- ========== Left Sidebar Start ========== -->

            <div class="left side-menu">
                <div class="sidebar-inner slimscrollleft">
                    <!--- Divider -->
                    <div id="sidebar-menu">
                        <ul>
                            @yield('items')
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <!-- Left Sidebar End --> 

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->                      
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container-fluid">

                        <!-- Page-Title -->

                        <!-- Start Widget -->
                        <!--Widget-4 -->
                        
                         <!-- End row-->

                         @yield('body')
                    </div>
                    <div class="fixed ">
                        @yield('pagination')
                    </div>
                </div>
                <footer class="footer text-right">
                    2016 - 2018 © Ping CRM.
                </footer>

            </div>
            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->


            <!-- Right Sidebar -->
            <div class="side-bar right-bar nicescroll">
                <h4 class="text-center">Chat</h4>
                <div class="contact-list nicescroll">
                    <ul class="list-group contacts-list">
                        <li class="list-group-item">
                            <a href="#">
                                <div class="avatar">
                                    <img src="{{asset("assets/images/users/avatar-1.jpg")}}" alt="">
                                </div>
                                <span class="name">Chadengle</span>
                                <i class="fa fa-circle online"></i>
                            </a>
                            <span class="clearfix"></span>
                        </li>
                        <li class="list-group-item">
                            <a href="#">
                                <div class="avatar">
                                    <img src="{{asset("assets/images/users/avatar-2.jpg")}}" alt="">
                                </div>
                                <span class="name">Tomaslau</span>
                                <i class="fa fa-circle online"></i>
                            </a>
                            <span class="clearfix"></span>
                        </li>
                        <li class="list-group-item">
                            <a href="#">
                                <div class="avatar">
                                    <img src="{{asset("assets/images/users/avatar-3.jpg")}}" alt="">
                                </div>
                                <span class="name">Stillnotdavid</span>
                                <i class="fa fa-circle online"></i>
                            </a>
                            <span class="clearfix"></span>
                        </li>
                        <li class="list-group-item">
                            <a href="#">
                                <div class="avatar">
                                    <img src="{{asset("assets/images/users/avatar-4.jpg")}}" alt="">
                                </div>
                                <span class="name">Kurafire</span>
                                <i class="fa fa-circle online"></i>
                            </a>
                            <span class="clearfix"></span>
                        </li>
                        <li class="list-group-item">
                            <a href="#">
                                <div class="avatar">
                                    <img src="{{asset("assets/images/users/avatar-5.jpg")}}" alt="">
                                </div>
                                <span class="name">Shahedk</span>
                                <i class="fa fa-circle away"></i>
                            </a>
                            <span class="clearfix"></span>
                        </li>
                        <li class="list-group-item">
                            <a href="#">
                                <div class="avatar">
                                    <img src="{{asset("assets/images/users/avatar-6.jpg")}}" alt="">
                                </div>
                                <span class="name">Adhamdannaway</span>
                                <i class="fa fa-circle away"></i>
                            </a>
                            <span class="clearfix"></span>
                        </li>
                        <li class="list-group-item">
                            <a href="#">
                                <div class="avatar">
                                    <img src="{{asset("assets/images/users/avatar-7.jpg")}}" alt="">
                                </div>
                                <span class="name">Ok</span>
                                <i class="fa fa-circle away"></i>
                            </a>
                            <span class="clearfix"></span>
                        </li>
                        <li class="list-group-item">
                            <a href="#">
                                <div class="avatar">
                                    <img src="{{asset("assets/images/users/avatar-8.jpg")}}" alt="">
                                </div>
                                <span class="name">Arashasghari</span>
                                <i class="fa fa-circle offline"></i>
                            </a>
                            <span class="clearfix"></span>
                        </li>
                        <li class="list-group-item">
                            <a href="#">
                                <div class="avatar">
                                    <img src="{{asset("assets/images/users/avatar-9.jpg")}}" alt="">
                                </div>
                                <span class="name">Joshaustin</span>
                                <i class="fa fa-circle offline"></i>
                            </a>
                            <span class="clearfix"></span>
                        </li>
                        <li class="list-group-item">
                            <a href="#">
                                <div class="avatar">
                                    <img src="{{asset("assets/images/users/avatar-10.jpg")}}" alt="">
                                </div>
                                <span class="name">Sortino</span>
                                <i class="fa fa-circle offline"></i>
                            </a>
                            <span class="clearfix"></span>
                        </li>
                    </ul>  
                </div>
            </div>
            <!-- /Right-bar -->

        </div>
        <!-- END wrapper -->

        <script>
            var resizefunc = [];
        </script>

        <!-- jQuery  -->
        <script src="{{asset("assets/js/jquery.min.js")}}"></script>
        <script src="{{asset("assets/js/bootstrap.bundle.min.js")}}"></script>
        <script src="{{asset("assets/js/detect.js")}}"></script>
        <script src="{{asset("assets/js/fastclick.js")}}"></script>
        <script src="{{asset("assets/js/jquery.slimscroll.js")}}"></script>
        <script src="{{asset("assets/js/jquery.blockUI.js")}}"></script>
        <script src="{{asset("assets/js/waves.js")}}"></script>
        <script src="{{asset("assets/js/wow.min.js")}}"></script>
        <script src="{{asset("assets/js/jquery.nicescroll.js")}}"></script>
        <script src="{{asset("assets/js/jquery.scrollTo.min.js")}}"></script>
        
        <!-- jQuery -->
        <script src="../plugins/moment/moment.min.js"></script>
        
        <!-- Counter js  -->
        <script src="../plugins/waypoints/lib/jquery.waypoints.js"></script>
        <script src="../plugins/counterup/jquery.counterup.min.js"></script>
        
        <!-- sweet alerts -->
        <script src="../plugins/sweetalert2/sweetalert2.js"></script>
        
        <!-- flot Chart -->
        <script src="../plugins/flot-chart/jquery.flot.min.js"></script>
        <script src="../plugins/flot-chart/jquery.flot.time.js"></script>
        <script src="../plugins/flot-chart/jquery.flot.tooltip.min.js"></script>
        <script src="../plugins/flot-chart/jquery.flot.resize.js"></script>
        <script src="../plugins/flot-chart/jquery.flot.pie.js"></script>
        <script src="../plugins/flot-chart/jquery.flot.selection.js"></script>
        <script src="../plugins/flot-chart/jquery.flot.stack.js"></script>
        <script src="../plugins/flot-chart/jquery.flot.crosshair.js"></script>

        <!-- Todoapp -->
        <script src="{{asset("assets/pages/jquery.todo.js")}}"></script>
        
        <!-- jQuery  -->
        <script src="{{asset("assets/pages/jquery.chat.js")}}"></script>
        
        <!-- Dashboard js  -->
        <script src="{{asset("assets/pages/jquery.dashboard.js")}}"></script>

        <!-- App js  -->
        <script src="{{asset("assets/js/jquery.app.js")}}"></script>
        
        <script>
            /* ==============================================
            Counter Up
            =============================================== */
            jQuery(document).ready(function($) {
                $('.counter').counterUp({
                    delay: 100,
                    time: 1200
                });
            });
            
        </script>

    
    </body>
</html>