<?php

require_once("config.php");

if ($_SERVER["REQUEST_METHOD"] == "GET")
{
    $id = $_GET["id"];
    $nome = $_GET["nome"];
    $idade = $_GET["idade"];

    $usuario = new Usuario();

    $usuario->loadById($id);

    $usuario->alteraUsuario($nome, $idade);
}

?>

<a href="index.php">
    <button>Retornar à tela inicial</button>
</a>