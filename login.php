<?php
require "functions.php"; // inclui o arquivo de inicialização
$email = isset($_POST['email']) ? $_POST['email'] : '';
$senha = isset($_POST['senha']) ? $_POST['senha'] : '';
if (empty($email) || empty($senha)) {
	echo "<script language='javascript' type='text/javascript'>alert(Informe e-mail e senha.');window.location.href='entrar.php';</script>";
	exit;
}
$senhaHash = criptografar($senha);
$pdo = conexaoPdo();
$sql = "SELECT idUser, NomeCompletoUser FROM tbUsuariosPf WHERE EmailPrincipalUser = :email AND SenhaUser = :senha";
$localizar = $pdo->prepare($sql);
$localizar->bindParam(':email', $email);
$localizar->bindParam(':senha', $senhaHash);
$localizar->execute();
$users = $localizar->fetchAll(PDO::FETCH_ASSOC);
if (count($users) <= 0) {
    echo "<script language='javascript' type='text/javascript'>alert('Login ou senha inválido(a). {$email} {$senhaHash}');window.location.href='entrar.php';</script>";
    exit;
}
$user = $users[0]; // pega o primeiro usuário
 
session_start();
$_SESSION['logged_in'] = true;
$_SESSION['user_id'] = $user['idUser'];
$_SESSION['user_name'] = $user['NomeCompletoUser'];
 
header('Location: entrar.php');
?>