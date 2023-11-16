<?php

include_once('../model/dao/pessoaDao.php');

abstract class Pessoa{
    protected $nome;
    protected $endereco;
    protected $telefone;
    protected $CPF;
    protected $email;
    

    //contrutor
    public function __construct($nome, $endereco, $telefone, $CPF, $email){
        $this ->setNome($nome);
        $this ->setEndereco($endereco);
        $this ->setTelefone($telefone);
        $this ->setCPF($CPF);
        $this ->setEmail($email);        
    }

//Nome
    public function getNome()
    {
        return $this->nome;
    }
 
    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }

//Endereço
    public function getEndereco()
    {
        return $this->endereco;
    }
 
    public function setEndereco($endereco)
    {
        $this->endereco = $endereco;

        return $this;
    }

//Telefone
    public function getTelefone()
    {
        return $this->telefone;
    }

    public function setTelefone($telefone)
    {
        $this->telefone = $telefone;

        return $this;
    }

//CPF
    public function getCPF()
    {
        return $this->CPF;
    }

    public function setCPF($CPF)
    {
        $this->CPF = $CPF;

        return $this;
    }


//Email
    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    public function incluirPessoa(){
        $pessoaDao = new PessoaDao();
        if($pessoaDao->incluirPessoa($this)){
            return true;
        }else{
            return false;
        }
    }

    public function alterar(){
        
    }


}

?>