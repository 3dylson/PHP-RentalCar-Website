<?php
require_once dirname(__FILE__)."/../BL/Veículo.php";

class VeículoController
{
    static public function Process()
    {
        if (isset($_POST['idVeiculo'])) {
            if (!isset($_POST['NumeroDeRegistro'])) {
                $msg["estado"] = 'Insira o n_Registro';
            } elseif (!isset($_POST['Disponibilidade'])) {
                $msg["estado"] = 'Insira a disponibilidade';
            } else {
                self::CriarVeiclo();
                $msg["estado"] = 'Criado Com Sucesso!';
            }
            return $msg["estado"];
        }
    }
    static public function criarVeiculo()
    {
        $Veiculo = new Veículo('', $_POST['NumeroDeRegistro'], $_POST['Disponibilidade']);
        $Veiculo->create();
    }
    static public function getByDisponibilidade()
    {
        Quarto::getByDisponibilidade();
    }
    static public function checkDisponibilidade()
    {
        return Quarto::checkDisponibilidade();
    }
    static public function mostrarQuartosDisponiveis()
    {
        Quarto::mostrarQuartosDisponiveis();
    }
}
