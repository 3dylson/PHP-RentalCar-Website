<?php
require_once '../BL/Promoção.php';



class PromoçãoController
{
     static public function Process(){
         if(isset($_POST['Guardar'])){
            $idPromocao=$_POST['idPromocao'];
            $Nome=$_POST['Nome'];
            $DataDeValidade=$_POST['DataDeValidade'];
            $PercentagemDeDesconto=$_POST['PercentagemDeDesconto'];
            if(!$idPromocao){
                $msg["estado"]='Insira ID de Promoçao.';
            }elseif(!$Nome){
                $msg["estado"]='Insira o nome da Promoção.';
            }elseif(!$DataDeValidade){
                $msg["estado"]='Insira a Data de validade.';
            }elseif(!$PercentagemDeDesconto){
                $msg["estado"]='Insira a percentagem do desconto.';
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
