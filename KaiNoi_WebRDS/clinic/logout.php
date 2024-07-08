<?php
ob_start();
session_start();
require_once('connections/conn_rds.php');
require_once('connections/utf8.php');
session_destroy();
header("Location: index.php");	
?>
