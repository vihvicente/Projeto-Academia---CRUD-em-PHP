<?php


include_once('../model/classes/Mensalidade.php');

session_start();

extract($_REQUEST, EXTR_SKIP);

if(isset($acao)){
    if($acao == "Incluir"){
        if(
           isset($CPF) && isset($pagamento) && isset($plano)  && isset($preco)
        ){
            $CPF = htmlspecialchars_decode(strip_tags($CPF));
            $pagamento = htmlspecialchars_decode(strip_tags($pagamento));
            $plano = htmlspecialchars_decode(strip_tags($plano));
            $preco = htmlspecialchars_decode(strip_tags($preco));

            if(
               is_numeric($CPF) && is_string($pagamento) && is_string($plano) && is_numeric($preco)

            ){
                $mensalidade = new Mensalidade($CPF,$pagamento,$plano,$preco);
                if ($mensalidade->incluirMensalidade()){
                    $_SESSION['msg'] = "\n" ."Mensalidade Incluido com sucesso !!";     
                }else{
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

if(isset($acao)){
    if($acao == "Alterar"){
        if(
           isset($CPF) && isset($pagamento) && isset($plano)  && isset($preco)
        ){
            $CPF = htmlspecialchars_decode(strip_tags($CPF));
            $pagamento = htmlspecialchars_decode(strip_tags($pagamento));
            $plano = htmlspecialchars_decode(strip_tags($plano));
            $preco = htmlspecialchars_decode(strip_tags($preco));

            if(
               is_numeric($CPF) && is_string($pagamento) && is_string($plano) && is_numeric($preco)

            ){
                $mensalidade = new Mensalidade($CPF,$pagamento,$plano,$preco);
                if ($mensalidade->alterar()){
                    $_SESSION['msg'] = "\n" ."Mensalidade alterada com sucesso !!";     
                }else{
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







?>