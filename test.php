<?php
include("lib/SqlFunction.php");
/* Priv(["all"]); */
$dbConn = new AdminSql();
$dbConn->DbConnect($db_conn);
$colVar = wrColDouble($dbConn,'weather_d');
foreach($colVar as $r){
    echo '<option="'.$r.'">'.$r."</option>\n";
}
/* echo json_encode($colVar); */
WrColDouble($dbConn,'weather_d');
?>
