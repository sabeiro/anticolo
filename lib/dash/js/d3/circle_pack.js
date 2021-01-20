var headers = {"Access-Control-Allow-Headers":"*"};
function setHeader(xhr) {
    xhr.setRequestHeader(headers);
}
function loadSet(jData) {
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
var root = loadSet('data/audience_demo.json');

var svg = d3.select("svg"),
    margin = 20,
    diameter = +svg.attr("width"),
    g = svg.append("g").attr("transform", "translate(" + diameter / 2 + "," + diameter / 2 + ")");

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
    .attr("class", function(d){return d.parent ? d.children ? "node" : "node node--leaf" : "node node--root"; })
    .on("mouseover",function(d,i){
	var txt = '';
	if(d.data.name!=undefined){txt += '<b>Gruppo</b>: ' +  d.data.name;}
	if(d.data.role!=undefined){txt += ' <b>-</b> ' +  d.data.role;}
	$('.itDesc').html(txt);
    })
    .on("mouseout",function(d){
    })
    .on("click", function(d) { if (focus !== d) zoom(d), d3.event.stopPropagation(); });

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
//    .style("background", color(-1))
//    .style("background",'#b4f8ee')
    // .attr("fill","rgba(255,255,255,0.1)")
    // .attr("fill-opacity","0.1")
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

