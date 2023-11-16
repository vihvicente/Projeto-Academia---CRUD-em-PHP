<?php
include_once('../model/dao/mensalidadeDao.php');

class Mensalidade{
    protected $CPF;
    protected $pagamento;
    protected $plano;
    protected $preco;

    //contrutor
    public function __construct
    ($CPF,$pagamento, $plano, $preco){
        $this ->setCPF($CPF);
        $this ->setPagamento($pagamento);
        $this ->setPlano($plano);
        $this ->setPreco($preco);
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

//Pagamento
    public function getPagamento()
    {
        return $this->pagamento;
    }

    public function setPagamento($pagamento)
    {
        $this->pagamento = $pagamento;

        return $this;
    }

//Plano
    public function getPlano()
    {
        return $this->plano;
    }

    public function setPlano($plano)
    {
        $this->plano = $plano;

        return $this;
    }

//Preço
    public function getPreco()
    {
        return $this->preco;
    }

    public function setPreco($preco)
    {
        $this->preco = $preco;

        return $this;
    }

    public function incluirMensalidade(){
        $mensalidadeDao = new MensalidadeDao();
        if($mensalidadeDao->incluirMensalidade($this)){
            return true;
        }else{
            return false;
        }
    }

    final public function alterar(){
        $mensalidadeDao = new MensalidadeDao();
        if($mensalidadeDao->alterarMensalidade($this)){
            return true;
        }else{
            return false;
        }

    }

}

?>