<?php
session_start();
$ref_page = $_SESSION['ref_page'];
$ref_page = "index.php";
$_SESSION = array();
session_destroy();
$msg = "LOG-OUT EFFETTUATO.";
$msg = urlencode($msg); // non ci possono essere spazi nell'URL
setcookie('intertino_id','',0);
header("Location: " . $ref_page);
/* header("location: LogIn.php?msg=$msg"); */
exit();
?>
