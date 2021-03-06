<?php
require_once dirname(__FILE__).'/DBConnection.php';
require_once dirname(__FILE__).'/../BL/Veículo.php';
/*
 * Created by PhpStorm.
 * User: ASUS F555B
 * Date: 5/10/2019
 * Time: 4:08 PM
 */

class VeículoDAL
{
    static public function create($e)
    {
        $conn = DBConnection::connect();
        $sql = "INSERT INTO Veículo (idVeiculo,NumeroDeRegistro,Disponibilidade,Categoria_Veiculo_idCategoria_Veiculo,Reserva_idReserva, Img, Nome) values (?,?,?,?,?,?,?)";
        $q = $conn->prepare($sql);
        $q->execute(array($e->idVeículo, $e->NumeroDeRegistro, $e->Disponibilidade, $e->Categoria_Veiculo_idCategoria_Veiculo, $e->Reserva_idReserva, $e->Img, $e->Nome));
        DBConnection::disconnect();

    }

    static public function delete($e)
    {
        $conn = DBConnection::connect();
        $sql = "DELETE FROM Veículo WHERE idVeiculo = ?";
        $q = $conn->prepare($sql);
        $q->execute(Array($e->idVeiculo));
        DBConnection::disconnect();
    }

    static public function mostrarVeiculos()
    {
        $conn = DBConnection::connect();
        $sql = "Select * FROM Veículo, Categoria_Veículo WHERE Categoria_Veículo.idCategoria_Veiculo = Veículo.Categoria_Veiculo_idCategoria_Veiculo";
        $result = $conn->prepare($sql);
        $result->execute();
        while ($row = $result->fetch()) {
            echo
                ' <div class="col-md-3 col-sm-6">
    		<span class="thumbnail">
            <img src="data:image/jpeg;base64,' . base64_encode($row['Img']) . '" alt="card image cap" height="180" width="286"">
            <h4>' . $row["Nome"] . '</h4>
            <p style="color: black">' . $row["modelo"] . ' | ' . $row["combustivel"] . ' | ' . $row["transmissao"] . '</p>
            	<hr class="line">
      			<div class="row">
      				<div class="col-md-6 col-sm-6">
      				 <a href="./index.php?page=EscolherSeguros" target="_blank" > <button type="submit" name="" class="btn btn-info right" > Alugar!</button></a>
      				</div>
      			</div>
      		</span>
        </div>';
        }
        DBConnection::disconnect();
    }

    static public function mostrarNomeVeiculos()
    {
        $conn = DBConnection::connect();
        $sql = "Select Nome FROM Veículo";
        $result = $conn->prepare($sql);
        $result->execute();
        if($result->rowCount()>0){
            $row=$result->fetch();
            return $row;
        }
    }

    public function update($e)
    {
        $conn = DBConnection::connect();
        $sql = 'UPDATE Veículo SET NumeroDeRegistro = ? WHERE idVeiculo= ?';
        $result = $conn->prepare($sql);
        $result->execute(Array($e->NumeroDeRegistro, $e->idVeiculo));
        DBConnection::disconnect();
        if ($result->rowCount() > 0)
            echo "Alteracao feita com sucesso!" . "<br>";
        else
            echo "Erro" . "<br>";

    }

    static public function getVeiculoInfo()
    {

        $conn = DBConnection::connect();
        $sql = "Select * FROM Veículo WHERE idVeiculo=?";
        $result = $conn->prepare($sql);
        $result->execute(Array($_GET['idVeiculo']));
        DBConnection::disconnect();
        $row = $result->fetch();
        return $row;

    }

    static public function verificarDisponibilidade()
    {

        $conn = DBConnection::connect();
        $sql = "Select * FROM Veículo WHERE idVeiculo=?";
        $result = $conn->prepare($sql);
        $result->execute(Array($_GET['idVeiculo']));
        $row = $result->fetch();
        if (isset($row['Reserva_idReserva'])) {
            return false;
        } else {
            return true;
        }
    }

    static public function changeDisp($q)
    {
        $conn = DBConnection::connect();
        $sql = 'UPDATE Veículo SET Reserva_idReserva = ? WHERE idVeiculo= ?';
        $result = $conn->prepare($sql);
        $result->execute(Array($q, $_GET['idVeiculo']));
        DBConnection::disconnect();
    }

    static public function ChangeVeicToFree()
    {
        $conn = DBConnection::connect();
        $sql = 'SELECT * FROM Veículo WHERE Reserva_idReserva=?';
        $result = $conn->prepare($sql);
        $result->execute(Array($_GET['Indisponível']));
        if ($result->rowCount() > 0) {

            $row = $result->fetch();
            $sql = 'UPDATE Veículo Set Reserva_idReserva=NULL WHERE idVeiculo=?';
            $result = $conn->prepare($sql);
            $result->execute(Array($row['idVeiculo']));
            return true;
        } else
            return false;

    }

    static public function mostrarVeiculosDisponiveis()
    {
        $conn = DBConnection::connect();
        $sql = "Select * FROM Veículo, Categoria_Veículo  /*LEFT JOIN reserva r ON v.idVeiculo=r.ReservaIdVeiculo WHERE r.id IS NULL;*/";
        $result = $conn->prepare($sql);
        $result->execute();
        /*$aux = 1;*/
        if ($result->rowCount() > 0) {
            while ($row = $result->fetch()) {
               echo '<div class="card" style="width: 18rem;">
                        <img class="card-img-top" src="data:image/jpeg;base64,' . base64_encode($row['Img']) .' "height="180" width="286" alt="Card image cap"">
                            <div class="card-body">
                                <strong  class="card-title">'.$row["Nome"].'</strong>
                                <p class="card-text">'.$row["modelo"].' | '.$row["marca"].' | '.$row["combustivel"].' 
                                | '.$row["transmissao"].' | '.$row["capacidade"].' Lugares | '.$row["numeroPortas"].' Portas | '.$row["precodia"].'€</p>
                                <form method="post"> 
                                <input style="padding: 10px" type="submit" name="deleteVeiculo" class="btn btn-danger" value="Remover"></input>
                                </form>
                            </div>  
                      </div>
                      ';





                /*if(!isset($row['Reserva_idReserva']) && $aux==1){
                    if(isset($Veiculo)) echo '<img src="' . $Veiculo['Img'] . '" alt="card image cap" height="180" width="286""></img> <tr> <td class="lt">Nome</td> ';
//                    echo '<tr> <td class="lt">Nome</td>';
                    $aux=0;
                }
                if(!isset($row['Reserva_idReserva'])){
                    echo  '<tr> <td>' .$row['Nome'] .' </td><td><a href=./index.php?page=EscolherSeguros'.$row['idVeiculo'].'>Alugar!</a></td></tr>';
                    $aux=-1;
                }

            }
        }if($aux!=-1){
            echo '<tr> <td>Sem Veículos Disponiveis!</td></tr>';
        }*/

            }
        }

    }
}