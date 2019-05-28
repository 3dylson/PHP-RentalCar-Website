<?php
require_once dirname(__FILE__).'../BL/Seguro.php';

class SeguroController
{
    static public function Process(){
        if(isset($_POST['Guardar'])){
            if(!$_POST['$Nome']){
                $msg["estado"]='Insira nome do seguro.';
            }elseif(!$_POST['TipoDeCobertura']){
                $msg["estado"]='Insira o tipo de cobertura';
            }elseif(!$_POST['Descricao']){
                $msg["estado"]='Insira a descrição do seguro.';
            }elseif(!$_POST['Custo']){
                $msg["estado"]='Insira o custo do seguro.';
            }else{
                self::criarSeguro();
                $msg["estado"]='Seguro criado com sucesso.';
            }
            return $msg["estado"];
        }
        if(isset($_GET['deletSeguro']) && isset($_SESSION['idSeguro'])){
            self::deleteSeguro();
        }
    }
    static public function mostrarSeguros(){
        Seguro::mostrarSeguros();
    }

    static public function criarSeguros(){
        $promo= new Promoção("",$_POST['Nome'], $_POST['TipoDeCobertura'],$_POST['Descricao'], $_POST['Custo']);
        $promo->create();
        //unset($_POST['Nome']); unset($_POST['DataDeValidade']); unset($_POST['PercentagemDeDesconto']);
    }

    static public function deleteSeguro(){
        $promo = new Seguro();
        $promo->delete();
    }

}