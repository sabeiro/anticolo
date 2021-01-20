<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
    <head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>Organigramm</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width">
	<link rel="stylesheet" href="css/main.css">
	<style>
	 @font-face {
	     font-family: themeFont;
	     src: url("fonts/Oswald-Light.ttf");
	 }
	 html{
             /* background: url("fig/SfondoEu.jpg") no-repeat center center fixed; */
	     /* background: url("fig/SfondoEu.jpg");
		-webkit-background-size: cover;
		-moz-background-size: cover;
		-o-background-size: cover; */
             background-size: cover;
	 }
	 body{
	     font-family: themeFont;
	     background: url("fig/SfondoEu.jpg");
             -webkit-background-size: cover;
             -moz-background-size: cover;
             -o-background-size: cover;
	     margin: 0;
	     padding: 0;
	     text-align: center;
	     /* background:#b4f8ee; */
	 }
	 div.container {
	     margin: auto auto auto auto;
	     /* background: url("fig/SfondoEu.jpg"); */
	     vertical-align: middle;	     
	     height: 10em;
	     position: relative;
	     width: 100%;
	     height:0px;
	 }
	 div.container svg {
	     margin: 0 auto;
	     /* background:#b4f8ee; */
	     background: rgba(0, 0, 0, 0);
	     /* fill-opacity:0.5; */
	     display: block;
	     vertical-align: middle;
	     margin: 0;
	     position: absolute;
	     top: 50%;
	     left: 50%;
	     margin-right: -50%;
	     transform: translate(-50%,0%);
	     z-index:1;
	 }
	 div.footer{
	     background:#194876;
	     height:60px;
	     width:100%;
	     position:fixed;
	     display:block;
	     margin-bottom:0px;
	     bottom:0px;
	     margin-right:auto;
	     margin-left:auto;
	     text-color:#ffffff;
	     font-size:22px;
	     z-index:999;
	     text-align: left;
	 }
	 div.header{
	     background:#ffffff;
	     height:30px;
	     width:350px;
	     position:fixed;
	     display:block;
	     margin-top:0px;
	     top:0px;
	     margin-right:0;
	     text-color:#ffffff;
	     font-size:22px;
	     z-index:999;
	     text-align: left;
	     opacity:0.5;
	 }
	 div.footer h3{
	     margin:0;
	 }
	 .node {
	     cursor: pointer;
	 }
	 .node:hover {
	     stroke:#000;
	     fill: #194876;
	     stroke-width: 3.5px;
	 }
	 .node--leaf {
	     fill: white;
	 }
	 .label {
	     font-size:38px;
	     font-family: themeFont;
	     text-anchor: middle;
	     text-shadow: 0 1px 0 #fff, 1px 0 0 #fff, -1px 0 0 #fff, 0 -1px 0 #fff;
	 }
	 .label,
	 .node--root,
	 .node--leaf {
	     pointer-events: none;
	 }
	 circle {
	     /* stroke: #006600; */
	     fill  : #00cc00;
	 }
	 rect {
	     /* stroke: #006600; */
	     fill  : #306084;
	     fill-opacity:0;
	 }
	 text {
	     /* stroke: #000000; */
	     fill: #000000;
	     font-size:40px;
	     font-family: themeFont;
	 }
	 tspan {
	     /* stroke: #000000; */
	     fill: #000000;
	     /* font-size:inherit; */
	     font-family: themeFont;
	 }
	 .itDesc{
	     margin:0;
	     position:absolute;
	     color:#fff;
	     overflow:hidden;
	 }
	 .itPerson{
	     position:absolute;
	     margin-bottom:0px;
	     bottom:0px;
	     color:#fff;
	     overflow:hidden;	     
	 }
	 .circle1{
	     color:rgba(244,0,45,0.3);
	 }
	</style>
	<?xml-stylesheet type="text/css" href="css/main.css" ?>
	<?php
	include("lib/Intestazioni.php");
	WrHeader(); 
	?>
    </head>
    <body>
	<?php WrTop(); ?>
	<div class="container">
	    <div class="header">Organigramm</div>
	    <!-- <object data="Untitled-1.svg" id="svgembed"></object> -->
	    <svg width="960" height="960" >
	    </svg>
	    <div class="footer">
		<div class="itDesc"><h3>Scheda personale:</h3></div>
		<div class="itPerson"></div>
	    </div>
	</div><!-- container -->
	<script src="plugins/jquery/jquery.min.js"></script>
	<script src="https://d3js.org/d3.v4.min.js"></script>
	<script src="/lib/dash/js/d3/circle_pack.js"></script>
    </body>
</html>
