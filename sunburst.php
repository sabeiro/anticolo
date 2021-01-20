<?php
include("lib/SqlFunction.php");
/* Priv(['all']);*/
?>
<!doctype html>
<html>
    <head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>Listino</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width">
	<link rel="stylesheet" href="css/main.css">
	<?php
	include("lib/Intestazioni.php");
	WrHeader(); 
	?>
	<style>
	 body {
	     font-family: 'Open Sans', sans-serif;
	     font-size: 12px;
	     font-weight: 400;
	     background-color: #fff;
	     width: 960px;
	     height: 700px;
	     margin-top: 10px;
	     margin:auto auto auto auto;
	     float:center;
	 }

	 #main {
	     float: left;
	     width: 750px;
	 }

	 #sidebar {
	     float: right;
	     width: 100px;
	 }

	 #sequence {
	     width: 600px;
	     height: 70px;
	 }

	 #legend {
	     padding: 10px 0 0 3px;
	 }

	 #sequence text, #legend text {
	     font-weight: 600;
	     fill: #fff;
	 }

	 #chart {
	     position: relative;
	 }

	 #chart path {
	     stroke: #fff;
	 }

	 #explanation {
	     position: absolute;
	     top: 260px;
	     left: 305px;
	     width: 140px;
	     text-align: center;
	     color: #666;
	     z-index: -1;
	 }

	 #percentage {
	     font-size: 2.5em;
	 }
	</style>
    </head>
    <body class="sidebar-mini sidebar-collapse" style="height: auto;">
	<!-- Site wrapper -->
	    <?php WrNav(); ?>
	    <?php WrControl(); ?>
	<script src="plugins/jquery/jquery.min.js"></script>
	<script src="http://d3js.org/d3.v3.min.js"></script>
	<script src="/lib/dash/js/d3/sunburst2.js"></script>
	<script tyep="text/javascript">
	</script>
    </body>
</html>
