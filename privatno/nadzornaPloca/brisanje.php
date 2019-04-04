<?php include_once '../../konfiguracija.php'; 
provjeraOvlasti();

if(!isset($_GET["sifra"])){
	
		header("location: " . $putanjaAPP . "logout.php");

}else{
	
	$veza->beginTransaction();
		
		$izraz=$veza->prepare("
	select korisnik from dogadaj where sifra=:sifra");
	$izraz->execute($_GET);
	
	$sifraKorisnika=$izraz->fetchColumn();
		
		$izraz=$veza->prepare("delete from dogadaj where sifra=:sifra;");
		$izraz->execute($_GET);
		
		
		$izraz=$veza->prepare("delete from korisnik where sifra=:sifra;");
		$izraz->execute(
			array(
				"sifra" => $sifraKorisnika
			)
		);
		
		$veza->commit();
		
		header("location: index.php");
	}



