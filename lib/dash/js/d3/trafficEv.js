var headers = {"Access-Control-Allow-Headers":"*"};
function setHeader(xhr){xhr.setRequestHeader(headers);}
function loadSet(jData){
    var json = null;
    $.ajax({
	async: false
	,global: false
	,url: jData
	,headers: headers
	,crossDomain:true
	,dataType: "json"
	,success: function (data) {json = data;}
	,failure: function() {alert("problem with the file" + jData); }
	// ,beforeSend:setHeader
    });
    return json;
};
var root = loadSet('data/trafficGrp.json');
var data = loadSet('data/trafficHou.json');
var svg = d3.select("svg")
svg.attr("transform-origin","unset");
var g = svg.selectAll("g");

var margin = {top: 20, right: 120, bottom: 20, left: 120},
 width = 960 - margin.right - margin.left,
 height = 500 - margin.top - margin.bottom;
var i = 0;
var tree = d3.layout.tree()
 .size([height, width]);
var diagonal = d3.svg.diagonal()
 .projection(function(d) { return [d.y, d.x]; });

var nodes = tree.nodes(root).reverse(),
    links = tree.links(nodes);
nodes.forEach(function(d) { d.y = d.depth * 180; });
var node = svg.selectAll("g.node")
    .data(nodes, function(d) { return d.id || (d.id = ++i); });
var nodeEnter = node.enter().append("g")
    .attr("class", "node")
    .attr("transform", function(d) {
	var icoI = d3.select('#' + d.img);
	if(icoI[0][0] != null){
	    var BBox = icoI.node().getBBox();
	    d.x = BBox.x + BBox.width/2;
	    d.y = BBox.y + BBox.height/2;
	}
	console.log(d.x + ' - ' + d.y + ' - ' + d.img);
	return "translate(" + d.x + "," + d.y + ")";
    });
// nodeEnter.append("circle")
//     .attr("r", 10)
//     .style("fill", "#fff");
// nodeEnter.append("text")
//     .attr("x", function(d) { 
// 	return d.children || d._children ? -13 : 13; })
//     .attr("dy", ".35em")
//     .attr("text-anchor", function(d) { 
// 	return d.children || d._children ? "end" : "start"; })
//     .text(function(d) { return d.name; })
//     .style("fill-opacity",1);
// var link = svg.selectAll("path.link")
//     .data(links, function(d) { return d.target.id; });
// link.enter().insert("path", "g")
//     .attr("class", "link")
//     .attr("d", diagonal);


var h=0,i=0,j=0;
var hours = data.children;
var hour = hours[h];
var hSect = hour[i];
var hSite = hSect.children;
var tranTime = 1000;

function animate(h){
    var hour = hours[h];
    for(var i=0;i<hour.length;i++){
	var hSect = hour[i];
	var icoI = d3.select("#ico_"+ hSect.name)
	if(icoI[0][0] == null){continue;}
	var pathEl = icoI.node();
	var BBox = pathEl.getBBox();
	//element.getBoundingClientRect() 
	//var pathLength = pathEl.getTotalLength();
	//var scale = pathLength/BBox.width;
	var sx = sy = String(hSect.imps);
	var cx = BBox.x + BBox.width/2
	var cy = BBox.y + BBox.height/2
	cx = String(cx-hSect.imps*cx);
	cy = String(cy-hSect.imps*cy);
	icoI.transition().duration(tranTime).attr("transform","matrix("+sx+",0,0,"+sy+","+cx+","+cy+")");
	var hSite = hSect.children;
	for(var j=0;j<hSite.length;j++){
	    var icoI = d3.select("#logo_"+ hSite[j].name )
	    if(icoI[0][0] == null){continue;}
	    var pathEl = icoI.node();
	    var BBox = pathEl.getBBox();
	    var sx = sy = String(hSite[j].imps);
	    var cx = BBox.x + BBox.width/2
	    var cy = BBox.y + BBox.height/2
	    cx = String(cx-hSite[j].imps*cx);
	    cy = String(cy-hSite[j].imps*cy);
	    icoI.transition().duration(tranTime).attr("transform","matrix("+sx+",0,0,"+sy+","+cx+","+cy+")");
	    //d3.select("#logo_"+ leaf[j].name ).attr("transform","matrix("+sx+",0,0,"+sy+","+cx-sx*cx+","+cy-sy*cy+")");
	}
	$('.itDesc').html('time: '+ h + ':00');
	$('.itPerson').html('');
    }
}


// var path = d3.selectAll('path')
// var icoI = path.select("#ico_"+ node.name )

// var pathEl = path.node();
// var pathLength = pathEl.getTotalLength();
// var BBox = pathEl.getBBox();
// var scale = pathLength/BBox.width;
// var offsetLeft = document.getElementById("line").offsetLeft;
// var randomizeButton = d3.select("button");

//svg.getDocumentById('someId').setAttribute('transform-origin', '75 240');

var counter = 0;
var timeFun = setInterval(frame,tranTime);
function frame() {
    if (counter >= 24) {
	clearInterval(timeFun);
    } else {
	//console.log('anim');
	animate(counter%24);
	counter++;
    }
}

// var node = g.selectAll("g.layer1")
//     .data(root.children)
//     .enter().append("g")
//     .attr("display","inline")
//     .attr("transform",function(d) {
// 	console.log(d.img + ' ' + d.x + ' ' + d.y);
// 	return "matrix(0.25,0,0,0.25,"+(d.y-13)+ ","+(d.x-10)+")";
//     });

