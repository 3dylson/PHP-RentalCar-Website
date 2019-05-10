<?php
/**
 * Created by PhpStorm.
 * User: ASUS F555B
 * Date: 5/10/2019
 * Time: 4:02 PM
 */

class Utilizador
{
    public $idCliente;
    public $nome;
    public $email;
    public $dataNascimento;
    public $password;
    public $passwordConfirmated;
    public $nif;
    public $admin;

    public function copy($objeto) {
        foreach ($this as $key => $value) {
            $this->$key=$objeto->$key;
        }
    }

    public function create(){

        $res = UtilizadorDal::create($this);
        return($res);
    }

    public function update() {
        $res = UtilizadorDal::update($this);
        return($res);
    }

    public function delete() {
        $res = UtilizadorDal::delete($this);
        return($res);
    }

    public function getAll() {
        $res = UtilizadorDal::getAll($this);
        return($res);
    }

    public function getByName($nomeDoUtilizador) {
        $res = UtilizadorDal::getByName($nomeDoUtilizador);
        return($res);
    }
}