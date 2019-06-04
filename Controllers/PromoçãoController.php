<?php

require_once dirname(__FILE__).'/../BL/Promoção.php';


class PromoçãoController
{
 static public function Process(){
    if(isset($_POST['Guardar'])){
        if(!$_POST['PercentagemDeDesconto']){
            $msg["estado"]='Insira uma percentagem de desconto.';
        }elseif(!$_POST['DataDeValidade']){
            $msg["estado"]='Insira uma Data de Inicio e o fim.';
        }elseif(!$_POST['Nome']){
            $msg["estado"]='Insira o nome da Promocao.';
        }else{
            self::criarPromocao();
            $msg["estado"]='Promoção criado com sucesso.';
        }
        return $msg["estado"];
    }
    if(isset($_GET['deletpromo']) && isset($_SESSION['idPromocao'])){
        self::deletepromocao();
    }
    }
    static public function mostrarPromocoes(){
    Promoção::mostrarPromocoes();
    }
    static public function criarPromocao(){
    $promo= new Promoção("",$_POST['Nome'], $_POST['DataDeValidade'],$_POST['PercentagemDeDesconto']);
    $promo->create();
    unset($_POST['Nome']); unset($_POST['DataDeValidade']); unset($_POST['PercentagemDeDesconto']);
    }
    static public function deletepromocao(){
     $promo = new Promoção();
     $promo->delete();

}

}
