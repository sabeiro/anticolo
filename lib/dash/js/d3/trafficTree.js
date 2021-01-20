// normal tree building stuff taken from a tutorial somewhere
var treeData = {name: "Switch 1", type: "switch", children : [ 
    {name: "Server 1", type: 'group' },
    {name: "Server 2", type: 'group' },
    {name: "Server 3", type: 'group' } ] 
	       };

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
var data = loadSet('data/audNetwork.json');
//var links = data.links;
var links = root.links;
/* var treeData = data.nodes;*/
var treeData = root;
var width = 1400
height = 800;

var svg = d3.select("svg")
svg.attr("transform-origin","unset");
var ico = [];
var imgG = root.children;
for(var i=0;i<imgG.length;i++){
    d3.xml("fig/ico/"+imgG[i].img+".svg",function(error,xml){
	if (error){console.log(error); return;}
	var importedNode = document.importNode(xml.documentElement, true);
	var grp = importedNode.getElementById('layer1');
	var grpC = grp.children;
	//ico = grpC;
	for(var i=0;i<grpC.length;i++){
	    var c = grpC[i];
	    //var b = c.getBBox();
	    //console.log(c);
	    //c.setAttribute
	    //console.log("transform","translate(-"+b.x+",-"+b.y+")");
	    //c.setAttribute("display","none");
	    c.setAttribute("id",imgG[i].img);
	    c.setAttribute("class","icon");
	    //ico[grpC[i].id] = c;
	    ico.push(c);
	    svg.node().appendChild(c);
	}
    });
}
//svg.selectAll('.icon').attr('transform',function(d){return 'translate('+30+,','+30+')'})

var vis = d3.select("svg").append("svg:g")
    .attr("transform","translate(50,0)");
var tree = d3.layout.tree().size([300,300]);
var nodes = tree.nodes(treeData);
var links = tree.links(nodes);

//	 var icon = svg.selectAll(".icon").

var diagonalHorizontal = d3.svg.diagonal().projection( function(d) { return [d.y, d.x]; } );
var link = vis.selectAll(".nodelink")
    .data(links)
    .enter().append("path")
    .attr("class","nodelink")
    .attr("d",diagonalHorizontal)
    .attr('pointer-events', 'none');

var node = vis.selectAll("g.node")
    .data(nodes)
    .enter().append("g")
    .attr("display","inline")
    .attr("transform",function(d) {
	console.log(d.img + ' ' + d.x + ' ' + d.y);
	return "matrix(0.25,0,0,0.25,"+(d.y-13)+ ","+(d.x-10)+")";
    });

node.append("use").attr("xlink:href", function(d) {return "#"+d.img;})
