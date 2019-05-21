<?php
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
    public $Disponibilidede;

    public $Categoria_Veiculo_idCategoria_Veiculo;
    public $Reserva_idReserva;

    public function copy($objeto) {
        foreach ($this as $key => $value) {
            $this->$key=$objeto->$key;
        }
    }

    public function create(){

        $res = VeículoDAL:: create($this);
        return($res);
    }

    public function update() {
        $res = VeículoDAL::update($this);
        return($res);
    }

    public function delete() {
        $res = VeículoDAL::delete($this);
        return($res);
    }

    public function getAll() {
        $res = VeículoDAL::getAll($this);
        return($res);
    }

    public function getByDisponibilidade($Disponibilidade) {
        $res = VeículoDAL::getByDisponibilidade($Disponibilidade);
        return($res);
    }

}