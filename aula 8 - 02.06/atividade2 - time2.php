<?php
	// Nome: Júlia Téles Cruz 		3ºINFD
	// RA:200558			   Data: 02.06	

	date_default_timezone_set("America/Sao_Paulo");

	echo mktime(12, 00, 00, 02, 20, 2022),"<br>";
	echo date("d-m-Y H:i:s", mktime(12, 00, 00, 02, 20, 2022));

	echo "<hr>";
	$data1 = mktime(0, 0, 0, 10, 10, 2004);
	$data2 = mktime(0, 0, 0, 02, 20, 2022);

	$difSeconds= ($data2 - $data1);
	echo "Diferença em segundos: ".$difSeconds,"<br>";

	$difMinutes= ($data2 - $data1) / 60;
	echo "Diferença em minutos: ".$difMinutes,"<br>";

	$difHours = ($data2 - $data1) / 60 / 60;
	echo "Diferença em horas: ".$difHours,"<br>";

	$difDays = ($data2 - $data1) / 60 / 60 / 24;
	echo "Diferença em dias: ".$difDays,"<br>";

	$difMonths = ($data2 - $data1) / 60 / 60 / 24 / 30;
	echo "Diferença em meses: ".round($difMonths),"<br>";

	$difYears = ($data2 - $data1) / 60 / 60 / 24 / 365;
	echo "Diferença em anos: ".round($difYears),"<br>";

?>

