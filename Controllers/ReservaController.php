<?php

require_once dirname(__FILE__).'/../BL/Reserva.php';
class ReservaController
{

    static public function Process(){
        if(isset($_POST['Reservar'])){
            $DatadaReserva=$_POST['DatadaReserva'];
            $DatadeDevolucao=$_POST['DatadeDevolucao'];
            $LocalPickUp=$_POST['LocalPickUp'];
            $LocalDropOff=$_POST['LocalDropOff'];
            if(!$DatadaReserva){
                $msg["estado"]='Insira data de Reserva.';
            }elseif(!$DatadeDevolucao){
                $msg["estado"]='Insira uma Data de devolução';
            }elseif(!$LocalPickUp){
                $msg["estado"]='Insira o local de PickUp.';
            }elseif(!$LocalDropOff){
                $msg["estado"]='Insira o local de DropOff.';
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
        Reserva::mostrarReservas();
    }

    static public function criarReserva(){
        $reserva= new Reserva("",$_POST['DatadaReserva'], $_POST['DatadeDevolucao'],$_POST['LocalPickUp'], $_POST['LocalDropOff'], "", "");
        $reserva->create();
        //unset($_POST['Nome']); unset($_POST['DataDeValidade']); unset($_POST['PercentagemDeDesconto']);
    }

    static public function deleteReserva(){
        $reserva = new Reserva();
        $reserva->delete();
    }
}