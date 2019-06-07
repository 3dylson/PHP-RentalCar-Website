<?php
require_once dirname(__FILE__).'/DBconnection.php';
require_once dirname(__FILE__).'/../BL/Promoção.php';


/**
 * Created by PhpStorm.
 * User: ASUS F555B
 * Date: 5/10/2019
 * Time: 4:06 PM
 */

class PromoçãoDAL
{

    static public function create($e){
            $conn= DBConnection::connect();
            $sql= "INSERT INTO Promoção (idPromocao,Nome,DataDeValidade,PercentagemDeDesconto) values (?,?,?,?)";
            $q=$conn->prepare($sql);
            $q->execute(array($e->idPromocao,$e->Nome,$e->DataDeValidade,$e->PercentagemDeDesconto));
            DBConnection::disconnect();
    }

    static public function delete($e){
        $conn= DBConnection::connect();
        $sql="DELETE FROM Promoção WHERE idPromocao = ?";
        $q=$conn->prepare($sql);
        $q->execute(Array($e->idPromocao));
        DBConnection::disconnect();
    }

    static public function mostrarPromocoes(){
        $conn= DBConnection::connect();
        $sql='Select * FROM Promoção';
        $result=$conn->prepare($sql);
        $result->execute();
        if($result->rowCount()>0)
            while($row=$result->fetch()){
//                $DataDeValidade=new DateTime($row["DataDeValidade"]);
               echo' <tr>
                                    <td>'. $row["Nome"].'</td>
//                                    <td>'. $row["DataDeValidade."].'</td>
                                    <td>'. $row["PercentagemDeDesconto"].'</td>
                                </tr>';
        }

        else
            echo '0 results'. "<br>";
        DBConnection::disconnect();
    }
    static public function mostrarPromocoesAdmin(){
        $conn= DBConnection::connect();
        $sql="Select * FROM PROMOÇÃOATUAL";
        $result=$conn->prepare($sql);
        $result->execute();
        if($result->rowCount()>0)
            while($row=$result->fetch()){
                $DataDeValidade=new DateTime($row["DataDeValidade"]);
                echo "Nome: " . $row["Nome"]. "  Data De Validade: " . $DataDeValidade->format('d-M-Y') .  "<br>";
            }
        else
            echo '0 results'. "<br>";
        DBConnection::disconnect();
    }

    public function update($e){
        $conn= DBConnection::connect();
        $sql='UPDATE Promoção SET Nome = ? WHERE idPromocao= ?';
        $result=$conn->prepare($sql);
        $result->execute(Array($e->Nome,$e->idPromocao));
        if($result->rowCount()>0)
            echo "Alteracao feita com sucesso!". "<br>";
        else
            echo "Erro" . "<br>";
        DBConnection::disconnect();

    }

}