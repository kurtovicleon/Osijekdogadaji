<?php include_once 'konfiguracija.php'; ?>
<!doctype html>
<html class="no-js" lang="en" dir="ltr">
  <head>
    <?php include_once 'include/head.php'; ?>
  </head>
  <body>
  <p>Date: <input type="text" id="datepicker" size="30" ></p>
 
<p>Format options:<br>
  <select id="format">
    <option value="mm/dd/yy">Obavezno Odaberi format niže</option>
    <option value="yy-mm-dd">Godina mjesec dan</option>
  
  </select>
</p>
    <div class="grid-container">
    	<?php include_once 'include/zaglavlje.php'; ?>
      	<?php include_once 'include/izbornik.php'; ?>
      	
      	<div class="grid-x grid-padding-x">
			<div class="large-12 cell">
				Završni rad Leon Kurtović
			</div>
		</div>
		<?php include_once 'include/podnozje.php'; ?>
		
      
    </div>

    <?php include_once 'include/skripte.php'; ?>
  </body>
</html>


