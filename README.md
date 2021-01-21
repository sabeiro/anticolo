# Anticolo

reporting dashboard made out of a simple automated architecture

![dash_result]("fig/dash_result.png")

# install

```
git clone https://github.com/sabeiro/anticolo.git
cp lib/conf/config.generic.php lib/conf/config.inc.php ## fill in your mysql credentials
unzip plugins.zip
```

# architecture
old style infra

![](fig/dash_plugin.svg)
_structured and unstructured data_

unstructured data
![](fig/dash_json.png)
_all relevant info_

json rendering
![](fig/dash_top.png)
_the info is rendered in the template_

html
![](fig/dash_html.png)
_position of the elements_

javascript
![](fig/dash_ajax.png)
_load json and render html at the right place_

php
![](fig/dash_php.png)
_sql connector and private area_

sql
![](fig/dash_sql.png)
_sql tables_

jsonp
![](fig/dash_jsonp.png)
_format tables with json callback_

python
![](fig/dash_python.png)
_writing sql tables_

R
![](fig/dash_R.png)
_R sql access_


# UI

template
<a href="https://adminlte.io/themes/dev/AdminLTE/index.html) ![](fig/dash_template.png) </a>
_template admin lte_

morris<
<a href="http://morrisjs.github.io/morris.js/) ![](fig/dash_morris.png) </a>
_format tables with json callback_

cytoscape
<a href="https://js.cytoscape.org/) ![](fig/dash_cytoscape.png) </a>
_format tables with json callback_

cubism
<a href="https://square.github.io/cubism/) ![](fig/dash_cubism.png) </a>
_format tables with json callback_

d3
	<a href="https://d3js.org/) ![](fig/dash_d3.png) </a>
_format t_

highcharts
<a href="https://www.highcharts.com) ![](fig/dash_highcharts.png) </a>
_format tables with json callback_

chartist
<a href="http://gionkunz.github.io/chartist-js/) ![](fig/dash_chartist.png) </a>
_format tables with json callback_

# features

barcharts
![](fig/dash_bar.png)
_daily/weekly/monthly feeds_

sunburst
![](fig/dash_sun.png)
_tree exploration_

tree heatmap
![](fig/dash_tree.png)
_tree exploration_

customer base
![](fig/audOverlap.gif)
_customer difference by cohort_

gain
![](fig/audPerformance.jpg)
_testing in different scenarios_

lifetime
![](fig/cookieLifetime.jpg)
_lifetime comparison_

audience composition
![](fig/inTargetHistfirstSd.jpg)
_feature split_

gain
![](fig/evLogisticTime.jpg)
_feature split_

line + bar
![](fig/invHistDetail.png)
_effect of events_

forecast
![](fig/invHistDetail1.jpg)
_forecast and past seasonalities_

growth
![](fig/invHistGrowth.jpg)
_relative growth + contributions_

time series
![](fig/invSeasMonth.jpg)
_relative growth + contributions_
