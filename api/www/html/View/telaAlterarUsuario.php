<?php

if ($_SERVER["REQUEST_METHOD"] == "GET")
{
    $id = $_GET["id"];
    $nome = $_GET["nome"];
    $idade = $_GET["idade"];

    echo "<form method=\"get\" action=\"../Metodos/alterarUsuario.php\">";
    echo    "<label>Id</label>";
    echo    "<input id=\"id\" name=\"id\" required=\"required\" type=\"text\" value=$id readonly/>";
    echo    "<label>Nome</label>";
    echo    "<input id=\"nome\" name=\"nome\" required=\"required\" type=\"text\" value=$nome />";
    echo    "<label>Idade</label>";
    echo    "<input id=\"idade\" name=\"idade\" required=\"required\" type=\"number\" value=$idade />";
    echo    "<input type=\"submit\" value=\"Alterar Usuário\"/>";
    echo "</form>";
}

?>