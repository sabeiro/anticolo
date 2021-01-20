<?php
include("lib/SqlFunction.php");
Priv(['marketing','all']);
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Vieawability</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">
        <link rel="stylesheet" href="css/main.css">
	<?php
	include("lib/Intestazioni.php");
	WrHeader(); 
	?>
    </head>
    <body>
	<?php WrTop(); ?>
        <div id="controls">
            <div class="depth tooltip">
                <span class="tooltiptext">Profondità:</span>
                <select onchange="depth_changed(this)">
                    <option value="1">Editore</option>
                    <option value="2" selected>Sito</option>
                    <option value="3" >Sezione</option>
                    <!-- <option value="4">4</option> -->
                </select>
            </div>
            <div class="values">
                <span>Metric:</span>
                <select onchange="values_changed(this)">
                    <option value="0" selected>measured imps</option>
                    <option value="5">masthead pc</option>
                    <option value="4">rect unique pc</option>
                    <option value="2">rect 2 pc</option>
                    <option value="3">rect 3 pc</option>
                    <option value="9">masthead mob</option>
                    <option value="8">rect unique mob</option>
                    <option value="6">rect 2 mob</option>
                    <option value="7">rect 3 mob</option>
                </select>
            </div>
            <div class="set">
                <span>data set:</span>
                <select onchange="set_changed(this)">
                    <option value="data/heatmap_demo.json" selected>Gennaio</option>
                    <option value="data/heatmap_demo.json" >Febbraio</option>
                    <option value="data/heatmap_demo.json" >Marzo</option>
                    <option value="data/heatmap_demo.json" >Aprile</option>
                    <option value="data/heatmap_dem0.json" >Maggio</option>
                    <option value="data/heatmap_demo.json" >Giugno</option>
                    <option value="data/heatmap_demo.json" >Luglio</option>
                    <option value="data/heatmap_demo.json" >Agosto</option>
                    <option value="data/heatmap_demo.json" >Settembre</option>
                    <option value="data/heatmap_demo.json" >Ottobre</option>
                </select>
            </div>
             <div id="dwnFile" class="files controls">
               <span>tabelle:</span>
	       <a href="data/csv/heatmapViewGennaio.csv">completa</a>
            </div>
            <div class="units">
                <span>Unit:</span>
                <select onchange="unit_changed(this)">
                    <option value="NONE" selected>None</option>
                    <option value="CURRENCY" >USD</option>
                    <option value="PERCENT">%</option>
                </select>
            </div>
	</div>

        </div>
 	<div id="chart" class="svgtooltip" width="100%" height="100%"></div>
	<script src="plugins/legacy/js/jquery-1.7.2.min.js"></script>
	<script src="http://d3js.org/d3.v3.min.js"></script>
        <script src="plugins/legacy/js/underscore-min.js"></script>
        <script src="/lib/dash/js/d3/heatmapTree.js"></script>
 	<script tyep="text/javascript">
	  var e = {"options":[{"value":"data/heatmap_demo.json"}],selectedIndex:0};
	  set_changed(e);
	</script>
	<!-- <script src="js/d3.slider.js"></script> -->
 	<script tyep="text/javascript">
	  //d3.select('#slider3').call(d3.slider().on("slide", function(evt, value) {
	  //d3.select('#slider3text').text(d3.round(value,0));}));
	  //var slider = d3.slider();
	  //d3.select('#slider').call(slider);
	</script>
    </body>
</html>
