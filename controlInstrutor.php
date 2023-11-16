<?php

include_once ('../model/classes/Instrutor.php');

session_start();

extract($_REQUEST, EXTR_SKIP);

if (isset($acao)) {
    if ($acao == "Incluir") {
        if (
            isset($nome) && isset($endereco) && isset($telefone) && isset($CPF) && isset($email) && isset($prontuario)
        ) {
            
            $nome = htmlspecialchars_decode(strip_tags($nome)); 
            $endereco = htmlspecialchars_decode(strip_tags($endereco)); 
            $telefone = htmlspecialchars_decode(strip_tags($telefone)); 
            $CPF = htmlspecialchars_decode(strip_tags($CPF)); 
            $email = htmlspecialchars_decode(strip_tags($email)); 
            $prontuario = htmlspecialchars_decode(strip_tags($prontuario));
            

            if (
             is_string($nome) && is_string($endereco) && is_numeric($telefone) && is_numeric($CPF) && is_string($email) && is_numeric($prontuario)  
                ) {
                    $instrutor = new Instrutor($nome,$endereco,$telefone,$CPF,$email,$prontuario);
                    if ($instrutor->incluirInstrutor()){
                        $_SESSION['msg'] = "\n" ."Instrutor Incluido com sucesso !!";     
                    } else {

                    $_SESSION['msg'] =  "\n" ."Falha no INSERT! Mensagem de erro: '$msg'";
                    }
            } else {
                $_SESSION['msg'] = "Parametros informados são invalidos!!";
                
            }
        }
    }
    $path = $_SERVER['HTTP_REFERER'];
    header("Location: $path");
}



if (isset($acao)) {
    if ($acao == "Alterar") {
        if (
            isset($nome) && isset($endereco) && isset($telefone) && isset($CPF) && isset($email) && isset($prontuario)
        ) {
            $prontuario = htmlspecialchars_decode(strip_tags($prontuario));
            $nome = htmlspecialchars_decode(strip_tags($nome)); 
            $endereco = htmlspecialchars_decode(strip_tags($endereco)); 
            $telefone = htmlspecialchars_decode(strip_tags($telefone)); 
            $CPF = htmlspecialchars_decode(strip_tags($CPF)); 
            $email = htmlspecialchars_decode(strip_tags($email)); 
            
            

            if (
                is_numeric($prontuario)  && is_string($nome) && is_string($endereco) 
                && is_numeric($telefone) && is_numeric($CPF) && is_string($email) 
                ) {
                    $instrutor = new Instrutor($nome,$endereco,$telefone,$CPF,$email,$prontuario);
                    if ($instrutor->alterar()){
                        $_SESSION['msg'] = "\n" ."Instrutor alterado com sucesso !!";     
                    } else {

                    $_SESSION['msg'] =  "\n" ."Falha no INSERT! Mensagem de erro: '$msg'";
                    }
            } else {
                $_SESSION['msg'] = "Parametros informados são invalidos!!";
                
            }
        }
    }
    $path = $_SERVER['HTTP_REFERER'];
    header("Location: $path");
}

if (isset($acao)) {
    if ($acao == "Consultar") {
        if (isset($prontuario)){
            $prontuario = htmlspecialchars_decode(strip_tags($prontuario));
            if(is_numeric($prontuario))
            {
                $instrutor = new Instrutor("","","","","",$prontuario);
                $lista=$instrutor->consultar();
                $_SESSION['linha'] = array();
                $_SESSION ['linha'] ['nome'] = $instrutor->getNome();
                $_SESSION ['linha'] ['endereco'] = $instrutor->getEndereco();
                $_SESSION ['linha'] ['telefone'] = $instrutor->getTelefone();
                $_SESSION ['linha'] ['CPF'] = $instrutor->getCPF();
                $_SESSION ['linha'] ['email'] = $instrutor->getEmail();
                $_SESSION ['linha'] ['prontuario'] = $instrutor->getProntuario();
            } else{
                $_SESSION['msg'] = "Parâmetros informados são inválidos!!";
            }
        }
        $path = $_SERVER['HTTP_REFERER'];
        header("Location: $path");
    }
   
}

if (isset($acao)) {
    if ($acao == "consultarFull") {
    $instrutor = new Instrutor ("","","","","",$prontuario);
    $lista = array();
    $lista = $instrutor->consultarLista();
    $qtdLinhas = count($lista);
    echo "<hr>".$qtdLinhas;
    $listaArray = array();
    for ($i=0; $i<$qtdLinhas ; $i++) { 
        $listaArray[$i] = $lista[$i]->toArray();
    }
    $_SESSION['lista']=$listaArray;

    $path = $_SERVER['HTTP_REFERER'];
    header("Location: $path");
    }
}





