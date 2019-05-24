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
        $this->nome_login=$dado2;
        $this->nome=$dado3;
        $this->email=$dado4;
        $this->dataNascimento=$dado5;
        $this->password=$dado6;
        $this->passwordConfirmated=$dado7;
        $this->nif=$dado8;
        $this->admin=$dado9;



    }
    public function create(){
        UserDAL::create($this);

    }
    public function delete(){
        UserDAL::delete($this);
    }
    static public function mostrarUsers(){
        UserDAL::mostrarUsers();
    }

    public function update(){
        UserDAL::update($this);
    }

    public function verificarnif(){
        return UserDAL::verificarnif($this);
    }
    public function typeofuser(){
        return UserDAL::typeofuser($this);
    }

    public function verificarlogin(){
        return UserDAL::verificarlogin($this);
    }
    static public function getInformUser(){
        return UserDAL::getInformUser();
    }
    public function verificarlogin1(){
        return UserDAL::verificarlogin1($this);
    }
    public static function verificarPrimeiroUtilizador(){
        return UserDAL::verificarPrimeiroUtilizador();
    }
    static public function verificarPass(){
        return UserDAL::verificarPass();
    }
    static public function alterarPass(){
        UserDAL::alterarPass();
    }

   /* public function readByLoginAndPassword(){
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

    public function getByName($nome) {
        $res = UserDAL::getByName($nome);
        return($res);
    }*/
}