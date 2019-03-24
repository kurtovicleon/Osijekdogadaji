<?php


function stavkaIzbornika($putanja,$opis){
	?>
	<li<?php echo $_SERVER["PHP_SELF"] === $putanja /*prvi parametar*/ ? " class=\"active\"" : "";?>>
		<a href="<?php echo $putanja; ?>"><?php echo $opis; ?></a>
	</li>
	<?php
}


function provjeraOvlasti(){
	if(!isset($_SESSION[$GLOBALS["appID"]."autoriziran"])){
		header("location: " . $GLOBALS["putanjaAPP"]);
	}
}
function vrijednostGET($kljuc){
	return isset($_GET[$kljuc]) ? $_GET[$kljuc] : "";
}

function oznacenRadio($kljuc,$vrijednost){
	if(!isset($_POST[$kljuc])){
		return "";
	}
	if($_POST[$kljuc]===$vrijednost){
		return " checked=\"checked\" ";
	}
	return "";
}

function oznacenCheckbox($kljuc,$vrijednost){
	if(!isset($_POST[$kljuc])){
		return "";
	}
	foreach ($_POST[$kljuc] as $key => $value) {
		if ($vrijednost===$value){
			return " checked=\"checked\" ";
		}
	}
	return "";
}
