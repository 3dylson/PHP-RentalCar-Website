<?php


class Reserva
{
    public $idReserva;
    public $DataDeReserva;
    public $DataDeDevolucao;

    public function create(){

        $res = ReservaDAL::create($this);
        return($res);
    }
}