<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Listino</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">
        <link rel="stylesheet" href="css/main.css">
    </head>
    <body>
        <div id="controls">
          <div class="depth tooltip">
	    <a href="index.html"> Home </a>
	  </div>
            <div class="depth tooltip">
                <span class="tooltiptext"> Depth Levels:</span>
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
                    <option value="0" unit="NONE" selected>Imps</option>
                    <option value="1" unit="PERCENT">rectangle</option>
                    <option value="2" unit="PERCENT">skin</option>
                    <option value="3" unit="PERCENT">masthead</option>
                </select>
            </div>
            <div class="set">
                <span>data set:</span>
                <select onchange="set_changed(this)">
                    <option value="data/heatmap_demo.json" selected>Gennaio</option>
                    <option value="data/heatmap_demo.json" >Febbraio</option>
                    <option value="data/heatmap_demo.json" >Marzo</option>
                    <option value="data/heatmap_demo.json" >Aprile</option>
                    <option value="data/heatmap_demo.json" >Maggio</option>
                    <option value="data/heatmap_demo.json" >Giugno</option>
                </select>
            </div>
            <div class="units">
                <span>Unit:</span>
                <select onchange="unit_changed(this)">
                    <option value="NONE" selected>None</option>
                    <option value="CURRENCY">USD</option>
                    <option value="PERCENT">%</option>
                </select>
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
   </body>
</html>
