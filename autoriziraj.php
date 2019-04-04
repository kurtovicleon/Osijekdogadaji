<?php

if(!isset($_POST["email"]) || !isset($_POST["lozinka"])){
	exit;
}
//ovdje će doći spajanje na bazu
if($_POST["email"]==="leon@osijek.hr" && $_POST["lozinka"]==="leon"){
	include_once 'konfiguracija.php';
	$o = new stdClass();
	$o->ime="Leon";
	$o->prezime = "Urednik";
	$o->uloga="oper";
	$_SESSION[$appID."autoriziran"]=$o;
	header("location: index.php");

}else if ($_POST["email"]==="david@osijek.hr" && $_POST["lozinka"]==="david"){
	include_once 'konfiguracija.php';
	$o = new stdClass();
	$o->ime="David";
	$o->prezime = "Direktor";
	$o->uloga="admin";
	$_SESSION[$appID."autoriziran"]=$o;
	header("location: index.php");
}else{
	header("location: login.php?neuspjelo&email=" . $_POST["email"]);
}
