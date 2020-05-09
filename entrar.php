<?php
session_start();
require "iniciar.php";
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
-->
    <link rel="stylesheet" href="./css/connect.css">
	<link rel="start" title="EasyConnect - Login" href="./entrar.php">
	<link rel="index" title="EasyConnect - Home" href=./home.php">
	<title> EasyConnect - Login </title>
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
	
	<?php if (isLoggedIn()): ?>
	<!--	<p>Olá, <?php //echo $_SESSION['user_name']; ?>. 
	<br><br><br>
	<a href="home.php" class="links" style="text-align: center">Acessar o sistema</a> | <a href="logout.php">Sair</a></p> -->
    <script language='javascript' type='text/javascript'>window.location.href='home.php';</script>
	<br><br><br>
	<?php else: ?>
		<main>
<!--	<h2>Login</h2> -->
		<p class="central">Insira abaixo seu <strong>e-mail</strong> e sua <strong>senha</strong> para acessar.</p>
		<form name="formlogin" method="POST" action="login.php">
			<fieldset>
				<label for="email" class="rotulo">E-mail: </label>
				<input type="text" name="email" id="email" placeholder="Digite seu e-mail" size="40">
				<br>
				<label for="senha" class="rotulo">Senha: </label>
				<input type="password" name="senha" id="senha" placeholder="Digite sua senha" size="40">
				<br>
				<input type="submit" value="Acessar" id="entrar" name="entrar">
				<input type="reset" value="Limpar" id="reset" name="reset">
			</fieldset>
		</form>
		</main>
		<br>
		<nav class="links">
			<a href="cadastrar.php" style="text-align: center">Cadastre-se</a>
		</nav>
		<br><br><br>
	<?php endif; ?>

    <footer class="rodape"><small>© 2020  -  <strong>Fábio de Almeida Martins</strong></small></footer>
	
</body>
</html>