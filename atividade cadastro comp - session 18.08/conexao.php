<?php 
	try{
		$pdo = new PDO('mysql:host=143.106.241.3;dbname=cl200558;charset=utf8', 'cl200558', 'cl*30092004');

		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}catch(SQLException $e){
		echo 'Impossivel conectar ao banco de dados - ' . $e . '<br>';
	}
 ?>