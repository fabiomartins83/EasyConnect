<?php
require_once "functions.php";
session_start(); // inicia a sessão
$_SESSION['logged_in'] = false; // muda o valor de logged_in para false
session_destroy(); // finaliza a sessão
header('Location: entrar.php'); // retorna para a entrar.php
?>