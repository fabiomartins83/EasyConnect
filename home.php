<?php
session_start();
 
require_once "functions.php";
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
	<title> EasyConnect - Home </title>
	<script type="text/javascript" src="./js/jquery3-min.js"></script>
	<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
	<script type="text/javascript" src="./js/connect.js"></script>
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="./css/connect.css">
	<link rel="start" title="EasyConnect - Login" href="./entrar.php">
	<link rel="index" title="EasyConnect - Home" href=./home.php">
</head>

<body>
	<header>
		<div id="logo" name="logo">
			<figure id="logotipo">
				<img src="img/logo-preto.png" alt="EasyConnect logotipo" title="EasyConnect SP" width="900pt" height="auto">
			</figure>
		</div>
		<h1 class="titulo">EasyConnect SP</h1>
	</header>
	<main>
		<p>Olá, <?php echo $_SESSION['user_name']; ?>. </p>
		<h2>Pesquisar cadastro de usuários </h2>
		<div>
			<p>Digite o nome na caixa de texto ao lado: </p>
			<!-- <form name="formconsulta" id="formconsulta" action="consultar.php" method="POST"> -->
			<form name="formconsulta" id="formconsulta">
				<fieldset>
					<legend class="rotulo">Formulário de consulta</legend>
					<label for="caixanome">Nome: </label>
					<input type="search" name="nome" id="nome" autocomplete="off" placeholder="Insira o nome do usuário" onkeyup="enviarRequisicao(this.value,'getHint.php')">
				</fieldset>
			</form>
		</div>
		<div>
			<p>Sugestões: <span id="sugestao"></span></p>
			<br>
			<button class="botoes btn-success" name="botaoapaga" id="botaoapaga" formaction="limpacadastro.php" formmethod="GET">Apagar cadastro</button>
		</div>
		<nav class="links">
			<a href="logout.php">Sair</a>
		</nav>
	</main>

	<footer class="rodape"><small>© 2020  -  <b>Fábio de Almeida Martins</b></small></footer>

</body>
</html>