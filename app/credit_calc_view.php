<?php require_once dirname(__FILE__) .'/../config.php';?>
<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
<meta charset="utf-8" />
<title>Kalkulator raty miesięcznej kredytu bankowego</title>
</head>
<body>
<form action="<?php print(_APP_URL);?>/app/calc.php" method="post">
	<label for="id_kwota">Kwota pożyczki: </label>
	<input id="id_kwota" type="text" name="kwota" value="<?php if (!empty($kwota)) {
        print($kwota);
    } ?>" /><br />
	<label for="id_lata">Na ile lat: </label>
    <input id="id_lata" type="text" name="lata" value="<?php if (!empty($lata)) {
        print($lata);
    } ?>" /><br />
	<label for="id_oprocentowanie">Oprocentowanie pożyczki: </label>
	<input id="id_oprocentowanie" type="text" name="procent" value="<?php if (!empty($procent)) {
        print($procent);
    } ?>" /><br />
	<input type="submit" value="Oblicz raty" />
</form>	

<?php
//wyświeltenie listy błędów, jeśli istnieją
if (isset($messages)) {
	if (count ( $messages ) > 0) {
		echo '<ol style="margin: 40px; padding: 20px 20px 20px 40px; border-radius: 10px; background-color: #ff0000; width:300px;">';
		foreach ( $messages as $key => $msg ) {
			echo '<li>'.$msg.'</li>';
		}
		echo '</ol>';
	}
}
?>

<?php if (isset($rata_z_procentem)){ ?>
<div style="margin: 20px; padding: 10px; border-radius: 5px; background-color: #24ff00; width:300px;">
<?php echo 'Wynik: '.$rata_z_procentem; ?>
</div>
<?php } ?>

</body>
</html>