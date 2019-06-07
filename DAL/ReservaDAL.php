<?php
/*
 * Apenas métodos estáticos
 */
require_once dirname(__FILE__).'/DBconnection.php';
require_once dirname(__FILE__).'/../BL/Reserva.php';

class ReservaDAL
{
    static public function create($e){
        $conn= DBConnection::connect();
        $sql= "INSERT INTO Reserva (idReserva,DatadaReserva,DatadeDevolucao,LocalPickUp,LocalDropOff,Cliente_idCliente,Promocao_idPromocao) values (?,?,?,?,?,?,?)";
        $q=$conn->prepare($sql);
        $q->execute(array($e->idReserva,$e->DatadaReserva,$e->DatadeDevolucao,$e->LocalPickUp,$e->LocalDropOff,$e->Cliente_idCliente=$_SESSION['idCliente'],$e->Promocao_idPromocao));
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
        $sql="Select * FROM Reserva, Veículo, Utilizador WHERE Cliente_idCliente=?";
        $result=$conn->prepare($sql);
        $result->execute(Array($_SESSION['idCliente']));

        while ($row = $result->fetch()) {
            echo '<div class="container">
                <div class="row">
                    <img src="data:image/jpeg;base64,' . base64_encode($row['Img']) . '" alt="card image cap" height="180" width="286"">
                        <div class="col-sm">
                            <p id="Ady">Nome Cliente: &#160 ' . $row["nome"] . ' </pid>
                            <p id="Ady">Modelo: &#160     ' . $row["Nome"] . '</p>
                            <p id="Ady">Levantamento:  &#160 ' . $row["LocalPickUp"] . ',&#160 ' . $row["DatadaReserva"] . '</p>
                            <p id="Ady">Devolução:  &#160   ' . $row["LocalDropOff"] . ',&#160 ' . $row["DatadeDevolucao"] . ' </p>
                 </div>
                </div>
            </div>';
        }
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