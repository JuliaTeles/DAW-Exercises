<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Editar | Lojinha</title>
</head>
<body>
	<a href="index.html">Menu</a> | <a href="consulta.php">Consultar</a> | <a href="cadastra.php">Cadastrar</a>
	<hr>
	<div style= "margin-left: 10%; margin-right: 10%; margin-top: 10%;">
		<p style="text-align: center; font-size: 40px;">Editar Vendas</p>
		<hr>
	</div>

</body>
</html>

<?php
	

	$id = $_POST['id'];
	$novocliente = $_POST['cliente'];
	$novoproduto = $_POST['produto'];
	$novovalor = $_POST['valor'];
	$novopagamento = $_POST['pagamento'];

	try{
		include("conexao.php");
		$stmt = $pdo->prepare("UPDATE Lojinha SET cliente = :novocliente, produto = :novoproduto, valor = :novovalor, pagamento = :novopagamento WHERE id = :id");
			$stmt->bindParam(':novocliente', $novocliente);
			$stmt->bindParam(':novoproduto', $novoproduto);
			$stmt->bindParam(':novovalor', $novovalor);
			$stmt->bindParam(':novopagamento', $novopagamento);
			$stmt->bindParam(':id', $id);
			$stmt->execute();

			echo "Os dados da venda de id - $id , foram alterados!";

	}catch(PDOException $e){
			echo 'Error: ' . $e->getMessage();
	}
	$pdo = null;

?>

