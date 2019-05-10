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

        $res = VeículoDal:: create($this);
        return($res);
    }

    public function update() {
        $res = VeículoDal::update($this);
        return($res);
    }

    public function delete() {
        $res = VeículoDal::delete($this);
        return($res);
    }

    public function getAll() {
        $res = VeículoDal::getAll($this);
        return($res);
    }

    public function getByDisponibilidade($Disponibilidade) {
        $res = VeículoDal::getByDisponibilidade($Disponibilidade);
        return($res);
    }

}