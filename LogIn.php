<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
	<title>data room access</title>
    </head>
    <body onLoad="toolbar.setup();" onPageShow="if (event.persisted) toolbar.setup();" topmargin="0"	leftmargin="0" >
	<?php
	session_start();
	$ref_page = $_SESSION['ref_page'];
	if($ref_page=="LogIn.php" || $ref_page==""){
	    $ref_page="index.php";
	}
	if (isset($_SESSION['login'])){
	    header("Location: " . $ref_page);
	    exit();
	}
	?>
	<div class="testo4">
	    <center>
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
			    exit();
			}
		    }
		}else{
		}
		?>
	    </center>
	</div>
    </body>
</html>
