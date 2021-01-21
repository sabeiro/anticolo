<?php
include("lib/SqlFunction.php");
/* Priv(['all']);*/
?>
<!DOCTYPE html>
<html style="height: auto;"><head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Anticolo reporting dashboard</title>
    <?php
    include("lib/Intestazioni.php");
    WrHeader(); 
    ?>
</head>
<body class="sidebar-mini sidebar-collapse" style="height: auto;">
    <?php
    session_start();
    $ref_page = $_SESSION['ref_page'];
    if($ref_page=="LogIn.php" || $ref_page==""){
	$ref_page="index.php";
    }
    if (isset($_SESSION['login'])){
	header("Location: " . $ref_page);
    }
    ?>
    <!-- Site wrapper -->
    <div class="wrapper">
	<?php WrNav(); ?>
	<?php WrSide(); ?>
	<?php WrControl(); ?>
	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper" style="min-height: 1667.6px;">
	    <div id="sidebar-overlay"></div>
	    <div class="testo4">
		<center>
		    <?php WrTop(); ?>
	    <h1><div id="testo1"> Data room access: <br> login form: </div></h1>
	    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
		Username:<br />
		<input name="username" type="text"><br />
		Password:<br />
		<input name="password" type="password" size="20"><br />
		<input name="submit" type="submit" value="Login">
	    </form>
	    <?php
	    include("lib/conf/config.inc.php");
	    include("lib/AdminFuncSql.php");
	    if(isset($_POST['submit']) && (trim($_POST['submit']) == "Login")){
		if( !isset($_POST['username']) || $_POST['username']=="" ){
		    echo "username missing.\n";
		}
		if( !isset($_POST['password']) || $_POST['password'] ==""){
		    echo "password missing.\n";
		}
		else{
		    // validazione dei parametri tramite filtro per le stringhe
		    $username = trim(filter_var($_POST['username'], FILTER_SANITIZE_STRING));
		    $password = trim(filter_var($_POST['password'], FILTER_SANITIZE_STRING));
		    $password = sha1($password);
		    $data = new AdminSql();
		    $data->DbConnect($db_conn);
		    // interrogazione della tabella
		    $query = "SELECT id,grp FROM login WHERE username = '$username' AND `pass` = '$password'";
		    echo "$query \n";
		    echo $ref_page . "\n";
		    $auth = $data->DbQuery($query);
		    if(mysqli_num_rows($auth)==0){
			echo "login uncorrect\n";
			//header("Location: " . $_SESSION['ref_page']);
		    }else{
			$res = $data->DbFetch($auth);
			$_SESSION['login'] = $res->id;
			echo $res->group;
			//$password = encGrp((string) $res->group_login);
			$password = crypt($res->grp,base64_encode($res->grp));
			$_SESSION['group'] = $password;
			setcookie('intertino_id',md5(microtime().$_SERVER['REMOTE_ADDR']) .'_'.$password,time()+(86400*7));
			$data->DbDisc();
			header("Location: " . $ref_page);
		    }
		}
	    }else{
	    }
	    ?>
		</center>
	    </div>
	</div>
	<?php WrFooter(); ?>
</body></html>
