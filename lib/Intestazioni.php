<?php function WrHeader(){?>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="plugins/adminLte/css/adminlte.min.css">
    <!-- Custom style -->
    <link rel="stylesheet" href="lib/dash/css/main.css">
<?php }?>

<?php function WrTop(){?>
    <!-- Content Header (Page header) -->
    <section class="content-header">
	<div class="container-fluid">
	    <div class="row mb-2">
		<div class="col-sm-6">
		    <h1 id="titIt">Data room</h1>
		</div>
		<div class="col-sm-6">
		    <ol class="breadcrumb float-sm-right">
			<li class="breadcrumb-item"><a href="index.php">Home</a></li>
			<li class="breadcrumb-item active">Data room</li>
		    </ol>
		</div>
	    </div>
	</div><!-- /.container-fluid -->
    </section>
<?php }?>
<?php function WrSide(){?>
    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
	<!-- Brand Logo -->
	<a href="https://dauvi.org" class="brand-link">
	    <img src="fig/dauvi_plain.svg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
	    <span class="brand-text font-weight-light">Dauvi</span>
	</a>
	<!-- Sidebar -->
	<div class="sidebar">
	    <!-- Sidebar user (optional) -->
	    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
		<div class="image">
		    <img src="fig/logo_intertino_plain.svg" class="img-circle elevation-2" alt="User Image">
		</div>
		<div class="info">
		    <a href="https://dauvi.org/intertino" class="d-block">Anticolo</a>
		</div>
	    </div>
	    <!-- Sidebar Menu -->
	    <nav class="mt-2">
		<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
		    <!-- Add icons to the links using the .nav-icon class
			 with font-awesome or any other icon font library -->
		    <li class="nav-item has-treeview">
			<a href="#" class="nav-link">
			    <i class="nav-icon fas fa-tachometer-alt"></i>
			    <p>
				Dashboard
				<i class="right fas fa-angle-left"></i>
			    </p>
			</a>
			<ul class="nav nav-treeview">
			    <li class="nav-item">
				<a href="index.php" class="nav-link">
				    <i class="far fa-circle nav-icon"></i>
				    <p>Dashboard v1</p>
				</a>
			    </li>
			</ul>
		    </li>
		</ul>
	    </nav>
	    <!-- /.sidebar-menu -->
	</div>
	<!-- /.sidebar -->
    </aside>
<?php }?>
<?php function WrNav(){?>
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
	<!-- Left navbar links -->
	<ul class="navbar-nav">
	    <li class="nav-item">
		<a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
	    </li>
	    <li class="nav-item d-none d-sm-inline-block">
		<a href="index.php" class="nav-link">Home</a>
	    </li>
	    <li class="nav-item d-none d-sm-inline-block">
		<?php
		if (isset($_SESSION['login'])){
		echo '<a href="LogOut.php" class="nav-link">LogOut</a>';
		} else {
		echo '<a href="LogIn.php" class="nav-link">LogIn</a>';
		}
		?>
	    </li>
	</ul>
	<!-- SEARCH FORM -->
	<form class="form-inline ml-3">
	    <div class="input-group input-group-sm">
		<input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
		<div class="input-group-append">
		    <button class="btn btn-navbar" type="submit">
			<i class="fas fa-search"></i>
		    </button>
		</div>
	    </div>
	</form>

	<!-- Right navbar links -->
	<ul class="navbar-nav ml-auto">
	    <!-- Messages Dropdown Menu -->
	    <li class="nav-item dropdown">
		<a class="nav-link" data-toggle="dropdown" href="#">
		    <i class="far fa-comments"></i>
		    <span class="badge badge-danger navbar-badge">0</span>
		</a>
		<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
		    <a href="#" class="dropdown-item">
			<!-- Message Start -->
			<div class="media">
			    <img src="fig/ico/user.svg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
			    <div class="media-body">
				<h3 class="dropdown-item-title">
				    Brad Diesel
				    <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
				</h3>
				<p class="text-sm">Call me whenever you can...</p>
				<p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
			    </div>
			</div>
			<!-- Message End -->
		    </a>
		    <div class="dropdown-divider"></div>
		    <div class="dropdown-divider"></div>
		    <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
		</div>
	    </li>
	    <!-- Notifications Dropdown Menu -->
	    <li class="nav-item dropdown">
		<a class="nav-link" data-toggle="dropdown" href="#">
		    <i class="far fa-bell"></i>
		    <span class="badge badge-warning navbar-badge">0</span>
		</a>
		<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
		    <span class="dropdown-item dropdown-header">15 Notifications</span>
		    <div class="dropdown-divider"></div>
		    <a href="#" class="dropdown-item">
			<i class="fas fa-envelope mr-2"></i> 4 new messages
			<span class="float-right text-muted text-sm">3 mins</span>
		    </a>
		    <div class="dropdown-divider"></div>
		    <a href="#" class="dropdown-item">
			<i class="fas fa-users mr-2"></i> 8 friend requests
			<span class="float-right text-muted text-sm">12 hours</span>
		    </a>
		    <div class="dropdown-divider"></div>
		    <a href="#" class="dropdown-item">
			<i class="fas fa-file mr-2"></i> 3 new reports
			<span class="float-right text-muted text-sm">2 days</span>
		    </a>
		    <div class="dropdown-divider"></div>
		    <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
		</div>
	    </li>
	    <li class="nav-item">
		<a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
		    <i class="fas fa-th-large"></i>
		</a>
	    </li>
	</ul>
    </nav>
    <!-- /.navbar -->

<?php }?>

