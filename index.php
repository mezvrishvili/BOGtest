<?php
/**
*-------------------------------+
* @author malkhaz mezvrishvili (c) 2017
* @email mmezvrishvili@prohosting.ge
*/

session_start();
ob_start();
define("PROTECT", true);
include("includes/config.inc.php");
include_once(CLS_DIR."main.class.php");

//-- mtavari klasi
$mainClass = new mainClass();
$mainClass->loadClass("MySQL");
$mainClass->loadClass("Security");
$mainClass->loadClass("Payment");

$Security = new Security();
$MySQL = new MySQL();
$Payment = new Payment();

$MySQL->connect();
$MySQL->query("SET CHARACTER SET utf8");
$MySQL->query("SET NAMES 'utf8'");



//-- json call
require(INC_DIR."json.inc.php");



//-- header
require_once(TPL_DIR."header.php");


//-- content
require_once(TPL_DIR."main.php");


//-- footer
require_once(TPL_DIR."footer.php");


?>