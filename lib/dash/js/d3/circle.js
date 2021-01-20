var svg = d3.select("svg"),
    width = +svg.attr("width");

var format = d3.format(",d");

var color = d3.scaleOrdinal(d3.schemeCategory20c);

var pack = d3.pack()
    .size([width, width])
    .padding(1.5);

function loadSet(jData) {
    var json = null;
    $.ajax({
	async: false,
	global: false,
	url: jData,
	dataType: "json",
	success: function (data) {
            json = data;
	},
	failure: function() {alert("problem with the file" + jData); }
    });
    return json;
};
var data = loadSet('data/itParlamento.json');
//var data = loadSet('data/flare.json');

var root = d3.hierarchy(data)
    .eachBefore(function(d) {
	d.data.id = (d.parent ? d.parent.data.id + "." : "") + d.data.name;
	d.id = id;
        d.package = d.id.slice(0,i);
        d.class = d.id.slice(i+1);
    })
    .sum(function(d){return d.children ? 0 : 1;})
    .sort(function(a, b){return b.height - a.height || b.value - a.value; });

var node = svg.selectAll(".node")
    .data(pack(root).leaves())
    .enter().append("g")
    .attr("class", "node")
    .attr("transform", function(d) { return "translate(" + d.x + "," + d.y + ")"; });

node.append("circle")
    .attr("id", function(d) { return d.id; })
    .attr("r", function(d) { return d.r; })
    .style("fill", function(d) { return color(d.package); });

node.append("clipPath")
    .attr("id", function(d) { return "clip-" + d.id; })
    .append("use")
    .attr("xlink:href", function(d) { return "#" + d.id; });

node.append("text")
    .attr("clip-path", function(d) { return "url(#clip-" + d.id + ")"; })
    .selectAll("tspan")
    .data(function(d) { return d.class.split(/(?=[A-Z][^A-Z])/g); })
    .enter().append("tspan")
    .attr("x", 0)
    .attr("y", function(d, i, nodes) { return 13 + (i - nodes.length / 2 - 0.5) * 10; })
    .text(function(d) { return d; });

node.append("title")
    .text(function(d) { return d.id + "\n" + format(d.value); });