<?php function WrDash(){?>
    <!-- Main content -->
    <section class="content">
	<div class="container-fluid">
	    <div class="row">
		<div class="col-12">
		    <!-- Default box -->
		    <div class="card">
			<div class="card-header">
			    <h5 id="itTitle" class="card-title">Monthly Recap Report</h5>
			    <div class="card-tools">
				<button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
				    <i class="fas fa-minus"></i></button>
				<div class="btn-group">
				    <button type="button" class="btn btn-tool dropdown-toggle" data-toggle="dropdown">
					<i class="fas fa-wrench"></i>
				    </button>
				    <div class="dropdown-menu dropdown-menu-right" role="menu">
					<a href="#" class="dropdown-item">change</a>
				    </div>
				</div>
				<button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
				    <i class="fas fa-times"></i></button>
			    </div>
			</div>
			<div class="card-body">
			    <div class="row">
				<div id="dashTab" ></div>
			    </div>
			    <div class="row">
				<section class="col-lg-7 connectedSortable">
				    <div id="itChart"></div>
				    <div id="itDonut"></div>
				    <div id="itMorrisbar"></div>
				    <div id="itBarchart"></div>
				    <div id="itSaleGraph"></div>
				    <div id="itChat"></div>
				    <div id="itTodo"></div>
				    <div id="itEmail"></div>
				    <div id="itCalendar"></div>
				</section><!-- /.Left col -->
				<section class="col-lg-5 connectedSortable">
 				    <div id="itTable"></div>
 				    <div id="itImage"></div>
				    <div id="itMap"></div>
				</section><!-- right col -->
			    </div><!-- /.row (main row) -->
			</div>
			<!-- /.card-body -->
			<div id="itFooter" class="card-footer">
			</div>
			<!-- /.card-footer-->
		    </div>
		    <!-- /.card -->
		</div>
	    </div>
	</div>
    </section>    <!-- /.content -->
    <!-- ./wrapper -->
<?php }?>

