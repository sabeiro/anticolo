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

$tabN = "";$sectN = "";$typeN = "";
if(isset($_GET['tab'])){$tabN = $_GET['tab'];}
if(isset($_GET['sect'])){$sectN = $_GET['sect'];}
if(isset($_GET['type'])){$typeN = $_GET['type'];}
/* print_r($_GET); echo "\n"; */
if($tabN=="column"){
    $data = WrColDouble($dbConn,$sectN);
}
else if($tabN=="clientprice"){$data = wrPrice($dbConn,"Cliente,Formato,imps,price,cpm from price_client where Cliente='".$_GET['client']."'");}
else if($tabN=="weather_d"){$data=wrSect($dbConn,"weather_d","day",$sectN);
    $data['type'] = "spline";
    $data['id'] = $sectN;
    $data['name'] =  $sectN;
    $data['dashStyle'] = 'longdash';
}
else if($tabN=="retention_weekly"){$data=wrSect($dbConn,"retention_weekly","date",$sectN);
    $data['type'] = "column";
    $data['id'] = $sectN;
    $data['name'] = $sectN;
    $data['showInLegend'] = false;
}
else if($tabN=="train_s"){$data=wrSect($dbConn,"train_series","row_names",$sectN);}
else if($tabN=="train_w"){$data=wrSect($dbConn,"train_series_week","row_names",$sectN);}
else if($tabN != ''){$data=wrSect($dbConn,$tabN,"day",$sectN);}
else{$data=wrRand();$data['name'] = "random";}
if($typeN != ''){
    /* $typeL = ['line','column',"areaspline","spline","scatter"]; */
    $data['type'] = $typeN;
}
/* $data['dataLabels'] = ["enabled" => true,"format"=>"{point.y:.1f}"];
   $data['dashStyle'] = 'longdash';
   $data['showInLegend'] = false; */
callbackF($data);
?>
