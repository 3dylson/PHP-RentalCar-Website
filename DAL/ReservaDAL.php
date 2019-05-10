<?php
/*
 * Apenas métodos estáticos
 */

class ReservaDAL
{
    public static function create($Reserva){

        $db=DB::getInstance();

        $query = "INSERT INTO Reserva (DatadaReserva, DatadeDevolucao, LocalPickUp, LocalDropOff) 
VALUES (:DatadaReserva, :DatadeDevolucao, :LocalPickUp, :LocalDropOff)";
        $res=$db->query($query, array(':DatadaReserva'=> $Reserva->DatadaReserva,
            'DatadeDevolucao'=> $Reserva->DatadeDevolucao, 'LocalPickUp'=> $Reserva->LocalPickUp, 'LocalDropOff'=> $Reserva->LocalDropOff));

        if($res){
            $Reserva->idReserva=$db->lastInsertId();
        }
        return $res;
    }

    public static function update($Reserva){

        $db=DB::getInstance();

        $query = "UPDATE Reserva SET DatadaReserva = :DatadaReserva, DatadeDevolucao = :DatadeDevolucao, 
LocalPickUp=:LocalPickUp, LocalDropOff=:LocalDropOff";
        $res=$db->query($query, array(':DatadaReserva'=> $Reserva->DatadaReserva,
            'DatadeDevolucao'=> $Reserva->DatadeDevolucao, 'LocalPickUp'=> $Reserva->LocalPickUp, 'LocalDropOff'=> $Reserva->LocalDropOff));

        if($res){
            $Reserva->idReserva=$db->lastInsertId();
        }
        return $res;
    }

    public static function delete($id){

        $db=DB::getInstance();

        $query = "DELETE FROM Reserva WHERE idReserva = ':idReserva'";
        $res=$db->query($query, array(':idReserva'=> $id));

        return $res;
    }




}