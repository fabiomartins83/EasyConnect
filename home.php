<?php
session_start();
 
require_once "init.php";
require "check.php";
?>

<!DOCTYPE html>
<html lang="pt-br" dir="ltr">

<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
	<meta name="description" content="EasyConnect - Home" />
	<meta name="author" content="Equipe Phoenix - Hackathon CPS 2020" />
	<meta name="copyright" content="© 2020  -  Equipe Phoenix" />
	<meta name="reply-to" content="fabio.martins.01@hotmail.com">
	<meta name="keywords" content="negócios, business, empreendedorismo" />
	<meta name="rating" content="general" />
	<meta name="robots" content="noindex,nofollow" />
	<meta name="googlebots" content="noindex,nofollow" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	
<!--	<link rel="shortcut icon" type="image/x-icon" href="favicon.ico" /> -->
    <link rel="stylesheet" href="connect.css">
	
	<title> EasyConnect - Home </title>
</head>

<body>

	<a id="topo"><figure id="logo">
		<img src="./img/logo-preto.png" alt="EasyConnect logotipo" title="EasyConnect SP">
	</figure></a>
	<br>

<!--	<h1 class="titulo">Connect Negócios SP</h1> -->
	
	<br>
	<p>Bem-vindo ao seu painel, <?php echo $_SESSION['user_name']; ?> | <a href="logout.php">Sair</a></p>
</body>
</html>