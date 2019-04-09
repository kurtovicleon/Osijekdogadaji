<div class="grid-x grid-padding-x">
	<div class="large-2 cell">

	</div>
	<div class="large-8 cell">
	<style>
	h1   {color: black;
		font-family: cursive;}

</style>
	  <h1><?php echo $naslovAPP; ?></h1>
	</div>
	<div class="large-2 cell">
		<?php if(!isset($_SESSION[$appID."autoriziran"])): ?>
	  		<a href="<?php echo $putanjaAPP; ?>login.php" class="button">Prijavi se</a>
	  	<?php else: ?>
	  		<a href="<?php echo $putanjaAPP; ?>logout.php" class="button">Odjava
				<?php
				echo $_SESSION[$appID."autoriziran"]->ime;
			?></a>
				<?php endif;?>
	</div>
</div>