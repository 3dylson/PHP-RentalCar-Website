<?php
require_once dirname(__FILE__).'../BL/Categoria_Veículo.php';

class Categoria_VeículoController
{
    static public function Process()
    {
        if (isset($_POST['SubmitCategoria'])) {
            if (!isset($_POST['Veículo'])) {
                $msg["estado"] = '';
            } elseif (!isset($_POST['Categoria'])) {
                $msg["estado"] = '';
            } elseif (!isset($_POST['marca'])) {
                $msg["estado"] = '';
            } elseif (!isset($_POST['Modelo'])) {
                $msg["estado"] = '';
            } elseif (!isset($_POST['Combustível'])) {
                $msg["estado"] = '';
            } elseif (!isset($_POST['Transmissão'])) {
                $msg["estado"] = '';
            } elseif (!isset($_POST['Capacidade'])) {
                $msg["estado"] = '';
            } elseif (!isset($_POST['NumerosPortas'])) {
                $msg["estado"] = '';
            } elseif (!isset($_POST['Preço'])) {
                $msg["estado"] = '';
            }
            else {
                self::submitcategoria();
                $msg["estado"] = 'Criado Com Sucesso!';
            }
            return $msg["estado"];
        }
    }

    static public function submitcategoria()
    {
        $submit = new Categoria_Veículo('', $_POST['marca'], $_POST['modelo'], $_POST['combustivel'],
            $_POST['transmissao'], $_POST['capacidade'], $_POST['NumerosPortas'], $_POST['precoDia']);
        $submit->create();
    }
}