<?php
/* ini_set('display_errors', 1);
 * ini_set('display_startup_errors', 1);
 * error_reporting(E_ALL);*/
session_start();
include("config.inc.php");
include("AdminFuncSql.php");
function encGrp($grpS){
    return crypt((string)$grpS,base64_encode((string)$grpS));
}
function Priv($grpA){
    $inactive = 600;
    ini_set('session.gc_maxlifetime',3600);
    session_set_cookie_params(3600);
    $_SESSION['ref_page'] = $_SERVER['REQUEST_URI'];
    if(isset($_COOKIE['intertino_id'])){$cookStr = $_COOKIE['intertino_id'];}
    $logCook = $cookStr != '';
    $logSess = isset($_SESSION['login']);
    if(sizeof($grpA)==0){
	if($logCook){return 1;}
	if($logSess){return 1;}
	header("Location: LogIn.php");
    }
    if(!$logCook or !$logSess){header("Location: LogIn.php");}
    $enc = '';
    if($logCook){$enc = substr($cookStr,strpos($cookStr,'_')+1);}
    else{$enc=$_SESSION['group'];}
    $Nm = 0;
    foreach($grpA as $r){
	$pr = encGrp($r);
	preg_match('/'.$pr.'/',$enc,$matches,PREG_OFFSET_CAPTURE,0);
	$Nm = $Nm + sizeof($matches);
    }
    if($Nm==0){//header("Location: " . $ref_page);
	echo "<h1>View not allowed to user</h1>";
	echo '<h2>log in with a different user: <a href="LogOut.php">log out</a></h2>';
	exit();
    }
    /* if(isset($_SESSION['timeout']) ) {
     * 	$session_life = time() - $_SESSION['start'];
     * 	if($session_life > $inactive)
     *         { session_destroy(); header("Location: LogOut.php"); }
     * }*/
    $_SESSION['timeout'] = time();
}
function isPriv(){
    $cookStr = $_COOKIE['intertino_id'];
    $logCook = $cookStr != '';
    $logSess = isset($_SESSION['login']);
    if(!$logCook or !$logSess){return 0;} 
    $enc = '';
    if($logCook){$enc = substr($cookStr,strpos($cookStr,'_')+1);}
    else{$enc = $_SESSION['group'];}
    if($enc == 'YWmTNa6XU8n3o'){return 1;}
    return 1;
}
function is_valid_callback($subject){
    $identifier_syntax
    = '/^[$_\p{L}][$_\p{L}\p{Mn}\p{Mc}\p{Nd}\p{Pc}\x{200C}\x{200D}]*+$/u';
    $reserved_words = array('break', 'do', 'instanceof', 'typeof', 'case',
			    'else', 'new', 'var', 'catch', 'finally', 'return', 'void', 'continue', 
			    'for', 'switch', 'while', 'debugger', 'function', 'this', 'with', 
			    'default', 'if', 'throw', 'delete', 'in', 'try', 'class', 'enum', 
			    'extends', 'super', 'const', 'export', 'import', 'implements', 'let', 
			    'private', 'public', 'yield', 'interface', 'package', 'protected', 
			    'static', 'null', 'true', 'false');
    return preg_match($identifier_syntax, $subject)
        && ! in_array(mb_strtolower($subject, 'UTF-8'), $reserved_words);
}
function doIt($callback) {
    if(function_exists($callback)) {
        $callback();
    } else {
        // some error handling
    }
}
function formatHighcharts($rows){
    $rowF = array();
    foreach($rows as &$row){
        //$rowF[] = array((strtotime($row[0] . "+1 hour"))*1000,(float)$row[1]);
        $rowF[] = array((strtotime($row[0])+3600*2)*1000,(float)$row[1]);
    }
    return $rowF;
}
function WrGraphDb($dbConn,$col,$tab,$name){
    $query = 'select ' . $col . ' from ' . $tab . ';';
    $rows = $dbConn->DbRow($query);
    $rowF = formatHighcharts($rows);
    $chartOpt = ["name" => $name,"id" => $name
		,"data" => $rowF
		,"marker" => ["enabled"=>true,"radius" => 3]
		,"shadow" => true//,step:true
		,"type" => "spline"//area,column
    ];
    return $chartOpt;
}
function WrSect($dbConn,$tabN,$dateS,$sect){
    $query = "select ".$dateS.',`'.$sect.'` from '.$tabN.' order by '.$dateS.';';
    $rows = $dbConn->DbRow($query);
    $rowF = formatHighcharts($rows);
    $chartOpt = ["name" => $sect,"id" => $sect
		,"data" => $rowF
		,"marker" => ["enabled"=>true,"radius" => 3]
		,"shadow" => false//,step:true
		,"type" => "areaspline"//area,column
    ];
    return $chartOpt;
}
function WrRaw($dbConn,$tabN){
    $query = "select ". $tabN . ';';
    $rows = $dbConn->DbRow($query);
    return $rows;
}
function WrColName($dbConn,$tabN){
    $query = "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = 'intertino' AND TABLE_NAME = '".$tabN."';";
    $rows = $dbConn->DbRow($query);
    return $rows;
}