<?php function WrControl(){?>
    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
	<!-- Control sidebar content goes here -->
	<div class="p-3 control-sidebar-content">
	    <h5>Customize</h5>
	    <hr class="mb-2"><div class="mb-1"><input type="checkbox" value="1" class="mr-1"><span>No Navbar border</span></div><div class="mb-1"><input type="checkbox" value="1" class="mr-1"><span>Body small text</span></div><div class="mb-1"><input type="checkbox" value="1" class="mr-1"><span>Navbar small text</span></div><div class="mb-1"><input type="checkbox" value="1" class="mr-1"><span>Sidebar nav small text</span></div><div class="mb-1"><input type="checkbox" value="1" class="mr-1"><span>Footer small text</span></div><div class="mb-1"><input type="checkbox" value="1" class="mr-1"><span>Sidebar nav flat style</span></div><div class="mb-1"><input type="checkbox" value="1" class="mr-1"><span>Sidebar nav legacy style</span></div><div class="mb-1"><input type="checkbox" value="1" class="mr-1"><span>Sidebar nav compact</span></div><div class="mb-1"><input type="checkbox" value="1" class="mr-1"><span>Sidebar nav child indent</span></div><div class="mb-1"><input type="checkbox" value="1" class="mr-1"><span>Main Sidebar disable hover/focus auto expand</span></div><div class="mb-4"><input type="checkbox" value="1" class="mr-1"><span>Brand small text</span></div>
	</div></aside>
    <!-- /.control-sidebar -->
<?php }?>
<?php function WrFooter(){?>
    <div id="block_footer"></div>
    <div id="block_controlbar"></div>
    <footer class="main-footer">
	<div class="float-right d-none d-sm-block">
	    <b>Version</b> 3.0.5
	</div>
	<strong>Anticolo@<a href="https://dauvi.org">dauvi</a> theme: <a href="http://adminlte.io/">AdminLTE.io</a>.</strong>
    </footer>
    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
     $.widget.bridge('uibutton', $.ui.button)
    </script>
<?php }?>




