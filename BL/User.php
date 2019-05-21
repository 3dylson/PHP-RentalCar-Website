<?php


/**
 * Created by PhpStorm.
 * User: ASUS F555B
 * Date: 5/10/2019
 * Time: 4:02 PM
 */

class User
{
    public $idCliente;
    public $nome;
    public $email;
    public $dataNascimento;
    public $password;
    public $passwordConfirmated;
    public $nif;
    public $admin;


    public function readByLoginAndPassword(){
        return(UserDAL::readByLoginAndPassword($this));
    }

    public function copy($objeto) {
        foreach ($this as $key => $value) {
            $this->$key=$objeto->$key;
        }
    }

    public function create(){

        $res = UserDAL::create($this);
        return($res);
    }

    public function update() {
        $res = UserDAL::update($this);
        return($res);
    }

    public function delete() {
        $res = UserDAL::delete($this);
        return($res);
    }

    public function getAll() {
        $res = UserDAL::getAll($this);
        return($res);
    }

    public function getByName($nomeDoUtilizador) {
        $res = UserDAL::getByName($nomeDoUtilizador);
        return($res);
    }
}