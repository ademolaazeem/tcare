<?php
session_start();
//include_once('CommonClass/audit.php');
//$audit = new AuditLog();
//$audit->audit_log("User ".$_SESSION['userfullname']." Successfully logged out");
unset($_SESSION['userfullname']);
unset($_SESSION['username']);
unset($_SESSION['adlogged']);
unset($_SESSION['userid']);
unset($_SESSION['levelaccess']);
unset($_SESSION['imagepath']);
unset($_SESSION['AdminID']);
session_unset();
session_destroy();


header("location:login.php?r=".base64_encode('logout'));
		
?>
