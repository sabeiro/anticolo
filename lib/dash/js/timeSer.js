function downCsv(){
    // var test_array = [["name1", 2, 3], ["name2", 4, 5], ["name3", 6, 7], ["name4", 8, 9], ["name5", 10, 11]];
    // var fname = "IJGResults";
    // var csvContent = "data:text/csv;charset=utf-8,";
    // $("#pressme").click(function(){
    // 	test_array.forEach(function(infoArray, index){
    // 	    dataString = infoArray.join(",");
    // 	    csvContent += index < infoArray.length ? dataString+ "\n" : dataString;
    // 	});
	
    // 	var encodedUri = encodeURI(csvContent);
    // 	window.open(encodedUri);
    // });
    var link = document.createElement("a");
    link.setAttribute("href",encodedUri);
    link.setAttribute("download","my_data.csv");
    document.body.appendChild(link);
    link.click();
};
function color2int(color,alpha){
    var txt = 'rgba(';
    txt += String(parseInt(color.substring(1,3),16)) + ',';
    txt += String(parseInt(color.substring(3,5),16)) + ',';
    txt += String(parseInt(color.substring(5,7),16)) + ',';
    txt += String(alpha) + ')';
    return txt;
};
var SI_PREFIXES = ["", "k", "M", "G", "T", "P", "E"];
function shortenNr(number,digit){
    if(typeof(number)!="number") return number;
    var tier = Math.log10(number) / 3 | 0;
    if(tier == 0) return number.toFixed(digit);
    var prefix = SI_PREFIXES[tier];
    var scale = Math.pow(10, tier * 3);
    var scaled = number / scale;
    return scaled.toFixed(digit) + prefix;
};
function getWeekNr(dateT,weekRef){
    return 1 + Math.round(((dateT.getTime() - weekRef.getTime()) / 86400000
                           - 3 + (weekRef.getDay() + 6) % 7) / 7);
}
function addAverage(avSeries){
    var today = new Date();
    today.setHours(0, 0, 0, 0);
    var weekRef = new Date(today.getFullYear(),0,2);
    var nWeek = getWeekNr(today,weekRef) + 4;
    var weekDate = [];
    for(var w=0;w<nWeek;w++){
	weekDate[w] = weekRef.getTime() + (weekRef.getDay() + w*7)*3600*24*1000;
    }
    var Nc = avSeries.length - 1;
    var weekSum = [];
    for(var c=0;c<Nc;c++){
	for(var r=0;r<avSeries[c].data.length;r++){
	    var dateT = new Date(avSeries[c].data[r][0]);
	    var weekN = getWeekNr(dateT,weekRef);
	    if(isNaN(weekSum[weekN])){
		weekSum[weekN] = 0;
		weekDate[weekN] = dateT.getTime() + 4*24*3600*1000;
	    }
	    weekSum[weekN] += avSeries[c].data[r][1];
	}
    }
    var weekD = [];
    for(var i=0;i<weekSum.length;i++){
	weekD[i] = [weekDate[i],weekSum[i]/7,weekSum[i]];
    }
    weekD = weekD.sort(function(a,b){return a[0] - b[0];});
    sOpt = {'data':weekD,'name':'average','id':'average','dataLabels':{"enabled":true,'formatter': function() {return 'week ' + shortenNr(7*this.y,1)}},"marker":{"enabled":true,"radius":3},'type':'scatter'};
    return sOpt;
}

function createTab(seriesOptions){
    var tabData = [];
    var tabIdx = [];
    var Nc = seriesOptions.length - 1;
    for(var c=0;c<Nc;c++){
	tabData[c] = [];
	for(var r=0;r<seriesOptions[c].data.length;r++){
	    var Idx = seriesOptions[c].data[r][0];
	    if(Idx === 'undefined'){continue;}
	    tabData[c][Idx] = seriesOptions[c].data[r][1];
	    var initD = [];
	    for(var i=0;i<=Nc;i++) initD.push('');
	    tabIdx[Idx] = initD;
	}
    }
    for(var c=0;c<Nc;c++){
	for(var key in tabData[c]){
	    tabIdx[key][c+1] = tabData[c][key];
	}
    }
    var Nr = 0;
    var keyL = [];
    for(var key in tabIdx){
	if(key === 'undefined'){continue;}
	var dateI = new Date(parseInt(key)).toISOString().slice(0,10);
	tabIdx[key][0] = dateI;
	keyL.push(key);
	Nr++;
    }
    keyL = keyL.sort(function(a, b){return b-a});
    var itTxt = '<TABLE>';
    var Nh = Nc + 1;
    itTxt += '<thead class="tableH">';
    //itTxt += '<TR><TH COLSPAN="'+Nh+'"><BR><H3>dataset</H3></TH></TR>';
    itTxt += '<TR class="tableH">';
    itTxt += '<TH>' + "date" + '</TH>';
    for(var c=0;c<Nc;c++){
	itTxt += '<TH>' + seriesOptions[c].name + '</TH>';
    }
    itTxt += '</TR></thead>';
    for(var i=0;i<keyL.length;i++){
	itTxt += '<TR>';
	for(var c=0;c<=Nc;c++){
	    itTxt += '<TD>' + shortenNr(tabIdx[keyL[i]][c],1) + '</TD>';
	}
	itTxt += '</TR>';
    }
    itTxt += '</TABLE>';
    $('#itTab').html(itTxt);
    var csvContent = "data:text/csv;charset=utf-8,";
    csvContent += "date,"
    for(var c=0;c<Nc;c++){
	csvContent += seriesOptions[c].name + ',';
    }
    csvContent += '\n';
    for(var i=0;i<keyL.length;i++){
	var dataString = tabIdx[keyL[i]].join(",");
	csvContent += dataString + "\n";
    }
    return encodeURI(csvContent);
}
function createChart(seriesOptions) {
    Highcharts.stockChart('container', {
	//Highcharts.chart('container', {
	rangeSelector: {selected:7}
	,legend: {layout: 'vertical',align: 'right',verticalAlign: 'middle',borderWidth: 0}
	,title: {text:'Bacino inventory video',x:-20}
	,subtitle: {text:'dot,webtrekk,dotandsale',x:-20}
	,legend: {align:'right',verticalAlign:'top',layout:'vertical',x:0,y:100}
	,yAxis: {
	    text:"imps preroll (M)"
	    //,labels: {formatter: function () {return (this.value > 0 ? ' + ' : '') + this.value + '%';}}
	    ,labels: {formatter: function () {return this.value;}}
	    /* ,stackLabels: {enabled: true
	       ,style: {fontWeight: 'bold',color: 'gray'}
	       ,formatter: function() {return  this.stack;}
	       }*/
	}
	//plotLines: [{value: 0,width: 2,color: 'silver'}]},
	,plotOptions: {
	    //series: {compare: 'percent',showInNavigator: true},
	    showInLegend:true
	}
	,tooltip: {pointFormat: '<span style="color:{series.color}">{series.name}</span>: <b>{point.y}</b> <br/>',valueDecimals: 2,split: true}//({point.change}%)
	,series: seriesOptions
    })};
