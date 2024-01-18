<?php

include('Sql.php');

Class Usuario
{
    //Atributos
    private $idUsuario;
    private $nomeUsuario;
    private $idadeUsuario;

    //Getters e Setters
    public function getIdUsuario()
    {
        return $this->idUsuario;
    }

    public function setIdUsuario($value)
    {
        $this->idUsuario = $value;
    }

    public function getNomeUsuario()
    {
        return $this->nomeUsuario;
    }

    public function setNomeUsuario($value)
    {
        $this->nomeUsuario = $value;
    }

    public function getIdadeUsuario()
    {
        return $this->idadeUsuario;
    }

    public function setIdadeUsuario($value)
    {
        $this->idadeUsuario = $value;
    }

    //Metodos mágicos
    public function __construct($nome = "", $idade = "")
    {
        $this->setNomeUsuario($nome);
        $this->setIdadeUsuario($idade);
    }

    public function __toString()
    {
        return json_encode(array(
            "id"=>$this->getIdUsuario(),
            "nome"=>$this->getNomeUsuario(),
            "idade"=>$this->getIdadeUsuario()
        ));
    }

    //Listar os usuários (FUNCIONANDO)
    public static function getList()
    {
        $sql = new Sql();

        return $sql->select_sql("SELECT * FROM usuario ORDER BY id;");
    }

    //Carregar Usuário por ID (FUNCIONANDO)
    public function loadById($id)
    {
        $sql = new Sql();

        $result = $sql->select_sql("SELECT * FROM usuario WHERE id = :ID", array(
            ":ID"=>$id
        ));

        if(count($result) > 0)
        {
           $this->setData($result[0]);
        }
    }

    //Inserir usuário (FUNCIONANDO)
    public function insertUsuario()
    {
        $sql = new Sql();

        $retorno = $sql->querySql("INSERT INTO usuario (nome, idade) VALUES (:NOME, :IDADE)", array(
            ':NOME'=>$this->getNomeUsuario(),
            ':IDADE'=>$this->getIdadeUsuario()
        ));

        if($retorno)
        {
            echo "Usuário cadastrado com sucesso!";
        }
        else
        {
            echo "Erro ao cadastrar usuário!";
        }
    }

    //Deleta usuário (FUNCIONANDO)
    public function deleteUsuario()
    {
        $sql = new Sql();

        $retorno = $sql->querySql("DELETE FROM usuario WHERE id = :ID", array(
            ':ID'=>$this->getIdUsuario()
        ));

        if($retorno)
        {
            echo "Usuário deletado com sucesso!";
        }
        else
        {
            echo "Erro ao deletar usuário!";
        }
    }

    public function alteraUsuario($nome, $idade)
    {
        $sql = new Sql();

        $this->setNomeUsuario($nome);
        $this->setIdadeUsuario($idade);

        $retorno = $sql->querySql("UPDATE usuario SET nome = :NOME, idade = :IDADE WHERE id = :ID", array(
            ':NOME'=>$this->getNomeUsuario(),
            ':IDADE'=>$this->getIdadeUsuario(),
            ':ID'=>$this->getIdUsuario()
        ));

        if($retorno)
        {
            echo "Usuário editado com sucesso!";
        }
        else
        {
            echo "Erro ao editar usuário!";
        }
    }

    public function setData($data)
    {
        $this->setIdUsuario($data['id']);
        $this->setNomeUsuario($data['nome']);
        $this->setIdadeUsuario($data['idade']);
    }
}

?>