// xhr = new XMLHttpRequest();
// xhr.open("GET","fig/ico/ico_tutti.svg",false);
// xhr.overrideMimeType("image/svg+xml");
// xhr.send("");
// document.getElementById("#svgembed")
//     .appendChild(xhr.responseXML.documentElement);
// element = document.getElementById(id);
// var object = document.createElement("object");
// object.type = "image/svg+xml";
// object.data = "fig/ico_tutti.svg";
// element.appendChild(object);

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
var root = loadSet('data/audPoint.json');
var data = loadSet('data/audNetwork.json');
//var links = data.links;
var links = root.links;
var treeData = data.nodes;
var width = 1400
height = 800;

var svg = d3.select("svg"),
    margin = 20,
    diameter = +svg.attr("width"),
    g = svg.append("g").attr("transform", "translate(" + diameter/2 + "," + diameter/2 + ")");

var color = d3.scaleLinear()
    .domain([-1, 5])
    .range(["hsl(152,80%,80%)","hsl(228,30%,40%)"])
    .interpolate(d3.interpolateHcl);

var pack = d3.pack()
    .size([diameter - margin, diameter - margin])
    .padding(2);

root = d3.hierarchy(root)
    .sum(function(d) { return d.size; })
    .sort(function(a, b) { return b.value - a.value; });

var focus = root,
    nodes = pack(root).descendants(),
    view;

var circle = g.selectAll("circle")
    .data(nodes)
    .enter().append("circle")
//    .style("fill-opacity",0.2)
//    .style("display",0.2)
    .style("fill", function(d){
	if(d.data.color!=undefined){return d.data.color;}
	else{return d.children ? color(d.depth) : null; }
    })
    .attr("class", function(d){return d.parent ? d.children ? "node node-group":"node node--leaf":"node node--root";})
    .on("mouseover",function(d,i){
	var txt = '';
	if(d.data.name!=undefined){txt += '<b>Gruppo</b>: ' +  d.data.name;}
	if(d.data.role!=undefined){txt += ' <b>-</b> ' +  d.data.role;}
	$('.itDesc').html(txt);
    })
    .on("mouseout",function(d){
    })
    .on("click", function(d) { if (focus !== d) zoom(d), d3.event.stopPropagation(); });

var ico = null;
// var ico = d3.select(".node")
// var ico = circle['_groups'][0]
d3.xml("fig/ico/ico_tutti.svg",function(error,xml){
    if (error){console.log(error); return;}
    var importedNode = document.importNode(xml.documentElement, true);
    var grp = importedNode.getElementById('layer1');
    var grpC = grp.children;
    ico = grpC;
    for(var i=0;i<grpC.length;i++){
	//svg.node().appendChild(grpC[i]);
	ico[grpC[i].id] = grpC[i]
    }
});

var circG = g.selectAll(".node--group")
    .data(nodes)
    .enter().append("g")
//    .append(function(d){return ico[d.id];})
    .attr("transform",function(d){return "translate("+(d.y-13)+","+(d.x-10)+")";})

circG.append("use")
    .attr("xlink:href", function(d) { return "#" + d.id; } )

//circle.append("use").attr("xlink:href","#circ_shape")

function wrInfo(d){
    //    $('.itDesc').html('nome: ' + d.data.name + 'desc: ' + d.data.role );
}

var text = g.selectAll("text")
    .data(nodes)
    .enter().append("text")
    .attr("class", "label")
    .style("fill-opacity",function(d){return d.parent === root ? 1 : 0; })
    .style("display",function(d,i){return d.parent === root ? "inline" : "none";})
    .text(function(d){return ""});// d.data.name; });

var tspan = text.append("tspan")
    .selectAll("tspan")
    .attr("class","label")
//.data(function(d) { return d.data.name.split(/(?=[A-Z][^A-Z])/g); })
    .data(function(d) { return d.data.name.split(/(?=\s[A-Z])/g); })
    .enter().append("tspan")
    .attr("x", 0)
    .attr("y", function(d, i) { return -16 + i * 30; })
    .text(function(d) {
	var nameS = d;
	if(d.length > 35){
	    nameS = d.substring(0,35) + '...';
	}
	return nameS;
    });

