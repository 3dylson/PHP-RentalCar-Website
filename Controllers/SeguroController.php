<?php

require_once dirname(__FILE__).'/../BL/Seguro.php';
class SeguroController
{
    static public function Process(){
        if(isset($_POST['Pesquisar'])){
            $Nome=$_POST['Nome'];
            $TipoDeCobertura=$_POST['TipoDeCobertura'];
            $Descricao=$_POST['Descricao'];
            $Custo=$_POST['Custo'];
            if(!$Nome){
                $msg["estado"]='Insira nome do seguro.';
            }elseif(!$TipoDeCobertura){
                $msg["estado"]='Insira o tipo de cobertura';
            }elseif(!$Descricao){
                $msg["estado"]='Insira a descrição do seguro.';
            }elseif(!$Custo){
                $msg["estado"]='Insira o custo do seguro.';
            }else{
                self::criarSeguros();
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
        $seguro= new Seguro("",$_POST['Nome'], $_POST['TipoDeCobertura'],$_POST['Descricao'], $_POST['Custo'], "");
        $seguro->create();
        //unset($_POST['Nome']); unset($_POST['DataDeValidade']); unset($_POST['PercentagemDeDesconto']);
    }

    static public function deleteSeguro(){
        $seguro = new Seguro();
        $seguro->delete();
    }

}