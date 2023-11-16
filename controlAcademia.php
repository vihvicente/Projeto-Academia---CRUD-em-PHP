<?php

include_once ('../model/classes/Academia.php');

session_start();

extract($_REQUEST, EXTR_SKIP);

if (isset($acao)) {
    if ($acao == "Incluir") {
        if (
            isset($dia) && isset($notificacao)
        ) {
            $dia = htmlspecialchars_decode(strip_tags($dia));
            $notificacao = htmlspecialchars_decode(strip_tags($notificacao));
           
            if (
                is_string($dia) && is_string($notificacao)
                ) {
                    $academia = new Academia($dia,$notificacao);
                    if ($academia ->incluirAcademia()){
                        $_SESSION['msg'] = "\n" ."Notificação Incluido com sucesso !!";     
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
           isset($dia) && isset($notificacao) 
        ) {
            $dia = htmlspecialchars_decode(strip_tags($dia));
            $notificacao = htmlspecialchars_decode(strip_tags($notificacao));
            
            if (
                is_string($dia) && is_string($notificacao) 
                ) {
                    $academia = new Academia($dia,$notificacao);
                    if ($academia ->alterar()){
                        $_SESSION['msg'] = "\n" ."Notificação alterada com sucesso !!";     
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

