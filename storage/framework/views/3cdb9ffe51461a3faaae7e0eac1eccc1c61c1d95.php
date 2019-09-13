<header class="main-header">
    <!-- Logo -->
    <a href="#" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>T</b>P</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>Tâm Phát</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->



        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="<?php echo e(asset('img/user2-160x160.jpg')); ?>" class="user-image" alt="User Image">
                        <span class="hidden-xs">Alexander Pierce</span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                    <li class="user-header">
                        <img src="<?php echo e(asset('img/user2-160x160.jpg')); ?>" class="img-circle" alt="User Image">

                        <p>
                            Alexander Pierce - Web Developer
                            <small>Member since Nov. 2012</small>
                        </p>
                    </li>
                    <!-- Menu Body -->
                    <li class="user-body">
                        <div class="row">
                            <div class="col-xs-4 text-center">
                                <a href="#">Followers</a>
                            </div>
                            <div class="col-xs-4 text-center">
                                <a href="#">Sales</a>
                            </div>
                            <div class="col-xs-4 text-center">
                                <a href="#">Friends</a>
                            </div>
                        </div>
                        <!-- /.row -->
                    </li>
                    <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="#" class="btn btn-default btn-flat">Profile</a>
                            </div>
                            <div class="pull-right">
                                <a href="#" class="btn btn-default btn-flat">Sign out</a>
                            </div>
                        </li>
                    </ul>
                </li>
                <!-- Control Sidebar Toggle Button -->
                <li>
                    <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                </li>
            </ul>
        </div>
    </nav>
</header>
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?php echo e(asset('img/user2-160x160.jpg')); ?>" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>Alexander Pierce</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form -->
       
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">Menu</li>
            <li class="active treeview">

                <a href="#">
                    <i class="fa fa-database"></i> <span>Data Tâm Phát</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>

                <ul class="treeview-menu">

                    <li class="active">
                        <a href="<?php echo e(route('suppliers.index')); ?>">
                            <i class="fa fa-circle-o"></i>
                            Danh Sách Nhà Cung Cấp
                        </a></li>

                    <li class="active">
                        <a href="<?php echo e(route('commodities.index')); ?>">
                            <i class="fa fa-circle-o"></i>
                            Danh sách hàng hóa
                        </a></li>

                    <li class="active">
                        <a href="<?php echo e(route('customers.index')); ?>">
                            <i class="fa fa-circle-o"></i>
                            Danh sách khách hàng
                        </a></li>

                    <li class="active">
                        <a href="<?php echo e(route('import.index')); ?>">
                            <i class="fa fa-circle-o"></i>
                            Danh sách nhập hàng
                        </a></li>

                    <li class="active">
                        <a href="<?php echo e(route('export.index')); ?>">
                            <i class="fa fa-circle-o"></i>
                            Danh sách xuất hàng
                        </a></li>
                </ul>

            </li>

            <li class="active treeview">

                <a href="#">
                    <i class="fa fa-dashboard"></i>
                    <span>Selling</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>

                <ul class="treeview-menu">






                </ul>

            </li>

            <li class="active treeview">

                <a href="#">
                    <i class="fa fa-dashboard"></i>
                    <span>Kho</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>

                <ul class="treeview-menu">






                </ul>

            </li>




        </ul>
    </section>
    <!-- /.sidebar -->
</aside><?php /**PATH C:\Program Files (x86)\Ampps\www\laravel_tamphat\resources\views/components/menu.blade.php ENDPATH**/ ?>