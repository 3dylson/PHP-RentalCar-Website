<?php
/**
 * Created by PhpStorm.
 * User: ASUS F555B
 * Date: 5/10/2019
 * Time: 4:04 PM
 */

class Promoção
{
    public $idPromocao;
    public $Nome;
    public $DataDeValidade;
    public $PercentagemDeDesconto;


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

    public function getByID($idPromocao) {
        $res = ReservaDAL::getByData($idPromocao);
        return($res);
    }

}