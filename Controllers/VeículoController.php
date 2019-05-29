<?php
require_once dirname(__FILE__)."/../BL/Veículo.php";

class VeículoController
{
    static public function Process()
    {
        if (isset($_POST['Add'])) {
            if (!isset($_POST['NumeroDeRegistro'])) {
                $msg["estado"] = 'Insira o n_Registro';
            } elseif (!isset($_POST['Disponibilidade'])) {
                $msg["estado"] = 'Insira a disponibilidade';
            } else {
                self::criarVeiculo();
                $msg["estado"] = 'Criado Com Sucesso!';
            }
            return $msg["estado"];
        }
    }
    static public function criarVeiculo()
    {
        $Veiculo = new Veículo('', $_POST['NumeroDeRegistro'], $_POST['Disponibilidade'], '', '', $_POST['Img'] );
        $Veiculo->create();
    }
    static public function mostrarVeiculos(){
        Veículo::mostrarVeiculos();
    }
    static public function getVeiculoInfo(){
        return Veículo::getVeiculoInfo();
    }
    static public function verificarDisponibilidade(){
        return Veículo::verificarDisponibilidade();
    }
    static public function changeDisp($q){
        Veículo::changeDisp($q);
    }
    static public function ChangeVeicToFree(){
        return Veículo::ChangeVeicToFree();
    }

}
