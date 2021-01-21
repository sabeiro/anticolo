<?php
include("lib/SqlFunction.php");
/* Priv(['all']);*/
?>
<!DOCTYPE html>
<html style="height: auto;"><head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 3 | Collapsed Sidebar</title>
    <?php
    include("lib/Intestazioni.php");
    WrHeader(); 
    ?>
    <!-- iCheck -->
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
    <!-- legacy to update -->
    <link rel="stylesheet" href="plugins/legacy/css/blue.css">
    <link rel="stylesheet" href="plugins/legacy/css/morris.css">
    <link rel="stylesheet" href="plugins/legacy/css/jquery-jvectormap-1.2.2.css">
    <link rel="stylesheet" href="plugins/legacy/css/datepicker3.css">
    <link rel="stylesheet" href="plugins/legacy/css/bootstrap3-wysihtml5.min.css">

</head>
<body class="sidebar-mini sidebar-collapse" style="height: auto;">
    <!-- Site wrapper -->
    <div class="wrapper">
	<?php WrNav(); ?>
	<?php WrSide(); ?>
	<?php WrControl(); ?>
	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper" style="min-height: 1667.6px;">
	    <div id="sidebar-overlay"></div>
	    <?php WrTop(); ?>
	    <?php WrDash(); ?>
	</div>
	<?php WrFooter(); ?>
	<!-- Bootstrap 4 -->
	<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
	<!-- ChartJS -->
	<script src="plugins/chart.js/Chart.min.js"></script>
	<!-- Sparkline -->
	<script src="plugins/sparklines/sparkline.js"></script>
	<!-- JQVMap -->
	<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
	<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
	<!-- jQuery Knob Chart -->
	<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
	<!-- daterangepicker -->
	<script src="plugins/moment/moment.min.js"></script>
	<script src="plugins/daterangepicker/daterangepicker.js"></script>
	<!-- Tempusdominus Bootstrap 4 -->
	<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
	<!-- Summernote -->
	<script src="plugins/summernote/summernote-bs4.min.js"></script>
	<!-- overlayScrollbars -->
	<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
	<!-- AdminLTE App -->
	<script src="plugins/adminLte/js/adminlte.js"></script>
	<!-- legacy to update -->
	<script src="plugins/legacy/js/morris.min.js"></script>
	<script src="plugins/legacy/js/jquery.sparkline.min.js"></script>
	<script src="plugins/legacy/js/jquery-jvectormap-1.2.2.min.js"></script>
	<script src="plugins/legacy/js/jquery-jvectormap-world-mill-en.js"></script>
	<script src="plugins/legacy/js/jquery.knob.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
	<script src="plugins/legacy/js/daterangepicker.js"></script>
	<script src="plugins/legacy/js/bootstrap-datepicker.js"></script>
	<script src="plugins/legacy/js/bootstrap3-wysihtml5.all.min.js"></script>
	<script src="plugins/legacy/js/jquery.slimscroll.min.js"></script>
	<script src="plugins/legacy/js/fastclick.min.js"></script>
	<!-- <script type="text/javascript" src="js/dist/app.min.js"></script> -->
	<script src="plugins/legacy/js/Chart.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
	<!-- anticolo -->
	<script src="lib/dash/js/anticolo.js"></script>
	<script>
	 var jData = <?php if(isPriv()){echo '"data/cust/dash_sky.json"';}else{echo '"data/quickwin.json"';} ?>;
	 loadData(jData);
	</script>
</body></html>
