<?php

if(!isset($_POST['week']) && !isset($_GET['qc'])) {
	
	echo '<!DOCTYPE html>
	<html lang="de">
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="de" />
	<meta name="page-topic" content="Berichtsheftgenerator" />
	<meta name="description" content="Berichtsheftgenerator">
	<meta name="keywords" lang="de" content="berichtsheft, generator, technische berufe, berufsschule, bayern, mediengestaltung, pdf, pdf generator, on the fly" />
	<meta name="robots" content="index, nofollow" />
	<meta name="distribution" content="global" />
	<meta name="revisit-after" content="7 days" />
	<meta name="copyright" content="MIT License" />
	<title>Berichtsheftgenerator</title>
	</head>
	<body>';
	
	?>
	
	<style type="text/css">
		@font-face {
			font-family: "R-Regular";
			src: url("../f/Roboto-Regular.ttf");
		}

		@font-face {
			font-family: "R-CondReg";
			src: url("../f/RobotoCondensed-Regular.ttf");
		}

		body {
			margin: 0px;
			background-color: #373737;
			font-family: "R-Regular";
			color: #DCD0C0;
			font-size: 28px;
		}
	
		.t {
			display: table;
			border-collapse: collapse;
			margin: 0 auto;
		}
	
		.tr {
			display: table-row;
		}
	
		.td {
			display: table-cell;
			padding: 4px;
		}
	
		input {
			background-color: grey;
			transition-duration: 0.5s;
			color: white;
			border: none;
		}
	
		input:focus {
			background-color: white;
			color: black;
			transition-duration: 0.3s;
		}
	
		a, a:visited {
			color: white;
		}
	</style>
	<script type="text/javascript">
	
		function findTotal() {
			var arr = document.getElementsByClassName('qty');
			var mon = document.getElementsByClassName('Montag');
			var die = document.getElementsByClassName('Dienstag');
			var mit = document.getElementsByClassName('Mittwoch');
			var don = document.getElementsByClassName('Donnerstag');
			var fre = document.getElementsByClassName('Freitag');
		
			var tot = 0;
			var montot = 0;
			var dietot = 0;
			var mittot = 0;
			var dontot = 0;
   			var fretot = 0;
		
   			for(var i = 0; i<arr.length; i++) {
				if(parseFloat(arr[i].value))
				tot += parseFloat(arr[i].value);
   			}
		   		
   			for(var i = 0; i<mon.length; i++) {
				if(parseFloat(mon[i].value))
				montot += parseFloat(mon[i].value);
   			}
		
   			for(var i = 0; i<die.length; i++) {
				if(parseFloat(die[i].value))
				dietot += parseFloat(die[i].value);
   			}
		
   			for(var i = 0; i<mit.length; i++) {
				if(parseFloat(mit[i].value))
				mittot += parseFloat(mit[i].value);
   			}
			
   			for(var i = 0; i<don.length; i++) {
				if(parseFloat(don[i].value))
				dontot += parseFloat(don[i].value);
			}
				
   			for(var i = 0; i<fre.length; i++) {
				if(parseFloat(fre[i].value))
				fretot += parseFloat(fre[i].value);
   			}
		
			document.getElementById('summary').value = tot;
			document.getElementById('Montag').value = montot;
			document.getElementById('Dienstag').value = dietot;
			document.getElementById('Mittwoch').value = mittot;
			document.getElementById('Donnerstag').value = dontot;
			document.getElementById('Freitag').value = fretot;
		}
	
	</script>
	<?php
	echo '<div style="width: 100%; text-align: center;">
			<p style="font-size: 35px;">Berichtsheftgenerator – Technische Berufe<br />
			<p style="color: orange; font-size: 18px; text-align: center;">Aus Datenschutzgründen werden keinerlei Formularinhalte serverseitig gespeichert.<br />PDFs werden direkt ausgegeben. Quellcode <a href="?qc">hier</a> einsehbar, ein <a href="1_01_Ein%20Name-Berichtsheft.pdf" target="blank_">Beispiel-PDF hier</a>.<br/>Alle ungeraden Stunden müssen mit PUNKT statt Komma angegeben werden (7.75 statt 7,75)!</p></p>
			<form action="" method="POST">
				<div class="t">
					<div class="tr">
						<div class="td"><input type="text" name="nomen" required placeholder="Dein Name" style="width: 300px; padding: 4px 4px 4px 4px; height: 30px;" /></div>
						<div class="td"><select name="week" required maxlength="2" style="width: auto; padding: 4px 4px 4px 4px; height: 30px;"><option selected value="' .date('W', time('now')). '">Woche ' .date('W', time('now')). '</option>';
						for($i = '1'; $i <= '53'; $i++) {
							if($i < '10') {
								$i = '0' .$i. '';
							}
							if($i != date('W', time('now'))) {
								echo '<option value="'. $i. '">Woche ' .$i. '</option>';
							}
						}
						echo '</select>
						<select name="yr" required style="width: auto; padding: 4px 4px 4px 4px; height: 30px;">
							<option selected value="' .date('Y', time('now')). '">' .date('Y', time('now')). '</option>
							<option value="' .((date('Y', time('now')))-1). '">' .((date('Y', time('now')))-1). '</option>
							<option value="' .((date('Y', time('now')))-2). '">' .((date('Y', time('now')))-2). '</option>
							<option value="' .((date('Y', time('now')))-2). '">' .((date('Y', time('now')))-3). '</option>
						</select>	
						</div>
					</div>
					<div class="tr">
						<div class="td"><input type="number" required name="ayr" placeholder="Ausbildungsjahr" style="width: 300px; padding: 4px 4px 4px 4px; height: 30px;" /></div>
						<div class="td"><input type="number" required name="nr" placeholder="Ausbildungsnachweis#" style="width: 200px; padding: 4px 4px 4px 4px; height: 30px;" /></div>
					</div>
					<div class="tr">
						<div class="td"><input type="text" required name="comp" placeholder="Ausbildungsbetrieb" style="width: 300px; padding: 4px 4px 4px 4px; height: 30px;" /></div>
						<div class="td"><input type="text" name="dep" placeholder="Abteilung" style="width: 200px; padding: 4px 4px 4px 4px; height: 30px;" /></div>
					</div>
					<br />
					<div class="tr">
						<div class="td" style="text-align: left;"><b>Betriebliche Tätigkeit</b></div>
						<div class="td" style="text-align: left;"><b>Einzelstunden</b></div>
					</div>
					<div class="tr">
						<div class="td" style="font-size: 14px; text-align: left;">Bsp.: Übung in Dreamweaver</div>
						<div class="td" style="font-size: 14px; text-align: left;">Bsp.: 2.5</div>
					</div>';
	

					for($i = '1'; $i <= '5'; $i++) {
						$tage = array('1' => 'Montag', '2' => 'Dienstag', '3' => 'Mittwoch', '4' => 'Donnerstag', '5' => 'Freitag');
						foreach($tage as $id => $tag) {
							if($i == $id) {
								$day = $tag;
							}
						}
												
						echo '<br />
							<div class="tr">
								<div class="td" style="text-align: left;"><b>' .$day. '</b></div>
							</div>';
						for($k = '1'; $k <= '7'; $k++) {
							if($k == '1') {
								$required = 'required';
							}
							else {
								$required = '';
							}
							echo '<div class="tr">
								<div class="td"><input name="' .$i. 'a' .$k. '" list="bsnz" placeholder="Tätigkeit ' .$k. '" type="text" onblur="findTotal();" style="width: 300px; padding: 4px 4px 4px 4px; height: 30px;" ' .$required. '/>
									<datalist id="bsnz">
										<option value="Ausbildung">
										<option value="Berufsschule">
										<option value="Urlaub">
										<option value="Feiertag">
										<option value="krankheitsbedingter Ausfall">
										<option value="Übung in InDesign">
										<option value="Übung in Illustrator">
										<option value="Übung in AfterEffects">
										<option value="Übung in Photoshop">
										<option value="Übung mit Bildbearbeitungsprogramm">
										<option value="Übung in Premiere">
										<option value="Übung mit Videobearbeitungsprogramm">
										<option value="Übung in Dreamweaver">
										<option value="Übung mit CMS">
										<option value="Übung in Codeprogramm">
										<option value="Übung mit Datenbanken">
										<option value="EDV">
										<option value="Fortbildung">
										<option value="Zeitausgleich/Überstundenabbau">
									</datalist>
								</div>
								<div class="td"><input name="' .$i. 'b' .$k. '" placeholder="Einzelstunden Tätigkeit ' .$k. '" type="text" class="' .$day. '" onblur="findTotal();" style="width: 200px; padding: 4px 4px 4px 4px; height: 30px;" ' .$required. '/></div>
							</div>';
						}
					
						echo '<div class="tr">
							<div class="td" style="text-align: right;"><span style="font-size: 18px;">Gesamt:</span></div>
							<div class="td" style="text-align: left;"><input class="qty" id="' .$day. '" onblur="findTotal();" name="' .$i. 'c" readonly placeholder="0" style="width: 100px; padding: 4px 4px 4px 4px; height: 30px;" /></div>
							</div>';
					}

				echo '<div class="tr">
					<div class="td" style="text-align: right;"><span style="font-size: 18px;">Wochenstunden:</span></div>
					<div class="td" style="text-align: left;"><input name="total" id="summary" placeholder="0" readonly type="text" style="width: 100px; padding: 4px 4px 4px 4px; height: 30px;" /></div>
					</div>
					
				</div>
				<div class="t">
					<div class="tr">
						<div class="td">Beschreibung eines Arbeitsvorganges dieser Woche</div>
					</div>
					<div class="tr">
						<div class="td"><textarea name="desc" rows="4" cols="50" placeholder="max. 2000 Zeichen Fließtext ohne Absätze" maxlength="2000" style="width: 750px; height: 300px;"></textarea></div>
					</div>
				</div>	
				<button type="submit">Erstellen</button>
			</form>
		</div>
		<p style="color: orange; text-align: center; font-size: 18px;">Es findet keine automatische Fehlerkorrektur statt, jeder ist für seinen eigenen Content verantwortlich!</p>
		</body>
		</html>';
}
elseif(isset($_POST['week']) && !isset($_GET['qc'])) {
	
	require_once('ext/fpdf181/fpdf.php');
	require_once('ext/fpdi161/fpdi.php');
	
	// QUELLE: http://fpdf.de/downloads/add-ons/rotations.html && http://fpdf.de/forum/viewtopic.php?t=4202
	class PDF_Rotate extends FPDI {
		var $angle=0;
		function Rotate($angle, $x = -1, $y = -1) {
			if($x == -1)
				$x = $this->x;
			if($y == -1)
				$y = $this->y;
			if($this->angle != 0)
				$this->_out('Q');
			$this->angle = $angle;
			if($angle != 0) {
				$angle*=M_PI/180;
				$c = cos($angle);
				$s = sin($angle);
				$cx = $x*$this->k;
				$cy = ($this->h-$y)*$this->k;
				$this->_out(sprintf('q %.5F %.5F %.5F %.5F %.2F %.2F cm 1 0 0 1 %.2F %.2F cm', $c, $s, -$s, $c, $cx, $cy, -$cx, -$cy));
			}
	}
		
		function _endpage() {
			if($this->angle != 0) {
				$this->angle = 0;
				$this->_out('Q');
			}
			parent::_endpage();
		}
	}
	
	class PDF extends PDF_Rotate {
		function RotatedText($x, $y, $txt, $angle) {
			$this->Rotate($angle, $x, $y);
			$this->Text($x, $y, $txt);
			$this->Rotate(0);
		}
		
		function RotatedImage($file, $x, $y, $w, $h, $angle) {
			$this->Rotate($angle, $x, $y);
			$this->Image($file, $x, $y, $w, $h);
			$this->Rotate(0);
		}
	} 

	$pdf = new PDF();
	
	$pageCount = $pdf->setSourceFile('bh.pdf');
	$tplIdx = $pdf->importPage(1);
	$pdf->AddFont('Roboto-Regular', '', 'Roboto-Regular.php');
	$pdf->AddPage();
	$pdf->SetAutoPageBreak('0');
	$pdf->SetMargins('0', '0', '0');
	$pdf->SetFont('Roboto-Regular', '', 10);
	$pdf->useTemplate($tplIdx, '0', '0', '210', '297');
	$pdf->SetAuthor($_POST['nomen']);
	
	// NAME
	$pdf->SetXY('17.3', '14.15');
	$pdf->MultiCell('100', '3.5', '' .iconv('UTF-8', 'windows-1252', 'Name: ' .$_POST['nomen']). '');
	
	// NUMMER
	$pdf->SetXY('140', '11.9');
	$pdf->MultiCell('50', '3.5', 'Ausbildungsnachweisnr.: ' .$_POST['nr']. '');
	
	// AUSBILDUNGSJAHR
	$pdf->SetXY('140', '16.4');
	$pdf->MultiCell('50', '3.5', 'Ausbildungsjahr: ' .$_POST['ayr']. '');
	
	// AUSBILDUNGSBETRIEB
	$pdf->SetXY('17.3', '27.5');
	$pdf->MultiCell('50', '3.5', 'Ausbildungsbetrieb:');
	$pdf->SetXY('17.3', '34.5');
	$pdf->SetFontSize('8');
	$pdf->MultiCell('100', '3.5', '' .iconv('UTF-8', 'windows-1252', $_POST['comp']). '');
	$pdf->SetFontSize('10');
	
	// ABTEILUNG
	$pdf->SetXY('78', '27.5');
	$pdf->MultiCell('50', '3.5', 'Ausbildungsabteilung:');
	$pdf->SetXY('78', '34.5');
	$pdf->SetFontSize('8');
	$pdf->MultiCell('100', '3.5', '' .iconv('UTF-8', 'windows-1252', $_POST['dep']). '');
	$pdf->SetFontSize('10');
	
	// WOCHE
	$pdf->SetXY('140', '27.5');
	$pdf->MultiCell('30', '3.5', 'Woche: ' .$_POST['week']. '');
	
	// VON & BIS
	$montag = date('d.m.Y', strtotime($_POST['yr']."W".$_POST['week'].'1'));
	$freitag = date('d.m.Y', strtotime('' .$montag. ' +4 days'));
	$pdf->SetXY('140', '34.5');
	$pdf->MultiCell('150', '3.5', 'Von: ' .$montag. ' Bis: ' .$freitag. '');
	
	// BESCHREIBUNG
	$pdf->SetXY('17.3', '30');
	$pdf->RotatedText('21', '57.75', 'Tag', '90');
	
	$pdf->SetXY('25.8', '48.2');
	$pdf->SetFontSize('8');
	$pdf->MultiCell('150', '3.5', '' .iconv('UTF-8', 'windows-1252', 'Betriebliche Tätigkeit - Berufsschule (Themen des Unterrichts) - außer- und überbetriebliche Ausbildung'). '');
	
	$pdf->SetXY('25.8', '58.2');
	$pdf->MultiCell('150', '3.5', 'Bitte Ausbildungsverlauf mit der zeitlichen und sachlichen Gliederung abgleichen');
	
	$pdf->SetXY('163.45', '53.35');
	$pdf->MultiCell('30', '3.5', 'Einzelstd.');
	
	$pdf->SetXY('179', '53.35');
	$pdf->MultiCell('30', '3.5', 'Gesamtstd.');
	$pdf->SetFontSize('10');
	
	// WOCHENTAGE
	$wochentage = array('83.55' => 'Montag', '107.2' => 'Dienstag', '130.2' => 'Mittwoch', '154.7' => 'Donnerstag', '173.75' => 'Freitag');
	foreach($wochentage as $wert => $wochentag) {
		$pdf->RotatedText('21', $wert, $wochentag, '90');
	}
	
	for($i = '1'; $i <= '5'; $i++) {
		$pdf->SetFontSize('7');
		$y = '67'+($i-1)*'22.75';
		$pdf->SetXY('25.8', $y);
		for($k = '1'; $k <= '7'; $k++) {
			$pdf->SetX('25.8');
			$pdf->MultiCell('150', '3', '' .iconv('UTF-8', 'windows-1252', $_POST['' .$i. 'a' .$k. '']). '');
		}
		$pdf->SetXY('25.8', $y);
		for($k = '1'; $k <= '7'; $k++) {
			
			// ZENTRIERUNG
			$zentrierung = array('4' => '167', '3' => '168', '2' => '168.5', '1' => '169');
			foreach($zentrierung as $länge => $abstand) {
				if(strlen($_POST['' .$i. 'b' .$k. '']) == $länge) {
					$pdf->SetX($abstand);
				}
			}
			
			$pdf->MultiCell('150', '3', $_POST['' .$i. 'b' .$k. '']);
			
		}
		
		$zentrierung = array('4' => '182.8', '3' => '183.8', '2' => '184', '1' => '185');
		foreach($zentrierung as $länge => $abstand) {
			if(strlen($_POST['' .$i. 'c']) == $länge) {
				$centerC = $abstand;
			}
		}
		
		$pdf->SetXY($centerC, $y+'9.5');
		$pdf->SetFontSize('10');
		$pdf->MultiCell('150', '3', '' .iconv('UTF-8', 'windows-1252', $_POST['' .$i. 'c']). '');
	}	
	
	$pdf->SetFontSize('10');
	// BESCHREIBUNG EINES ARBEITSVORGANGES
	$pdf->SetXY('18.5', '182');
	$pdf->MultiCell('150', '3.5', 'Beschreibung eines Arbeitsvorganges dieser Woche');
	$pdf->SetXY('18.5', '186');
	$_POST['desc'] = substr($_POST['desc'], '0', '2000');
	$pdf->MultiCell('150', '3.5', '' .iconv('UTF-8', 'windows-1252', $_POST['desc']). '');
	
	// GESAMTSTUNDEN
	$pdf->SetXY('150.5', '266.5');
	$pdf->MultiCell('170', '3.5', 'Gesamtstunden:');
	
	$zentrierung = array('5' => '181.75', '4' => '182.915', '2' => '184.5');
	foreach($zentrierung as $länge => $abstand) {
		if(strlen($_POST['total']) == $länge) {
			$centerTotal = $abstand;
		}
	}
	
	$pdf->SetXY($centerTotal, '266.5');
	$pdf->MultiCell('150', '3.5', $_POST['total']);
	
	// FUßZEILE	
	$pdf->SetXY('17.2', '275');
	$pdf->MultiCell('150', '3.5', '' .iconv('UTF-8', 'windows-1252', 'Für die'). '');
	$pdf->SetXY('17.2', '279');
	$pdf->MultiCell('150', '3.5', 'Richtigkeit');
	
	$pdf->SetXY('40', '279');
	$pdf->MultiCell('150', '3.5', '_____________________________________________________________________________________');
	
	$pdf->SetXY('40', '283');
	$pdf->SetFontSize('8');
	$pdf->MultiCell('150', '3.5', '            Datum                              Auszubildender                                        Datum                              Ausbilder');
	
	
	$pdf->SetTitle('' .$_POST['nr']. '_' .$_POST['week']. '_' .$_POST['nomen']. '-Berichtsheft');
	$pdf->Output('I');
}
elseif(!isset($_POST['week']) && isset($_GET['qc'])) {
	highlight_file('index.php');
}

?>

<script type="text/javascript">
	document.onreadystatechange = function () {
		var state = document.readyState
		if (state == 'interactive') {
		
		} else if (state == 'complete') {
			findTotal();
		}
	}
</script>
<script type="text/javascript" src="j/charcount.js"></script>