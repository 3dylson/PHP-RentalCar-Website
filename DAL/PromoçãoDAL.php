<?php
/**
 * Created by PhpStorm.
 * User: ASUS F555B
 * Date: 5/10/2019
 * Time: 4:06 PM
 */

class PromoçãoDAL
{
    public static function create($Promoção){

        $db=DB::getInstance();

        $query = "INSERT INTO Promoção (Nome, DataDeValidade, PercentagemDeDesconto) 
VALUES (:Nome, :DataDeValidade, :PercentagemDeDesconto)";
        $res=$db->query($query, array(':Nome'=> $Promoção->Nome,
            'DataDeValidade'=> $Promoção->DataDeValidade, 'PercentagemDeDesconto'=> $Promoção->PercentagemDeDesconto));

        if($res){
            $Promoção->idPromoção=$db->lastInsertId();
        }
        return $res;
    }

    public static function update($Promoção){

        $db=DB::getInstance();

        $query = "UPDATE Promoção SET Nome = :Nome, DataDeValidade = :DataDeValidade, 
PercentagemDeDesconto=:PercentagemDeDesconto";
        $res=$db->query($query, array(':Nome'=> $Promoção->Nome,
            'DataDeValidade'=> $Promoção->DataDeValidade, 'PercentagemDeDesconto'=> $Promoção->PercentagemDeDesconto));

        if($res){
            $Promoção->idPromoção=$db->lastInsertId();
        }
        return $res;
    }

    public static function delete($id){

        $db=DB::getInstance();

        $query = "DELETE FROM Promoção WHERE idPromoção = ':idPromoção'";
        $res=$db->query($query, array(':idPromoção'=> $id));

        return $res;
    }

    public static function getAll(){

        $db=DB::getInstance();

        $query = "SELECT * FROM Promoção";
        $res=$db->query($query);
        $res->setFetchMode( PDO::FETCH_CLASS, "Promoção");
        return $res;
    }

}