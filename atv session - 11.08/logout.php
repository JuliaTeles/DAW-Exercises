<?php

	session_start();

	//unset($_SESSION['login']);
	//unset($_SESSION['logou']);

	session_destroy();

	header("location:index.php");

?>