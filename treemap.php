<?php
include("lib/SqlFunction.php");
Priv(['all']);
?>
<!DOCTYPE html>
<head>
    <?php
    include("lib/Intestazioni.php");
    WrHeader(); 
    ?>
    <style>
     form {
	 font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
     }
     svg {
	 font: 10px sans-serif;
	 margin-left:auto;
	 margin-right:auto;
     }
    </style>
</head>
<body>
    <?php WrTop(); ?>
    <div class="wrapper">
    <form>
	<label><input type="radio" name="mode" value="sumBySize" checked> Size</label>
	<label><input type="radio" name="mode" value="sumByCount"> Count</label>
    </form>
    <svg width="1200" height="800"></svg>
    </div>
    <?php WrFooter(); ?>
    <script src="https://d3js.org/d3.v4.min.js"></script>
    <script src="/lib/dash/js/d3/treemap.js"></script>
</body>