function wrMarker($dbConn){
    $query = 'select date as x,title,text from inventory_marker order by date;';
    $rows = $dbConn->DbRow($query);
    $rowF = array();
    foreach($rows as &$row){
        $rowF[] = ["x"=>(strtotime($row[0])+3600*2)*1000,"title"=>$row[1],"text"=>$row[2]];
    }
    $chartOpt = ["name" => "marker","id" => "marker"
		,"data" => $rowF
		,"marker" => ["enabled"=>true,"radius" => 3]
		,"shadow" => true//,step:true
		,"type" => "flags"//area,column
		,"onSeries" => "deliverato"
		,"shape" => "squarepin"
    ];
    return $chartOpt;
}
function wrRand(){
    $rowF = array();
    $dateI = strtotime(date("Y-m-d"));
    $dateI = strtotime("1970-01-02");
    for($i = 1;$i<=1000;$i++){
        $rowF[] = array(($dateI+$i*3600*24)*1000,rand());
    }
    $chartOpt = ["name" => "gestionale"
		,"data" => $rowF
		,"marker" => ["enabled"=>true,"radius" => 3]
		,"shadow" => true//,step:true
		,"type" => "spline"//area,column
    ];
    return $chartOpt;
}
function WrPrice($dbConn,$tab){
    $query = 'select ' . $tab . ';';
    $rows = $dbConn->DbRow($query);
    return $rows;
}

function callbackF($data){
    //$json = json_encode(array_values($data));
    $json = json_encode($data);
    //json_encode(array_values($sortedArray),JSON_FORCE_OBJECT);
    if(array_key_exists('callback', $_GET)){
	header('Content-Type: text/javascript; charset=utf8');
	header('Access-Control-Allow-Origin: http://www.example.com/');
	header('Access-Control-Max-Age: 3628800');
	header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
	$callback = $_GET['callback'];
	echo $callback.'('.$json.');';
    }else{
	header('Content-Type: application/json; charset=utf8');
	echo $json;
    }
    # JSON if no callback
    // if( ! isset($_GET['callback']))
    //     exit($json);
    # JSONP if valid callback
    // if(is_valid_callback($_GET['callback']))
    //     exit("{$_GET['callback']}($json)");
    # Otherwise, bad request
    //header('status: 400 Bad Request', true, 400);
}

function logIn($username,$password){
    global $db_conn;
    $password = sha1($password);
    $data = new AdminSql();
    $data->DbConnect($db_conn);
    // interrogazione della tabella
    $query = "SELECT id,`group` FROM login WHERE username = '$username' AND pass = '$password'";
    echo "$query \n";
    $auth = $data->DbQuery($query);
    $res = $data->DbFetch($auth);
    echo "id " . $res->id . "\n";
    echo $res->group . "\n";
}

function addUser($username,$password,$group){
    global $db_conn;
    $date = date("Y-m-d");
    $password = sha1($password);
    $data = new AdminSql();
    $data->DbConnect($db_conn);
    // interrogazione della tabella
    $query = "INSERT INTO login (date_creation,username,pass,grp,last_login)
  		   VALUES
                 ('$date','$username','$password','$group','$date');";
    echo "query:<br>$query:<br>\n";
    $auth = $data->DbQuery($query);
}
?>



