<?php
// Conecta com o MySQL usando PDO
function conexaoPdo() {
    $conexao = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME.';charset=utf8',DB_USER,DB_PASS);
	if (!$conexao) {
		die("Não foi possível acessar banco de dados. ".mysqli_connect_error($conexao));
	}
    return $conexao;
}

// Conecta com o MySQL usando MySQLi
function conexaoMysqli() {
	$conexao = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);
	if (!$conexao) {
		die("Não foi possível acessar banco de dados. ".mysqli_connect_error($conexao));
	}
	return $conexao;
}

// Criptografa uma string, usando MD5 e SHA-1
function criptografar($str) {
    return SHA1(MD5($str));
}

 // Verifica se o usuário está logado
function isLoggedIn() {
    if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true)
    {
        return false;
    }
    return true;
}?>