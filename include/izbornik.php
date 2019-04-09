<div class="title-bar" data-responsive-toggle="example-menu" data-hide-for="medium">
  <button class="menu-icon" type="button" data-toggle="example-menu"></button>
  <div class="title-bar-title"><?php echo $naslovAPP; ?></div>
</div>

<div class="top-bar" id="example-menu">
  <div class="top-bar-left">
    <ul class="dropdown menu" data-dropdown-menu>
    	
      <?php 
    
      stavkaIzbornika($putanjaAPP."index.php", $naslovAPP); ?>
      
      <?php if(isset($_SESSION[$appID."autoriziran"])): ?>	
			<?php if($_SESSION[$appID."autoriziran"]->uloga==="oper"):?>
		<li>
			
			<?php stavkaIzbornika($putanjaAPP . "privatno/nadzornaPloca/index.php", "Nadzorna ploča"); ?>
		
		</li>
      <?php endif;?>
		<li>
			<a href="#">Događaji</a>
			<ul class="menu vertical">
				<?php 
				stavkaIzbornika($putanjaAPP . "privatno/događaji/index.php", "Pregled događaja");  
				?>
			</ul>
		</li>
		<li>
			<a href="#">Prijavi događaj</a>
			<ul class="menu vertical">
				<?php 
				stavkaIzbornika($putanjaAPP . "privatno/primjeri/index.php", "Prijavi"); 
				?>
			</ul>
		</li>
  
      <?php endif;?>
      
      <?php stavkaIzbornika($putanjaAPP."onama.php", "O nama"); ?>
      <?php stavkaIzbornika($putanjaAPP."kontakt.php", "Kontakt"); ?>
      
    </ul>
  </div>
</div>