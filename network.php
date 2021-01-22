<?php
include("lib/SqlFunction.php");
/* Priv(['marketing','all']); */
?>
<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Vieawability</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width">
    <?php
    include("lib/Intestazioni.php");
    WrHeader(); 
    ?>
    
    <style>
     .link {
	 stroke: #666;
	 opacity: 0.9;
	 stroke-width: 1.5px;
     }
     .node circle {
	 stroke: #fff;
	 opacity: 0.9;
	 stroke-width: 1.5px;
     }
     .node:not(:hover) .nodetext {
	 /* display: none; */
     }
     text {
	 font: 7px serif;
	 opacity: 0.9;
	 pointer-events: none;
     }
    </style>
</head>
<body>
    <?php WrTop(); ?>
    <div id="network"></div>
    <?php WrFooter(); ?>
    <script src="http://d3js.org/d3.v3.min.js"></script>
    <script src="lib/dash/js/d3/network.js"></script>
    <script>
     loadSet('data/networkSkill.json');
    </script>
</body>
