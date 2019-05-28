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

    public function __construct($dado1,$dado2,$dado3,$dado4,$dado5,$dado6,$dado7){
        $this->idReserva=$dado1;
        $this->DatadaReserva=$dado2;
        $this->DatadeDevolucao=$dado3;
        $this->LocalPickUp=$dado4;
        $this->LocalDropOff=$dado5;
        $this->Cliente_idCliente=$dado6;
        $this->Promocao_idPromocao=$dado7;

    }


    public function create(){
        return ReservaDal::create($this);
    }
    public function delete(){
        ReservaDal::delete($this);
    }
    static public function mostrarReservas(){
        ReservaDal::mostrarReservas();
    }

    public function update(){
        ReservaDal::update($this);
    }

}