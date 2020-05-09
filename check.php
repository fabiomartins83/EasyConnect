<?php
// Incluir estas linhas em cada página dentro da plataforma, 
// (exceto as páginas de cadastro e de login).
require_once "iniciar.php";
if (!isLoggedIn()) {
    header("Location: entrar.php");
}