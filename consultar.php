<?php
session_start();
require_once "functions.php";
//require "check.php"; //substituído pelas três linhas abaixo
if (!isLoggedIn()) {
    header("Location: entrar.php");
}
$pesquisa = $_POST["nome"]; // Recebendo os dados a pesquisar
?>

<html>
<head>
	<link href="./css/connect.css" rel="stylesheet" type="text/css">
	<title>Resultado da pesquisa</title>
</head>

<body>
	<h2 class="central">Resultado da pesquisa</h2>
	<table border="1" style='width:70%;text-align:center'> 	<!-- Criando tabela e cabeçalho de dados: -->
		<tr>
			<th>Nome completo </th>
			<th>E-mail </th>
			<th>Data de Nascimento </th>
			<th>Cidade </th>
		</tr>
<?php
$inserir = "INSERT INTO tbUsuariosPf 
	(NomeCompletoUser, CpfUser, DataNascUser, EmailPrincipalUser, TelefoneUser, CepUser, UFUser, CidadeUser, LogradouroEndUser, NumEndUser, ComplEndUser, SenhaUser) 
	VALUES (?,?,?,?,?,?,?,?,?,?,?,?);";
$filtrar = "SELECT * FROM tbUsuariosPf WHERE NomeCompletoUser = '$pesquisa'";
$excluir = "DELETE FROM tbUsuariosPf WHERE NomeCompletoUser = '$pesquisa'";
$apagar = "DELETE * FROM tbUsuariosPf";
$contar = "SELECT COUNT(*) FROM tbUsuariosPf WHERE EmailPrincipalUser = '$pesquisa'";

//$mysqli = conexaoMySQLi();
//$resultado = mysqli_query($mysqli,$sql) or die("Erro ao retornar dados.");
//while ($registro = mysqli_fetch_array($resultado)) {
	//$nome = $registro["NomeCompletoUser"];
	//$email = $registro["EmailPrincipalUser"];
	//$nasc = $registro["DataNascUser"];
	//$cidade = $registro["CidadeUser"];
	//echo "<tr>";
	//echo "<td>.$id.</td>";
	//echo "<td>".$nome."</td>";
	//echo "<td>".$nasc."</td>";
	//echo "<td>".$email."</td>";
	//echo "<td>".$cidade."</td>";
	//echo "</tr>";
//}
//mysqli_close($mysqli);

$pdo = conexaoPDO();
$consulta = $pdo->query($filtrar);

while ($registro = $consulta->fetch(PDO::FETCH_ASSOC)) {
	$nome = $registro["NomeCompletoUser"];
	$email = $registro["EmailPrincipalUser"];
	$nasc = $registro["DataNascUser"];
	$cidade = $registro["CidadeUser"];
	echo "<tr>";
	echo "<td>".$nome."</td>";
	echo "<td>".$email."</td>";
	echo "<td>".$nasc."</td>";
	echo "<td>".$cidade."</td>";
	echo "</tr>";
}
?>
	</table>
	<a href="home.php">Voltar</a>

</body>
</html>