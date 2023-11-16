<?php

include_once('../model/dao/secretariaDao.php');
include_once('../model/classes/Pessoa.php');

class Secretaria extends Pessoa{
    protected $turno;

    //construtor
public function __construct
   ($nome,$endereco, $telefone,$CPF,$email,$turno){
    parent::__construct($nome, $endereco, $telefone,$CPF,$email);
    $this ->setTurno($turno);
}


    //Turno
    public function getTurno()
    {
        return $this->turno;
    }


    public function setTurno($turno)
    {
        $this->turno = $turno;

        return $this;
    }

    public function incluirSecretaria(){
        $secretariaDao = new SecretariaDao();
        if($secretariaDao->incluirSecretaria($this)){
            return true;
        }else{
            return false;
        }
    }

    public function alterar(){
        $secretariaDao = new SecretariaDao();
        if($secretariaDao->alterarSecretaria($this)){
            return true;
        }else{
            return false;
        }
    }
    final public function consultar(){
        $secretariaDao = new SecretariaDao();
        $testaConsulta = $secretariaDao->consultarSecretaria($this);
        $qtdLinhas = mysqli_num_rows($testaConsulta);
        if ($qtdLinhas == 0){
            $_SESSION['msg'] = "\n" . "Não existem registros na Tabela Secretaria";
        } else{
            $linha = mysqli_fetch_assoc($testaConsulta);
            
            $this->setNome($linha['nome']);
            $this->setEndereco($linha['endereco']);
            $this->setTelefone($linha['telefone']);
            $this->setCPF($linha['CPF']);
            $this->setEmail($linha['email']);
            $this->setTurno($linha['turno']);

        }
    }

    final public function consultarLista(){
        $secretariaDao = new SecretariaDao();
        $testaConsulta = $secretariaDao->consultarListaSecretaria();
        $qtdLinhas = mysqli_num_rows($testaConsulta);
        if ($qtdLinhas == 0){
            $_SESSION['msg'] = "\n" . "Não existem registros na Tabela Secretaria";
        }else{
            $listaSecretaria = array();
            for ($i=0; $i <$qtdLinhas ; $i++) { 
                $linha = mysqli_fetch_assoc($testaConsulta);
                $tempSecretaria = null;
                $tempSecretaria = new Secretaria($linha['nome'], 
                $linha['endereco'], $linha['telefone'], $linha['CPF'], $linha['email'],$linha['turno']);
                $listaSecretaria[$i]=$tempSecretaria;
            }
            return $listaSecretaria;
        }

    }

    public function toArray(){
        return(
            array(
                "nome" => $this->getNome(),
                "endereco" => $this->getEndereco(),
                "telefone" => $this->getTelefone(),
                "CPF" => $this->getCPF(),
                "email" => $this->getEmail(),
                "turno" => $this->getTurno(),
            )
        );
    }


    
}








?>