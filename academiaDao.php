<?php

include_once('../model/classes/Academia.php');

class AcademiaDao{
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

    public function incluirAcademia($academia){
        $sql = "INSERT INTO academia (dia,notificacao)
        VALUES ('".
        $academia ->getDia()."','".
        $academia ->getNotificacao()."')";
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

    public function alterarAcademia($academia){
        $sql=
        "UPDATE academia SET ".
        "notificacao = '".$academia->getNotificacao()."'".
        " WHERE ". "dia = '".$academia->getDia()."';";

        $result = mysqli_query($this->c,$sql);
        if (mysqli_affected_rows($this->c) == 0){
            return false;
        }else{
            return true;
        }
    }

    
}


?>