<?php

require_once dirname(__FILE__).'/DBconnection.php';
require_once dirname(__FILE__).'/../BL/Seguro.php';
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
        $q->execute(array($e->idSeguro,$e->Nome,$e->TipoDeCobertura,$e->Descricao,$e->Custo,$e->Reserva_idReserva=$_SESSION['idReserva']));
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
        $sql="Select * FROM  Seguro, Veículo, Categoria_Veículo, Reserva  WHERE Resreva.Reserva_idReserva= Seguro.Reserva_idReserva ";
        $result=$conn->prepare($sql);
        $result->execute(Array($_GET['Reserva_idReserva']));
        while ($row = $result->fetch()) {

            echo'

            <h2> '.$row["Nome"].'</h2>
            <img src="data:image/jpeg;base64,' . base64_encode($row['Img']) . '" alt="card image cap" height="180" width="286"">
            <p style="color: black">' . $row["modelo"] . ' | ' . $row["combustivel"] . ' | ' . $row["transmissao"] . '</p>
            <form method="post">
                <a class="nav-link active" href="./index.php?page=PagamentoConclusao">
                    <button class="btn btn-success" type="submit" name="Reservar" ><span class="glyphicon glyphicon-euro"> Pagamento! </span></button></a>
            </form>

         <strong style="margin-left: 10px"> Preço: '.$row["precoDia"].'</strong>
            <br>
            <a class="nav-link active" href="./index.php?page=EscolherVeiculo">
                <button class="btn btn-primary"><span class="glyphicon glyphicon-search"></span> Escolher outro Veículo.</button></a>
            <hr class="d-sm-none">
        </div>';
        }
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