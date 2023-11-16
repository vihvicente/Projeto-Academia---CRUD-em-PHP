<?php

include_once('../model/classes/Secretaria.php');


class SecretariaDao{
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

    public function incluirSecretaria($secretaria){
        $sql = "INSERT INTO secretaria (nome,endereco,telefone,CPF,email,turno)
        VALUES ('".
        $secretaria -> getNome(). "','".
        $secretaria -> getEndereco(). "','".
        $secretaria -> getTelefone(). "','".
        $secretaria -> getCPF(). "','".
        $secretaria -> getEmail(). "','".
        $secretaria ->getTurno()."')";
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


    public function alterarSecretaria($secretaria){
        $sql=
        "UPDATE secretaria SET ".
        "nome = '".$secretaria->getNome()."',".
        "endereco = '".$secretaria->getEndereco()."',".
        "telefone = '".$secretaria->getTelefone()."',".
        "email = '".$secretaria->getEmail()."',".
        "turno = '".$secretaria->getTurno()."'".
        " WHERE ". "CPF = '".$secretaria->getCPF()."';";

        $result = mysqli_query($this->c,$sql);
        if (mysqli_affected_rows($this->c) == 0){
            return false;
        }else{
            return true;
        }
    }

    public function consultarSecretaria($secretaria){
        $sql = "SELECT nome, endereco, telefone, CPF, email, turno ". 
        "from secretaria WHERE " 
        . " CPF = '".$secretaria->getCPF()."';";
        $result = mysqli_query($this->c,$sql);
        return $result;
    }

    function consultarListaSecretaria(){
        $sql = "SELECT nome, endereco, telefone, CPF, email, turno ". 
        "from secretaria";
        $result = mysqli_query($this->c,$sql);
        return $result;
    }








}







?>