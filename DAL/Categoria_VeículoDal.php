<?php
/**
 * Created by PhpStorm.
 * User: ASUS F555B
 * Date: 5/10/2019
 * Time: 4:06 PM
 */

class Categoria_VeículoDal
{
    public static function create($Categoria_Veículo){

        $db=DB::getInstance();

        $query = "INSERT INTO Categoria_Veículo (marca, modelo, combustivel, transmicao, capacidade, numeroPorta, precoDia, descricao, foto) 
VALUES (:marca, :modelo, :combustivel, :transmicao, :capacidade, :numeroPorta, :precoDia, :descricao, :foto)";
        $res=$db->query($query, array(':marca'=> $Categoria_Veículo->marca,
            'modelo'=> $Categoria_Veículo->modelo, 'combustivel'=> $Categoria_Veículo->combustivel, 'transmicao'=> $Categoria_Veículo->transmicao, 'capacidade'=> $Categoria_Veículo->capacidade, 'numeroPorta'=> $Categoria_Veículo->numeroPorta, 'precoDia'=> $Categoria_Veículo->precoDia, 'descricao'=> $Categoria_Veículo->descricao, 'foto'=> $Categoria_Veículo->foto));

        if($res){
            $Categoria_Veículo->idCategoria_Veículo=$db->lastInsertId();
        }
        return $res;
    }

    public static function update($Categoria_Veículo){

        $db=DB::getInstance();

        $query = "UPDATE Categoria_Veículo SET marca = :marca, modelo = :modelo, combustivel = :combustivel, transmicao = :transmicao, capacidade = :capacidade, numeroPorta = :numeroPorta, precoDia = :precoDia, descricao = :descricao, foto = :foto";
        $res=$db->query($query, array(':marca'=> $Categoria_Veículo->marca,
            'modelo'=> $Categoria_Veículo->modelo, 'combustivel'=> $Categoria_Veículo->combustivel, 'transmicao'=> $Categoria_Veículo->transmicao, 'capacidade'=> $Categoria_Veículo->capacidade, 'numeroPorta'=> $Categoria_Veículo->numeroPorta, 'precoDia'=> $Categoria_Veículo->precoDia, 'descricao'=> $Categoria_Veículo->descricao, 'foto'=> $Categoria_Veículo->foto));

        if($res){
            $Categoria_Veículo->idCategoria_Veículo=$db->lastInsertId();
        }
        return $res;
    }

    public static function delete($id){

        $db=DB::getInstance();

        $query = "DELETE FROM Reserva WHERE idCategoria_Veículo = ':idCategoria_Veículo'";
        $res=$db->query($query, array(':idCategoria_Veículo'=> $id));

        return $res;
    }

    public static function getAll(){

        $db=DB::getInstance();

        $query = "SELECT * FROM Categoria_Veículo";
        $res=$db->query($query);
        $res->setFetchMode( PDO::FETCH_CLASS, "Categoria_Veículo");
        return $res;
    }
}