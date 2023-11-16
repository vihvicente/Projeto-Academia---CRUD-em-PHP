<?php

include_once('../model/dao/alunoDao.php');
include_once('../model/classes/Pessoa.php');




class Aluno extends Pessoa{
    protected $matricula;

    //construtor
    public function __construct
    ($nome,$endereco,$telefone,$CPF,$email,$matricula){
    parent::__construct($nome,$endereco,$telefone,$CPF,$email);
        $this ->setMatricula($matricula);
    }

    //MATRICULA========================================
    public function getMatricula()
    {
        return $this->matricula;
    }

    public function setMatricula($matricula)
    {
        $this->matricula = $matricula;

        return $this;
    }

    public function incluirAluno(){
        $alunoDao = new AlunoDao();
        if($alunoDao->incluirAluno($this)){
            return true;
        }else{
            return false;
        }
    }

    final public function alterar(){
        $alunoDao = new AlunoDao();
        if($alunoDao->alterarAluno($this)){
            return true;
        }else{
            return false;
        }

    }

    final public function consultar(){
        $alunoDao = new AlunoDao();
        $testaConsulta = $alunoDao->consultarAluno($this);
        $qtdLinhas = mysqli_num_rows($testaConsulta);
        if ($qtdLinhas == 0){
            $_SESSION['msg'] = "\n" . "Não existem registros na Tabela Aluno";
        } else{
            $linha = mysqli_fetch_assoc($testaConsulta);
            
            $this->setNome($linha['nome']);
            $this->setEndereco($linha['endereco']);
            $this->setTelefone($linha['telefone']);
            $this->setCPF($linha['CPF']);
            $this->setEmail($linha['email']);
            $this->setMatricula($linha['matricula']);

        }
    }

    final public function consultarLista(){
        $alunoDao = new AlunoDao();
        $testaConsulta = $alunoDao->consultarListaAluno();
        $qtdLinhas = mysqli_num_rows($testaConsulta);
        if ($qtdLinhas == 0){
            $_SESSION['msg'] = "\n" . "Não existem registros na Tabela Aluno";
        }else{
            $listaAluno = array();
            for ($i=0; $i <$qtdLinhas ; $i++) { 
                $linha = mysqli_fetch_assoc($testaConsulta);
                $tempAluno = null;
                $tempAluno = new Aluno($linha['nome'], 
                $linha['endereco'], $linha['telefone'], $linha['CPF'], $linha['email'],$linha['matricula']);
                $listaAluno[$i]=$tempAluno;
            }
            return $listaAluno;
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
                "matricula" => $this->getMatricula(),
            )
        );
    }



}




?>