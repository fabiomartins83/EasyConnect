<?php
session_start();
require_once "functions.php";
?>

<!DOCTYPE html>
<html lang="pt-br" dir="ltr">

<head>
	<meta charset="UTF-8">
	<meta name="description" content="EasyConnect - Login">
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

	<script type="text/javascript" src="./js/MascaraValidacao.js"></script>
	<script type="text/javascript" src="./js/jquery3-min.js"></script>
    <link rel="stylesheet" href="./css/connect.css">
	<link rel="start" title="EasyConnect - Login" href="./entrar.php">
	<link rel="index" title="EasyConnect - Home" href="./home.php">
-->
	<title> EasyConnect - Login </title>
	<script type="text/javascript" src="./js/jquery3-min.js"></script>
	<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
	<script type="text/javascript" src="./js/MascaraValidacao.js"></script>
	<script type="text/javascript" src="./js/connect.js"></script>
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="./css/connect.css">
	<link rel="start" title="EasyConnect - Login" href="./entrar.php">
	<link rel="index" title="EasyConnect - Home" href=./home.php">
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
		<h1 class="titulo" id="titulo1">EasyConnect SP</h1>
	</header>
	<br>
	<?php if (isLoggedIn()): ?>
	<!--	<p>Olá, <?php //echo $_SESSION['user_name']; ?>. 
	<br><br><br>
	<a href="home.php" class="links" style="text-align: center">Acessar o sistema</a> | <a href="logout.php">Sair</a></p> -->
    <script language='javascript' type='text/javascript'>window.location.href='home.php';</script>
	<?php else: ?>
		<main>
			<h2 class="titulo">Login</h2> 
			<br>
			<form name="formlogin" method="POST" action="login.php">
				<fieldset>
					<legend class="rotulo">Formulário de login</legend>
					<br>
					<p>Insira abaixo seu <u><strong>e-mail</strong></u> e sua <u><strong>senha</strong></u> para acessar.</p>
					<div>
						<label for="email" class="rotulo">E-mail: </label>
						<input type="text" name="email" id="email" placeholder="Digite seu e-mail" size="40" class="caixatexto">
						<br>
						<label for="senha" class="rotulo">Senha: </label>
						<input type="password" name="senha" id="senha" placeholder="Digite sua senha" size="40" class="caixatexto">
					</div>
					<br>
					<div>
						<input type="submit" value="Acessar" id="entrar" name="entrar" class="botoes btn-success">
						<input type="reset" value="Limpar" id="reset" name="reset" class="botoes btn-success">
					</div>
				</fieldset>
			</form>
			<br><br>
		</main>
		<br>
		<nav class="links">
			<a href="cadastrar.php">Cadastre-se</a>
		</nav>
		<br><br><br>
	<?php endif; ?>

    <footer class="rodape"><small>© 2020  -  <b>Fábio de Almeida Martins</b></small></footer>
	
</body>
</html>