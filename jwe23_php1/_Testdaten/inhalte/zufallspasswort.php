		<div id='journal'>
			<div class='wrapper'>
				<div class='row'>
					<div class='col-xs-12'>
						<h1>Zufallspasswort</h1>
					</div>
				</div>

				<div class='row'>
					<div class='col-xs-12'>
						Hier sollen die Passwörter ausgegeben werden.
					</div>
				</div>

				<br>

				<?php

				function zufallspasswort()
				{
					$PwordSigns = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890#?&%$§!';
					$PwordSignsLength = strlen($PwordSigns) - 1;
					// Länge -1 in den Zwischenspeicher (eignetlich 70, nicht 69 / wg. Arrayzählung?)
					$Pwords = array();

					for ($PwordIndex = 0; $PwordIndex <= 7; $PwordIndex++) {
						$PwordSingleSigns = rand(0, $PwordSignsLength);
						// random Zeichen zwischen Pos 0 und Länge von $PwordSignsLength
						// Wird in Array gespeicher - startet bei 0 - deswegen vorher -1?
						$Pwords[] = $PwordSigns[$PwordSingleSigns];
					}

					return implode($Pwords);
					// implode - Gibt Arraywerte als String aus
				}

				function zufallspasswortx10()
				{
					for ($i = 0; $i <= 9; $i++) {
						echo zufallspasswort();
						echo "<br>";
					}
				}

				echo zufallspasswortx10();

				echo "<br>";
				echo "<br>";



				// php - Dokumentation

				function zufallspasswort2()
				{
					for ($i = 0; $i <= 9; $i++) {
						$randPW = random_bytes(9);
						echo $randPW;
						echo "<br>";
					}
				}
				echo "<br>";
				echo zufallspasswort2();
				echo "<br>";



				echo "<br>";
				echo "<br>";

				?>

			</div>
		</div>