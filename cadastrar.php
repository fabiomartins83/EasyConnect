<?php
require_once "functions.php";
?>

<!DOCTYPE html>
<html lang="pt-br" dir="ltr">

<head>
	<meta charset="UTF-8">
	<meta name="description" content="EasyConnect - Novo Usuário" />
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
	
	<title> EasyConnect - Novo Usuário </title>
	<script type="text/javascript" src="./js/MascaraValidacao.js"></script>
	<script type="text/javascript" src="./js/jquery3-min.js"></script>
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
 
	<main>
		<h2 class="central">Novo Usuário</h2>
		<p class="central">Preencha o formulário abaixo com suas informações para se cadastrar.</p>
		<form name="formcadastro" method="POST" action="signup.php"> 
			<fieldset>
				<label for="nome" class="rotulo">Nome completo: </label>
				<input type="text" name="nome" id="nome" placeholder="Nome completo" autocomplete="off" autofocus onblur="validaNome(this)">
				<br>
				<label for="email" class="rotulo">E-mail: </label>
				<input type="email" name="email" id="email" placeholder="E-mail" autocomplete="off" onblur="validaEmail(this)">
				<br>
				<label for="senha1" class="rotulo">Senha: </label>
				<input type="password" name="senha1" id="senha1" placeholder="Senha" autocomplete="off">
				<br>
				<label for="senha2" class="rotulo">Confirmação da senha: </label>
				<input type="password" name="senha2" id="senha2" placeholder="Confirmação de senha" autocomplete="off" onblur="ValidaSenha()">
				<br>
				<label for="cpf" class="rotulo">CPF: </label>
				<input type="text" name="cpf" id="cpf" placeholder="CPF" autocomplete="off" onkeypress="MascaraCPF(this)" onblur="ValidaCPF(this)">		
				<br>
				<label for="data" class="rotulo">Data de nascimento: </label>
				<input type="text" name="data" id="data" placeholder="Data de nascimento" autocomplete="off" onkeypress="MascaraData(this)" onblur="ValidaData(this)">
				<br>
				<label for="genero" class="rotulo">Gênero: </label>
				<input type="radio" name="genero" id="masculino" value="Masculino">
				<label for="masculino">Masculino</label>
				<input type="radio" name="genero" id="feminino" value="Feminino">
				<label for="masculino">Feminino</label>
				<input type="radio" name="genero" id="outrogen" value="Outro">
				<label for="masculino">Outro</label>
				<br>
				<label for="tel" class="rotulo">Telefone celular ou residencial: </label>
				<input type="tel" name="tel" id="tel" placeholder="Telefone" autocomplete="off" onkeypress="MascaraTelefone(this)" onblur="ValidaTelefone(this)">
				<br>
				<label for="cep" class="rotulo">CEP: </label>
				<input type="text" name="cep" id="cep" placeholder="CEP" autocomplete="off" onkeypress="MascaraCep(this)" onblur="ValidaCep(this)">
				<br>
				<label for="logradouro" class="rotulo">Logradouro: </label>
				<input type="text" name="logradouro" id="logradouro" placeholder="Logradouro" autocomplete="off" readonly onfocus="document.getElementById('numend').focus()">
				<br>
				<label for="bairro" class="rotulo">Bairro: </label>
				<input type="text" name="bairro" id="bairro" placeholder="Bairro" autocomplete="off" readonly>
				<br>
				<label for="cidade" class="rotulo">Cidade: </label>
				<input type="text" name="cidade" id="cidade" placeholder="Cidade" autocomplete="off" readonly>
				<br>
				<label for="uf" class="rotulo">UF: </label>
				<input type="text" name="uf" id="uf" placeholder="Estado" autocomplete="off" readonly>
				<br>
				<label for="numend" class="rotulo">Número de endereço: </label>
				<input type="text" name="numend" id="numend" placeholder="Número de logradouro" min="0" autocomplete="off">
				<br>
				<small> Obs.: Se não houver numeração, deixe o campo em branco.</small>
				<br>
				<label for="complend" class="rotulo">Complemento: </label>
				<input type="text" name="complend" id="complend" placeholder="Complemento do endereço" autocomplete="off">
				<br>
				<small> Obs.: Insira o número de apartamento, do bloco, da casa, etc.</small>
				<br>
				<input type="submit" value="Cadastrar-se" id="cadastrar" name="cadastrar">
				<input type="reset" value="Limpar" id="reset" name="reset"><br> 
			</fieldset>
		</form>	
	</main>
	<br>
	<nav>
		<a href="entrar.php" class="links" style="text-align: center">Voltar para login</a>
	</nav>
	<br>

    <footer class="rodape"><small>© 2020  -  <strong>Equipe Phoenix</strong></small></footer>

</body>
</html>