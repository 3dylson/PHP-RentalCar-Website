<?php
/**
 * Created by PhpStorm.
 * User: ASUS F555B
 * Date: 5/10/2019
 * Time: 4:07 PM
 */

class UtilizadorDal
{
    public static function create($Utilizador){

        $db=DB::getInstance();

        $query = "INSERT INTO Utilizador (nome, email, dataNascimento, password, passwordConfirmed, nif, admin) 
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

        $query = "UPDATE Utilizador SET VALUES (nome = :nome, email = :email, dataNascimento = :dataNascimento, password = :password, passwordConfirmed = :passwordConfirmed, nif = :nif, admin = :admin)";
        $res=$db->query($query, array(':nome'=> $Utilizador->nome,
            'email'=> $Utilizador->email, 'dataNascimento'=> $Utilizador->dataNascimento, 'password'=> $Utilizador->password, 'passwordConfirmed'=> $Utilizador->passwordConfirmed, 'nif'=> $Utilizador->nif, 'admin'=> $Utilizador->admin));

        if($res){
            $Utilizador->idUtilizador=$db->lastInsertId();
        }
        return $res;
    }

    public static function delete($id){

        $db=DB::getInstance();

        $query = "DELETE FROM Utilizador WHERE idUtilizador = ':idUtilizador'";
        $res=$db->query($query, array(':idUtilizador'=> $id));

        return $res;
    }

    public static function getAll(){

        $db=DB::getInstance();

        $query = "SELECT * FROM Utilizador";
        $res=$db->query($query);
        $res->setFetchMode( PDO::FETCH_CLASS, "Utilizador");
        return $res;
    }
}