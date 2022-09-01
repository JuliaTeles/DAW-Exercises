<!DOCTYPE html>
<html>
<head> 

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Cadastrar | Lojinha</title>

</head>
<body>
	<a href="menu.html">Menu</a> | <a href="consulta.php">Consultar</a> 
	<hr>

	<div style= "margin-left: 10%; margin-right: 10%; margin-top: 10%;">
		<p style="text-align: center; font-size: 40px;">Cadastrar Vendas</p>
		<hr>
		<form method="POST">
			Cliente: 
			<input type="text" size="10" name="cliente">
			<br><br>

			Produto:
			<input type="text" size="30" name="produto">
			<br><br>

			Valor da venda: 
			<input type="text" size="30" name="valor">
			<br><br>

			Situação de pagamento:
			<select name="pagamento">
				<option></option>
				<option value="pago"> Pago </option>
				<option value="falta"> Falta pagar</option>
			</select>
			<br><br>

			<input type="submit" name="Cadastrar">
		</form>
		<hr>
	</div>

</body>
</html>


<?php 
	if($_SERVER["REQUEST_METHOD"] == "POST"){

		try{
			$cliente = $_POST['cliente'];
			$produto = $_POST['produto'];
			$valor = $_POST['valor'];
			$pagamento = $_POST['pagamento'];

			if((trim($cliente) == "") || (trim($produto) == "") || (trim($valor) == "") || (trim($pagamento) == "")){
				echo "<div style= 'margin-left: 10%; margin-right: 10%; margin-top: 10%;'> 
						<span style='text-align: center; '> Todos os campos são obrigatórios! </span>
					  </div>";

			}else{
				include("conexao.php");

			
				$stmt = $pdo->prepare("insert into lojinha (cliente, produto, valor, pagamento) values (:cliente, :produto, :valor, :pagamento)");
				$stmt->bindParam(':cliente',$cliente);
				$stmt->bindParam(':produto',$produto);
				$stmt->bindParam(':valor',$valor);
				$stmt->bindParam(':pagamento',$pagamento);
				$stmt->execute();

				echo "<span style= 'margin-left: 10%; margin-right: 10%; margin-top: 15%;'> Venda cadastrada com sucesso! </span>";
			}
		}catch (PODException $e){
			echo "<span style='margin-left: 10%; margin-right: 10%; margin-top: 15%;'> Houve um erro ao registrar a venda!</span>";
		}
	}
	
 ?>