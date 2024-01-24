<?php

$hostname = "db";
$user = "root";
$password = "root";
$dbName = "banco";
$port = 3306;

try
{
    $this->conn = new PDO("mysql:host=$hostname; port=$port; dbname=" . $dbName, $user, $password);

    #echo "Conexão com o banco de dados realizada com sucesso! <br>";
} 
catch(PDOException $error)
{
    #echo "Ocorreu um erro ao tentar realizar a conexão com o banco de dados: " . $error->getMessage();
}

?>