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
    static public function create($e){
        $conn= DBConnection::connect();
        $sql= "INSERT INTO Veículo (idVeiculo,NumeroDeRegistro,Disponibilidade,Categoria_Veiculo_idCategoria_Veiculo,Reserva_idReserva, Img) values (?,?,?,?,?,?)";
        $q=$conn->prepare($sql);
        $q->execute(array($e->idVeículo,$e->NumeroDeRegistro,$e->Disponibilidade,$e->Categoria_Veiculo_idCategoria_Veiculo,$e->Reserva_idReserva, $e->Img));
        DBConnection::disconnect();

    }
    static public function delete($e){
        $conn= DBConnection::connect();
        $sql="DELETE FROM Veículo WHERE idVeiculo = ?";
        $q=$conn->prepare($sql);
        $q->execute(Array($e->idVeiculo));
        DBConnection::disconnect();
    }
    static public function mostrarVeiculos(){
        $conn= DBConnection::connect();
        $sql="Select * FROM Veículos";
        $result=$conn->prepare($sql);
        $result->execute();
        DBConnection::disconnect();
    }

    public function update($e){
        $conn= DBConnection::connect();
        $sql='UPDATE Veículo SET NumeroDeRegistro = ? WHERE idVeiculo= ?';
        $result=$conn->prepare($sql);
        $result->execute(Array($e->NumeroDeRegistro,$e->idVeiculo));
        DBConnection::disconnect();
        if($result->rowCount()>0)
            echo "Alteracao feita com sucesso!". "<br>";
        else
            echo "Erro" . "<br>";

    }
    static public function getVeiculoInfo(){

        $conn= DBConnection::connect();
        $sql="Select * FROM Veículo WHERE idVeiculo=?";
        $result=$conn->prepare($sql);
        $result->execute(Array($_GET['idVeiculo']));
        DBConnection::disconnect();
        $row=$result->fetch();
        return $row;

    }
    static public function verificarDisponibilidade(){

        $conn= DBConnection::connect();
        $sql="Select * FROM Veículo WHERE idVeiculo=?";
        $result=$conn->prepare($sql);
        $result->execute(Array($_GET['idVeiculo']));
        $row=$result->fetch();
        if(isset($row['Reserva_idReserva'])){
            return false;
        }else{
            return true;
        }
    }
    static public function changeDisp($q){
        $conn= DBConnection::connect();
        $sql='UPDATE Veículo SET Reserva_idReserva = ? WHERE idVeiculo= ?';
        $result=$conn->prepare($sql);
        $result->execute(Array($q,$_GET['idVeiculo']));
        DBConnection::disconnect();
    }
    static public function ChangeVeicToFree(){
        $conn= DBConnection::connect();
        $sql='SELECT * FROM Veículo WHERE Reserva_idReserva=?';
        $result=$conn->prepare($sql);
        $result->execute(Array($_GET['Indisponível']));
        if($result->rowCount()>0){

            $row=$result->fetch();
            $sql='UPDATE Veículo Set Reserva_idReserva=NULL WHERE idVeiculo=?';
            $result=$conn->prepare($sql);
            $result->execute(Array($row['idVeiculo']));
            return true;
        }else
            return false;

    }


}