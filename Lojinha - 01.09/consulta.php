<!DOCTYPE html>
<html>
<head> 

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Consultar | Lojinha</title>

</head>
<body>
	<a href="menu.html">Menu</a> | <a href="cadastra.php">Cadastrar</a>
	<hr>

	<div style= "margin-left: 10%; margin-right: 10%; margin-top: 10%;">
		<p style="text-align: center; font-size: 40px;">Consultar Vendas</p>
		<hr>
			<form method="post">
				<button type="submit">Consultar</button>
			</form>
			<br><hr><br>

	</div>

</body>
</html>

<?php 
	if($_SERVER["REQUEST_METHOD"] === 'POST'){
		include("conexao.php");

			$stmt = $pdo->prepare("select * from Lojinha");
		

		try{

			$stmt->execute();

			echo "	<div style= 'margin-left: 10%; margin-right: 10%;'>
					<form method='post'>
					<table border='1px'>";
			echo "<tr>
					<th></th> <th>ID<th> <th>Cliente</th> <th>Produto</th> <th>Valor</th> <th>Situação</th>
				  </tr>";

			while($row = $stmt->fetch()){
				echo "<tr>";
				echo "<td> <input type='radio' name='id' value='" . $row['id'] . "'> </td>";
				echo "<td>" . $row['id'] . "</td>";
				echo "<td>" . $row['cliente'] . "</td>";
				echo "<td>" . $row['produto'] . "</td>";
				echo "<td>" . $row['valor'] . "</td>";
				echo "<td>" . $row['pagamento'] . "</td>";
				echo "</tr>";

			}


			echo "</table><br>
			<hr><br>
			<button type='submit' formaction='remove.php'>Excluir</button>
			<button type='submit' formaction='edicao.php'>Editar</button>

			<br><hr><br><br>
			</div>
			</form>";
		}catch(PDOException $e){
			echo 'Error: ' . $e->getMessage();
		}
		$pdo = null;
	}
?>