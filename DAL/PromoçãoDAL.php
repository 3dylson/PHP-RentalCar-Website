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

        $conn= DBConnection::connect();

        $sql = "INSERT INTO Promoção (Nome, DataDeValidade, PercentagemDeDesconto) 
                  VALUES (?,?,?,?)";
        $q=$conn->prepare($sql);
        $q->execute(array($Promoção->Nome, $Promoção->DataDeValidade, $Promoção->PercentagemDeDesconto));
        DBConnection::disconnect();
    }

    public static function update($Promoção){

        $conn= DBConnection::connect();

        $sql = 'UPDATE Promoção SET PercentagemDeDesconto = ? WHERE idPromocao = ?';
        $res=$conn->prepare($sql);
        $res->execute(array($Promoção->PercentagemDeDesconto, $Promoção->idPromocao));

        if($res->rowCount()>0)
            echo "Alteracao feita com sucesso!". "<br>";
        else
            echo "Erro" . "<br>";
        DBConnection::disconnect();
    }

    public static function delete($id){
        $conn= DBConnection::connect();
        $sql="DELETE FROM Promoção WHERE idPromocao = ?";
        $q=$conn->prepare($sql);
        $q->execute(Array($id->idPromocao));
        DBConnection::disconnect();
    }

    public static function getAll(){

        $db=DB::getInstance();

        $query = "SELECT * FROM Promoção";
        $res=$db->query($query);
        $res->setFetchMode( PDO::FETCH_CLASS, "Promoção");
        return $res;
    }

}