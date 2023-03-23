<?php

$fehlermeldungen = array();
$erfolgreich = false;
// Default Value

if (!empty($_POST)) {


	if (empty($_POST["benutzername"])) {
		$fehlermeldungen[] = "Bitte geben Sie Ihren Benutzernamen ein.";
	} else if (mb_strlen($_POST["benutzername"]) < 4) {
		$fehlermeldungen[] = "Ihr Name muß mindestens 4 Zeichen enthalten";
	}
	//else if (!preg_match('/[A-Za-z0-9]+/i', $_POST["benutzername"])) {
	//$fehlermeldungen[] = "Ihre Eingabe darf nur aus Buchstaben und Ziffern bestehen";
	//}
	if (preg_match('/[A-Za-z0-9]+/i', $_POST["benutzername"])) { //'/[A-Za-z0-9]+@\\./i' - sollte eigentlich auf @ und . prüfen
	} else {
		$fehlermeldungen[] = "Ihre Eingabe darf nur aus Buchstaben und Ziffern bestehen";
	}


	if (empty($_POST["passwort"])) {
		$fehlermeldungen[] = "Bitte geben Sie Ihr Passwort ein";
	} else if (mb_strlen($_POST["passwort"]) < 6) {
		$fehlermeldungen[] = "Ihr Passwort muß mindestens 6 Zeichen enthalten";
	} else if (!preg_match('/^[a-zA-Z ]*/', $_POST["passwort"])) { //'/[A-Za-z0-9]+#\\*\\?=\\)\\(/&%\\$§"!/i'    '/^[a-zA-Z ]*/'
		$fehlermeldungen[] = "Ihr Passwort muß Groß- und Kleinbuchstaben, Ziffern und Sonderzeichen enthalten";
	}
	//if (preg_match('/[A-Za-z0-9]+#\\*\\?=\\)\\(/&%\\$§"!/i', $_POST["passwort"])) { //'/[A-Za-z0-9]+@\\./i' - sollte eigentlich auf @ und . prüfen
	//} else {
	//	$fehlermeldungen[] = "Ihr Passwort muß Groß- und Kleinbuchstaben, Ziffern und Sonderzeichen enthalten";
	//}


	if (empty($_POST["email"])) {
		$fehlermeldungen[] = "Bitte geben Sie Ihre E-Mail Adresse ein";
	} else if (!preg_match('/^[a-zA-Z ]*/', $_POST["email"])) { //'/[A-Za-z0-9]+@\\./i' - sollte eigentlich auf @ und . prüfen
		$fehlermeldunge[] = "Ihre Mailadresse muß ein @ Zeichen sowie einen Punkt enthalten";
	}
	//if (preg_match('/[A-Za-z0-9]+@\\./i', $_POST["email"])) { //'/[A-Za-z0-9]+@\\./i' - sollte eigentlich auf @ und . prüfen
	//} else {
	//	$fehlermeldungen[] = "Ihre Mailadresse muß ein @ Zeichen sowie einen Punkt enthalten";
	//}


	if (empty($_POST["agb"])) {
		$fehlermeldungen[] = "Bitte stimmen Sie den AGB zu";
	}




	if (empty($fehlermeldungen)) {
		$erfolgreich = true;

		// Wenn die Fehlermeldungen leer sind!! - auf true setzen
		// Muß innherhalb der Prüfung sein - sonst wird bei Erfolg nur noch die Erfolgsmeldung angezeigt
		if (empty($fehlermeldungen)) {
			$erfolgreich = true;

			//wenn kein Fehler Auftritt -> Datei schreiben
			$inhalt = "Anfrage über Kontaktformular:
            Name: {$_POST["benutzername"]}
			Passwort: {$_POST["passwort"]}
            E-Mail: {$_POST["email"]}
            ";

			$dateiname = date("Y-m-d_H-i-s");

			echo $dateiname . $inhalt; // Auf der Seite ausgeechot

			//Anfrage in Datei am Server speichern
			file_put_contents("registrierungen/{$dateiname}.txt", $inhalt);
		}
	}
}




?>
<div class='wrapper'>
	<div class='row'>
		<div class='col-xs-12'>
			<h1>Registrierung</h1>
		</div>
	</div>
</div>

<?php
// aufgetretene Fehlermeldung ausgeben
if (!empty($fehlermeldungen)) {
	echo "<div class= 'wrapper'; style='padding-left:1em; margin-top:30px';>";
	echo "<strong>Es sind folgende Fehler aufgetreten:</strong>";
	echo "<ul>";
	foreach ($fehlermeldungen as $fehlermeldung) {
		echo "<li>";
		echo $fehlermeldung;
		echo "</li>";
	}
	echo "</ul>";
	echo "</div>";
}
?>

<?php
if ($erfolgreich) {
	echo "<h3 class= 'wrapper'; style='padding-left:1em; margin-top:30px; margin-bottom:30px';>Vielen Dank für Ihre Anfrage</h3>";
} else {  // HTML steht in einem geteilten else - Bei Erfolg danke sonst wieder Formular
?>

	<form id='register-form' method="post" action="index.php?seite=registrieren">
		<div class="wrapper">
			<div class='row'>
				<div class='col-xs-12 col-sm-12'>
					<label for='username'>Benutzername</label>
					<input type='text' id='username' name='benutzername' value='<?php
																				if (!empty($_POST["benutzername"])) {
																					echo $_POST["benutzername"];
																				}
																				?>' />
				</div>
				<div class='col-xs-12 col-sm-12'>
					<label for='password'>Passwort</label>
					<input type='password' id='password' name='passwort' value='<?php
																				if (!empty($_POST["passwort"])) {
																					echo $_POST["passwort"];
																				}
																				?>' />
				</div>
				<div class='col-xs-12 col-sm-12'>
					<label for='email'>E-Mail</label>
					<input type='text' id='email' name='email' value='<?php
																		if (!empty($_POST["email"])) {
																			echo $_POST["email"];
																		}
																		?>' />
				</div>
				<div class='col-xs-12 col-sm-12'>
					<input type='checkbox' id='toc' name='agb' />
					<label for='toc'>Ich akzeptiere die AGB.</label>
				</div>
				<div class='col-xs-12'>
					<input type='submit' value='Registrieren' />
				</div>
			</div>
		</div>
	</form>

<?php
}
?>