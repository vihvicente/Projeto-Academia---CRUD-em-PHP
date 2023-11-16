<?php

include_once('../model/classes/Instrutor.php');

class InstrutorDao{
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

    public function incluirinstrutor($instrutor){
        $sql = "INSERT INTO instrutor (nome,endereco,telefone,CPF,email,prontuario)
        VALUES ('".
        $instrutor ->getNome()."','".
        $instrutor ->getEndereco()."','".
        $instrutor ->getTelefone()."','".
        $instrutor ->getCPF()."','".
        $instrutor ->getEmail()."','".
        $instrutor ->getProntuario()."')";
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

    final public function alterarInstrutor($instrutor){
        $sql=
        "UPDATE instrutor SET ".
        "nome = '".$instrutor->getNome()."',".
        "endereco = '".$instrutor->getEndereco()."',".
        "telefone = '".$instrutor->getTelefone()."',".
        "CPF = '".$instrutor->getCPF()."',".
        "email = '".$instrutor->getEmail()."'".
        " WHERE ". "prontuario = '".$instrutor->getProntuario()."';";

        $result = mysqli_query($this->c,$sql);
        if (mysqli_affected_rows($this->c) == 0){
            return false;
        }else{
            return true;
        }
    }


    public function consultarInstrutor($instrutor){
        $sql = "SELECT nome, endereco, telefone, CPF, email, prontuario ". 
        "from instrutor WHERE " 
        . " prontuario = '".$instrutor->getProntuario()."';";
        $result = mysqli_query($this->c,$sql);
        return $result;
    }

    function consultarListaInstrutor(){
        $sql = "SELECT nome, endereco, telefone, CPF, email, prontuario ". 
        "from instrutor";
        $result = mysqli_query($this->c,$sql);
        return $result;
    }
   
















}





?>