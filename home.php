<?php
session_start();
 
require_once "iniciar.php";
//require "check.php"; //substituído pelas três linhas abaixo
if (!isLoggedIn()) {
    header("Location: entrar.php");
}
?>

<html lang="pt-br" dir="ltr">

<head>
	<meta charset="UTF-8">
	<meta name="description" content="EasyConnect - Home" />
	<meta name="author" content="Equipe Phoenix - Hackathon CPS 2020">
	<meta name="copyright" content="© 2020  -  Equipe Phoenix">
	<meta name="reply-to" content="fabio.martins.01@hotmail.com">
	<meta name="keywords" content="negócios, business, empreendedorismo">
	<meta name="rating" content="general">
	<meta name="robots" content="noindex,nofollow">
	<meta name="googlebots" content="noindex,nofollow">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
<!--
	<link rel="shortcut icon" type="image/x-icon" href="./img/favicon.ico"> 
	<link rel="alternative" type="application/rss+xml" title="Feed RSS - EasyConnect" href="./feed">
-->
    <link rel="stylesheet" href="./css/connect.css">
	<link rel="start" title="EasyConnect - Login" href="./entrar.php">
	<link rel="index" title="EasyConnect - Home" href=./home.php">
	
	<title> EasyConnect - Home </title>
	
</head>

<body>

	<header>
<!--
		<div id="logo" name="logo">
			<figure id="logotipo">
				<img src="./img/logo-preto.png" alt="EasyConnect logotipo" title="EasyConnect SP" width="900pt" height="auto">
			</figure>
		</div>
 -->
		<h1 class="titulo">EasyConnect SP</h1>
	</header>

	<p>Olá, <?php //echo $_SESSION['user_name']; ?>. </p>
	<a href="logout.php">Sair</a>

</body>
</html>