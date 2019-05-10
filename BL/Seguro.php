<?php
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


    public function copy($objeto) {
        foreach ($this as $key => $value) {
            $this->$key=$objeto->$key;
        }
    }

    public function create(){

        $res = SeguroDal::create($this);
        return($res);
    }

    public function update() {
        $res = SeguroDal::update($this);
        return($res);
    }

    public function delete() {
        $res = SeguroDal::delete($this);
        return($res);
    }

    public function getAll() {
        $res = SeguroDal::getAll($this);
        return($res);
    }

    public function getByID($idSeguro) {
        $res = ReservaDAL::getByID($idSeguro);
        return($res);
    }
}