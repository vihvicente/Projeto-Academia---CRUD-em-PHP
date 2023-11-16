<?php

include_once ('../model/classes/Secretaria.php');

session_start();

extract($_REQUEST, EXTR_SKIP);

if (isset($acao)) {
    if ($acao == "Incluir") {
        if (
           isset($nome) && isset($endereco) && isset($telefone) && isset($CPF) && isset($email) && isset($turno)
           ) {
            $nome = htmlspecialchars_decode(strip_tags($nome));
            $endereco = htmlspecialchars_decode(strip_tags($endereco));
            $telefone = htmlspecialchars_decode(strip_tags($telefone));
            $CPF = htmlspecialchars_decode(strip_tags($CPF));
            $email = htmlspecialchars_decode(strip_tags($email));
            $turno = htmlspecialchars_decode(strip_tags($turno));
            if (
                is_string($nome) && is_string($endereco) && is_numeric($telefone) && is_numeric($CPF) && is_string($email) && is_string($turno)
                ) {
                    $secretaria = new Secretaria($nome, $endereco, $telefone, $CPF, $email, $turno);
                    if ($secretaria->incluirSecretaria()){
                        $_SESSION['msg'] = "\n" ."Secretaria Incluido com sucesso !!";     
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
           isset($nome) && isset($endereco) && isset($telefone) && isset($CPF) && isset($email) && isset($turno)
           ) {
            $CPF = htmlspecialchars_decode(strip_tags($CPF));
            $nome = htmlspecialchars_decode(strip_tags($nome));
            $endereco = htmlspecialchars_decode(strip_tags($endereco));
            $telefone = htmlspecialchars_decode(strip_tags($telefone));
            $email = htmlspecialchars_decode(strip_tags($email));
            $turno = htmlspecialchars_decode(strip_tags($turno));
            if (
                is_string($nome) && is_string($endereco) && is_numeric($telefone) && is_numeric($CPF) && is_string($email) && is_string($turno)
                ) {
                    $secretaria = new Secretaria($nome, $endereco, $telefone, $CPF, $email, $turno);
                    if ($secretaria->alterar()){
                        $_SESSION['msg'] = "\n" ."Secretaria alterada com sucesso !!";     
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
        if (isset($CPF)){
            $CPF = htmlspecialchars_decode(strip_tags($CPF));
            if(is_numeric($CPF))
            {
                $secretaria = new Secretaria("","","",$CPF,"","");
                $lista = $secretaria->consultar();
                $_SESSION['linha'] = array();
                $_SESSION ['linha'] ['nome'] = $secretaria->getNome();
                $_SESSION ['linha'] ['endereco'] = $secretaria->getEndereco();
                $_SESSION ['linha'] ['telefone'] = $secretaria->getTelefone();
                $_SESSION ['linha'] ['CPF'] = $secretaria->getCPF();
                $_SESSION ['linha'] ['email'] = $secretaria->getEmail();
                $_SESSION ['linha'] ['turno'] = $secretaria->getTurno();
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
    $secretaria = new Secretaria ("","","",$CPF,"","");
    $lista = array();
    $lista = $secretaria->consultarLista();
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




?>