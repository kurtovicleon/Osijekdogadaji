<?php include_once 'konfiguracija.php'; ?>
<!doctype html>
<html class="no-js" lang="en" dir="ltr">
  <head>
    <?php include_once 'include/head.php'; ?>
  </head>
  <body>
    <div class="grid-container">
    	<?php include_once 'include/zaglavlje.php'; ?>
      	<?php include_once 'include/izbornik.php'; ?>
      	
      	<div class="grid-x grid-padding-x">
			<div class="large-4 large-offset-4 cell centered">
				<form class="loginBox" action="autoriziraj.php" method="post">
				  <h4 style="color:white;">Prijavi sebe kako bi mogao i događaj</h4>
				  <label style="color:white;">Email
				    <input type="email" name="email" placeholder="Unesite email"
				    value="<?php if(isset($_GET["email"])){
				    	echo $_GET["email"];
				    }else{
				    	if($dev){
				    		echo "leon@osijek.hr";
				    	}
				    }
					
					
					 ?>">
				  </label>
				  <label style="color:white;">Lozinka
				    <input type="password" name="lozinka" placeholder="Lozinka"
				    value="<?php echo $dev ? "leon" : ""; ?>">
				  </label>
				  <p><input type="submit" class="button expanded" value="Prijava"></input></p>
				  <?php if(isset($_GET["neuspjelo"])){
				  	echo "<p style='color:white;'>"."Neispravna kombinacija email/lozinka";
				  } ?>
				</form>

			</div>
		</div>
	
		
      
		</div>
		

    <?php include_once 'include/skripte.php'; ?>
  </body>
</html>
