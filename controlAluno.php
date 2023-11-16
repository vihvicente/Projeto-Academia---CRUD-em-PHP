<?php

include_once ('../model/classes/Aluno.php');

session_start();

extract($_REQUEST, EXTR_SKIP);

if (isset($acao)) {
    if ($acao == "Incluir") {
        if (
            isset($nome) && isset($endereco) && isset($telefone) && isset($CPF) && isset($email) && isset($matricula)
        ) {
            
            $nome = htmlspecialchars_decode(strip_tags($nome)); 
            $endereco = htmlspecialchars_decode(strip_tags($endereco)); 
            $telefone = htmlspecialchars_decode(strip_tags($telefone)); 
            $CPF = htmlspecialchars_decode(strip_tags($CPF)); 
            $email = htmlspecialchars_decode(strip_tags($email)); 
            $matricula = htmlspecialchars_decode(strip_tags($matricula));
            

            if (
             is_string($nome) && is_string($endereco) && is_numeric($telefone) && is_numeric($CPF) && is_string($email) && is_numeric($matricula)  
                ) {
                    $aluno = new Aluno($nome,$endereco,$telefone,$CPF,$email,$matricula);
                    if ($aluno->incluirAluno()){
                        $_SESSION['msg'] = "\n" ."Aluno Incluido com sucesso !!";     
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
            isset($matricula) && isset($nome) && isset($endereco) && isset($telefone) && isset($CPF)
             && isset($email) 
        ) {
            $matricula = htmlspecialchars_decode(strip_tags($matricula));
            $nome = htmlspecialchars_decode(strip_tags($nome)); 
            $endereco = htmlspecialchars_decode(strip_tags($endereco)); 
            $telefone = htmlspecialchars_decode(strip_tags($telefone)); 
            $CPF = htmlspecialchars_decode(strip_tags($CPF)); 
            $email = htmlspecialchars_decode(strip_tags($email)); 
            

            if (
             is_string($nome) && is_string($endereco) && is_numeric($telefone) && is_numeric($CPF) && is_string($email) && is_numeric($matricula)  
                ) {
                    $aluno = new Aluno($matricula,$nome,$endereco,$telefone,$CPF,$email);
                    if ($aluno->alterar()){
                        $_SESSION['msg'] = "\n" ."Aluno alterado com sucesso !!";     
                    } else {

                    $_SESSION['msg'] =  "\n" ."Falha no UPDATE! Mensagem de erro: '$msg'";
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
        if (isset($matricula)){
            $matricula = htmlspecialchars_decode(strip_tags($matricula));
            if(is_numeric($matricula))
            {
                $aluno = new Aluno("","","","","",$matricula);
                $lista=$aluno->consultar();
                $_SESSION['linha'] = array();
                $_SESSION ['linha'] ['nome'] = $aluno->getNome();
                $_SESSION ['linha'] ['endereco'] = $aluno->getEndereco();
                $_SESSION ['linha'] ['telefone'] = $aluno->getTelefone();
                $_SESSION ['linha'] ['CPF'] = $aluno->getCPF();
                $_SESSION ['linha'] ['email'] = $aluno->getEmail();
                $_SESSION ['linha'] ['matricula'] = $aluno->getMatricula();
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
    $aluno = new Aluno ("","","","","",$matricula);
    $lista = array();
    $lista = $aluno->consultarLista();
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