<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>
		
	</title>
</head>
<body>

</body>
</html>

<?php
	session_start();

	function sair(){
		echo "saiuuuuuu";
		session_destroy(); 
		header("location:cadastra.php");
	}


	if(!isset($_SESSION['logou'])){
		echo "<span> Acesso não autorizado! </span>
			<hr>
			<a href='cadastra.php'> Login </a>";
	}else {
		//corrigir logout input!!!
		echo "<div style= 'margin-left: 10%; margin-right: 10%; margin-top: 10%;'> 

		<p style='text-align: center; font-size: 40px;'> Seja bem-vinda(o)   " . $_SESSION['login'] . "</p>
		<hr>
		<p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed facilisis, quam eget ultrices molestie, nunc tellus mollis nisi, eu porttitor metus tellus vel mauris. Cras commodo congue scelerisque. Nam eu purus ullamcorper, dignissim sem eget, sagittis tellus. Donec vel risus sit amet leo laoreet ultricies. Morbi vitae hendrerit purus. Vestibulum euismod purus ac libero placerat, ut consectetur urna posuere. Integer nec leo non tellus rhoncus pellentesque. Nam convallis sed nulla nec rutrum. Curabitur laoreet mauris id tellus porttitor tristique. Fusce tortor mi, maximus in luctus eget, blandit porta lacus. Nulla ac tellus arcu. Aenean commodo tellus in nulla auctor posuere. Quisque fringilla ac sem viverra pellentesque. Sed molestie ac libero vitae varius. Suspendisse potenti. </p>

		<ol type='I'>
			<li>Integer ac leo auctor, ullamcorper justo at, dignissim sapien.</li>
			<li>Mauris vitae nisi nec lectus pellentesque blandit nec id ex.</li>
			<li>Sed viverra justo porta leo convallis condimentum.</li>
			<li>Pellentesque sollicitudin sem eget tincidunt placerat.</li>
			<li>Vestibulum non augue vel massa lobortis varius eu quis tellus..</li>
		</ol>
		
		<hr><br>
		<input type='submit' name='logout' onclick='sair()'>

		</div>";

	}

?>