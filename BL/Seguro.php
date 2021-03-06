<?php

require_once dirname(__FILE__).'/../DAL/SeguroDAL.php';
/**
 * Created by PhpStorm.
 * User: ASUS F555B
 * Date: 5/10/2019
 * Time: 4:04 PM
 */

class Seguro
{
    public $idSeguro;
    public $Nome;
    public $TipoDeCobertura;
    public $Descricao;
    public $Custo;

    public $Reserva_idReserva;


    public function __construct($dado1=null,$dado2=null,$dado3=null,$dado4=null,$dado5=null,$dado6=null){
        $this->idSeguro=$dado1;
        $this->Nome=$dado2;
        $this->TipoDeCobertura=$dado3;
        $this->Descricao=$dado4;
        $this->Custo=$dado5;
        $this->Reserva_idReserva=$dado6;

    }


    public function create(){
        return SeguroDAL::create($this);
    }
    public function delete(){
        SeguroDAL::delete($this);
    }
    static public function mostrarSeguros(){
        SeguroDAL::mostrarSeguros();
    }

    public function update(){
        SeguroDAL::update($this);
    }
}