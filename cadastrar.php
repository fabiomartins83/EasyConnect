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
	<title> EasyConnect - Novo Usuário </title>
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
 
	<main>
		<h2>Novo Usuário</h2>
		<p>Preencha o formulário abaixo com suas informações para se cadastrar.</p>
		<div class="container">
			<form name="formcadastro" method="POST" action="signup.php"> 
				<fieldset class="esquerda">
					<legend class="rotulo">Dados pessoais</legend>
					<p>
					<label for="nome" class="rotulo">Nome completo </label>
					<input type="text" name="nome" id="nome" placeholder="Nome completo" autocomplete="off" autofocus onblur="validaNome(this)">
					</p>
					<br>
					<p>
					<label for="email" class="rotulo">E-mail </label>
					<input type="email" name="email" id="email" placeholder="E-mail" autocomplete="off" onblur="validaEmail(this)">
					</p>
					<br>
					<p>
					<label for="cpf" class="rotulo">CPF </label>
					<input type="text" name="cpf" id="cpf" placeholder="CPF" autocomplete="off" onkeypress="MascaraCPF(this)" onblur="ValidaCPF(this)">		
					</p>
					<br>
					<p>
					<label for="senha1" class="rotulo">Senha </label>
					<input type="password" name="senha1" id="senha1" placeholder="Senha" autocomplete="off">
					</p>
					<br>
					<p>
					<label for="senha2" class="rotulo">Confirmação da senha </label>
					<input type="password" name="senha2" id="senha2" placeholder="Confirmação de senha" autocomplete="off" onblur="ValidaSenha()">
					</p>
					<br>
					<p>
					<label for="data" class="rotulo">Data de nascimento </label>
					<input type="text" name="data" id="data" placeholder="Data de nascimento" autocomplete="off" onkeypress="MascaraData(this)" onblur="ValidaData(this)">
					</p>
					<br>
					<p>
					<label for="genero" class="rotulo">Gênero </label>
					<input type="radio" name="genero" id="masculino" value="Masculino">
					<label for="masculino">Masculino</label>
					<input type="radio" name="genero" id="feminino" value="Feminino">
					<label for="masculino">Feminino</label>
					<input type="radio" name="genero" id="outrogen" value="Outro">
					<label for="masculino">Outro</label>
					</p>
					<br>
				</fieldset>
				<fieldset class="esquerda">
					<legend class="rotulo">Informações de contato</legend>
					<p>
					<label for="tel" class="rotulo">Telefone celular ou<wbr> residencial </label>
					<input type="tel" name="tel" id="tel" placeholder="Telefone" autocomplete="off" onkeypress="MascaraTelefone(this)" onblur="ValidaTelefone(this)">
					<select name="tipoTelefone" id="tipoTelefone" placeholder="Tipo de telefone" autocomplete="off" required>
						<option value="celular" selected>celular</option>
						<option value="residencial">residencial</option>
						<option value="comercial" disabled hidden>comercial</option>
						<option value="outro" disabled hidden>outro</option>
					</select>
					</p>
					<br>
					<p>
					<label for="cep" class="rotulo">CEP </label>
					<input type="text" name="cep" id="cep" placeholder="CEP" autocomplete="off" onkeypress="MascaraCep(this)" onblur="ValidaCep(this)">
					</p>
					<br>
					<p>
					<label for="logradouro" class="rotulo">Logradouro </label>
					<input type="text" name="logradouro" id="logradouro" placeholder="Logradouro" autocomplete="off" readonly onfocus="document.getElementById('numend').focus()">
					</p>
					<br>
					<p>
					<label for="bairro" class="rotulo">Bairro </label>
					<input type="text" name="bairro" id="bairro" placeholder="Bairro" autocomplete="off" readonly>
					</p>
					<br>
					<p>
					<label for="cidade" class="rotulo">Cidade </label>
					<input type="text" name="cidade" id="cidade" placeholder="Cidade" autocomplete="off" readonly>
					</p>
					<br>
					<p>
					<label for="uf" class="rotulo">UF </label>
					<input type="text" name="uf" id="uf" placeholder="Estado" autocomplete="off" readonly>
					</p>
					<br>
					<p>
					<label for="numend" class="rotulo">Número de endereço </label>
					<input type="text" name="numend" id="numend" placeholder="Número de logradouro" min="0" autocomplete="off">
					</p>
					<br>
					<p>
					<small>Se não houver numeração, deixe o campo em branco.</small>
					</p>
					<br>
					<p>
					<label for="complend" class="rotulo">Complemento </label>
					<input type="text" name="complend" id="complend" placeholder="Complemento do endereço" autocomplete="off">
					</p>
					<br>
					<p>
					<small>Insira o número de apartamento, do bloco, da casa, etc.</small>
					</p>
					<br>
				</fieldset>
				<fieldset>
				<legend class="rotulo">Documentos</legend>
				<p>
					<label for="enviararquivo" class="rotulo">Escolha uma fotografia sua: </label>
					<input class="botoes btn-success" type="file" name="enviararquivo" id="enviararquivo" placeholder="Fotografia" autocomplete="off"">
					</p>
					<br>
				</fieldset>
				<fieldset class="central">
					<legend></legend>
					<p>
					<label for="agree" class="rotulo">Eu aceito receber e-mails de comunicação epublicidade do site.</label>
					<input type="checkbox" name="agreemail" id="agreemail" value="Aceitoemail">
					</p>
					<br>
					<p>
					<label for="agree" class="rotulo">Eu li e aceito os termos de uso do site.</label>
					<input type="checkbox" name="agreeterms" id="agreeterms" value="Aceitotermos">
					</p>
					<br>
				</fieldset>
				<fieldset class="bordainvisivel central">
				<p>
					<input class="botoes btn-success" type="submit" value="Cadastrar-se" id="cadastrar" name="cadastrar">
					<input class="botoes btn-success" type="reset" value="Limpar" id="reset" name="reset"><br> 
					</p>
				</fieldset>
			</form>	
		</div>
	</main>
	<br>
	<nav class="links">
		<a href="entrar.php" class="links" style="text-align: center">Voltar para login</a>
	</nav>
	<br>
	<footer class="rodape"><small>© 2020  -  <b>Fábio de Almeida Martins</b></small></footer>
</body>
</html>