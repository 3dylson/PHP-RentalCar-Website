<?php
/**
 * Created by PhpStorm.
 * User: ASUS F555B
 * Date: 5/10/2019
 * Time: 4:07 PM
 */

class SeguroDAL
{
    public static function create($Seguro){

        $db=DB::getInstance();

        $query = "INSERT INTO Seguro (Nome, TipoDeCobertura, Descricao, Custo) 
VALUES (:Nome, :TipoDeCobertura, :Descricao, :Custo)";
        $res=$db->query($query, array(':idSeguro'=> $Seguro->idSeguro,
            'Nome'=> $Seguro->Nome, 'Descricao'=> $Seguro->Descricao, 'Custo'=> $Seguro->Custo));

        if($res){
            $Seguro->idSeguro=$db->lastInsertId();
        }
        return $res;
    }

    public static function update($Seguro){

        $db=DB::getInstance();

        $query = "UPDATE Seguro SET Nome = :Nome, 
TipoDeCobertura=:TipoDeCobertura, Descricao=:Descricao, Custo=:Custo";
        $res=$db->query($query, array(':idSeguro'=> $Seguro->idSeguro,
            'Nome'=> $Seguro->Nome, 'Descricao'=> $Seguro->Descricao, 'Custo'=> $Seguro->Custo));

        if($res){
            $Seguro->idSeguro=$db->lastInsertId();
        }
        return $res;
    }

    public static function delete($id){

        $db=DB::getInstance();

        $query = "DELETE FROM Seguro WHERE idSeguro = ':idSeguro'";
        $res=$db->query($query, array(':idSeguro'=> $id));

        return $res;
    }

    public static function getAll(){

        $db=DB::getInstance();

        $query = "SELECT * FROM Seguro";
        $res=$db->query($query);
        $res->setFetchMode( PDO::FETCH_CLASS, "Seguro");
        return $res;
    }
}