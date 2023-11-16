<?php

include_once('../model/dao/equipamentoDao.php');

class Equipamento{
    protected $nome;
    protected $video;
    protected $marca;

     //construtor
     public function __construct($nome, $video,$marca)
     {
         $this -> setNome($nome);
         $this -> setVideo($video);
         $this -> setMarca($marca);
     }
 


//Nome do Equipamento 
    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }

//Video
    public function getVideo()
    {
        return $this->video;
    }

    public function setVideo($video)
    {
        $this->video = $video;

        return $this;
    }

//Marca do Equipamento 
    public function getMarca()
    {
        return $this->marca;
    }

    public function setMarca($marca)
    {
        $this->marca = $marca;

        return $this;
    }


    public function incluirEquipamento(){
        $equipamentoDao = new EquipamentoDao();
        if($equipamentoDao->incluirEquipamento($this)){
            return true;
        }else{
            return false;
        }
    }

    final public function alterar(){
        $equipamentoDao = new EquipamentoDao();
        if($equipamentoDao->alterarEquipamento($this)){
            return true;
        }else{
            return false;
        }

    }
    
}



?>