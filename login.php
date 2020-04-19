<?php
 
// inclui o arquivo de inicialização
require 'init.php';
 
// resgata variáveis do formulário
$email = isset($_POST['email']) ? $_POST['email'] : '';
$senha = isset($_POST['senha']) ? $_POST['senha'] : '';
 
if (empty($email) || empty($senha))
{
	echo "<script language='javascript' type='text/javascript'>alert('Informe e-mail e senha.');window.location.href='entrar.php';</script>";
	exit;
}
 
// cria o hash da senha
$senhaHash = make_hash($senha);
 
$PDO = db_connect();
 
$sql = "SELECT idUser, NomeLoginUser FROM tbUsuariosPf WHERE EmailUser = :email AND SenhaUser = :senha";
$stmt = $PDO->prepare($sql);
 
$stmt->bindParam(':email', $email);
$stmt->bindParam(':senha', $senhaHash);
 
$stmt->execute();
 
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
 
if (count($users) <= 0)
{
    echo "<script language='javascript' type='text/javascript'>alert('Login ou senha inválido(a).');window.location.href='entrar.php';</script>";
    exit;
}
 
// pega o primeiro usuário
$user = $users[0];
 
session_start();
$_SESSION['logged_in'] = true;
$_SESSION['user_id'] = $user['NomeLoginUser'];
$_SESSION['user_name'] = $user['NomeUser'];
 
header('Location: entrar.php');
?>