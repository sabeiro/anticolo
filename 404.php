<?php
include("lib/SqlFunction.php");
/* Priv(['all']);*/
?>
<!DOCTYPE html>
<html style="height: auto;"><head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Anticolo reporting dashboard</title>
    <?php
    include("lib/Intestazioni.php");
    WrHeader(); 
    ?>
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
    	404: page not found
	</div>
    </div>
    <?php WrFooter(); ?>
</body></html>
