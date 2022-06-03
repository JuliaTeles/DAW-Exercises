<?php
	// Nome: Júlia Téles Cruz 		3ºINFD
	// RA:200558			   Data: 26.05		
	
	$turmas = array("INFD3"=>array("16117"=>"Amanda Oliveira Santos",
								   "16557"=>"Bruno Penteado Carrara",
								   "16563"=>"Cibele Souza de Almeida",
								   "16119"=>"Danilo Rafhael",
								   "16121"=>"Érika Cavalcanti"),

				    "CTI2"=>array("17427"=>"Diogo Vinicius Oliveira",
								  "17428"=>"Douglas José Figueiredo",
								  "17429"=>"Emily Da Silva Farias"),

					"INFN3"=>array("16227"=>"Andre Ricardo Martins",
								   "16573"=>"Andre Schinor Mena Peres",
								   "16228"=>"Beatriz Santos de Mello",
								   "16229"=>"Caio Ramos Ballarin",
								   "16231"=>"Carlos Eduardo Lima"));

	$turma = $_GET["turma"];

	if(!array_key_exists($turma, $turmas)){
		echo "Turma não encontrada - " . $turma . "!";
	} else {

		echo "<h1> Alunos da turma " . $turma . "</h1>";

		echo "<table border='1px'>";

		foreach ($turmas[$turma] as $aluno) {
			echo "<tr><td>" . $aluno . "</td></tr>";
		}
		echo "</table>";
	}
?>	