<?php function Intestazione(){?>
    <header class="header">
	<a href="index.php" class="logo">
	    <!-- Add the class icon to your logo image or logo icon to add the margining -->
	    Customer prof
	</a>
	<!-- Header Navbar: style can be found in header.less -->
	<nav class="navbar navbar-static-top" role="navigation">
	    <!-- Sidebar toggle button-->
	    <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
		<span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
	    </a>
	    <div class="navbar-right">
		<ul class="nav navbar-nav">
		    <!-- Messages: style can be found in dropdown.less-->
		    <li class="dropdown messages-menu">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown">
			    <i class="fa fa-envelope"></i>
			    <span class="label label-success">0</span>
			</a>
			<ul class="dropdown-menu">
			    <li class="header">You have 4 messages</li>
			    <li>
				<!-- inner menu: contains the actual data -->
				<ul class="menu">
				    <li><!-- start message -->
					<a href="#">
					    <div class="pull-left">
						<img src="img/avatar3.png" class="img-circle" alt="User Image"/>
					    </div>
					    <h4>
						Support Team
						<small><i class="fa fa-clock-o"></i> 5 mins</small>
					    </h4>
					    <p>Why not buy a new awesome theme?</p>
					</a>
				    </li><!-- end message -->
				    <li>
					<a href="#">
					    <div class="pull-left">
						<img src="img/avatar2.png" class="img-circle" alt="user image"/>
					    </div>
					    <h4>
						AdminLTE Design Team
						<small><i class="fa fa-clock-o"></i> 2 hours</small>
					    </h4>
					    <p>Why not buy a new awesome theme?</p>
					</a>
				    </li>
				    <li>
					<a href="#">
					    <div class="pull-left">
						<img src="img/avatar.png" class="img-circle" alt="user image"/>
					    </div>
					    <h4>
						Developers
						<small><i class="fa fa-clock-o"></i> Today</small>
					    </h4>
					    <p>Why not buy a new awesome theme?</p>
					</a>
				    </li>
				    <li>
					<a href="#">
					    <div class="pull-left">
						<img src="img/avatar2.png" class="img-circle" alt="user image"/>
					    </div>
					    <h4>
						Sales Department
						<small><i class="fa fa-clock-o"></i> Yesterday</small>
					    </h4>
					    <p>Why not buy a new awesome theme?</p>
					</a>
				    </li>
				    <li>
					<a href="#">
					    <div class="pull-left">
						<img src="img/avatar.png" class="img-circle" alt="user image"/>
					    </div>
					    <h4>
						Reviewers
						<small><i class="fa fa-clock-o"></i> 2 days</small>
					    </h4>
					    <p>Why not buy a new awesome theme?</p>
					</a>
				    </li>
				</ul>
			    </li>
			    <li class="footer"><a href="#">See All Messages</a></li>
			</ul>
		    </li>
		    <!-- Notifications: style can be found in dropdown.less -->
		    <li class="dropdown notifications-menu">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown">
			    <i class="fa fa-warning"></i>
			    <span class="label label-warning">0</span>
			</a>
			<ul class="dropdown-menu">
			    <li class="header">You have 10 notifications</li>
			    <li>
				<!-- inner menu: contains the actual data -->
				<ul class="menu">
				    <li>
					<a href="#">
					    <i class="ion ion-ios7-people info"></i> 5 new members joined today
					</a>
				    </li>
				    <li>
					<a href="#">
					    <i class="fa fa-warning danger"></i> Very long description here that may not fit into the page and may cause design problems
					</a>
				    </li>
				    <li>
					<a href="#">
					    <i class="fa fa-users warning"></i> 5 new members joined
					</a>
				    </li>

				    <li>
					<a href="#">
					    <i class="ion ion-ios7-cart success"></i> 25 sales made
					</a>
				    </li>
				    <li>
					<a href="#">
					    <i class="ion ion-ios7-person danger"></i> You changed your username
					</a>
				    </li>
				</ul>
			    </li>
			    <li class="footer"><a href="#">View all</a></li>
			</ul>
		    </li>
		    <!-- Tasks: style can be found in dropdown.less -->
		    <li class="dropdown tasks-menu">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown">
			    <i class="fa fa-tasks"></i>
			    <span class="label label-danger">0</span>
			</a>
			<ul class="dropdown-menu">
			    <li class="header">You have 9 tasks</li>
			    <li>
				<!-- inner menu: contains the actual data -->
				<ul class="menu">
				    <li><!-- Task item -->
					<a href="#">
					    <h3>
						Design some buttons
						<small class="pull-right">20%</small>
					    </h3>
					    <div class="progress xs">
						<div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
						    <span class="sr-only">20% Complete</span>
						</div>
					    </div>
					</a>
				    </li><!-- end task item -->
				    <li><!-- Task item -->
					<a href="#">
					    <h3>
						Create a nice theme
						<small class="pull-right">40%</small>
					    </h3>
					    <div class="progress xs">
						<div class="progress-bar progress-bar-green" style="width: 40%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
						    <span class="sr-only">40% Complete</span>
						</div>
					    </div>
					</a>
				    </li><!-- end task item -->
				    <li><!-- Task item -->
					<a href="#">
					    <h3>
						Some task I need to do
						<small class="pull-right">60%</small>
					    </h3>
					    <div class="progress xs">
						<div class="progress-bar progress-bar-red" style="width: 60%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
						    <span class="sr-only">60% Complete</span>
						</div>
					    </div>
					</a>
				    </li><!-- end task item -->
				    <li><!-- Task item -->
					<a href="#">
					    <h3>
						Make beautiful transitions
						<small class="pull-right">80%</small>
					    </h3>
					    <div class="progress xs">
						<div class="progress-bar progress-bar-yellow" style="width: 80%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
						    <span class="sr-only">80% Complete</span>
						</div>
					    </div>
					</a>
				    </li><!-- end task item -->
				</ul>
			    </li>
			    <li class="footer">
				<a href="#">View all tasks</a>
			    </li>
			</ul>
		    </li>
		    <!-- User Account: style can be found in dropdown.less -->
		    <li class="dropdown user user-menu">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown">
			    <i class="glyphicon glyphicon-user"></i>
			    <span>Jane Doe <i class="caret"></i></span>
			</a>
			<ul class="dropdown-menu">
			    <!-- User image -->
			    <li class="user-header bg-light-blue">
				<img src="img/avatar3.png" class="img-circle" alt="User Image" />
				<p>
				    Jane Doe - Web Developer
				    <small>Member since Nov. 2012</small>
				</p>
			    </li>
			    <!-- Menu Body -->
			    <li class="user-body">
				<div class="col-xs-4 text-center">
				    <a href="#">Followers</a>
				</div>
				<div class="col-xs-4 text-center">
				    <a href="#">Sales</a>
				</div>
				<div class="col-xs-4 text-center">
				    <a href="#">Friends</a>
				</div>
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
		</ul>
	    </div>
	</nav>
    </header>

<?php }?>
<?php function WrSideBar(){?>
    <aside class="left-side sidebar-offcanvas">
	<!-- sidebar: style can be found in sidebar.less -->
	<section class="sidebar">
	    <!-- Sidebar user panel -->
	    <!-- <div class="user-panel"> -->
	    <!--     <div class="pull-left image"> -->
	    <!--         <img src="img/avatar3.png" class="img-circle" alt="User Image" /> -->
	    <!--     </div> -->
	    <!--     <div class="pull-left info"> -->
	    <!--         <p>Hello, Jane</p> -->

	    <!--         <a href="#"><i class="fa fa-circle text-success"></i> Online</a> -->
	    <!--     </div> -->
	    <!-- </div> -->
	    <!-- search form -->
	    <form action="#" method="get" class="sidebar-form">
		<div class="input-group">
		    <input type="text" name="q" class="form-control" placeholder="Search..."/>
		    <span class="input-group-btn">
			<button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
		    </span>
		</div>
	    </form>
	    <!-- /.search form -->
	    <!-- sidebar menu: : style can be found in sidebar.less -->
	    <ul class="sidebar-menu">
		<li class="active">
		    <a href="index.php">
			<i class="fa fa-dashboard"></i> <span>Dashboard</span>
		    </a>
		</li>
		<li class="treeview">
		    <a href="#">
			<i class="fa fa-bar-chart-o"></i>
			<span>QuickWins lh.com</span>
			<i class="fa fa-angle-left pull-right"></i>
		    </a>
		    <ul class="treeview-menu">
			<li><a href="index.php?page=quickwins&QwId=0"><i class="fa fa-angle-double-right"></i>TopOffersRelink</a></li>
			<li><a href="index.php?page=quickwins&QwId=0"><i class="fa fa-angle-double-right"></i>FmOnMyAccount</a></li>
			<li><a href="index.php?page=quickwins&QwId=0"><i class="fa fa-angle-double-right"></i>FmOnMyProfile</a></li>
			<li><a href="index.php?page=quickwins&QwId=0"><i class="fa fa-angle-double-right"></i>OnSiteRetargeting</a></li>
			<li><a href="index.php?page=quickwins&QwId=0"><i class="fa fa-angle-double-right"></i>GeoSegmented</a></li>
		    </ul>
		</li>
		<li>
		    <a href="widgets.php">
			<i class="fa fa-th"></i> <span>Widgets</span> <small class="badge pull-right bg-green">new</small>
		    </a>
		</li>
		<li class="treeview">
		    <a href="#">
			<i class="fa fa-bar-chart-o"></i>
			<span>Charts</span>
			<i class="fa fa-angle-left pull-right"></i>
		    </a>
		    <ul class="treeview-menu">
			<li><a href="morris.php"><i class="fa fa-angle-double-right"></i> Morris</a></li>
			<li><a href="flot.php"><i class="fa fa-angle-double-right"></i> Flot</a></li>
			<li><a href="inline.php"><i class="fa fa-angle-double-right"></i> Inline charts</a></li>
		    </ul>
		</li>
		<li class="treeview">
		    <a href="#">
			<i class="fa fa-laptop"></i>
			<span>UI Elements</span>
			<i class="fa fa-angle-left pull-right"></i>
		    </a>
		    <ul class="treeview-menu">
			<li><a href="generalUI.html"><i class="fa fa-angle-double-right"></i> General</a></li>
			<li><a href="icons.php"><i class="fa fa-angle-double-right"></i> Icons</a></li>
			<li><a href="buttons.php"><i class="fa fa-angle-double-right"></i> Buttons</a></li>
			<li><a href="sliders.php"><i class="fa fa-angle-double-right"></i> Sliders</a></li>
			<li><a href="timeline.php"><i class="fa fa-angle-double-right"></i> Timeline</a></li>
		    </ul>
		</li>
		<li class="treeview">
		    <a href="#">
			<i class="fa fa-edit"></i> <span>Forms</span>
			<i class="fa fa-angle-left pull-right"></i>
		    </a>
		    <ul class="treeview-menu">
			<li><a href="generalForm.php"><i class="fa fa-angle-double-right"></i> General Elements</a></li>
			<li><a href="advanced.php"><i class="fa fa-angle-double-right"></i> Advanced Elements</a></li>
			<li><a href="editors.php"><i class="fa fa-angle-double-right"></i> Editors</a></li>
		    </ul>
		</li>
		<li class="treeview">
		    <a href="#">
			<i class="fa fa-table"></i> <span>Tables</span>
			<i class="fa fa-angle-left pull-right"></i>
		    </a>
		    <ul class="treeview-menu">
			<li><a href="simple.php"><i class="fa fa-angle-double-right"></i> Simple tables</a></li>
			<li><a href="data.php"><i class="fa fa-angle-double-right"></i> Data tables</a></li>
		    </ul>
		</li>
		<li>
		    <a href="calendar.php">
			<i class="fa fa-calendar"></i> <span>Calendar</span>
			<small class="badge pull-right bg-red">3</small>
		    </a>
		</li>
		<li>
		    <a href="mailbox.php">
			<i class="fa fa-envelope"></i> <span>Mailbox</span>
			<small class="badge pull-right bg-yellow">12</small>
		    </a>
		</li>
		<li class="treeview">
		    <a href="#">
			<i class="fa fa-folder"></i> <span>Examples</span>
			<i class="fa fa-angle-left pull-right"></i>
		    </a>
		    <ul class="treeview-menu">
			<li><a href="invoice.html"><i class="fa fa-angle-double-right"></i> Invoice</a></li>
			<li><a href="login.html"><i class="fa fa-angle-double-right"></i> Login</a></li>
			<li><a href="register.html"><i class="fa fa-angle-double-right"></i> Register</a></li>
			<li><a href="lockscreen.html"><i class="fa fa-angle-double-right"></i> Lockscreen</a></li>
			<li><a href="404.html"><i class="fa fa-angle-double-right"></i> 404 Error</a></li>
			<li><a href="500.html"><i class="fa fa-angle-double-right"></i> 500 Error</a></li>
			<li><a href="blank.html"><i class="fa fa-angle-double-right"></i> Blank Page</a></li>
		    </ul>
		</li>
	    </ul>
	</section>
	<!-- /.sidebar -->
    </aside>
<?php }?>
<?php function WrChart(){?>
    <!-- Custom tabs (Charts with tabs)-->
    <div class="nav-tabs-custom">
	<!-- Tabs within a box -->
	<ul class="nav nav-tabs pull-right">
	    <li class="active"><a href="#revenue-chart" data-toggle="tab">Area</a></li>
	    <li><a href="#sales-chart" data-toggle="tab">Donut</a></li>
	    <li class="pull-left header"><i class="fa fa-inbox"></i> Sales</li>
	</ul>
	<div class="tab-content no-padding">
	    <!-- Morris chart - Sales -->
	    <div class="chart tab-pane active" id="revenue-chart" style="position: relative; height: 300px;"></div>
	    <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;"></div>
	</div>
    </div><!-- /.nav-tabs-custom -->
<?php }?>
<?php function WrChat(){?>
    <!-- Chat box -->
    <div class="box box-success">
	<div class="box-header">
	    <i class="fa fa-comments-o"></i>
	    <h3 class="box-title">Chat</h3>
	    <div class="box-tools pull-right" data-toggle="tooltip" title="Status">
		<div class="btn-group" data-toggle="btn-toggle" >
		    <button type="button" class="btn btn-default btn-sm active"><i class="fa fa-square text-green"></i></button>
		    <button type="button" class="btn btn-default btn-sm"><i class="fa fa-square text-red"></i></button>
		</div>
	    </div>
	</div>
	<div class="box-body chat" id="chat-box">
	    <!-- chat item -->
	    <div id="dUser"></div>
	</div><!-- /.chat -->
	<div class="box-footer">
	    <div class="input-group">
		<input class="form-control" placeholder="Type message..."/>
		<div class="input-group-btn">
		    <button class="btn btn-success"><i class="fa fa-plus"></i></button>
		</div>
	    </div>
	</div>
    </div><!-- /.box (chat box) -->                                                        
<?php }?>
<?php function WrToDo(){?>
    <!-- TO DO List -->
    <div class="box box-primary">
	<div class="box-header">
	    <i class="ion ion-clipboard"></i>
	    <h3 class="box-title">To Do List</h3>
	    <div class="box-tools pull-right">
		<ul class="pagination pagination-sm inline">
		    <li><a href="#">&laquo;</a></li>
		    <li><a href="#">1</a></li>
		    <li><a href="#">2</a></li>
		    <li><a href="#">3</a></li>
		    <li><a href="#">&raquo;</a></li>
		</ul>
	    </div>
	</div><!-- /.box-header -->
	<div class="box-body">
	    <div id="dToDo"></div>
	</div><!-- /.box-body -->
	<div class="box-footer clearfix no-border">
	    <button class="btn btn-default pull-right"><i class="fa fa-plus"></i> Add item</button>
	</div>
    </div><!-- /.box -->
<?php }?>
<?php function WrEmail(){?>
    <!-- quick email widget -->
    <div class="box box-info">
	<div class="box-header">
	    <i class="fa fa-envelope"></i>
	    <h3 class="box-title">Quick Email</h3>
	    <!-- tools box -->
	    <div class="pull-right box-tools">
		<button class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
	    </div><!-- /. tools -->
	</div>
	<div class="box-body">
	    <form action="#" method="post">
		<div class="form-group">
		    <input type="email" class="form-control" name="emailto" placeholder="Email to:"/>
		</div>
		<div class="form-group">
		    <input type="text" class="form-control" name="subject" placeholder="Subject"/>
		</div>
		<div>
		    <textarea class="textarea" placeholder="Message" style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
		</div>
	    </form>
	</div>
	<div class="box-footer clearfix">
	    <button class="pull-right btn btn-default" id="sendEmail">Send <i class="fa fa-arrow-circle-right"></i></button>
	</div>
    </div>
<?php }?>
<?php function WrMap(){?>
    <!-- Map box -->
    <div class="box box-solid bg-light-blue-gradient">
	<div class="box-header">
	    <!-- tools box -->
	    <div class="pull-right box-tools">
		<button class="btn btn-primary btn-sm daterange pull-right" data-toggle="tooltip" title="Date range"><i class="fa fa-calendar"></i></button>
		<button class="btn btn-primary btn-sm pull-right" data-widget='collapse' data-toggle="tooltip" title="Collapse" style="margin-right: 5px;"><i class="fa fa-minus"></i></button>
	    </div><!-- /. tools -->

	    <i class="fa fa-map-marker"></i>
	    <h3 class="box-title">
		Visitors
	    </h3>
	</div>
	<div class="box-body">
	    <div id="world-map" style="height: 250px;"></div>
	</div><!-- /.box-body-->
	<div class="box-footer no-border">
	    <div class="row">
		<div class="col-xs-4 text-center" style="border-right: 1px solid #f4f4f4">
		    <div id="sparkline-1"></div>
		    <div class="knob-label">Visitors</div>
		</div><!-- ./col -->
		<div class="col-xs-4 text-center" style="border-right: 1px solid #f4f4f4">
		    <div id="sparkline-2"></div>
		    <div class="knob-label">Online</div>
		</div><!-- ./col -->
		<div class="col-xs-4 text-center">
		    <div id="sparkline-3"></div>
		    <div class="knob-label">Exists</div>
		</div><!-- ./col -->
	    </div><!-- /.row -->
	</div>
    </div>
    <!-- /.box -->
<?php }?>
<?php function WrGraph(){?>
    <!-- solid sales graph -->
    <div class="box box-solid bg-teal-gradient">
	<div class="box-header">
	    <i class="fa fa-th"></i>
	    <h3 class="box-title">Sales Graph</h3>
	    <div class="box-tools pull-right">
		<button class="btn bg-teal btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
		<button class="btn bg-teal btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>
	    </div>
	</div>
	<div class="box-body border-radius-none">
	    <div class="chart" id="line-chart" style="height: 250px;"></div>                                    
	</div><!-- /.box-body -->
	<div class="box-footer no-border">
	    <div class="row">
		<div class="col-xs-4 text-center" style="border-right: 1px solid #f4f4f4">
		    <input type="text" class="knob" data-readonly="true" value="20" data-width="60" data-height="60" data-fgColor="#39CCCC"/>
		    <div class="knob-label">Mail-Orders</div>
		</div><!-- ./col -->
		<div class="col-xs-4 text-center" style="border-right: 1px solid #f4f4f4">
		    <input type="text" class="knob" data-readonly="true" value="50" data-width="60" data-height="60" data-fgColor="#39CCCC"/>
		    <div class="knob-label">Online</div>
		</div><!-- ./col -->
		<div class="col-xs-4 text-center">
		    <input type="text" class="knob" data-readonly="true" value="30" data-width="60" data-height="60" data-fgColor="#39CCCC"/>
		    <div class="knob-label">In-Store</div>
		</div><!-- ./col -->
	    </div><!-- /.row -->
	</div><!-- /.box-footer -->
    </div><!-- /.box -->
<?php } ?>

