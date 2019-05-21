<?php
/**
 * Created by PhpStorm.
 * User: ASUS F555B
 * Date: 5/10/2019
 * Time: 4:05 PM
 */

require_once dirname(__FILE__).'/../DAL/Categoria_Veículo.php';

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


   /* public function copy($objeto) {
        foreach ($this as $key => $value) {
            $this->$key=$objeto->$key;
        }
    }*/

    public function __construct($dado1=null,$dado2=null,$dado3=null,$dado4=null,$dado5=null,$dado6=null,$dado7=null, $dado8=null, $dado9=null, $dado10=null)
    {
        $this->idCategoria_Veiculo=$dado1;
        $this->marca=$dado2;
        $this->modelo=$dado3;
        $this->combustivel=$dado4;
        $this->transmissao=$dado5;
        $this->capacidade=$dado6;
        $this->numeroPortas=$dado7;
        $this->precoDia=$dado8;
        $this->descricao=$dado9;
        $this->foto=$dado10;
    }

    public function create()
    {
        Categoria_VeículoDal::create($this);
    }

    public function update()
    {
        Categoria_VeículoDal::update($this);
    }

    public function delete()
    {
        Categoria_VeículoDal::delete($this);
    }

    //not updated
    public function getAll()
    {
        $res = Categoria_Veículo::getAll($this);
        return($res);
    }

    //not updated
    public function getByMarca($marcaDoVeiculo)
    {
        $res = Categoria_VeículoDal::getByMarca($marcaDoVeiculo);
        return($res);
    }
}