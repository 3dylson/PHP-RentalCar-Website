<?php
require_once dirname(__FILE__).'/../DAL/UserDAL.php';

/**
 * Created by PhpStorm.
 * User: ASUS F555B
 * Date: 5/10/2019
 * Time: 4:02 PM
 */

class User
{
    public $idCliente;
    public $nome_login;
    public $nome;
    public $email;
    public $dataNascimento;
    public $password;
    public $passwordConfirmated;
    public $nif;
    public $admin;

    public function __construct($dado1,$dado2,$dado3,$dado4,$dado5,$dado6,$dado7,$dado8,$dado9){
        $this->idCliente=$dado1;
        $this->nome=$dado2;
        $this->email=$dado3;
        $this->dataNascimento=$dado4;
        $this->password=$dado5;
        $this->passwordConfirmated=$dado6;
        $this->nif=$dado7;
        $this->admin=$dado8;
        $this->nome_login=$dado9;


    }


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