<?php

require_once("config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupera os valores do formulário
    $nome = $_POST["nomeUsuario"];
    $idade = $_POST["idadeUsuario"];

    // Cria um objeto Usuario e chama a função insertUsuario
    $usuario = new Usuario($nome, $idade);
    $usuario->insertUsuario();
}

?>

<a href="index.php">
    <button>Retornar à tela inicial</button>
</a>