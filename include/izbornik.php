<style>

.foundation-5-top-bar {
  background: #333;
  color: #fefefe;
}

.foundation-5-top-bar .menu {
  background: #333;
}

.foundation-5-top-bar .menu a {
  color: #fefefe;
}

.foundation-5-top-bar .is-dropdown-submenu {
  border: 0;
}

.foundation-5-top-bar .is-dropdown-submenu-item.opens-right a::after {
  border-color: transparent transparent transparent #fefefe;
}

.foundation-5-top-bar .js-drilldown-back > a::before {
  border-color: transparent #fefefe transparent transparent;
}

.foundation-5-top-bar .is-drilldown-submenu-parent > a::after {
  border-color: transparent transparent transparent #fefefe;
}

.foundation-5-top-bar .dropdown.menu.medium-horizontal > li.is-dropdown-submenu-parent > a::after {
  border-color: #fefefe transparent transparent;
}

</style>
<div class="top-bar foundation-5-top-bar">
  <div class="top-bar-title">
    <span data-responsive-toggle="responsive-menu" data-hide-for="medium">
      <button class="menu-icon" type="button" data-toggle></button>
    </span>
    <strong><?php echo $naslovAPP; ?></strong>
  </div>
  <div id="responsive-menu">
    <div class="top-bar-left">
      <ul class="dropdown vertical medium-horizontal menu" data-responsive-menu="drilldown medium-dropdown" data-auto-height="true" data-animate-height="true">
    	
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
      
      <?php stavkaIzbornika($putanjaAPP."era.php", "ERA"); ?>
      <?php stavkaIzbornika($putanjaAPP."kontakt.php", "Kontakt"); ?>
      
    </ul>
  </div>
</div>
</div>