<?php function WrCalendar(){ ?>
    <!-- Calendar -->
    <div class="box box-solid bg-green-gradient">
	<div class="box-header">
	    <i class="fa fa-calendar"></i>
	    <h3 class="box-title">Calendar</h3>
	    <!-- tools box -->
	    <div class="pull-right box-tools">
		<!-- button with a dropdown -->
		<div class="btn-group">
		    <button class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bars"></i></button>
		    <ul class="dropdown-menu pull-right" role="menu">
			<li><a href="#">Add new event</a></li>
			<li><a href="#">Clear events</a></li>
			<li class="divider"></li>
			<li><a href="#">View calendar</a></li>
		    </ul>
		</div>
		<button class="btn btn-success btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
		<button class="btn btn-success btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>                      </div><!-- /. tools -->
	</div><!-- /.box-header -->
	<div class="box-body no-padding">
	    <!--The calendar -->
	    <div id="calendar" style="width: 100%"></div>
	</div><!-- /.box-body -->  
	<div class="box-footer text-black">
	    <div class="row">
		<div class="col-sm-6">
		    <!-- Progress bars -->
		    <div id="dProgress"></div>
		</div><!-- /.col -->
	    </div><!-- /.row -->                               
	</div>
    </div><!-- /.box -->                            

<?php }?>

<?php function WrScript($sname){
    echo '<script src="js/AdminLTE/' . $sname . '" type="text/javascript"></script>';}
?>
