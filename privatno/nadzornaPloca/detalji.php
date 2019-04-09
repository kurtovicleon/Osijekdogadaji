<?php include_once '../../konfiguracija.php'; 
provjeraOvlasti();
$greska=array();
if(!isset($_GET["sifra"])){
	
	
	if(isset($_POST["sifradogadaja"])){
		
	

	if(count($greska)==0){
		
		$veza->beginTransaction();
		
		$izraz=$veza->prepare("update korisnik set ime=:ime, kontaktbroj=:kontaktbroj, 
		 email=:email where sifra=:sifra;");
		$izraz->execute(
			array(
				"ime" => $_POST["ime"],
				"kontaktbroj" => $_POST["kontaktbroj"],
				"email" => $_POST["email"],
				"sifra" => $_POST["sifrakorisnika"]
			)
		);
		
		
		$izraz=$veza->prepare("update dogadaj set naziv=:naziv, mjesto=:mjesto, vrijeme=:vrijeme,
		cijena=:cijena, tekst=:tekst, kategorija=:kategorija, datum=:datum
		where sifra=:sifra;");
		$izraz->execute(
			array(
				"naziv" => $_POST["naziv"],
				"mjesto" => $_POST["mjesto"],
				"vrijeme" => $_POST["vrijeme"],
				"cijena" => $_POST["cijena"],
				"tekst" => $_POST["tekst"],
				"kategorija" => $_POST["kategorija"],
				"datum" => $_POST["datum"],
				"sifra" => $_POST["sifradogadaja"]
			)
		);
		
		$veza->commit();
		
		header("location: index.php");
	}
	
	}else{
		header("location: " . $putanjaAPP . "logout.php");
	}
	
}else{
	
	$izraz=$veza->prepare("
						select 
							a.sifra as sifradogadaja,
							a.naziv,
							a.mjesto,
							a.vrijeme,
							a.cijena,
							a.tekst,
							a.kategorija,
							a.datum,
							b.sifra as sifrakorisnika,
							b.ime, 
							b.kontaktbroj,
							b.email
						from dogadaj a inner join korisnik b
						on a.korisnik=b.sifra
						where a.sifra=:sifra");
	$izraz->execute($_GET);
	$_POST=$izraz->fetch(PDO::FETCH_ASSOC);
	
}




?>
<!doctype html>
<html class="no-js" lang="en" dir="ltr">
  <head>
    <?php include_once '../../include/head.php'; ?>
  </head>
  <body>
    <div class="grid-container">
    	<?php include_once '../../include/zaglavlje.php'; ?>
      	<?php include_once '../../include/izbornik.php'; ?>
      	<a href="index.php"><i style="color: red;" class="fas  fa-arrow-left fa-2x"></i></a>
      	<div class="grid-x grid-padding-x">
			<div class="large-4 large-offset-4 cell centered">
				<form class="callout text-center" action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
				  <h4 class="text-center">Prijava podataka </h4>
				  
				  <?php 
				  
				  include_once 'input.php';
				  inputText("ime", "Grad Osijek", $greska);
				  inputText("email", "nazivmaila@email.com", $greska);
				  inputText("naziv", "Naziv vašeg događaja", $greska);
				  inputText("mjesto", "mjesto odražavanja događaja", $greska);
				  inputText("cijena", "upišite cijenu u kunama", $greska);
				  inputText("tekst", "Ovdje napišite tekst", $greska);
				  inputText("kategorija", "upišite kategoriju događaja", $greska);
				  ?>
				  	  <?php
				   include_once 'inputdatum.php';
				  inputDatum("datum", "datum događanja", $greska);
				 
				  ?>
				  <?php include_once 'inputbroj.php';
				   inputBroj("kontaktbroj", "+385956328741", $greska); ?>
				  <?php 
				   include_once 'inputvrijeme.php';
				  inputVrijeme("vrijeme", "12:50:00", $greska);
				  ?>
				 	
				  
				  <input type="hidden" name="sifradogadaja" value="<?php echo $_POST["sifradogadaja"]; ?>"></input>
				  <input type="hidden" name="sifrakorisnika" value="<?php echo $_POST["sifrakorisnika"]; ?>"></input>
				  <p><input type="submit" class="button expanded" value="Dodaj/promijeni događaj"></input></p>
				</form>
				
			</div>
		</div>
		<?php include_once '../../include/podnozje.php'; ?>
		
      
    </div>

    <?php include_once '../../include/skripte.php'; ?>
  
  </body>
</html>
