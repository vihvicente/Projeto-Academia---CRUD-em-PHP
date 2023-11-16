<?php

include_once('../model/classes/Equipamento.php');

class EquipamentoDao{
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

    public function incluirEquipamento($equipamento){
        $sql = "INSERT INTO equipamento (nome,video,marca)
        VALUES ('".
        $equipamento ->getNome()."','".
        $equipamento ->getVideo()."','".
        $equipamento ->getMarca()."')";
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

    public function alterarEquipamento($equipamento){
        $sql=
        "UPDATE equipamento SET ".
        "video = '".$equipamento->getVideo()."',".
        "marca = '".$equipamento->getMarca()."'".
        " WHERE ". "nome = '".$equipamento->getNome()."';";

        $result = mysqli_query($this->c,$sql);
        if (mysqli_affected_rows($this->c) == 0){
            return false;
        }else{
            return true;
        }
    }

    
}




?>