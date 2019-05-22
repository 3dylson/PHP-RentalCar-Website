<?php
require_once dirname(__FILE__).'/DBConnection.php';
/*
 * Created by PhpStorm.
 * User: ASUS F555B
 * Date: 5/10/2019
 * Time: 4:08 PM
 */

class VeículoDAL
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
    static public function getVeiculoInfo(){

        $conn= DBConnection::connect();
        $sql="Select * FROM Veículo WHERE ID=?";
        $result=$conn->prepare($sql);
        $result->execute(Array($_GET['idVeículo']));
        DBConnection::disconnect();
        $row=$result->fetch();
        return $row;

    }
    static public function checkDisponibilidade(){

        $conn= DBConnection::connect();
        $sql="Select * FROM Veículo WHERE ID=?";
        $result=$conn->prepare($sql);
        $result->execute(Array($_GET['idVeículo']));
        $row=$result->fetch();
        if(isset($row['Reserva_ID'])){
            return false;
        }else{
            return true;
        }
    }
    static public function changeOcup($q){
        $conn= DBConnection::connect();
        $sql='UPDATE Veículo SET Reserva_ID = ? WHERE ID= ?';
        $result=$conn->prepare($sql);
        $result->execute(Array($q,$_GET['idVeículo']));
        DBConnection::disconnect();
    }
    static public function ChangeVeículoFree(){
        $conn= DBConnection::connect();
        $sql='SELECT * FROM Veículo WHERE Reserva_ID=?';
        $result=$conn->prepare($sql);
        $result->execute(Array($_GET['cancelreserva']));
        if($result->rowCount()>0){

            $row=$result->fetch();
            $sql='UPDATE Veiculo Set Reserva_ID=NULL WHERE ID=?';
            $result=$conn->prepare($sql);
            $result->execute(Array($row['ID']));
            return true;
        }else
            return false;

    }
}