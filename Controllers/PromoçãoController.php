<?php
require_once dirname(__FILE__).'../BL/Promoção.php';



class PromoçãoController
{
 static public function Process(){
    if(isset($_POST['idPromocao'])){
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
    if(isset($_GET['cancelpromo']) && isset($_SESSION['ID']) && UserController::typeofuser()){
        self::deletepromocao();
    }

}


    static public function mostrarPromocoes(){
    PromocaoAtual::mostrarPromocoes();
}
    static public function criarPromocao(){
    $promo= new PromocaoAtual("",$_POST['PercentagemDeDesconto'],$_POST['DataDeValidade']);
    $promo->create();
    unset($_POST['PercentagemDeDesconto']);unset($_POST['DataDeValidade']);
}
    static public function mostrarPromocoesAdmin(){
    PromocaoAtual::mostrarPromocoesAdmin();
}
    static public function deletepromocao(){
    $promo= new PromocaoAtual($_GET['cancelpromo'],"","","");

    if(QuartoController::anularPromocao());
    $promo->delete();
}
}
