<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
</head>
<body>
    <div style= "margin-left: 15%; margin-right: 15%; margin-top: 15%; margin-bottom: 15%; text-align: center; border: 2px solid black">
        <br>

        <h1>Controle de Alunos</h1>

        <form method="get" action="cadastro.php?op=save">

            <input type="button" value="Cadastrar" onclick="window.open('cadastar.php', '_top');">
            <br><br>
            <input type="button" value="Consultar" onclick="window.open('consulta.php', '_top');">

        </form>
        <br>
    </div>

</body>
</html>