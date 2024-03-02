<?php

// 1 - Faz com que as funcionalidades da classe nativa PDO, sejam acessíveis pela classe Sql
class Sql extends PDO 
{
    // 2 - Faz com que toda vez que eu istancie a classe Sql, já me conecte automaticamente ao banco de dados
    public function __construct()
    {
        if(file_exists('Banco/conexaoBanco.php'))
        {
            include('Banco/conexaoBanco.php');
        }
        else
        {
            include('../Banco/conexaoBanco.php');
        }  
    }

    //rawQuery = o comando sql puro
    //params = os parametros para serem adicionados na query
    public function querySql($rawQuery, $params = array())
    {
        // 3 - Aqui eu torno o comando sql em algo que pode ser editado
        $stmt = $this->conn->prepare($rawQuery);

        // 4 - Envio esse objeto que pode ser preparado pra a classe setParams, junto com os parâmetros
        $this->setParams($stmt, $params);

        // 8 - Com o statement pronto, executa o código
        $stmt->execute();

        // 9 - Retorna o resultado
        return  $stmt;
    }

    private function setParams($statement, $parameters = array())
    {
        // 5 - Varre o array, e para cada item, define um indice e pega seu valor
        foreach ($parameters as $key => $value)
        {
            // 6 - Envia um parâmetro de cada vez, dividindo em indice e valor, para a classe a função set param
            $this->setParam($statement, $key, $value);
        }
    }

    private function setParam($statement, $key, $value)
    {
        // 7 - Adiciona os parâmetros em cada espaço da query
        $statement->bindParam($key, $value);
    }

    public function select_sql($rawQuery, $params = array()):array
    {
        $stmt = $this->querySql($rawQuery, $params);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>