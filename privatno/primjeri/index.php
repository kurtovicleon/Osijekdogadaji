<?php include_once '../../konfiguracija.php'; 
provjeraOvlasti();

$stranica = isset($_GET["stranica"]) ? $_GET["stranica"] : 1;

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
      	
      	<div class="grid-x grid-padding-x">
			<div class="large-12 cell">
				
			
				<a href="novi.php" class="button success expanded"><i class="fas fa-calendar-plus fa-2x"></i></a>
				
				<?php
					
					$uvjet = "%" . (isset($_GET["uvjet"]) ? $_GET["uvjet"] : "") . "%";
					
					$izraz = $veza->prepare("
					
					select count(a.sifra)
						from dogadaj a inner join korisnik b
						on a.korisnik=b.sifra
						where concat(a.datum,a.naziv,a.tekst,a.vrijeme,b.ime) 
						like :uvjet
					
					");
					$izraz->execute(array("uvjet"=>$uvjet));
					$ukupnoRedova = $izraz->fetchColumn();
					$ukupnoStranica = ceil($ukupnoRedova/$brojRezultataPoStranici);
					
					if($stranica<1){
						$stranica=1;
					}
					if($ukupnoStranica>0 && $stranica>$ukupnoStranica){
						$stranica=$ukupnoStranica;
					}
					

					$izraz = $veza->prepare("
					
						select 
							a.sifra,
							a.datum, 
							a.naziv, 
							a.tekst,
							a.cijena,
							a.vrijeme,
							b.ime
						from dogadaj a inner join korisnik b
						on a.korisnik=b.sifra
						where concat(a.datum,a.naziv,a.tekst,a.cijena,a.vrijeme,b.ime) 
						like :uvjet
						order by a.datum
					 	limit :stranica, :brojRezultataPoStranici");
					$izraz->bindValue("stranica", $stranica* $brojRezultataPoStranici -  $brojRezultataPoStranici , PDO::PARAM_INT);
					$izraz->bindValue("brojRezultataPoStranici", $brojRezultataPoStranici, PDO::PARAM_INT);
					$izraz->bindParam("uvjet", $uvjet);
					$izraz->execute();
					$rezultati = $izraz->fetchAll(PDO::FETCH_OBJ);
				if($ukupnoRedova>$brojRezultataPoStranici){
					include 'paginacija.php';
				}
				  ?>
				  
				<table>
					<thead>
						<tr>
							<th>Datum</th>
							<th>Naziv događaja</th>
							<th>Opis</th>
							<th>Upad</th>
							<th>Vrijeme</th>
							<th>Organizator</th>
							<th>Uredi</th>
						</tr>
					</thead>
					<tbody>
						
					<?php
					foreach ($rezultati as $red):
					?>
						
						<tr>
							<td><?php echo $red->datum;?></td>
							<td><?php echo $red->naziv; ?></td>
							<td><?php echo $red->tekst; ?></td>
							<td><?php echo $red->cijena; ?></td>
							<td><?php echo $red->vrijeme; ?></td>
							<td><?php echo $red->ime; ?></td>
							
							<td>
								<a href="detalji.php?sifra=<?php echo $red->sifra ?>"><i class="far fa-edit fa-2x"></i></a>
								
							</td>
							
						</tr>
						
					<?php endforeach; ?>
						
					</tbody>
				</table>
				<?php if($ukupnoRedova>$brojRezultataPoStranici){
					include 'paginacija.php';
				}?>
			</div>
		</div>
		<?php include_once '../../include/podnozje.php'; ?>
		
      
    </div>

    <?php include_once '../../include/skripte.php'; ?>
  </body>
</html>
