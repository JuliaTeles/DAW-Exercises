<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Editar | Atv Cadastro</title>
</head>
<body>
	<a href="menu.html">Menu</a> | <a href="consulta.php">Consultar</a> | <a href="cadastra.php">Cadastrar</a>
	<hr>
	<div style= "margin-left: 10%; margin-right: 10%; margin-top: 10%;">
		<p style="text-align: center; font-size: 40px;">Editar Vendas</p>
		<hr>
	</div>

</body>
</html>

<?php

	if(!isset($_POST["id"])){
		echo "<p style='text-align: center;'>Selecione a venda a ser editada!</p>";
	}
	else{

		try{
			include("conexao.php");
			$id = $_POST['id'];
			$cliente = $_POST['cliente'];
			$produto = $_POST['produto'];
			$valor = $_POST['valor'];
			$pagamento = $_POST['pagamento'];
		

			echo  
			"<div style= 'margin-left: 10%; margin-right: 10%;'>\n
				<form method='POST' action='altera.php'>\n
				
					ID: \n
					<input type='text' readonly size='5' name='id' value='" . $id . "'>\n
					<br><br>\n


					Cliente: \n
					<input type='text' size='10' name='cliente' value='" . $cliente . "'>\n
					<br><br>\n

					Produto:\n
					<input type='text' size='30' name='produto' value='" . $produto . "'>\n
					<br><br>\n

					Valor da venda: \n
					<input type='text' size='30' name='valor' value='" . $valor . "'>\n
					<br><br>\n

					Situação de pagamento:\n
					<select name='pagamento' >\n
						<option></option>\n
						<option value='pago'> Pago </option>\n
						<option value='falta'> Falta pagar</option>\n
					</select>\n
					<br><br>\n

					<input type='submit' name='Salvar' value='Salvar';>\n
				</form>\n
				<hr>\n
			</div>\n";
			

		}catch(PDOException $e){
			echo 'Error: ' . $e->getMessage();

		}

		$pdo = null;

	}

?>