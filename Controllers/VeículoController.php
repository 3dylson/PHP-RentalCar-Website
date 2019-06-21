<?php
require_once dirname(__FILE__).'/../BL/Veículo.php';

class VeículoController
{
    static public function Process()
    {
        if (isset($_POST['Add'])) {
            $idVeiculo=$_POST['idVeiculo'];
            $NumeroDeRegistro=$_POST['NumeroDeRegistro'];
            $Disponibilidade=$_POST['Disponibilidade'];
            $Categoria_Veiculo_idCategoria_Veiculo=$_POST['Categoria_Veiculo_idCategoria_Veiculo'];
            $Reserva_idReserva=$_POST['Reserva_idReserva'];

            $image = $_FILES['image']['tmp_name'];
            $Img = addslashes(file_get_contents($image));
            $Nome=$_POST['Nome'];
            if (!$idVeiculo) {
                $msg["estado"] = 'Insira o ID de veiculo';
            }elseif (!$NumeroDeRegistro) {
                $msg["estado"] = 'Insira o n_Registro';
            }elseif (!$Disponibilidade) {
                $msg["estado"] = 'Insira a disponibilidade';
            } elseif (!$Categoria_Veiculo_idCategoria_Veiculo) {
                $msg["estado"] = 'Insira a Caegoria do Veículo';
            } elseif (!$Reserva_idReserva) {
                $msg["estado"] = 'Insira o ID Reserva';
            } elseif (!$Img) {
            $msg["estado"] = 'Insira a Imagem';
            } elseif (!$Nome) {
                $msg["estado"] = 'Insira o Nome do Veículo';
            }else {

                self::criarVeiculo();
                $msg["estado"] = 'Criado Com Sucesso!';
            }
            return $msg["estado"];
        }
        if(isset($_GET['deleteVeiculo']) && isset($_SESSION['idVeiculo'])){
            self::deleteVeiculo();
            $msg["estado"]='Eliminado!';
        }
    }
    static public function criarVeiculo()
    {
        $Veiculo = new Veículo('', $_POST['NumeroDeRegistro'], $_POST['Disponibilidade'], '', '', $_POST['Img'], $_POST['Nome'] );
        $Veiculo->create();
    }

    static public function deleteVeiculo()
    {
        $Veiculo = new Veículo($_GET['deleteVeiculo'],'','','','','','');
        $Veiculo->delete();
    }

    static public function mostrarVeiculos(){
        Veículo::mostrarVeiculos();
    }
    static public function getVeiculoInfo(){
        return Veículo::getVeiculoInfo();
    }
    static public function verificarDisponibilidade(){
        return Veículo::verificarDisponibilidade();
    }
    static public function changeDisp($q){
        Veículo::changeDisp($q);
    }
    static public function ChangeVeicToFree(){
        return Veículo::ChangeVeicToFree();
    }

    static public function mostrarVeiculosDisponiveis(){
        Veículo::mostrarVeiculosDisponiveis();
    }

    static public function mostrarNomeVeiculos(){
        Veículo::mostrarNomeVeiculos();
    }
}
