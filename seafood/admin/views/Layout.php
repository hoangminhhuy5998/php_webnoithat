<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Seafood Admin</title>

    <!-- Bootstrap Core CSS -->
    <link href="../assets/admin/layout1/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../assets/admin/layout1/css/metisMenu.min.css" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="../assets/admin/layout1/css/timeline.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../assets/admin/layout1/css/startmin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="../assets/admin/layout1/css/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../assets/admin/layout1/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.../assets/admin/layout1/js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script type="text/javascript" src="../assets/admin/ckeditor/ckeditor.js"></script>
</head>
<body>

<div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">Startmin</a>
        </div>

        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>

        <!-- Top Navigation: Left Menu -->
        <ul class="nav navbar-nav navbar-left navbar-top-links">
            <li><a href="#"><i class="fa fa-home fa-fw"></i> Website</a></li>
        </ul>

        <!-- Top Navigation: Right Menu -->
        <ul class="nav navbar-right navbar-top-links">
            <li class="dropdown navbar-inverse">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-bell fa-fw"></i> <b class="caret"></b>
                </a>
                <ul class="dropdown-menu dropdown-alerts">
                    <li>
                        <a href="#">
                            <div>
                                <i class="fa fa-comment fa-fw"></i> New Comment
                                <span class="pull-right text-muted small">4 minutes ago</span>
                            </div>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a class="text-center" href="#">
                            <strong>See All Alerts</strong>
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-user fa-fw"></i> secondtruth <b class="caret"></b>
                </a>
                <ul class="dropdown-menu dropdown-user">
                    <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                    </li>
                    <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                    </li>
                    <li class="divider"></li>
                    <li><a href="index.php?controller=login&action=logout"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                    </li>
                </ul>
            </li>
        </ul>

        <!-- Sidebar -->
        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">

                <ul class="nav" id="side-menu">
                    <li class="sidebar-search">
                        <div class="input-group custom-search-form">
                            <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                    <button class="btn btn-primary" type="button">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                        </div>
                    </li>
                    <li>
                        <a href="index.php?controller=categories">
                            <i class="fa fa-align-justify"></i> <span>Danh mục sản phẩm</span>
                        </a>
                    </li>
                    <li>
                            <a href="index.php?controller=products">
                                <i class="fa fa-th"></i> <span>Sản phẩm</span>
                            </a>
                    </li>
                    <li>
                            <a href="index.php?controller=news">
                                <i class="fa fa-newspaper-o"></i> <span>Tin Tức</span>
                            </a>
                    </li>
                    <li>
                        <a href="index.php?controller=users">
                            <i class="fa fa-institution "></i> <span>Quản lý user</span>
                        </a>
                    </li>
                    <li>
                    <a href="index.php?controller=orders">
                        <i class="fa fa-th"></i> <span>Đơn hàng</span>
                    </a>
                </li>
                    <li>
                        <a href="index.php?controller=login&action=logout">
                            <i class="fa fa-sign-out fa-fw"></i> <span>Đăng xuất</span>
                        </a>
                    </li>
                    
                </ul>

            </div>
        </div>
    </nav>

    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">

            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Page Title</h1>
                </div>
            </div>

            <!-- ... Your content goes here ... -->
            <!-- Main content -->
            <section class="content">
                <?php echo $this->view; ?>

            </section>
            <!-- /.content -->

        </div>
    </div>

</div>

<!-- jQuery -->
<script src="../assets/admin/layout1/js/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="../assets/admin/layout1/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="../assets/admin/layout1/js/metisMenu.min.js"></script>

<!-- Custom Theme JavaScript -->
<script src="../assets/admin/layout1/js/startmin.js"></script>

</body>
</html>
