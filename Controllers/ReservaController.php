<?php
require_once dirname(__FILE__).'../BL/Reserva.php';

class ReservaController
{

    static public function Process(){
        if(isset($_POST['Guardar'])){
            if(!$_POST['$DatadaReserva']){
                $msg["estado"]='Insira data de Reserva.';
            }elseif(!$_POST['DatadeDevolucao']){
                $msg["estado"]='Insira uma Data de devolução';
            }elseif(!$_POST['LocalPickUp']){
                $msg["estado"]='Insira o local de PickUp.';
            }else{
                self::criarReserva();
                $msg["estado"]='Reserva criado com sucesso.';
            }
            return $msg["estado"];
        }
        if(isset($_GET['deletReserva']) && isset($_SESSION['idReserva'])){
            self::deleteReserva();
        }
    }
    static public function mostrarReservas(){
        Promoção::mostrarReserva();
    }

    static public function criarReserva(){
        $promo= new Promoção("",$_POST['DatadaReserva'], $_POST['DatadeDevolucao'],$_POST['LocalPickUp'], $_POST['LocalDropOff']);
        $promo->create();
        //unset($_POST['Nome']); unset($_POST['DataDeValidade']); unset($_POST['PercentagemDeDesconto']);
    }

    static public function deleteReserva(){
        $promo = new reserva();
        $promo->delete();
    }
}