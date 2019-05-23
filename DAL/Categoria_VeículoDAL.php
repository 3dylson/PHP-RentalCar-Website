<?php
require_once dirname(__FILE__).'DBconnection.php';
require_once dirname(__FILE__).'../BL/Categoria_Veículo.php';


/**
 * Created by PhpStorm.
 * User: ASUS F555B
 * Date: 5/10/2019
 * Time: 4:06 PM
 */

class Categoria_VeículoDAL
{
    public static function create($e){

        $conn= DBConnection::connect();
        $sql= "INSERT INTO Categoria_Veículo (id, marca, modelo, combustivel, transmicao, capacidade, numeroPorta, precoDia, descricao, foto)
               values (?,?,?,?,?,?,?)";
        $q=$conn->prepare($sql);
        $q->execute(array($e->id,$e->marca,$e->modelo,$e->combustivel,$e->transmicao,$e->capacidade,$e-> numeroPorta, $e-> precoDia, $e-> descricao, $e-> foto));
        if($q->rowCount()>0){
            $sql= "Select * FROM Categoria_Veículo WHERE ID=(SELECT MAX(ID) FROM Categoria_Veículo)";
            $q=$conn->prepare($sql);
            $q->execute();
            if($q->rowCount()>0){
                $row=$q->fetch();
                return $row['ID'];
            }
        }else
            return -1;
    }

    public static function update($e){

        $conn= DBConnection::connect();
        $sql='UPDATE Categoria_Veículo SET marca = :marca, modelo = :modelo, combustivel = :combustivel, transmicao = :transmicao, capacidade = :capacidade, numeroPorta = :numeroPorta, precoDia = :precoDia, descricao = :descricao, foto = :foto WHERE ID= ?';
        $result=$conn->prepare($sql);
        $result->execute(Array($e->marca,$e->modelo, $e->combustivel, $e->transmicao, $e->capacidade, $e->numeroPorta, $e->precoDia, $e->descricao, $e->foto));
        if($result->rowCount()>0)
            echo "Alteracao feita com sucesso!". "<br>";
        else
            echo "Erro" . "<br>";
    }

    public static function delete($e){

        $conn= DBConnection::connect();
        $sql="DELETE FROM Reserva WHERE ID = ?";
        $q=$conn->prepare($sql);
        $q->execute(Array($e->id));
        DBConnection::disconnect();
    }
}