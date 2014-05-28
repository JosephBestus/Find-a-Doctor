<?php
error_reporting(E_ERROR | E_WARNING);
ob_start();
session_start();
define("DATA_HOST","localhost");
define("DATA_USER","root");
define("DATA_PASS","");
define("DATA_NAME","spicennice_db");
$con = mysql_connect(DATA_HOST,DATA_USER,DATA_PASS) or die("Can't connect to database");
mysql_select_db(DATA_NAME,$con) or die("Can't connect to database"); 
require("simple_html_dom.php");
require("functions.php");
