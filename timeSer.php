<?php
include("lib/SqlFunction.php");
$dbConn = new AdminSql();
$dbConn->DbConnect($db_conn);
$tabN = 'weather_d';$sectN = "";$typeN = "";
if(isset($_GET['tab'])){$tabN = $_GET['tab'];}
if(isset($_GET['sect'])){$sectN = $_GET['sect'];}
if(isset($_GET['type'])){$typeN = $_GET['type'];}
$colVar = wrColDouble($dbConn,$tabN);
/* Priv(["all"]); */
?>
<!DOCTYPE HTML>
<html>
    <head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Time series</title>
	<?php include("lib/Intestazioni.php");
	WrHeader();
	?>
	<link href="plugins/legacy/css/bootstrap/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
	<?php WrTop(); ?>
	<div class="menuI">
	    <form class="menuIt">
		<select onchange="changeSet(this)">
		    <option value="all" selected>all</option>
		    <?php
		    foreach($colVar as $r){
			echo '<option value="'.$r.'">'.$r."</option>\n";
		    }
		    ?>
		</select>
	    </form>
	    <a class="menuIt" href="#" onclick="downCsv()">dataset.csv</a>
	</div>
	<div id="container" style="height: 600px; min-width: 310px"></div>
	<div id="itDataset">
	    <div id="itTab" class="tableIt" style="height: 600px; min-width: 310px"></div>
	</div>
	<script src="plugins/jquery/jquery.min.js"></script>
	<script src="plugins/highcharts/highstock.js"></script>
	<script src="plugins/highcharts/exporting.js"></script>
	<!-- <script src="js/highcharts/dark-unica.js"></script> -->
	<script src="lib/dash/js/timeSer.js"></script>
	<script type="text/javascript">
	 var encodedUri = null;
	 let names = <?php echo json_encode($colVar); ?>;
	 var stopwords = ['week','day','poi'];
	 stopwords.forEach(function(s){
	     names = names.filter(a => a !== s);
	 });
	 var cahrtIt = null;
	 var tmpSeries = null;
	 var tabN = "<?php echo $tabN; ?>"
	 var typeN = "<?php echo $typeN; ?>"
	 function genGraph(seriesOptions){
	     chartIt = Highcharts.stockChart('container',{
		 type:"area"
		 ,rangeSelector: {selected:1}
		 ,legend:{layout:'vertical',align:'right',verticalAlign:'middle',borderWidth:0}
		 ,title: {text:'time series display',x:-20}
		 ,subtitle: {text:'displaying '+tabN+' table',x:-20}
		 ,legend: {align:'right',verticalAlign:'top',layout:'vertical',x:0,y:100
		     ,enabled:true
		 }
		 ,yAxis:{
		     text:"imps preroll (M)"
		     ,labels: {formatter: function () {return shortenNr(this.value,1);}}
		     ,stackLabels: {enabled: true
				   ,style: {fontWeight: 'bold',color: 'gray'}
				   ,formatter: function() {return  this.stack;}
		     }
		 }
		 ,plotOptions: {showInLegend:true,stacking:'normal'
			       ,dataLabels:{enabled: true,color: (Highcharts.theme && Highcharts.theme.dataLabelsColor) || 'white'}
			       ,areaspline: {stacking: 'normal',fillOpacity: 0.1}
			       ,spline: {stacking:'normal'}
			       ,column: {
				   stacking: 'normal'
				   ,dataLabels:{enabled:false}
				   ,hover:{enabled:false}
			       }
		 }
		 ,tooltip: {
		     split:true
		     ,pointFormat: '<span style="color:{series.color}">{series.name}</span>: <b>{point.y}</b> <br/>',valueDecimals: 0,split: true
		 }//({point.change}%)
		 ,series: seriesOptions
	     });
	 }
	 function popGraph(names){
	     var seriesOptions = [],tabData=[],avSeries=[],seriesCounter=0;
	     var colorTh = ["#97003F","#D6604D","#EE9900","#CC9900","#47B757","#4393C3","#2166AC","#053091","#B2182B","#F4A582","#92C54E","#719540"];
	     var colorL = [];
	     var nameL = [];
	     var tipL = [];
	     for(var i=0;i<names.length;i++){
		 nameL.push('tab='+tabN+'&sect='+encodeURIComponent(names[i])+'&type='+typeN);
		 colorL.push(colorTh[i]);
		 tipL.push(true);
		 /* nameL.push('tab='+'daily_pred'+'&sect='+encodeURIComponent(names[i]));
		    colorL.push(colorTh[i]);
		    tipL.push(false);
		    nameL.push('tab='+'tv_pali'+'&sect='+encodeURIComponent(names[i]));
		    colorL.push(color2int(colorTh[i],0.2));
		    tipL.push(false); */
	     }
	     //nameL.push('tab='+'tv_audience'+'&sect=fascia20');
	     /* nameL.push('tab='+'tv_audience'+'&sect=tot');
		colorL.push('rgba(.1,.1,.1,1)');	
		tipL.push(true); */
	     /* nameL.push('tab='+'webtrekk_p'+'&sect=preroll');
		colorL.push('rgba(0,0,0,1)');
		tipL.push(true);*/
	     /* nameL.push('tab='+'marker'+'&sect=marker');
		colorL.push(colorTh[0]);
		tipL.push(false); */
	     $.each(nameL, function (i,name){
		 $.getJSON('http://localhost/jsonp.php?'+name+'&callback=?',function(data){
		     data['color'] = colorL[i];
		     data['showInLegend'] = tipL[i];
		     seriesOptions.push(data);
		     tabData.push(data);
		     if(name.match('tab=daily')!= undefined){avSeries.push(data);}
		     seriesCounter += 1;
		     if (seriesCounter === nameL.length) {
			 tmpSeries = avSeries;
			 seriesOptions.push(addAverage(avSeries));
			 genGraph(seriesOptions);
			 encodedUri = createTab(tabData);
			 console.log(avSeries);
		     }
		 });
	     });
	 }
	 popGraph(names);
	 function changeSet(e){
	     var nameL = [e.value];
	     if(e.value=="all"){nameL=names;}
	     popGraph(nameL);
	 }
	</script>
	<?php $dbConn->DbDisc(); ?>
    </body>
</html>
