<?php


class Reserva
{
    public $idReserva;
    public $DatadaReserva;
    public $DatadeDevolucao;
    public $LocalPickUp;
    public $LocalDropOff;

    public $Cliente_idCliente;
    public $Promocao_idPromocao;

    public function copy($objeto) {
        foreach ($this as $key => $value) {
            $this->$key=$objeto->$key;
        }
    }

    public function create(){

        $res = ReservaDAL::create($this);
        return($res);
    }

    public function update() {
        $res = ReservaDAL::update($this);
        return($res);
    }

    public function delete() {
        $res = ReservaDAL::delete($this);
        return($res);
    }

    public function getAll() {
        $res = ReservaDAL::getAll($this);
        return($res);
    }

    public function getByData($DataDaReserva) {
        $res = ReservaDAL::getByData($DataDaReserva);
        return($res);
    }

}