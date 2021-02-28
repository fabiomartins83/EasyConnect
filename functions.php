<?php
 // habilita todas as exibições de erros
ini_set("display_errors", true);
error_reporting(E_ALL);
 
 // constantes com as credenciais de acesso ao banco MySQL
define("DB_SGDB", "mysql");
define("DB_HOST", "localhost");
define("DB_PORT", "3308");
define("DB_USER", "root");
define("DB_PASS", "");
define("DB_NAME", "bdCentral");

 // Verifica se o usuário está logado
function isLoggedIn() {
    if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true)
    {
        return false;
    }
    return true;
}

 // Conecta com o MySQL usando PDO
function conexaoPdo() {
    $conexao = new PDO(DB_SGDB.':host='.DB_HOST.':'.DB_PORT.';dbname='.DB_NAME.';charset=utf8',DB_USER,DB_PASS);
	if (!$conexao) {
		die("Não foi possível acessar banco de dados. ".mysqli_connect_error($conexao));
	} else {
		$conexao->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
		$conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
    return $conexao;
}

 // Conecta com o MySQL usando MySQLi
function conexaoMysqli() {
	$conexao = new mysqli(DB_HOST.':'.DB_PORT,DB_USER,DB_PASS,DB_NAME);
	if (!$conexao) {
		die("Não foi possível acessar banco de dados. ".mysqli_connect_error($conexao));
	}
	return $conexao;
}

  // Verifica se os campos tem valores iguais
function igual($campo1, $campo2) {
	if ($campo1 == $campo2)
		return True;
	else
		return False;
}

 // Verifica se o campo foi preenchido
function preenchido($campo, $valor) {
	if (($valor == null) || ($valor == "")) {
		echo"<script language='javascript' type='text/javascript'>alert('Campo {$campo} não preenchido');</script>";
		return False;
	} else
		return True;
}

 // Criptografa uma string, usando MD5 e SHA-1
function criptografar($str) {
    return SHA1(MD5($str));
}

 // Exibe a quantidade de cadastros com um valor determinado
function contarRegistros($tabela, $campo, $valor) {
	$valor = str_replace(" ","", trim($valor));	
	$filtrar = "SELECT COUNT(*) FROM {$tabela} WHERE {$campo} = '{$valor}'";
	$pdo = conexaoPdo();
	$consulta = $pdo->query($filtrar)->fetchAll();
	return (int)count($consulta);
}

 // Realiza a exclusão de todos os registros de uma tabela
function apagarTabela($tabela) {
	$pdo = conexaoPdo();
	$sql = "DELETE * FROM '{$tabela}'";
	$apagar = $pdo->prepare($sql);
	$apagar->execute();
}
	
 // Valida senha e loga o usuário ao sistema
//function logIn(){
	//$email = isset($_POST['email']) ? $_POST['email'] : '';
	//$senha = isset($_POST['senha']) ? $_POST['senha'] : '';
	//if (empty($email) || empty($senha)) {
		//echo "<script language='javascript' type='text/javascript'>alert(Informe e-mail e senha.');window.location.href='entrar.php';</script>";
		//exit;
	//}
	//$senhaHash = criptografar($senha);
	//$pdo = conexaoPdo();
	//$sql = "SELECT idUser, NomeCompletoUser FROM tbUsuariosPf WHERE EmailPrincipalUser = :email AND SenhaUser = :senha";
	//$localizar = $pdo->prepare($sql);
	//$localizar->bindParam(':email', $email);
	//$localizar->bindParam(':senha', $senhaHash);
	//$localizar->execute();
	//$users = $localizar->fetchAll(PDO::FETCH_ASSOC);
	//if (count($users) <= 0) {
		//echo "<script language='javascript' type='text/javascript'>alert('Login ou senha inválido(a). {$email} {$senhaHash}');window.location.href='entrar.php';</script>";
		//exit;
	//}
	//$user = $users[0]; // pega o primeiro usuário
	//session_start();
	//$_SESSION['logged_in'] = true;
	//$_SESSION['user_id'] = $user['idUser'];
	//$_SESSION['user_name'] = $user['NomeCompletoUser'];
	//header('Location: entrar.php');
//}
?>