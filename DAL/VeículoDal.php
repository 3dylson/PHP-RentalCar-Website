<?php
/**
 * Created by PhpStorm.
 * User: ASUS F555B
 * Date: 5/10/2019
 * Time: 4:08 PM
 */

class VeículoDal
{
    public static function create($Veículo){

        $db=DB::getInstance();

        $query = "INSERT INTO Veículo (NumeroDeRegistro, Disponibilidade) 
VALUES (:NumeroDeRegistro, :Disponibilidade)";
        $res=$db->query($query, array(':NumeroDeRegistro'=> $Veículo->NumeroDeRegistro,
            'Disponibilidade'=> $Veículo->Disponibilidade));

        if($res){
            $Veículo->idVeículo=$db->lastInsertId();
        }
        return $res;
    }

    public static function update($Veículo){

        $db=DB::getInstance();

        $query = "UPDATE Veículo SET NumeroDeRegistro = :NumeroDeRegistro, Disponibilidade = :Disponibilidade";
        $res=$db->query($query, array(':NumeroDeRegistro'=> $Veículo->NumeroDeRegistro,
            'Disponibilidade'=> $Veículo->Disponibilidade));

        if($res){
            $Veículo->idVeículo=$db->lastInsertId();
        }
        return $res;
    }

    public static function delete($id){

        $db=DB::getInstance();

        $query = "DELETE FROM Veículo WHERE idVeículo = ':idVeículo'";
        $res=$db->query($query, array(':idVeículo'=> $id));

        return $res;
    }

    public static function getAll(){

        $db=DB::getInstance();

        $query = "SELECT * FROM Veículo";
        $res=$db->query($query);
        $res->setFetchMode( PDO::FETCH_CLASS, "Veículo");
        return $res;
    }


}