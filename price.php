<?php
include("lib/SqlFunction.php");
Priv(['all']);
?>
<!DOCTYPE html>
<html>
    <head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Intertino</title>
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<?php
	include("lib/Intestazioni.php");
	WrHeader(); 
	?>

	<style>
	 body { font-family: sans-serif; font-size: 14px; line-height: 1.6em; margin: 0; padding: 0; }
	 .container { width: 90%; margin: 0 auto; }

	 .autocomplete-suggestions { -webkit-box-sizing: border-box; -moz-box-sizing: border-box; box-sizing: border-box; border: 1px solid #999; background: #FFF; cursor: default; overflow: auto; -webkit-box-shadow: 1px 4px 3px rgba(50, 50, 50, 0.64); -moz-box-shadow: 1px 4px 3px rgba(50, 50, 50, 0.64); box-shadow: 1px 4px 3px rgba(50, 50, 50, 0.64); }
	 .autocomplete-suggestion { padding: 2px 5px; white-space: nowrap; overflow: hidden; }
	 .autocomplete-no-suggestion { padding: 2px 5px;}
	 .autocomplete-selected { background: #F0F0F0; }
	 .autocomplete-suggestions strong { font-weight: bold; color: #000; }
	 .autocomplete-group { padding: 2px 5px; }
	 .autocomplete-group strong { font-weight: bold; font-size: 16px; color: #000; display: block; border-bottom: 1px solid #000; }
	 input { font-size: 28px; padding: 10px; border: 1px solid #CCC; display: block; margin: 20px 0; width:100%;}
	 td { padding: 10px 5px 5px 10px;}
	 .clientForm1{
	     /* display:inline-block; */
	     /* align-vertical:top; */
	     /* position:relative; */
	     /* width:30%; */
	     /* float:left; */
	     left:0px;
	 }
	 .clientForm2{
	     /* display:inline-block; */
	     /* align-vertical:top; */
	     /* position:relative; */
	     /* width:30%; */
	     /* float:right; */
	     right:0px;
	     /* clear: left; */
	 }
	 .clientForm3{
	     /* display:inline-block; */
	     /* align-vertical:top; */
	     /* position:relative; */
	     margin:0px;
	     /* width:30%; */
	     /* float:right; */
	     /* clear: left; */
	 }
	 .clientForm3{
	     display:inline-block;
	     /* align-vertical:top; */
	     /* position:relative; */
	     width:30%;
	     float:right;
	     /* clear: left; */
	 }
	 .chart div {
	     font: 12px sans-serif;
	     background-color: steelblue;
	     text-align: right;
	     padding: 3px;
	     margin: 1px;
	     color: white;
	     height:25px;
	 }
	 .chart1 div {
	     font: 12px sans-serif;
	     background-color: #8a4254;
	     text-align: right;
	     padding: 3px;
	     margin: 1px;
	     color: white;
	     height:25px;
	 }

	</style>
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
		<div class="container">
		    <div class="row span1">
			<h1>Historical price list</h1>
		    </div>
		    <div class="row">
			<div class="clientForm1 col-md-4">
			    <p>provider 1:</p>
			    <div style="position: relative; height: 80px;">
				<input type="text" name="country" id="autocomplete-ajax" style="position: absolute; z-index: 2; background: transparent;"/>
				<input type="text" name="country" id="autocomplete-ajax-x" disabled="disabled" style="color: #CCC; position: absolute; background: transparent; z-index: 1;"/>
			    </div>
			    <div id="selction-ajax"></div>
			    <p> <b>price list 1</b></p>
			    <div class="chart">
			    </div>

			</div>
			<div class="clientForm2 col-md-4">
			    <p>provider 2:</p>
			    <div style="position: relative; height: 80px;">
				<input type="text" name="country" id="autocomplete-ajax1" style="position: absolute; z-index: 2; background: transparent;"/>
				<input type="text" name="country" id="autocomplete-ajax-x1" disabled="disabled" style="color: #CCC; position: absolute; background: transparent; z-index: 1;"/>
			    </div>
			    <div id="selction-ajax1"></div>
			    <p> <b>price list 2</b></p>
			    <div class="chart1">
			    </div>

			</div>
			<div class="clientForm3  col-md-4">
			    <p>provider 3:</p>
			    <div style="position: relative; height: 80px;">
				<input type="text" name="country" id="autocomplete-ajax2" style="position: absolute; z-index: 2; background: transparent;"/>
				<input type="text" name="country" id="autocomplete-ajax-x2" disabled="disabled" style="color: #CCC; position: absolute; background: transparent; z-index: 1;"/>
			    </div>
			    <div id="selction-ajax2"></div>
			    <p> <b>price list 3</b></p>
			    <div class="chart1">
			    </div>

			</div>
		    </div>
		</div>
	    </div>
	    <?php WrFooter(); ?>
    <!-- <script type="text/javascript" src="js/bootstrap/bootstrap.min.js"></script> -->
    <script type="text/javascript" src="plugins/autocomplete/jquery-1.8.2.min.js"></script>
    <script type="text/javascript" src="plugins/autocomplete/jquery.mockjax.js"></script>
    <script type="text/javascript" src="plugins/autocomplete/jquery.autocomplete.js"></script>
    <script type="text/javascript" src="plugins/autocomplete/countries.js"></script>
    <script type="text/javascript" src="plugins/autocomplete/demo.js"></script>
    <script src="//d3js.org/d3.v3.min.js"></script>
    <script>
     var cpmL = [{"format":"Halfpage","cpm":5.48}
		,{"format":"Masthead","cpm":9.39}
		,{"format":"Overlayer","cpm":13.37}
		,{"format":"Preroll","cpm":12.54}
		,{"format":"Promobox","cpm":7.67}
		,{"format":"Rectangle","cpm":1.67}
		,{"format":"Exp video","cpm":5.80}
		,{"format":"Skin","cpm":4.24}];
     d3.select(".chart")
       .selectAll("div")
       .data(cpmL)
       .enter().append("div")
       .style("width", function(d) { return d.cpm*20 + "px"; })
       .text(function(d) { return d.format + ' ' + d.cpm; });
     var chart = d3.select(".chart");
     var bar = chart.selectAll("div");
     var cpmL = [
         {"format":"background","cpm":6.14}
         ,{"format":"box","cpm":2.31}
         ,{"format":"half   ","cpm":6.087}
	 ,{"format":"intro-video","cpm":16.18}
         ,{"format":"lb","cpm":1.3}
         ,{"format":"masthead  ","cpm":12.94}
         ,{"format":"m-box","cpm":3.53}
         ,{"format":"m-intro","cpm":15.1}
         ,{"format":"m-pre","cpm":14.6}
         ,{"format":"overlayer","cpm":11.9}
         ,{"format":"pre-post","cpm":13.6}
         ,{"format":"strip ","cpm":1.09}
         ,{"format":"video ","cpm":5.61}];

     d3.select(".chart1")
       .selectAll("div")
       .data(cpmL)
       .enter().append("div")
       .style("width", function(d) { return d.cpm*20 + "px"; })
       .text(function(d) { return d.format + ' ' + d.cpm; });

     var x = d3.scale.linear()
	       .domain([0, d3.max(data)])
	       .range([0, 420]);
     
    </script>
    </body>
</html>

