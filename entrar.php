<?php
session_start();
 
require 'init.php';
?>

<!DOCTYPE html>
<html lang="pt-br" dir="ltr">

<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
	<meta name="description" content="EasyConnect - Login" />
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
	
	<title> EasyConnect - Login </title>
</head>

<body>

	<a id="topo"><figure id="logo">
		<img src="./img/logo-preto.png" alt="EasyConnect logotipo" title="EasyConnect SP">
	</figure></a>
	<br>

<!--	<h1 class="titulo">EasyConnect SP</h1> -->
	
	<?php if (isLoggedIn()): ?>
	<!--	<p>Olá, <?php //echo $_SESSION['user_name']; ?>. -->
	<a href="home.php">Acessar o sistema</a> | <a href="logout.php">Sair</a></p>
	<?php else: ?>
		<form name="formlogin" method="POST" action="login.php">
			<table border="0" cellpadding="2" cellspacing="1" align="center">
<!--				<tr>
					<td align="center" colspan="2"><h2>Login</h2></td>
				</tr> -->
				<tr>
					<td align="center" colspan="2"><p class="textoform">Insira abaixo seu e-mail e sua senha para acessar.</p><br></td>
				</tr>
				<tr>
					<td width="180"><label class="rotulo">E-mail: </label></td>
					<td><input type="text" name="email" id="email" placeholder="Digite seu e-mail"><br></td>
				</tr>
				<tr>
					<td width="180"><label class="rotulo">Senha: </label></td>
					<td><input type="password" name="senha" id="senha" placeholder="Digite sua senha"><br></td>		
				</tr>
				<tr>
					<td align="center" colspan="2"><br><input type="submit" value="Acessar" id="entrar" name="entrar"></td>
				</tr>
				<tr>
					<td align="center" colspan="2"><input type="reset" value="Limpar" id="reset" name="reset"><br></td>
				</tr>
			</table>
		</form>	
		<br>
		<a href="cadastro.html" class="links">Cadastre-se</a>
		<br><br><br>
	<?php endif; ?>

    <footer class="rodape">© 2020  -  <strong>Equipe Phoenix</strong></footer>
</body>
</html>