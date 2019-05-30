<?php
require_once dirname(__FILE__).'/../DAL/VeículoDAL.php';
/**
 * Created by PhpStorm.
 * User: ASUS F555B
 * Date: 5/10/2019
 * Time: 4:03 PM
 */

class Veículo
{
    public $idVeiculo;
    public $NumeroDeRegistro;
    public $Disponibilidade;
    public $Categoria_Veiculo_idCategoria_Veiculo;
    public $Reserva_idReserva;
    public $Img;
    public $Nome;

    public function __construct($dado1,$dado2,$dado3,$dado4,$dado5,$dado6,$dado7){
        $this->idVeiculo=$dado1;
        $this->NumeroDeRegistro=$dado2;
        $this->Disponibilidede=$dado3;
        $this->Categoria_Veiculo_idCategoria_Veiculo=$dado4;
        $this->Reserva_idReserva=$dado5;
        $this->Img=$dado6;
        $this->Nome=$dado7;
    }
    public function create(){
        VeículoDAL::create($this);
    }
    public function delete(){
        VeículoDAL::delete($this);
    }
    static public function mostrarVeiculos(){
        VeículoDAL::mostrarVeiculos();
    }

    public function update(){
        VeículoDAL::update($this);
    }
    static public function getVeiculoInfo(){
        return VeículoDAL::getVeiculoInfo();
    }
    static public function verificarDisponibilidade(){
        return VeículoDAL::verificarDisponibilidade();
    }
    static public function changeDisp($q){
        VeículoDAL::changeDisp($q);
    }
    static public function ChangeVeicToFree(){
        return VeículoDAL::ChangeVeicToFree();
    }

    static public function mostrarVeiculosDisponiveis(){
        VeículoDAL::mostrarVeiculosDisponiveis();
    }

}