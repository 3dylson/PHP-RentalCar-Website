<?php
/**
 * Created by PhpStorm.
 * User: ASUS F555B
 * Date: 5/10/2019
 * Time: 4:07 PM
 */

class UserDAL
{

   public static function readByLoginAndPassword($model){
       //Conexão
       $query="SELECT * FROM utilizador WHERE login=:login AND password=:password";
       //fazer a query
       //fazer o fetch
       //$this->id = $row->id
       return($res);
   }


    public static function create($Utilizador){

        $db=DB::getInstance();

        $query = "INSERT INTO User (nome, email, dataNascimento, password, passwordConfirmed, nif, admin) 
VALUES (:nome, :email, :dataNascimento, :password, :passwordConfirmed, :nif, :admin)";
        $res=$db->query($query, array(':nome'=> $Utilizador->nome,
            'email'=> $Utilizador->email, 'dataNascimento'=> $Utilizador->dataNascimento, 'password'=> $Utilizador->password, 'passwordConfirmed'=> $Utilizador->passwordConfirmed, 'nif'=> $Utilizador->nif, 'admin'=> $Utilizador->admin));

        if($res){
            $Reserva->idReserva=$db->lastInsertId();
        }
        return $res;
    }

    public static function update($Utilizador){

        $db=DB::getInstance();

        $query = "UPDATE User SET VALUES (nome = :nome, email = :email, dataNascimento = :dataNascimento, password = :password, passwordConfirmed = :passwordConfirmed, nif = :nif, admin = :admin)";
        $res=$db->query($query, array(':nome'=> $Utilizador->nome,
            'email'=> $Utilizador->email, 'dataNascimento'=> $Utilizador->dataNascimento, 'password'=> $Utilizador->password, 'passwordConfirmed'=> $Utilizador->passwordConfirmed, 'nif'=> $Utilizador->nif, 'admin'=> $Utilizador->admin));

        if($res){
            $Utilizador->idUtilizador=$db->lastInsertId();
        }
        return $res;
    }

    public static function delete($id){

        $db=DB::getInstance();

        $query = "DELETE FROM User WHERE idUtilizador = ':idUtilizador'";
        $res=$db->query($query, array(':idUtilizador'=> $id));

        return $res;
    }

    public static function getAll(){

        $db=DB::getInstance();

        $query = "SELECT * FROM User";
        $res=$db->query($query);
        $res->setFetchMode( PDO::FETCH_CLASS, "User");
        return $res;
    }
}