<?php

include_once('../model/dao/academiaDao.php');

class Academia{
    protected $notificacao;
    protected $dia;

    //construtor
    public function __construct($dia,$notificacao)
    {
        $this -> setDia($dia);
        $this -> setNotificacao($notificacao);
        
    }


    //Notificação
    public function getNotificacao()
    {
        return $this->notificação;
    }

    public function setNotificacao($notificação)
    {
        $this->notificação = $notificação;

        return $this;
    }

    //Dia da Semana
    public function getDia()
    {
        return $this->dia;
    }

    public function setDia($dia)
    {
        $this->dia = $dia;

        return $this;
    }

    public function incluirAcademia(){
        $academiaDao = new AcademiaDao();
        if($academiaDao->incluirAcademia($this)){
            return true;
        }else{
            return false;
        }
    }

    public function alterar(){
        $academiaDao = new AcademiaDao();
        if($academiaDao->alterarAcademia($this)){
            return true;
        }else{
            return false;
        }
    }


 
}


?>