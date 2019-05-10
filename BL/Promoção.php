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

        $res = PromoçãoDal::create($this);
        return($res);
    }

    public function update() {
        $res = PromoçãoDal::update($this);
        return($res);
    }

    public function delete() {
        $res = PromoçãoDal::delete($this);
        return($res);
    }

    public function getAll() {
        $res = PromoçãoDal::getAll($this);
        return($res);
    }

    public function getByID($idPromocao) {
        $res = PromoçãoDal::getByID($idPromocao);
        return($res);
    }

}