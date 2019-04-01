<?php

include_once 'funkcije.php';

session_start();

$putanjaAPP = "/Osijekdogadaji/";
$naslovAPP="Događaji u Osijeku";
$appID="Osijek događanja";
$dev=true;
$brojRezultataPoStranici=7;

if($_SERVER["HTTP_HOST"]==="kurta24.byethost7.com"){
	$host="	sql109.byethost.com";
	$dbname="b7_23439297_dogadajiosijek";
	$dbuser="b7_23439297";
	$dbpass="l1e2o3n4";
	$dev=false;
}else{
	$host="localhost";
	$dbname="dogadajiosijek";
	$dbuser="leon";
	$dbpass="leon";
	$dev=true;
}



	
try{
	$veza = new PDO("mysql:host=" . $host . ";dbname=" . $dbname,$dbuser,$dbpass);
	$veza->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$veza->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, "SET NAMES 'utf8';");
	$veza->exec("SET NAMES 'utf8';");
}catch(PDOException $e){
	
	switch($e->getCode()){
		case 1049:
			header("location: " . $putanjaAPP . "greske/kriviNazivBaze.html");
			exit;
			break;
		default:
			header("location: " . $putanjaAPP . "greske/greska.php?code=" . $e->getCode());
			exit;
			break;
	}
}

