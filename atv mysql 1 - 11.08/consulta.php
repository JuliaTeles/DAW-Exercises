<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta</title>
</head>
<body>
    <div style= "margin-left: 10%; margin-right: 10%; margin-top: 10%;">
        <hr><br>

        <h1 style="text-align: center;">Consulta de Alunos</h1>

        <form method="get" action="cadastro.php?op=save">

            <input type="hidden" name="op" value="save">
            RA:<br>
            <input type="text" name="ra">

            

            <br><br>

            <input type="submit" value="Consultar">
        </form>
        <br><hr>
    </div>

</body>
</html>