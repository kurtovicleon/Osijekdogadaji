<?php

include_once '../../konfiguracija.php'; 
provjeraOvlasti();

$veza->beginTransaction();

	$izraz = $veza->prepare("
	insert into korisnik (ime,	kontaktbroj,	email)
			   values ('',		'',		'')");
	$izraz->execute();
	$zadnjaSifra = $veza->lastInsertId(); //ZADNJA ŠIFRA DODJELJENA OD STRANE BAZE
	$izraz = $veza->prepare(
	"insert into dogadaj (korisnik,				naziv,			mjesto,     vrijeme,     cijena,       tekst,        kategorija,        datum)
	    			values (" . $zadnjaSifra . ",	'',		'',		'',			'',		'',       '',		'')");
	$izraz->execute();
	$sifraDogadaja = $veza->lastInsertId();
$veza->commit();

header("location: detalji.php?sifra=" . $sifraDogadaja);
