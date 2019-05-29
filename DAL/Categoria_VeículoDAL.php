<?php
require_once dirname(__FILE__).'DBconnection.php';
//require_once dirname(__FILE__).'../BL/Categoria_Veículo.php';


/**
 * Created by PhpStorm.
 * User: ASUS F555B
 * Date: 5/10/2019
 * Time: 4:06 PM
 */

class Categoria_VeículoDAL
{
    public static function create($e){

        $conn= DBconnection::connect();
        $sql= "INSERT INTO Categoria_Veículo (idCategoria_Veiculo, marca, modelo, combustivel, transmissao, capacidade,
                numeroPorta, precoDia)
               values (?,?,?,?,?,?,?,?)";
        $q=$conn->prepare($sql);
        $q->execute(array($e->idCategoria_Veiculo,$e->marca,$e->modelo,$e->combustivel,$e->transmissao,$e->capacidade,
            $e-> numeroPorta, $e-> precoDia));
        if($q->rowCount()>0){
            $sql= "Select * FROM Categoria_Veículo WHERE idCategoria_Veiculo=(SELECT MAX(idCategoria_Veiculo) FROM Categoria_Veículo)";
            $q=$conn->prepare($sql);
            $q->execute();
            if($q->rowCount()>0){
                $row=$q->fetch();
                return $row['idCategoria_Veiculo'];
            }
        }else
            return -1;
    }

    public static function update($e){
        $conn= DBConnection::connect();
        $sql='UPDATE Categoria_Veículo SET marca = :marca, modelo = :modelo, combustivel = :combustivel,
                transmissao = :transmissao, capacidade = :capacidade, numeroPorta = :numeroPorta, precoDia = :precoDia, descricao = :descricao WHERE idCategoria_Veiculo= ?';
        $result=$conn->prepare($sql);
        $result->execute(Array($e->marca,$e->modelo, $e->combustivel, $e->transmissao, $e->capacidade, $e->numeroPorta, $e->precoDia));
        if($result->rowCount()>0)
            echo "Alteracao feita com sucesso!". "<br>";
        else
            echo "Erro" . "<br>";
    }

    public static function delete($e){
        $conn= DBConnection::connect();
        $sql="DELETE FROM Categoria_Veículo WHERE idCategoria_Veiculo = ?";
        $q=$conn->prepare($sql);
        $q->execute(Array($e->idCategoria_Veiculo));
        DBConnection::disconnect();
    }
}