<?php

include_once('../model/classes/Aluno.php');

class AlunoDao{
    private $c;

    public function __construct()
    {
        $this ->c=mysqli_connect("localhost", "root", "", "academia");
        if(mysqli_connect_errno() == 0){
            echo "\n" . "Conexão ok!";
        } else{
            $msg = mysqli_connect_error();
            echo "\n" . "erro na conexão SQL!";
            echo "\n" . "O MySQL retornou a seguinte mensagem: " . $msg;
        }
    }

    public function incluirAluno($aluno){
        $sql = "INSERT INTO aluno (nome,endereco,telefone,CPF,email,matricula)
        VALUES ('".
        $aluno ->getNome()."','".
        $aluno ->getEndereco()."','".
        $aluno ->getTelefone()."','".
        $aluno ->getCPF()."','".
        $aluno ->getEmail()."','".
        $aluno ->getMatricula()."')";
        $result = mysqli_query($this->c,$sql);
            if($result == true){
                echo "\n" . "Execução bem sucedida do INSERT!";
                return true;
            } else {
                $msg = mysqli_error($this->c);
                $_SESSION['msg'] = "\n" . "falha no INSERT! Mensagem de erro: '$msg'";
                return false;
            }
    }

    final public function alterarAluno($aluno){
        $sql=
        "UPDATE aluno SET ".
        "nome = '".$aluno->getNome()."',".
        "endereco = '".$aluno->getEndereco()."',".
        "telefone = '".$aluno->getTelefone()."',".
        "CPF = '".$aluno->getCPF()."',".
        "email = '".$aluno->getEmail()."'".
        " WHERE ". "matricula = '".$aluno->getMatricula()."';";

        $result = mysqli_query($this->c,$sql);
        if (mysqli_affected_rows($this->c) == 0){
            return false;
        }else{
            return true;
        }
    }

    public function consultarAluno($aluno){
        $sql = "SELECT nome, endereco, telefone, CPF, email, matricula ". 
        "from aluno WHERE " 
        . " matricula = '".$aluno->getMatricula()."';";
        $result = mysqli_query($this->c,$sql);
        return $result;
    }

    function consultarListaAluno(){
        $sql = "SELECT nome, endereco, telefone, CPF, email, matricula ". 
        "from aluno";
        $result = mysqli_query($this->c,$sql);
        return $result;
    }














}





?>