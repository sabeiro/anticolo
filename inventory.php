<?php
include("lib/SqlFunction.php");
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
    </head>
    <link href="css/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/main.css">
    <body>
	<?php WrTop(); ?>
	<div class="menuI">
	    <form class="menuIt">
		<select onchange="changeSet(this)">
		    <option value="all" selected>all</option>
		    <option value='IsSaveDTV'>saved</option>
		    <option value='bill'>bill</option>
		    <option value='tenure'>tenure</option>
		    <option value='homemover'>homemover</option>
		    <option value='ON_OFF'>on_off</option>
		    <option value='callFreq'>call_freq</option>
		    <option value='rev_up'>revenue up</option>
		    <option value='rev_pre'>revenue pre</option>
		    <option value='duration_up'>duration up</option>
		</select>
	    </form>
	    <a class="menuIt" href="inventory.php">settimanale</a>
	    <a class="menuIt" href="#" onclick="downCsv()">dataset .csv</a>
	</div>
	<div id="container" style="height: 600px; min-width: 310px"></div>
	<div id="itDataset">
	    <div id="itTab" class="tableIt" style="height: 600px; min-width: 310px"></div>
	</div>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
	<script src="https://code.highcharts.com/stock/highstock.js"></script>
	<script src="https://code.highcharts.com/stock/modules/exporting.js"></script>
	<!-- <script src="js/highcharts/dark-unica.js"></script> -->
	<script src="lib/dash/js/timeSer.js"></script>
	<script type="text/javascript">
	 var encodedUri = null;
	 //var names = ['uominiedonne','amici','news/info','intrattenimento','reality/talent','il_segreto','brand','fascino','fiction','soap','rest','sport'];
	 var names = ['date','week','IsSaveDTV','bill','tenure','homemover','ON_OFF','callFreq','rev_up','rev_pre','duration_up'];	 
	 var cahrtIt = null;
	 var tmpSeries = null;
	 function genGraph(seriesOptions){
	     chartIt = Highcharts.stockChart('container',{
		 type:"area"
		 ,rangeSelector: {selected:1}
		 ,legend:{layout:'vertical',align:'right',verticalAlign:'middle',borderWidth:0}
		 ,title: {text:'Bacino inventory video',x:-20}
		 ,subtitle: {text:'dot,webtrekk,dotandsale',x:-20}
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
		 nameL.push('tab='+'retention_weekly'+'&sect='+encodeURIComponent(names[i]));
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
		     if(name.match('tab=daily&')!= undefined){tabData.push(data);}
		     if(name.match('tab=daily')!= undefined){avSeries.push(data);}
		     seriesCounter += 1;
		     if (seriesCounter === nameL.length) {
			 tmpSeries = avSeries;
			 seriesOptions.push(addAverage(avSeries));
			 genGraph(seriesOptions);
			 encodedUri = createTab(tabData);
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
	<!-- talen etl -->
    </body>
</html>
