<!DOCTYPE html>
<head>
<style>
form {
  font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
}

svg {
  font: 10px sans-serif;
}

</style>
</head>
<body>
<svg width="1200" height="800"></svg>
<form>
  <label><input type="radio" name="mode" value="sumBySize" checked> Size</label>
  <label><input type="radio" name="mode" value="sumByCount"> Count</label>
</form>
<script src="js/vendor/jquery-1.7.2.min.js"></script>
<script src="https://d3js.org/d3.v4.min.js"></script>
<script src="/lib/dash/js/d3/treemap.js"></script>
</body>
