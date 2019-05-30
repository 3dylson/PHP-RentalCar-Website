<?php

require_once dirname(__FILE__).'DBconnection.php';
//require_once dirname(__FILE__).'../BL/Seguro.php';
/**
 * Created by PhpStorm.
 * User: ASUS F555B
 * Date: 5/10/2019
 * Time: 4:07 PM
 */

class SeguroDAL
{
    static public function create($e){
        $conn= DBConnection::connect();
        $sql= "INSERT INTO Seguro (idSeguro,Nome,TipoDeCobertura,Descricao,Custo,Reserva_idReserva) values (?,?,?,?,?,?)";
        $q=$conn->prepare($sql);
        $q->execute(array($e->idSeguro,$e->Nome,$e->TipoDeCobertura,$e->Descricao,$e->Custo,$e->Reserva_idReserva));
        DBConnection::disconnect();

    }
    static public function delete($e){
        $conn= DBConnection::connect();
        $sql="DELETE FROM Seguro WHERE idSeguro = ?";
        $q=$conn->prepare($sql);
        $q->execute(Array($e->idSeguro));
        DBConnection::disconnect();
    }
    static public function mostrarSeguros(){
        $conn= DBConnection::connect();
        $sql="Select * FROM Seguro";
        $result=$conn->prepare($sql);
        $result->execute();
        DBConnection::disconnect();
    }

    public function update($e){
        $conn= DBConnection::connect();
        $sql='UPDATE Seguro SET Nome = ? WHERE idSeguro= ?';
        $result=$conn->prepare($sql);
        $result->execute(Array($e->Nome,$e->idSeguro));
        DBConnection::disconnect();
        if($result->rowCount()>0)
            echo "Alteracao feita com sucesso!". "<br>";
        else
            echo "Erro" . "<br>";

    }
}