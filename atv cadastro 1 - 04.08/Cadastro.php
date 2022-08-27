<?php

	$op = $_GET["op"];
	echo "Operação: " . $op;
	echo "<hr>";

	$ra = $_POST["ra"];
	$nome = $_POST["nome"];
	$curso = $_POST["curso"];

	if($op == "save"){
		echo "Salvando!";
		echo "<br><br>";

		echo "Nome: " . $nome . "<br>";
		echo "Ra: " . $ra . "<br>";
		echo "Curso: " . $curso . "<br>";
	}

?>