var tooltip = g.selectAll("tooltip")
    .data(nodes)
    .enter().append("rect")
    .attr("class","tooltip")
    .attr("opacity",1)
    .attr("fill","#000000")
    .attr("x",0)
    .attr("y",0)
    .attr("width",0)
    .attr("height",0)
    .on("mouseover", function(d,i){
	var txt = '';
	if(d.data.name!=undefined){txt += '<b>Nome</b>: ' +  d.data.name;}
	if(d.data.role!=undefined){txt += ' <b>Desc</b>: ' +  d.data.role;}
	$('.itPerson').html(txt);
    })
    .on("mouseout",function(d){
    })
    .text(function(d) {return d.data.mail ; });

var node = g.selectAll("circle,text,rect");
svg
    .on("click", function() { zoom(root); });

zoomTo([root.x, root.y, root.r * 2 + margin]);

var fontL = ['32px','28px','26px','20px','20px'];
function zoom(d) {
    var focus0 = focus; focus = d;
    var zoomLev = 0;
    if(d.parent != undefined){zoomLev = d.parent.depth + 1;}
    console.log(fontL[zoomLev]);
    // var labT = d3.selectAll("tspan")
    // 	.attr('font-size',fontL[zoomLev]);
    var transition = d3.transition()
        .duration(d3.event.altKey ? 7500 : 750)
        .tween("zoom", function(d) {
            var i = d3.interpolateZoom(view, [focus.x, focus.y, focus.r * 2 + margin]);
            return function(t) { zoomTo(i(t)); };
        });
    transition.selectAll("text")
	.filter(function(d) { return d.parent === focus || this.style.display === "inline"; })
        .style("fill-opacity", function(d) { return d.parent === focus ? 1 : 0; })
    // .attr("font-size", function(d) { return fontL[zoomLev]; })
        .on("start", function(d) { if (d.parent === focus) this.style.display = "inline"; })
        .on("end", function(d) { if (d.parent !== focus) this.style.display = "none"; });
    transition.selectAll("rect")
        .attr("x",function(d){return -zoomLev*10})
	.attr("y",function(d){return -zoomLev*10})
	.attr("width",function(d){return zoomLev*20})
	.attr("height",function(d){return zoomLev*20});
    d3.selectAll('tspan').attr('font-size',fontL[zoomLev]);
    $('.itDesc').html('');
    $('.itPerson').html('');
}

function zoomTo(v){
    var k = diameter / v[2]; view = v;
    node.attr("transform", function(d) { return "translate(" + (d.x - v[0]) * k + "," + (d.y - v[1]) * k + ")"; });
    circle.attr("r", function(d) { return d.r * k; });
    // circle.attr("rx", function(d) { return d.r * k; });
    // circle.attr("ry", function(d) { return d.r * k/2; });
}

function sleep(milliseconds) {
    var start = new Date().getTime();
    for (var i = 0; i < 1e7; i++) {
	if ((new Date().getTime() - start) > milliseconds){
	    break;
	}
    }
}
function animate(){
    var circ = document.querySelectorAll("circle");
    i = 0;
    for (var i = 0; i < circ.length; i++){
	var x = circ[i].getAttribute("cx");
	var newX = parseInt(50*(.5-Math.random())) + parseInt(x);
	if(newX > 500){newX = 20;}
	if(newX < 0){newX = 500;}
        circ[i].setAttribute("cx", newX);
	var x = circ[i].getAttribute("cy");
	var newX = parseInt(50*(.5-Math.random())) + parseInt(x);
	if(newX > 500){newX = 20;}
   	if(newX < 0){newX = 500;}
	circ[i].setAttribute("cy", newX);
	
    }
};
var counter = 0;
var timeFun = setInterval(frame,50);
var width = 0;
function frame() {
    if (width >= 50) {
	clearInterval(timeFun);
    } else {
	//animate();
	width++;
    }
}
