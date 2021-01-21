<?php
/* ini_set('display_errors', 1);
 * ini_set('display_startup_errors', 1);
 * error_reporting(E_ALL);*/
include("lib/SqlFunction.php");
$dbConn = new AdminSql();
$dbConn->DbConnect($db_conn);
$data = ["name" => "sample","id" => "sample"
	    ,"data" => array()
	    ,"marker" => ["enabled"=>true,"radius" => 3]
	    ,"shadow" => true//,step:true
	    ,"type" => "spline"//area,column
];

$tabN = "sample";
$sectN = "sample";
if(isset($_GET['tab'])){$tabN = $_GET['tab'];}
if(isset($_GET['sect'])){$sectN = $_GET['sect'];}

if($tabN=="gestionale"){
    $data = wrGraph($dbConn,"day,imps","inventory_erp_weekly order by day","gestionale");
    $data['type'] = "column";
}
else if($tabN=="ingombri"){$data = wrGraph($dbConn,"date,imps","inventory_ingombri order by date","ingombri");}
else if($tabN=="ad_server"){$data = wrGraph($dbConn,"Data,imps","inventory_video_dot order by Data","ad_server");
    $data['type'] = "areaspline";
    $data['dataLabels'] = ["enabled" => true,"format"=>"{point.y:.1f}"];
}
else if($tabN=="previsioni"){$data = wrGraph($dbConn,'date,imps','inventory_prediction order by date','previsioni');$data['type'] = "column";}
else if($tabN=="prediction"){$data = wrGraph($dbConn,'date,tot','inventory_prediction_weekly order by date','prediction');$data['type']="scatter";$data['dataLabels']=["enabled"=>true,"format"=>"{point.y:.1f}"];}
else if($tabN=="invenduto"){$data = wrGraph($dbConn,'Data,Paganti','inventory_video_dot order by Data','venduto');}
else if($tabN=="partner"){$data = wrGraph($dbConn,'Data,imps-`Totale.partner` as partner ','inventory_video_dot order by Data','-partner');}

else if($tabN=="webtrekk"){$data = wrGraph($dbConn,'Days,imps','inventory_webtrekk_weekly order by Days','webtrekk');}
else if($tabN=="shiny"){$data = wrGraph($dbConn,'date,imps','inventory_shiny_week order by date','shiny');}
else if($tabN=="shiny_month"){$data = wrGraph($dbConn,'date,imps','inventory_shiny_month order by date','shiny');}
else if($tabN=="marker"){$data = wrMarker($dbConn);}
else if($tabN=="tel"){$data = wrRaw($dbConn,"* from inventory_tel");}
else if($tabN=="pali"){$data = wrRaw($dbConn,"* from inventory_pali");}
else if($tabN=="price"){$data = wrPrice($dbConn,'* from price_client');}
else if($tabN=="price1"){$data = wrPrice($dbConn,'* from price_client_banzai');}
else if($tabN=="price2"){$data = wrPrice($dbConn,'* from price_client_yahoo');}
else if($tabN=="client"){$data = wrPrice($dbConn,'distinct Cliente from price_client');}
else if($tabN=="client1"){$data = wrPrice($dbConn,'distinct cliente from price_client_banzai');}
else if($tabN=="client2"){$data = wrPrice($dbConn,'distinct cliente from price_client_yahoo');}
else if($tabN=="clientprice"){$data = wrPrice($dbConn,"Cliente,Formato,imps,price,cpm from price_client where Cliente='".$_GET['client']."'");}
else if($tabN=="clientprice1"){$data =  wrPrice($dbConn,"cliente,prodotto,imps,price,cpm from price_client_banzai where Cliente='".$_GET['client']."'");}
else if($tabN=="clientprice2"){$data =  wrPrice($dbConn,"cliente,formato,imps,spent,cpm from price_client_yahoo where Cliente='".$_GET['client']."'");}
else if($tabN=="rand"){$data = wrRand();}
else if($tabN=="daily"){$data=wrSect($dbConn,"inventory_video_section","data",$sectN);}
else if($tabN=="daily_pred"){$data=wrSect($dbConn,"inventory_prediction_daily","date",$sectN);
    $data['type'] = "spline";
    $data['id'] = "p_" . $sectN;
    $data['name'] = "p_" . $sectN;
    $data['dashStyle'] = 'longdash';
}
else if($tabN=="retention_weekly"){$data=wrSect($dbConn,"retention_weekly","date",$sectN);
    $data['type'] = "column";
    $data['id'] = "retention_" . $sectN;
    $data['name'] = "retention_" . $sectN;
    $data['showInLegend'] = false;
}
else if($tabN=="tv_pali"){$data=wrSect($dbConn,"inventory_tv_pali","date",$sectN);
    $data['type'] = "column";
    $data['id'] = "pali_" . $sectN;
    $data['name'] = "pali_" . $sectN;
    $data['showInLegend'] = false;
}
else if($tabN=="tv_audience"){$data=wrSect($dbConn,"inventory_tv_audience","date",$sectN);
    $data['type'] = "line";
    $data['id'] = "tv";
    $data['name'] = "tv";
    $data['dashStyle'] = 'shortdot';
}
else if($tabN=="tv_week"){$data=wrSect($dbConn,"inventory_tv_audience_week","date",$sectN);
    $data['type'] = "line";
    $data['id'] = "tv";
    $data['name'] = "tv";
    $data['dashStyle'] = 'shortdot';
}
else if($tabN=="daily_hist"){$data=wrSect($dbConn,"inventory_daily_sect","date",$sectN);}
else if($tabN=="daily_tel"){$data=wrSect($dbConn,"inventory_tel","row_names",$sectN);}
else if($tabN=="train_s"){$data=wrSect($dbConn,"train_series","row_names",$sectN);}
else if($tabN=="train_w"){$data=wrSect($dbConn,"train_series_week","row_names",$sectN);}
else if($tabN=="webtrekk_p"){$data=wrSect($dbConn,"inventory_webtrekk_preroll","date",$sectN);
    $data['type'] = "line";
    $data['id'] = "webtrekk";
    $data['name'] = "webtrekk";
    $data['dashStyle'] = 'longdash';
}

callbackF($data);
?>
