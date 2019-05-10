<?php
/**
 * Created by PhpStorm.
 * User: ASUS F555B
 * Date: 5/10/2019
 * Time: 4:05 PM
 */

class Categoria_Veículo
{
    public $idCategoria_Veiculo;
    public $marca;
    public $modelo;
    public $combustivel;
    public $transmissao;
    public $capacidade;
    public $numeroPortas;
    public $precoDia;
    public $descricao;
    public $foto;


    public function copy($objeto) {
        foreach ($this as $key => $value) {
            $this->$key=$objeto->$key;
        }
    }

    public function create(){

        $res = Categoria_Veículo::create($this);
        return($res);
    }

    public function update() {
        $res = Categoria_Veículo::update($this);
        return($res);
    }

    public function delete() {
        $res = Categoria_Veículo::delete($this);
        return($res);
    }

    public function getAll() {
        $res = Categoria_Veículo::getAll($this);
        return($res);
    }

    public function getByMarca($marcaDoVeiculo) {
        $res = Categoria_Veículo::getByMarca($marcaDoVeiculo);
        return($res);
    }
}