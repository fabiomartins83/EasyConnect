<?php
require_once "functions.php";
$pdo = conexaoPdo();
$sql = "DELETE FROM tbUsuariosPf WHERE idUser = *";
$apagar = $pdo->prepare($sql);
$apagar->execute();
?>