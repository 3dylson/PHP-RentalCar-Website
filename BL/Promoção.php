<?php
require_once dirname(__FILE__).'../DAL/PromoçãoDAL.php';


class Promoção
{
    public $idPromocao;
    public $Nome;
    public $DataDeValidade;
    public $PercentagemDeDesconto;


    public function __construct($dado1,$dado2,$dado3,$dado4) {
        $this->idPromocao=$dado1;
        $this->Nome=$dado2;
        $this->DataDeValidade=$dado3;
        $this->PercentagemDeDesconto=$dado4;

    }

    public function create(){
        PromoçãoDAL::create($this);
    }

    public function update() {
        PromoçãoDAL::update($this);
    }

    public function delete() {
        PromoçãoDAL::delete($this);
    }

    static public function mostrarPromocoes(){
        PromoçãoDAL::mostrarPromocoes();
    }
    static public function mostrarPromocoesAdmin(){
        PromoçãoDAL::mostrarPromocoesAdmin();
    }
}