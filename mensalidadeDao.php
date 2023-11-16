<?php

include_once('../model/classes/mensalidade.php');

class MensalidadeDao{
    private $c;

    public function __construct(){
        $this ->c=mysqli_connect("localhost", "root", "", "academia");
        if(mysqli_connect_errno() == 0){
            echo "\n" . "Conexão ok!";
        } else{
            $msg = mysqli_connect_error();
            echo "\n" . "erro na conexão SQL!";
            echo "\n" . "O MySQL retornou a seguinte mensagem: " . $msg;
        }
    }

    public function incluirMensalidade($mensalidade){
        $sql = "INSERT INTO mensalidade (CPF,pagamento,plano,preco)
        VALUES ('".
        $mensalidade ->getCPF()."','".
        $mensalidade ->getPagamento()."','".
        $mensalidade ->getPlano()."','".
        $mensalidade ->getPreco()."')";
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

public function alterarMensalidade($mensalidade){
    $sql=
    "UPDATE mensalidade SET ".
    "pagamento = '".$mensalidade->getPagamento()."',".
    "plano = '".$mensalidade->getPlano()."',".
    "preco = '".$mensalidade->getPreco()."'".
    " WHERE ". "CPF = '".$mensalidade->getCPF()."';";

    $result = mysqli_query($this->c,$sql);
    if (mysqli_affected_rows($this->c) == 0){
        return false;
    }else{
        return true;
    }
}






}





















?>