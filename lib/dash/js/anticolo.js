/*
 * Author: Giovanni Marelli
 * Date: 6 Apr 2015
 * Description:
 *      This is a demo file used only for the main dashboard (index.php)
 **/
function injectScript(src) {
    return new Promise((resolve, reject) => {
        const script = document.createElement('script');
        script.async = true;
        script.src = src;
        script.addEventListener('load', resolve);
        script.addEventListener('error', () => reject('Error loading script.'));
        script.addEventListener('abort', () => reject('Script loading aborted.'));
        document.head.appendChild(script);
    });
}
// injectScript('http://example.com/script.js')
//     .then(() => {
//         console.log('Script loaded!');
//     }).catch(error => {
//         console.log(error);
//     });


function addJs(name) {
    script = document.createElement('script');
    script.type = 'text/javascript';
    script.async = true;
    script.onload = function(){
        // remote script has loaded
    };
    script.src = name;
    document.getElementsByTagName('body')[0].appendChild(script);
};
function addCss(name) {
    link = document.createElement('link');
    link.rel = 'stylesheet';
    link.async = true;
    link.onload = function(){
        // remote script has loaded
    };
    link.href = name;
    document.getElementsByTagName('head')[0].appendChild(link);
};

var boxControls = '';
var boxControlsOld = '<div class="box-tools pull-right"><button class="btn bg-teal btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button><button class="btn bg-teal btn-sm" data-widget="remove"><i class="fa fa-times"></i></button></div>';
var colorIt = ["bg-aqua","bg-green","bg-yellow","bg-red","bg-blue","bg-purple","bg-teal","bg-maroon"];
var colorIt = colorIt.concat(colorIt);
var iconIt = ["ion-bag","ion-stats-bar","ion-person-add","ion-pie-graph","ion-ios7-cart-outline","ion-ios7-briedcase-outline","ion-ios7-alarm-outline","ion-ios7-pricetag-outline"];
var QW = null;
function popDash(){
    //-------------------------title------------------
    $('#itTitle').html('<h3>' + QW.Name + '</h3><h4>' + QW.Desc + '</h4>');
    //-------------------------dash-------------------
    if(typeof(QW.Parameter)!="undefined"){
	var txt = '<div class="row">'
	for(var i=0;i<QW.Parameter.length;i++){
	    txt += '<div class="col-lg-3 col-xs-6"><!-- small box --><a href="'+QW.Parameter[i].link+'" class="small-box ' + colorIt[i] + '"><div id="dashIt' + i + '" class="inner"><h3>'+QW.Parameter[i].val+'</h3><p>'+QW.Parameter[i].name+'</p></div><div class="icon"><i class="ion '+iconIt[i]+'"></i></div><div class="small-box-footer">'+QW.Parameter[i].ref+'<i class="fa fa-arrow-circle-right"></i></div></a></div><!-- ./col -->';
	    //if( ((i+1)%4) == 0){txt += '</div><!-- /.row --><div class="row">';}
	}
	txt += '</div><!-- /.row -->';
	$('#dashTab').html(txt);
    }
    //------------------------chart------------------
    if(typeof(QW.MorrisArea)!="undefined"){
	// addCss("js/plugins/morris/morris.css");
	// <ul class="nav nav-tabs pull-right"><li class="pull-left header"><i class="fa fa-inbox"></i> Sales</li></u>l
	var txt = '<div class="box box-solid bg-teal-gradient"><div class="box-header ui-sortable-handle" style="cursor: move;"><i class="fa fa-th"></i><h3 class="box-title">Rev growth</h3>'+boxControls+'</div><div class="box-body border-radius-none">';
	//txt += '<div class="chart" id="line-chart" style="height: 250px;">';
	txt += '<div class="tab-content no-padding"><div class="chart tab-pane active" id="revenue-chart" style="position: relative; height: 300px;"></div>';
	txt += '<div class="box-body border-radius-none"><div class="chart" id="line-chart" style="height: 250px;"></div></div><!-- /.box-body -->';
	txt += '</div></div></div></div><!-- /.box-body -->';
	//     <div class="morris-hover morris-default-style" style="left: 89.7763px; top: 35px; display: none;"><div class="morris-hover-row-label">2015 Q1</div><div class="morris-hover-point" style="color: #efefef">
	//     generated:
	// 100
	// </div><div class="morris-hover-point" style="color: #efefef">
	//     goal:
	// 400
        txt += '</div>';
	$('#itChart').html(txt);
	var area = new Morris.Area(QW.MorrisArea);
	var line = new Morris.Line(QW.MorrisLine);
    }
    //--------------------Donut Chart-----------------
    if(typeof(QW.Donut)!="undefined"){
	var txt = '<div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;"></div>';
	$('#itDonut').html(txt);
	var donut = new Morris.Donut({element: 'sales-chart',resize: true,colors: ["#3c8dbc", "#f56954", "#00a65a"],data: QW.Donut,hideHover: 'auto'});
	$('.box ul.nav a').on('shown.bs.tab', function(e) {
            area.redraw();
            donut.redraw();
	});
    }
    if(typeof(QW.MorrisBar)!="undefined"){
	var txt = '<div class="chart tab-pane" id="bar-chart" style="position: relative; height: 300px;"></div>';
	$('#itMorrisbar').html(txt);
	var bar = new Morris.Bar(QW.MorrisBar);
	// $("#loading-example").boxRefresh({
        //     source: "lib/dashboard-boxrefresh-demo.php",
        //     onLoadDone: function(box) {
	// 	bar = new Morris.Bar({element: 'bar-chart',resize: true,data: QW.dataBar,barColors: ['#00a65a', '#f56954'],xkey: 'y',ykeys: ['a', 'b'],labels: ['CPU', 'DISK'],hideHover: 'auto'});}
	// });
    }
    if(typeof(QW.barChart)!="undefined"){
	var divIt = '<div class="box box-success"><div class="box-header with-border"><h3 class="box-title">'+QW.barChart.title+'</h3><div class="box-tools pull-right"><button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button><button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button></div></div><div class="box-body"><div class="chart"><canvas id="barChart" style="height:230px"></canvas></div></div><!-- /.box-body --></div><!-- /.box -->';
	$('#itBarchart').html(divIt);
	var barChartCanvas = $("#barChart").get(0).getContext("2d");
	var barChart = new Chart(barChartCanvas);
	barChart.Bar(QW.barChart.data,QW.barChart.options);
    }
    //------------------------image---------------------
    if(typeof(QW.Snapshot)!="undefined"){
	var txt = '<div class="box box-solid bg-light-blue-gradient box-header">';
	for(var i=0;i<QW.Snapshot.length;i++){
	    txt += '<h3>'+ QW.Snapshot[i].title +'</h3>' + '<a href="' + QW.Snapshot[i].link + '"><img width="100%" src="' + QW.Snapshot[i].img + '"></img></a>'
	}
	txt += '</div>';
	$("#itImage").html(txt);
    }
    //------------------------chat---------------------
    if(typeof(QW.chatBox)!="undefined"){
	var txt = '<div class="box box-success"><div class="box-header"><i class="fa fa-comments-o"></i><h3 class="box-title">Chat</h3><div class="box-tools pull-right" data-toggle="tooltip" title="Status"><div class="btn-group" data-toggle="btn-toggle" ><button type="button" class="btn btn-default btn-sm active"><i class="fa fa-square text-green"></i></button><button type="button" class="btn btn-default btn-sm"><i class="fa fa-square text-red"></i></button></div></div></div>';
	txt += '<div class="box-body chat" id="chat-box"><div class="item">';
	for(var i=0;i<QW.chatBox.length;i++){
	    txt += '<img src="' + QW.chatBox[i].img + '" alt="user image" class="online">';
	    txt += '<p class="message"><a href="#" class="name"><small class="text-muted pull-right"><i class="fa fa-clock-o"></i> 2:15</small>' + QW.chatBox[i].author + '</a>' + QW.chatBox[i].text + '</p>';
	    //txt += '<div class="attachment"><h4>Attachments:</h4><p class="filename">Theme-thumbnail-image.jpg</p><div class="pull-right"><button class="btn btn-primary btn-sm btn-flat">Open</button></div></div><!-- /.attachment --></div><!-- /.item -->';
	}
	//txt += '<div class="box-footer"><div class="input-group"><input class="form-control" placeholder="Type message..."><div class="input-group-btn"><button class="btn btn-success"><i class="fa fa-plus"></i></button></div></div></div>';
	txt += '</div><!-- /.box (chat box) --></div><!-- /.item -->';
	$('#chat-box').slimScroll({height: '250px'});
    }
    //------------------------todo----------------------------------------
    if(typeof(QW.Todo)!="undefined"){
	var txt = '<div class="box box-primary"><div class="box-header"><i class="ion ion-clipboard"></i><h3 class="box-title">To Do List</h3><div class="box-tools pull-right"><ul class="pagination pagination-sm inline"><li><a href="#">&laquo;</a></li><li><a href="#">1</a></li><li><a href="#">2</a></li><li><a href="#">3</a></li><li><a href="#">&raquo;</a></li></ul></div></div><!-- /.box-header -->';
	txt += '<div class="box-body"><ul class="todo-list">';
	for(var i=0;i<QW.Todo.length;i++){
	    //txt += '<li><!-- drag handle --><span class="handle"><i class="fa fa-ellipsis-v"></i><i class="fa fa-ellipsis-v"></i></span><!-- checkbox --><input type="checkbox" value="' + QW.Todo[i].status + '" name=""/><!-- todo text --><span class="text">' + QW.Todo[i].name + '</span><!-- Emphasis label --><small class="label label-danger"><i class="fa fa-clock-o"></i> 2 mins</small><!-- General tools such as edit or delete--><div class="tools"><i class="fa fa-edit"></i><i class="fa fa-trash-o"></i></div></li>';
	    txt += '<li><span class="handle"><i class="fa fa-ellipsis-v"></i><i class="fa fa-ellipsis-v"></i></span><input type="checkbox" value="'+QW.Todo[i].status+'" name=""><span class="text">' + QW.Todo[i].text + '</span><small class="label label-info"><i class="fa fa-clock-o"></i>'+QW.Todo[i].time+'</small><div class="tools"><i class="fa fa-edit"></i><i class="fa fa-trash-o"></i></div></li>';
	}
	txt += '</ul></div><div class="box-footer clearfix no-border"><button class="btn btn-default pull-right"><i class="fa fa-plus"></i> Add item</button></div></div>';
	$("#itTodo").html(txt);
	/* The todo list plugin */
	// $(".todo-list").todolist({
        //     onCheck: function(ele) {
	// 	//console.log("The element has been checked")
        //     },
        //     onUncheck: function(ele) {
	// 	//console.log("The element has been unchecked")
        //     }
	// });
    }
    //------------------------table----------------------------------------
    if(typeof(QW.Table)!="undefined"){
	var tableIt = '<div class="box-header with-border"><h3 class="box-title">'+QW.TableHead.name+'</h3> </div><!-- /.box-header --> <div class="box-body"><table class="table table-bordered"> <tbody><tr><th style="width: 10px">#</th><th>'+QW.TableHead.col[0]+'</th><th>'+QW.TableHead.col[1]+'</th><th style="width: 40px">'+QW.TableHead.col[2]+'</th></tr>';
	for(var i=0;i<QW.Table.length;i++){
    	    tableIt = tableIt + '<tr><td> ' + i +'. </td><td><a href="' + QW.Table[i].link + '"> ' + QW.Table[i].label + '</a></td><td><div class="progress progress-xs">';
    	    if(QW.Table[i].value < 50){
		tableIt = tableIt + '<div class="progress-bar progress-bar-danger" style="width: '+QW.Table[i].value+'%"></div></div></td><td><span class="badge bg-red">'+QW.Table[i].value+'%';
    	    }
    	    else if(QW.Table[i].value < 70){
		tableIt = tableIt + '<div class="progress-bar progress-bar-yellow" style="width: '+QW.Table[i].value+'%"></div></div></td><td><span class="badge bg-yellow">'+QW.Table[i].value+'%';
    	    }
    	    else{
		tableIt = tableIt + '<div class="progress-bar progress-bar-success" style="width: '+QW.Table[i].value+'%"></div></div></td><td><span class="badge bg-green">'+QW.Table[i].value+'%';
    	    }
    	    tableIt = tableIt + '</span></td></tr>';
	}
	tableIt = tableIt + '</tbody></table></div>';
	$('#itTable').html(tableIt);
    }
    //------------------------email----------------------------------------
    if(typeof(QW.email)!="undefined"){
	var txt = '<div class="box box-info"><div class="box-header"><i class="fa fa-envelope"></i><h3 class="box-title">Quick Email</h3><!-- tools box --><div class="pull-right box-tools"><button class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button></div><!-- /. tools --></div>';
	txt += '<div class="box-body"><form action="#" method="post"><div class="form-group"><input type="email" class="form-control" name="emailto" placeholder="Email to:"></div><div class="form-group"><input type="text" class="form-control" name="subject" placeholder="Subject"></div><div><textarea class="textarea" placeholder="Message" style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea></div></form></div><div class="box-footer clearfix"><button class="pull-right btn btn-default" id="sendEmail">Send <i class="fa fa-arrow-circle-right"></i></button></div></div>';
	$("#itEmail").html(txt);
    }
    //------------------------text-editor---------------
    $(".textarea").wysihtml5();
    //------------------------map-------------------------
    if(typeof(QW.Market)!="undefined"){
	var txt = '<div class="box box-solid bg-light-blue-gradient"><div class="box-header"><!-- tools box --><div class="pull-right box-tools"><button class="btn btn-primary btn-sm daterange pull-right" data-toggle="tooltip" title="Date range"><i class="fa fa-calendar"></i></button><button class="btn btn-primary btn-sm pull-right" data-widget="collapse" data-toggle="tooltip" title="Collapse" style="margin-right: 5px;"><i class="fa fa-minus"></i></button></div><!-- /. tools -->';
	txt += '<i class="fa fa-map-marker"></i><h3 class="box-title">Visitors</h3></div><div class="box-body"><div id="world-map" style="height: 250px; width: 100%;"></div></div><!-- /.box-body-->';
	for(var i=0;i<=QW.sparkline.length-1;i++){
	    txt += '<div class="box-footer no-border"><div class="row"><div class="col-xs-4 text-center" style="border-right: 1px solid #f4f4f4"><div id="sparkline-'+i+'"></div><div class="knob-label">'+QW.sparkline[i].name+'</div></div><!-- ./col -->';
	}
	txt += '</div><!-- /.row --></div></div><!-- /.box -->';
	$("#itMap").html(txt);
	$('#world-map').vectorMap({
	    map: 'world_mill_en',
	    backgroundColor: "transparent",
	    regionStyle: {initial: {fill: '#e4e4e4',"fill-opacity": 1,stroke: 'none',"stroke-width": 0,"stroke-opacity": 1}
			 },
	    series: {regions: [{values: QW.Market,scale: ["#92c1dc", "#ebf4f9"],normalizeFunction: 'polynomial'}]},
	    onRegionLabelShow: function(e, el, code) {
		if (typeof QW.Market[code] != "undefined")
		    el.html(el.html() + ': ' + QW.Market[code] + ' active');
	    }
	});
	for(var i=0;i<=QW.sparkline.length-1;i++){
	    $('#sparkline-'+i).sparkline(QW.sparkline[i].vec, {type: 'line',lineColor: '#92c1dc',fillColor: "#ebf4f9",height: '50',width: '80'});
	}
    }
    //---------------------sales-graph------------------
    if(typeof(QW.Knob)!="undefined"){
	var txt = '<div class="box box-solid bg-teal-gradient"><div class="box-header"><i class="fa fa-th"></i><h3 class="box-title">'+'Size share'+'</h3><div class="box-tools pull-right"><button class="btn bg-teal btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button><button class="btn bg-teal btn-sm" data-widget="remove"><i class="fa fa-times"></i></button></div></div>';
	txt += '<div class="box-footer no-border"><div class="row">';
	for(var i=0;i<QW.Knob.length;i++){
	    txt += '<div class="col-xs-4 text-center" style="border-right: 1px solid #f4f4f4"><input type="text" class="knob" data-readonly="true" value="'+QW.Knob[i].value+'" data-width="60" data-height="60" data-fgColor="#39CCCC">';
	    txt += '<div class="knob-label">'+QW.Knob[i].name+'</div></div><!-- ./col -->';
	}
	txt += '</div><!-- /.row --></div><!-- /.box-footer --></div><!-- /.box -->';
	$("#itSaleGraph").html(txt);
	// var txtKnob = '<div class="box-footer no-border"><div class="row"><div class="col-xs-4 text-center" style="border-right: 1px solid #f4f4f4"><div style="display:inline;width:60px;height:60px;"><canvas width="60" height="60"></canvas><input class="knob" data-readonly="true" value="20" data-width="60" data-height="60" data-fgcolor="#39CCCC" readonly="readonly" style="width: 34px; height: 20px; position: absolute; vertical-align: middle; margin-top: 20px; margin-left: -47px; border: 0px none; background: transparent none repeat scroll 0% 0%; font: bold 12px Arial; text-align: center; color: rgb(57, 204, 204); padding: 0px;" type="text"></div><div class="knob-label">Mail-Orders</div></div><!-- ./col --><div class="col-xs-4 text-center" style="border-right: 1px solid #f4f4f4"><div style="display:inline;width:60px;height:60px;"><canvas width="60" height="60"></canvas><input class="knob" data-readonly="true" value="50" data-width="60" data-height="60" data-fgcolor="#39CCCC" readonly="readonly" style="width: 34px; height: 20px; position: absolute; vertical-align: middle; margin-top: 20px; margin-left: -47px; border: 0px none; background: transparent none repeat scroll 0% 0%; font: bold 12px Arial; text-align: center; color: rgb(57, 204, 204); padding: 0px;" type="text"></div>';
	// txtKnob += '<div class="knob-label">Online</div></div><!-- ./col --><div class="col-xs-4 text-center"><div style="display:inline;width:60px;height:60px;"><canvas width="60" height="60"></canvas><input class="knob" data-readonly="true" value="30" data-width="60" data-height="60" data-fgcolor="#39CCCC" readonly="readonly" style="width: 34px; height: 20px; position: absolute; vertical-align: middle; margin-top: 20px; margin-left: -47px; border: 0px none; background: transparent none repeat scroll 0% 0%; font: bold 12px Arial; text-align: center; color: rgb(57, 204, 204); padding: 0px;" type="text"></div><div class="knob-label">In-Store</div></div><!-- ./col --></div><!-- /.row --></div><!-- /.box-footer -->';
	
    }
    //------------------------calendar------------------
    if(typeof(QW.Progress)!="undefined"){
	var txt = '<div class="box box-solid bg-green-gradient"><div class="box-header"><i class="fa fa-calendar"></i><h3 class="box-title">Calendar</h3><div class="pull-right box-tools"><div class="btn-group"><button class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bars"></i></button><ul class="dropdown-menu pull-right" role="menu"><li><a href="#">Add new event</a></li><li><a href="#">Clear events</a></li><li class="divider"></li><li><a href="#">View calendar</a></li></ul>';
        txt += '</div><button class="btn btn-success btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button><button class="btn btn-success btn-sm" data-widget="remove"><i class="fa fa-times"></i></button></div></div><div class="box-body no-padding">';
	txt += '<div id="calendar" style="width: 100%"></div></div><!-- /.box-body --><div class="box-footer text-black"><div class="row"><div class="col-sm-6"><div class="clearfix"><span class="pull-left">Task #1</span><small class="pull-right">90%</small></div><div class="progress xs"><div class="progress-bar progress-bar-green" style="width: 90%;"></div></div>';
	txt += '<div class="clearfix"><span class="pull-left">Task #2</span><small class="pull-right">70%</small></div><div class="progress xs"><div class="progress-bar progress-bar-green" style="width: 70%;"></div></div></div>';
        txt += '<div class="col-sm-6"><div class="clearfix"><span class="pull-left">Task #3</span><small class="pull-right">60%</small></div><div class="progress xs"><div class="progress-bar progress-bar-green" style="width: 60%;"></div></div><div class="clearfix"><span class="pull-left">Task #4</span><small class="pull-right">40%</small></div><div class="progress xs"><div class="progress-bar progress-bar-green" style="width: 40%;"></div></div></div><!-- /.col --></div><!-- /.row --></div></div><!-- /.box -->';
	$("#itCalendar").html(txt);
	for(var i=0;i<QW.Progress.length;i++){
	    var date = new Date(QW.Progress[i].date);
	}
	$("#calendar").datepicker({
	    beforeShowDay: function(d){
		var result = [true,'',null];
		var matching = $.grep(QW.Progress,function(event){
	    	    return event.date.valueOf() === date.valueOf();
		});
		if(matching.length){
	    	    result = [true,'highlight',null];
		}
		return result;
	    },
	    onSelect:function(dateText){
		var selectedDate = new Date(dateText);
		var event = null;
		for(var i=0;i<QW.Progress.length;i++){
		    var date = new Date(QW.Progress[i].date);
		    if(selectedDate.valueOf() === date.valueOf()){
			event = QW.Progress[i].name;
		    }
		    i++;
		}
		if(event){
		    alert(event);
		}
	    }
	});
	$('.daterange').daterangepicker({
            ranges: {
		'Today': [moment(), moment()],
		'Yesterday': [moment().subtract('days', 1), moment().subtract('days', 1)],
		'Last 7 Days': [moment().subtract('days', 6), moment()],
		'Last 30 Days': [moment().subtract('days', 29), moment()],
		'This Month': [moment().startOf('month'), moment().endOf('month')],
		'Last Month': [moment().subtract('month', 1).startOf('month'), moment().subtract('month', 1).endOf('month')]
            },
            startDate: moment().subtract('days', 29),
            endDate: moment()
	},function(start, end) {alert("You chose: " + start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));});
	/* jQueryKnob */
	$(".knob").knob();
    }
    //SLIMSCROLL FOR CHAT WIDGET
    /* Morris.js Charts */
    // Sales chart
    //------------------------sortable----------------
    //Make the dashboard widgets sortable Using jquery UI
    $(".connectedSortable").sortable({
        placeholder: "sort-highlight",
        connectWith: ".connectedSortable",
        handle: ".box-header, .nav-tabs",
        forcePlaceholderSize: true,
        zIndex: 999999
    }).disableSelection();
    $(".connectedSortable .box-header, .connectedSortable .nav-tabs-custom").css("cursor", "move");
    //jQuery UI sortable for the todo list
    $(".todo-list").sortable({
        placeholder: "sort-highlight",
        handle: ".handle",
        forcePlaceholderSize: true,
        zIndex: 999999
    }).disableSelection();
    /* BOX REFRESH PLUGIN EXAMPLE (usage with morris charts) */
    $("#dUser").html('');
    for(var i=0;i<QW.Users.length;i++){
	$("#dUser").append('<div class="item"><img src="img/' + "avatar.png" + '" alt="user image" class="online"/><p class="message"><a href="#" class="name"><small class="text-muted pull-right"><i class="fa fa-clock-o"></i> 2:15</small>' + QW.Users[i].name + '</a>' + QW.Users[i].task + '</p></div><!-- /.item -->');
    }
    $('#dProgress').html('');
    for(var i=0;i<QW.Task.length;i++){
	$('#dProgress').append('<div class="clearfix"><span class="pull-left">' + QW.Task[i].name + '</span><small class="pull-right">' + QW.Task[i].full + '%</small></div><div class="progress xs"><div class="progress-bar progress-bar-green" style="width: ' + QW.Task[i].full + '%;"></div></div>');
    }
};

var jData = 'data/quickwin.json';
function loadData(jData){
    var cdata = (function() {
        $.ajax({
            async: false,
            global: false,
            url: jData,
            dataType: "json",
            success: function (data) {
                QW = data;
		popDash(data);
            },
            failure: function() {alert("problem with the file" + jData); }
        });
    })();
}
