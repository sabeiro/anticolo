var width = 1400, height = 1000;
var color = d3.scale.category20();

var svg = d3.select("body").append("svg")
    .attr("width", width)
    .attr("height", height);

var force = d3.layout.force()
    .gravity(.05)
    .distance(100)
    .charge(-100)
    .size([width, height]);

d3.json("data/graph.json", function(json) {
    force
	.nodes(json.nodes)
	.links(json.links)
	.size([width, height])
	.linkDistance(50)
	.charge(-120)
	.on("tick", tick)
	.start();
    
    var link = svg.selectAll(".link")
	.data(force.links())
	.enter().append("line")
	.attr("class", "link")
	.style("stroke-width", function(d) { return Math.sqrt(d.value); });
    
    var node = svg.selectAll(".node")
	.data(force.nodes())
	.enter().append("g")
	.attr("class", "node")
	.style("fill", function(d) { return color(d.group); })
	.style("opacity", 0.9)
	.on("mouseover", mouseover)
	.on("mouseout", mouseout)
	.call(force.drag);
    
    node.append("circle")
	.attr("r", 6)

    node.append("svg:text")
	.attr("class", "nodetext")
	.attr("dx", 12)
	.attr("dy", ".35em")
	.text(function(d) { return d.name });
    
    function tick() {
	link
	    .attr("x1", function(d) { return d.source.x; })
	    .attr("y1", function(d) { return d.source.y; })
	    .attr("x2", function(d) { return d.target.x; })
	    .attr("y2", function(d) { return d.target.y; });
	
	node.attr("transform", function(d) { return "translate(" + d.x + "," + d.y + ")"; });
    }
    
    function mouseover() {
	d3.select(this).select("circle").transition()
	    .duration(750)
	    .attr("r", 16);
	d3.select(this).select("text").transition()
	    .duration(750)
	    .attr("x", 13)
	    .style("stroke-width", ".5px")
	    .style("font", "17.5px serif")
	    .style("opacity", 1);
    }
    
    function mouseout() {
	d3.select(this).select("circle").transition()
	    .duration(750)
	    .attr("r", 8);
    }

});
