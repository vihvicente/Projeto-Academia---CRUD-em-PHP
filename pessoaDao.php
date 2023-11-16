<?php

include_once('../modeL/classes/Pessoa.php');

class PessoaDao{
    private $c;

    public function __construct(){
        $this ->c=mysqli_connect("localhost","root","","academia");
        if(mysqli_connect_errno() == 0){
            echo "\n"."Conexão ok!";
        }else{
            $msg = mysqli_connect_error();
            echo "\n" . "erro na conexão SQL!";
            echo "\n" . "O MySQL retornou a seguinte mensagem: " . $msg;
        }
    }

    public function incluirPessoa($pessoa){
        $sql = "INSERT INTO pessoa (nome,endereco,telefone,CPF,email)
        VALUES ('". 
        $pessoa ->getNome()."','".
        $pessoa ->getEndereco()."','".
        $pessoa ->getTelefone()."','".
        $pessoa ->getCPF()."','".
        $pessoa ->getEmail()."')'";
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





}





















?>