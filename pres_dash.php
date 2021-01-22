<!DOCTYPE html><html><head>
    <title>Working experiences</title>
    <meta charset="utf-8">
    <meta name="author" content="Giovanni Marelli">
    <meta name="description" content="">
    <link href="lib/pres/style.css" rel="stylesheet">
    <script>
     var link = document.createElement('link');
     link.rel = 'stylesheet';
     link.type = 'text/css';
     link.href = window.location.search.match(/print-pdf/gi) ? 'lib/pres/pdf.css' : 'lib/pres/paper.css';
     document.getElementsByTagName('head')[0].appendChild(link);
    </script>
</head>
<body>
    <div class="logoMedia"><a href="index.php>"<img src="fig/dauvi_plain.svg"></a></div>
    <div class="corpHeader">anticolo dataroom</div>
    <div class="corpFooter"></div>
    <div class="reveal">
	<div class="slides">
	    <section id="title">
		<h1>anticolo dataroom</h1>
		<img src="fig/dash_cover.png">
		<p><a href="http://dauvi.org/portfolio" target="_blank">G. Marelli</a> @ <a href="http://dauvi.org" target="_blank">dauvi</a></p>
	    </section>
	    <section id="outline"><h2>Outline</h2><ol><li>architecture</li><li>user interface</li><li>features</li></ol></section>
	    <section><!-- measurements -->
		<section id="arch"><h2>architecture</h2></section>
		<section id="arch1" data-math><h3>old style infra</h3>
		    <img src="fig/dash_plugin.svg">
		    <h5>structured and unstructured data</h5>
		</section>
		<section id="arch2" data-math><h3>unstructured data</h3>
		    <img src="fig/dash_json.png">
		    <h5>all relevant info</h5>
		</section>
		<section id="arch3" data-math><h3>json rendering</h3>
		    <img src="fig/dash_top.png">
		    <h5>the info is rendered in the template</h5>
		</section>
		<section id="arch4" data-math><h3>html</h3>
		    <img src="fig/dash_html.png">
		    <h5>position of the elements</h5>
		</section>
		<section id="arch4" data-math><h3>javascript</h3>
		    <img src="fig/dash_ajax.png">
		    <h5>load json and render html at the right place</h5>
		</section>
		<section id="arch5" data-math><h3>php</h3>
		    <img src="fig/dash_php.png">
		    <h5>sql connector and private area</h5>
		</section>
		<section id="arch6" data-math><h3>sql</h3>
		    <img src="fig/dash_sql.png">
		    <h5>sql tables</h5>
		</section>
		<section id="arch6" data-math><h3>jsonp</h3>
		    <img src="fig/dash_jsonp.png">
		    <h5>format tables with json callback</h5>
		</section>
		<section id="arch7" data-math><h3>python</h3>
		    <img src="fig/dash_python.png">
		    <h5>update sql with pandas</h5>
		</section>
		<section id="arch8" data-math><h3>R</h3>
		    <img src="fig/dash_R.png">
		    <h5>connect sql with R data frames</h5>
		</section>
	    </section><!-- measurements -->
	    <section><!-- pretargeting -->
		<section id="ui"><h2>user interface</h2></section>
		<section id="ui1" data-math><h3>template</h3>
		    <a href="https://adminlte.io/themes/dev/AdminLTE/index.html"> <img src="fig/dash_template.png"> </a>
		    <h5>template admin lte</h5>
		</section>
		<section id="ui2" data-math><h3>morris</h3>
		    <a href="http://morrisjs.github.io/morris.js/"> <img src="fig/dash_morris.png"> </a>
		    <h5>format tables with json callback</h5>
		</section>
		<section id="ui3" data-math><h3>cytoscape</h3>
		    <a href="https://js.cytoscape.org/"> <img src="fig/dash_cytoscape.png"> </a>
		    <h5>format tables with json callback</h5>
		</section>
		<section id="ui4" data-math><h3>cubism</h3>
		    <a href="https://square.github.io/cubism/"> <img src="fig/dash_cubism.png"> </a>
		    <h5>format tables with json callback</h5>
		</section>
		<section id="ui5" data-math><h3>d3</h3>
		    <a href="https://d3js.org/"> <img src="fig/dash_d3.png"> </a>
		    <h5>format t</h5>
		</section>
		<section id="ui6" data-math><h3>highcharts</h3>
		    <a href="https://www.highcharts.com"> <img src="fig/dash_highcharts.png"> </a>
		    <h5>format tables with json callback</h5>
		</section>
		<section id="ui7" data-math><h3>chartist</h3>
		    <a href="http://gionkunz.github.io/chartist-js/"> <img src="fig/dash_chartist.png"> </a>
		    <h5>format tables with json callback</h5>
		</section>
	    </section><!-- pretargeting -->
	    <section><!-- labeling -->
		<section id="feat"><h2>features</h2></section>
		<section id="feat1" data-math><h3>barcharts</h3>
		    <img src="fig/dash_bar.png">
		    <h5>daily/weekly/monthly feeds</h5>
		</section>
		<section id="feat2" data-math><h3>sunburst</h3>
		    <img src="fig/dash_sun.png">
		    <h5>tree exploration</h5>
		</section>
		<section id="feat3" data-math><h3>tree heatmap</h3>
		    <img src="fig/dash_tree.png">
		    <h5>tree exploration</h5>
		</section>
		<section id="feat4" data-math><h3>customer base</h3>
		    <img src="fig/audOverlap.gif">
		    <h5>customer difference by cohort</h5>
		</section>
		<section id="feat5" data-math><h3>gain</h3>
		    <img src="fig/audPerformance.jpg">
		    <h5>testing in different scenarios</h5>
		</section>
		<section id="feat6" data-math><h3>lifetime</h3>
		    <img src="fig/cookieLifetime.jpg">
		    <h5>lifetime comparison</h5>
		</section>
		<section id="feat7" data-math><h3>audience composition</h3>
		    <img src="fig/inTargetHistfirstSd.jpg">
		    <h5>feature split</h5>
		</section>
		<section id="feat8" data-math><h3>feature importance</h3>
		    <img src="fig/evLogisticTime.jpg">
		    <h5>feature split</h5>
		</section>
		<section id="feat9" data-math><h3>line + bar</h3>
		    <img src="fig/invHistDetail.png">
		    <h5>effect of events</h5>
		</section>
		<section id="feat10" data-math><h3>forecast</h3>
		    <img src="fig/invHistDetail1.jpg">
		    <h5>forecast and past seasonalities</h5>
		</section>
		<section id="feat11" data-math><h3>growth</h3>
		    <img src="fig/invHistGrowth.jpg">
		    <h5>relative growth + contributions</h5>
		</section>
		<section id="feat12" data-math><h3>time series</h3>
		    <img src="fig/invSeasMonth.jpg">
		    <h5>relative growth + contributions</h5>
		</section>
	    </section><!-- labeling -->
	    <section id="sum" data-math><h3>summary</h3>
		<ol><li>all relevant charts included</li><li>low maintenance</li><li>frequent update</li></ol>
	    </section>
	    <section id="resources"><h2>Resources</h2><p><a href="https://dauvi.org" target="_blank">dauvi</a></p><p><a href="https://dauvi.org/intertino" target="_blank">intertino</a></p><p><a href="?print-pdf" target="_blank">formato stampa</a></p></section>
	    <!-- <section id="end"><h1>Grazie</h1><h2>per l'attenzione</h2></section></div></div> -->
	    </div>
	    </div>
	        <script src="lib/pres/head.min.js"></script>
    <script src="lib/pres/reveal.min.js"></script>
    <script type="text/javascript" src="lib/pres/jquery.min.js"></script>
    <script>
     Reveal.initialize({ history: true, // rollingLinks: false,
			 dependencies: [{ src: 'lib/pres/highlight.js', async: true,  callback: function() { hljs.initHighlightingOnLoad(); } } ] });
    </script>
    <script src="lib/pres/d3.v3.min.js"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=es6"></script>
    <script id="MathJax-script" async src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js"></script>

</body></html>
	
