<?php
include("lib/SqlFunction.php");
Priv(['all']);
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Impressario</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">
        <link rel="stylesheet" href="css/main.css">
    </head>
    <body>
	<!-- <svg viewBox="0 0 400 300"> -->
	<!--   <g id="circle-group"> -->
	<!--     <circle r="25" cx="50" cy="50" fill="red"/> -->
	<!--     <g class="tooltip css" transform="translate(50,50)"> -->
	<!--       <rect x="-3em" y="-45" width="6em" height="1.25em"/> -->
	<!--       <text y="-45" dy="1em" text-anchor="middle" fill="orange"> -->
	<!-- 	SVG/CSS Tip</text> -->
	<!--     </g> -->
	<!--   </g> -->
	<!-- </svg> -->
        <div id="controls">
            <div class="depth controls">
                <span class="">livello::</span>
                <select onchange="depth_changed(this)">
                    <option value="1">Editore</option>
                    <option value="2" selected>Sito</option>
                    <option value="3" >Sezione</option>
                    <!-- <option value="4">4</option> -->
                </select>
            </div>
            <div class="values controls">
                <span>formato:</span>
                <select id="sizemenu" onchange="values_changed(this)">
		  <option value="0" unit="NONE">totale</option>
		  <option value="1" unit="NONE">inpage</option>
		  <option value="2" unit="NONE">inread</option>
		  <option value="3" unit="NONE">preroll</option>
		  <option value="4" unit="NONE">pushdown</option>
                </select>
            </div>
            <div class="set controls">
                <span>data set:</span>
                <select onchange="set_changed(this)">
                    <option value="data/heatmap_demo.json" selected>17-07 demo1</option>
                    <option value="data/heatmap_demo.json" >17-07 demo2</option>
                </select>
            </div>
             <div id="dwnFile" class="files controls">
               <span>tabelle: </span>
	       <a href="data/csv/heatmap_demo.json">completa</a>
            </div>
            <div class="units controls">
                <span>unità: </span>
                <select onchange="unit_changed(this)">
                    <option value="NONE" selected>nessuna</option>
                    <option value="CURRENCY">valuta</option>
                    <option value="PERCENT">%</option>
                </select>
            </div>
            <div class="threshold controls">
              <span class="controls">soglia:</span>
	      <div class="controls" id="slider3"></div>
	      <span class="controls" id="slider3text">0</span>
            </div>

	</div>

        </div>
 	<div id="chart" class="svgtooltip" width="100%" height="100%"></div>
	<script src="js/vendor/jquery-1.7.2.min.js"></script>
	<script src="http://d3js.org/d3.v3.min.js"></script>
        <script src="js/vendor/underscore-min.js"></script>
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


