<?php
/*
 * Apenas métodos estáticos
 */
require_once dirname(__FILE__).'DBconnection.php';
//require_once dirname(__FILE__).'/../BL/Reserva.php';

class ReservaDAL
{
    static public function create($e){
        $conn= DBConnection::connect();
        $sql= "INSERT INTO Reserva (idReserva,DatadaReserva,DatadeDevolucao,LocalPickUp,LocalDropOff,Cliente_idCliente,Promocao_idPromocao) values (?,?,?,?,?,?,?)";
        $q=$conn->prepare($sql);
        $q->execute(array($e->idReserva,$e->DatadaReserva,$e->DatadeDevolucao,$e->LocalPickUp,$e->LocalDropOff,$e->Cliente_idCliente,$e->Promocao_idPromocao));
        if($q->rowCount()>0){
            $sql= "Select * FROM Reserva WHERE idReserva=(SELECT MAX(idReserva) FROM Reserva)";
            $q=$conn->prepare($sql);
            $q->execute();
            if($q->rowCount()>0){
                $row=$q->fetch();
                return $row['idReserva'];
            }
        }else
            return -1;
    }
    static public function delete($e){
        $conn= DBConnection::connect();
        $sql="DELETE FROM Reserva WHERE idReserva = ?";
        $q=$conn->prepare($sql);
        $q->execute(Array($e->idReserva));
        DBConnection::disconnect();
    }

    static public function mostrarReservas(){
        $conn= DBConnection::connect();
        $sql="Select * FROM Reserva WHERE idCliente=?";
        $result=$conn->prepare($sql);
        $result->execute(Array($_SESSION['idReserva']));
        DBConnection::disconnect();
    }
    public function update($e){
        $conn= DBConnection::connect();
        $sql='UPDATE Reserva SET DatadaReserva=? WHERE idReserva= ?';
        $result=$conn->prepare($sql);
        $result->execute(Array($$e->DatadaReserva,$$e->idReserva));
        if($result->rowCount()>0)
            echo "Alteracao feita com sucesso!". "<br>";
        else
            echo "Erro" . "<br>";

    }

}