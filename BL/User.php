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
    public function verificarnif(){
       $res=UserDAL:: verificarnif($this);
        return($res);
    }
    public function readByLogin1(){
        $res=UserDAL::readByLogin1($this);
        return($res);
    }
    public function typeofuser(){
        $res=UserDAL::typeofuser($this);
        return($res);
    }
    public function readByLogin(){
        $res=UserDAL::readByLogin($this);
        return($res);
    }
    public function getInformUser(){
        $res=UserDAL::getInformUser($this);
        return($res);
    }
    public function readyByfirstname(){
        $res=UserDAL::readyByfirstname($this);
        return($res);
    }
    public function readByPass(){
        $res=UserDAL::readyByPass($this);
        return($res);
    }
    public function changedPass(){
        $res=UserDAL::changedPass($this);
        return($res);
    }
    public function copy($objeto) {
        foreach ($this as $key => $value) {
            $this->$key=$objeto->$key;
        }
    }
}