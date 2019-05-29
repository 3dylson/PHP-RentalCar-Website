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
        $sql="DELETE FROM RESERVA WHERE ID = ?";
        $q=$conn->prepare($sql);
        $q->execute(Array($e->id));
        DBConnection::disconnect();
    }

    static public function mostrarReservas(){
        $conn= DBConnection::connect();
        $sql="Select * FROM RESERVA WHERE Cliente_ID=?";
        $result=$conn->prepare($sql);
        $result->execute(Array($_SESSION['ID']));
        if($result->rowCount()>0)
            while($row=$result->fetch()){
                $checkin=new DateTime($row["CheckOut"]);
                $checkout=new DateTime($row["CheckIn"]);
                echo "Data Checkin: " . $checkout->format('d-M-Y'). " - Data Checkout: " . $checkin->format('d-M-Y') .'<a href="index.php?page=ver_reservas&cancelreserva=' .$row['ID'] .'">Cancelar</a><br/>';
            }
        else
            echo '0 results'. "<br>";
        DBConnection::disconnect();
    }
    public function update($e){
        $conn= DBConnection::connect();
        $sql='UPDATE RESERVA SET CustoTotal = ? WHERE ID= ?';
        $result=$conn->prepare($sql);
        $result->execute(Array($e->CustoTotal,$e->id));
        if($result->rowCount()>0)
            echo "Alteracao feita com sucesso!". "<br>";
        else
            echo "Erro" . "<br>";

    }

}