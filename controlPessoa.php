<?php

include_once ('../model/classes/Pessoa.php');

session_start();

extract($_REQUEST, EXTR_SKIP);

if (isset($acao)){
    if ($acao == "Incluir"){
        if (
            isset($nome) && isset($endereco) 
            && isset($telefone) && isset($CPF) && isset($email)
        ){
            $nome = htmlspecialchars_decode(strip_tags($nome));
            $endereco = htmlspecialchars_decode(strip_tags($endereco));
            $telefone = htmlspecialchars_decode(strip_tags($telefone));
            $CPF = htmlspecialchars_decode(strip_tags($CPF));
            $email = htmlspecialchars_decode(strip_tags($email));

            if(
                is_string($nome) && is_string($endereco)
                && is_numeric($telefone) && is_numeric($CPF) 
                && is_string($email)
            ){
                $pessoa = new Pessoa($nome,$endereco,$telefone,$CPF,$email);
                if ($pessoa->incluirPessoa()){
                    $_SESSION['msg'] = "\n" ."Livro Incluido com sucesso !!";     
                } else{
                      //   $_SESSION['msg'] =  "\n" ."Falha no INSERT! Mensagem de erro: '$msg'";
                }
        } else{
            $_SESSION['msg'] = "Parametros informados são invalidos!!";
        }
    }
}
    $path = $_SERVER['HTTP_REFERER'];
    header("Location: $path");

}














?>