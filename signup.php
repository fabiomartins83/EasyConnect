<?php
require "iniciar.php"; // inclui o arquivo de inicialização
$email = str_replace(" ","", trim($_POST["email"]));
$senha = $_POST["senha1"];
$confsenha = $_POST["senha2"];
if ($email == null || $email == "") {
    echo"<script language='javascript' type='text/javascript'>alert('Insira o seu e-mail.');window.location.href='cadastro.html';</script>";
} else {
	if ($senha == null || $senha == "" || $confsenha == null || $confsenha == "") {
		echo "<script language='javascript' type='text/javascript'>alert('Insira a sua senha.');window.location.href='cadastro.html';</script>";
	} else {
		if ($senha != $confsenha) {
			echo "<script language='javascript' type='text/javascript'>alert('As senhas não conferem.');window.location.href='cadastro.html';</script>";
		} else {
			// $nick = $_POST['nick'];
			$nome = preg_replace("/[^A-Za-z0-9 ]/", "", trim($_POST["nome"]));
			$cpf = str_pad(preg_replace("/[^0-9]/", "", trim($_POST["cpf"])), 11, "0", STR_PAD_LEFT);
			$nasc = date("Y-m-d", strtotime(str_replace("/","-", trim($_POST["data"]))));
			$tel = preg_replace("/[^0-9]/", "", trim($_POST["tel"]));
			$cep = str_pad(preg_replace("/[^0-9]/", "", trim($_POST["cep"])), 8, "0", STR_PAD_LEFT);
			$cidade = trim($_POST["cidade"]);
			$uf = trim($_POST["uf"]);
			$lograd = trim($_POST["logradouro"]);
			$num = preg_replace("/[^A-Za-z0-9 ]/", "", trim($_POST["numend"]));
			$complem = preg_replace("/[^A-Za-z0-9 ]/", "", trim($_POST["complend"]));
			if (($nome == "" || $nome == null) || ($cpf == "" || $cpf == null) || ($nasc == "" || $nasc == null) || ($tel == "" || $tel == null) || ($cep == "" || $cep == null) || ($cidade == "" || $cidade == null) || ($uf == "" || $uf == null) || ($lograd == "" || $lograd == null) || ($num == "" || $num == null)) {
				echo "<script language='javascript' type='text/javascript'>alert('Insira as informações solicitadas no formulário.');window.location.href='cadastro.html';</script>";
			} else {
				$hostname = "localhost:3308";
				$usuario = "root";
				$senhabd = "";
				$banco = "bdCentral";
//				$pdo = conexaoPdo();
				$mysqli = conexaoMysqli();
				$result = $mysqli->query("SELECT COUNT(*) FROM tbUsuariosPf WHERE EmailPrincipalUser = '$email'") or die($mysqli->error);
				$row = $result->fetch_row();
//				$row = $result->fetchColumn();
				if ($row[0] > 0) {
					echo"<script language='javascript' type='text/javascript'>alert('E-mail já cadastrado.');window.location.href='entrar.html';</script>";
					die();
				} else {
					$senha = criptografar($senha);
					$sql = "INSERT INTO tbUsuariosPf (NomeCompletoUser, CpfUser, DataNascUser, EmailPrincipalUser, TelefoneUser, CepUser, UFUser, CidadeUser, LogradouroEndUser, NumEndUser, ComplEndUser, SenhaUser) VALUES (?,?,?,?,?,?,?,?,?,?,?,?);";
					if ($inserir = $mysqli->prepare($sql)) {
						$inserir->bind_param("ssssssssssss",$nome,$cpf,$nasc,$email,$tel,$cep,$uf,$cidade,$lograd,$num,$complem,$senha);
						$inserir->execute();
						echo "<script language='javascript' type='text/javascript'>alert('Usuário cadastrado com sucesso.');window.location.href='entrar.php'</script>";
					} else {
						$error = $mysqli->errno." ".$mysqli->error;
						echo $error;
					}
				}
				mysqli_close($mysqli);
			}
		}
	}
}
?>
