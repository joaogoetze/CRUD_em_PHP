<?php

echo "Página rodando em um container docker <br> ";

require_once('config.php');

$lista = Usuario::getList();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projeto CRUD</title>
</head>
<body>
    <br>
    <form method="post" action="inserirUsuario.php">
        <label>Nome</label>
        <input id="nomeUsuario" name="nomeUsuario" required="required" type="text"/>
        <label>Idade</label>
        <input id="idadeUsuario" name="idadeUsuario" required="required" type="number"/>
        <input type="submit" value="Cadastrar Usuário"/>
    </form> 
    <table>
		<tr>
			<th>ID:</th>
			<th>Nome:</th>
			<th>Idade:</th>
            <?php
                foreach($lista as $valor)
				{
					echo "<tr>";
					echo    "<td>".$valor['id']." </td>";
					echo    "<td>".$valor['nome']." </td>";
					echo    "<td>".$valor['idade']."</td>";
					echo    "<th> <a href=\"deleteUsuario.php?id={$valor['id']}\" > Deletar </a></th>";
					echo    "<th> <a href=\"telaAlterarUsuario.php?id={$valor['id']}&nome={$valor['nome']}&idade={$valor['idade']}\"> Editar </a></th>";
					echo "</tr>";
 				}
            ?> 
		</tr>
	</table>
</body>
</html>