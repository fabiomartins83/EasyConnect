<?php
require_once "functions.php"; // inclui o arquivo de inicialização
$email = str_replace(" ","", trim($_POST["email"]));
$senha = $_POST["senha1"];
$confsenha = $_POST["senha2"];
if (preenchido('Email', $email) == False) {
    echo"<script language='javascript' type='text/javascript'>alert('Insira o seu e-mail.');window.location.href='cadastro.html';</script>";
} else {
	if ((preenchido('Senha', $senha) == False) || (preenchido('Confirmação de senha', $confsenha) == False)) {
		echo "<script language='javascript' type='text/javascript'>alert('Insira a sua senha.');window.location.href='cadastro.html';</script>";
	} else {
		if (igual($senha, $confsenha) == False) {
			echo "<script language='javascript' type='text/javascript'>alert('As senhas não conferem.');window.location.href='cadastro.html';</script>";
		} else {
			$pdo = conexaoPdo();
			//$filtrar = "SELECT COUNT(*) FROM tbUsuariosPf WHERE EmailPrincipalUser = '$email'";
			//$consulta = $pdo->query($filtrar)->fetchAll();
			//$qtdecadastro = count($consulta);
			//if ($qtdecadastro > 0) {
			//	echo"<script language='javascript' type='text/javascript'>alert('E-mail já cadastrado {$qtdecadastro} vezes.');window.location.href='entrar.html';</script>";
			//	die();
			//} else {
				//$nick = $_POST['nick'];
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
				if ((preenchido('Nome',$nome) == False) || (preenchido('CPF',$cpf) == False) || (preenchido('Data de Nascimento',$nasc) == False) || (preenchido('Telefone',$tel) == False) || (preenchido('CEP',$cep) == False) || (preenchido('Cidade',$cidade) == False) || (preenchido('UF',$uf) == False) || (preenchido('Logradouro',$lograd) == False) || (preenchido('Número',$num) == False)) {
					echo "<script language='javascript' type='text/javascript'>alert('Insira os dados solicitados no formulário.');window.location.href='cadastro.html';</script>";
				} else {
					$senha = criptografar($senha);
					$sql = "INSERT INTO tbUsuariosPf (NomeCompletoUser, CpfUser, DataNascUser, EmailPrincipalUser, TelefoneUser, CepUser, UFUser, CidadeUser, LogradouroEndUser, NumEndUser, ComplEndUser, SenhaUser) VALUES (?,?,?,?,?,?,?,?,?,?,?,?);";				
					$inserir = $pdo->prepare($sql);
					try {
						$inserir->bindParam(1,$nome);
						$inserir->bindParam(2,$cpf);
						$inserir->bindParam(3,$nasc);
						$inserir->bindParam(4,$email);
						$inserir->bindParam(5,$tel);
						$inserir->bindParam(6,$cep);
						$inserir->bindParam(7,$uf);
						$inserir->bindParam(8,$cidade);
						$inserir->bindParam(9,$lograd);
						$inserir->bindParam(10,$num);
						$inserir->bindParam(11,$complem);
						$inserir->bindParam(12,$senha);
						$inserir->execute();
						echo "<script language='javascript' type='text/javascript'>alert('Usuário cadastrado com sucesso.');window.location.href='entrar.php'</script>";
					}catch (exception $e){
    					$pdo->rollback();
						echo "<script language='javascript' type='text/javascript'>alert('Erro no cadastramento.');window.location.href='entrar.php'</script>"; 
						throw $e;
					}
				}
			//}
		}
	}
}
?>