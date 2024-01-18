<?php

require_once("config.php");

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    
    $id = $_GET["id"];

    $usuario = new Usuario();

    $usuario->loadById($id);

    $usuario->deleteUsuario();
}

?>
<a href="index.php">
    <button>Retornar à tela inicial</button>
</a>