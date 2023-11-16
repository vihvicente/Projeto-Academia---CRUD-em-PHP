<?php

include_once ('../model/classes/Equipamento.php');

session_start();

extract($_REQUEST, EXTR_SKIP);

if (isset($acao)) {
    if ($acao == "Incluir") {
        if (
            isset($nome) && isset($video) 
            && isset($marca)
        ) {
            $nome = htmlspecialchars_decode(strip_tags($nome));
            $video = htmlspecialchars_decode(strip_tags($video));
            $marca = htmlspecialchars_decode(strip_tags($marca));
            
            if (
                is_string($nome)&& is_string($video)
                && is_string($marca)
                ) {
                    $equipamento = new Equipamento($nome,$video,$marca);
                    if ($equipamento ->incluirEquipamento()){
                        $_SESSION['msg'] = "\n" ."Equipamento Incluido com sucesso !!";     
                    } else {

                    //    $_SESSION['msg'] =  "\n" ."Falha no INSERT! Mensagem de erro: '$msg'";
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
            isset($nome) && isset($video) 
            && isset($marca)
        ) {
            $nome = htmlspecialchars_decode(strip_tags($nome));
            $video = htmlspecialchars_decode(strip_tags($video));
            $marca = htmlspecialchars_decode(strip_tags($marca));
            
            if (
                is_string($nome)&& is_string($video)
                && is_string($marca)
                ) {
                    $equipamento = new Equipamento($nome,$video,$marca);
                    if ($equipamento ->alterar()){
                        $_SESSION['msg'] = "\n" ."Equipamento alterado com sucesso !!";     
                    } else {

                    //    $_SESSION['msg'] =  "\n" ."Falha no INSERT! Mensagem de erro: '$msg'";
                    }
            } else {
                $_SESSION['msg'] = "Parametros informados são invalidos!!";
                
            }
        }
    }
    $path = $_SERVER['HTTP_REFERER'];
    header("Location: $path");
}

