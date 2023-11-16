<?php

include_once('../model/dao/instrutorDao.php');
include_once('../model/classes/Pessoa.php');

//construtor



class Instrutor extends Pessoa{
    protected $prontuario;//get

    public function __construct
    ($nome,$endereco,$telefone,$CPF,$email,$prontuario){
    parent::__construct($nome,$endereco,$telefone,$CPF,$email);    
        $this ->setProntuario($prontuario);
    }

   //PRONTUARIO===============================================================
    public function getProntuario()
    {
        return $this->prontuario;
    }

    public function setProntuario($prontuario)
    {
        $this->prontuario = $prontuario;
        return $this;
    }

    public function incluirInstrutor(){
        $instrutorDao = new InstrutorDao();
        if($instrutorDao->incluirInstrutor($this)){
            return true;
        }else{
            return false;
        }
    }
    
    final public function alterar(){
        $instrutorDao = new InstrutorDao();
        if($instrutorDao->alterarInstrutor($this)){
            return true;
        }else{
            return false;
        }

    }

    final public function consultar(){
        $instrutorDao = new InstrutorDao();
        $testaConsulta = $instrutorDao->consultarInstrutor($this);
        $qtdLinhas = mysqli_num_rows($testaConsulta);
        if ($qtdLinhas == 0){
            $_SESSION['msg'] = "\n" . "Não existem registros na Tabela Instrutor";
        } else{
            $linha = mysqli_fetch_assoc($testaConsulta);
            
            $this->setNome($linha['nome']);
            $this->setEndereco($linha['endereco']);
            $this->setTelefone($linha['telefone']);
            $this->setCPF($linha['CPF']);
            $this->setEmail($linha['email']);
            $this->setProntuario($linha['prontuario']);

        }
    }

    final public function consultarLista(){
        $instrutorDao = new InstrutorDao();
        $testaConsulta = $instrutorDao->consultarListaInstrutor();
        $qtdLinhas = mysqli_num_rows($testaConsulta);
        if ($qtdLinhas == 0){
            $_SESSION['msg'] = "\n" . "Não existem registros na Tabela Aluno";
        }else{
            $listaInstrutor = array();
            for ($i=0; $i <$qtdLinhas ; $i++) { 
                $linha = mysqli_fetch_assoc($testaConsulta);
                $tempInstrutor = null;
                $tempInstrutor = new Instrutor($linha['nome'], 
                $linha['endereco'], $linha['telefone'], $linha['CPF'], $linha['email'],$linha['prontuario']);
                $listaInstrutor[$i]=$tempInstrutor;
            }
            return $listaInstrutor;
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
                "prontuario" => $this->getProntuario(),
            )
        );
    }


}




?>