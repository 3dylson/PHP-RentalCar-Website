<?php
require_once $_SERVER['DOCUMENT_ROOT']. 'BL/Categoria_Veículo.php';


class Categoria_VeículoController
{
    static public function process()
    {
        if (isset($_POST['SubmitCategoria'])) {
            $marca=$_POST['marca'];
            $modelo=$_POST['modelo'];
            $combustivel=$_POST['combustivel'];
            $transmissao=$_POST['transmissao'];
            $capacidade=$_POST['capacidade'];
            $numeroPortas=$_POST['numeroPortas'];
            $precoDia=$_POST['precoDia'];
            if (!$marca) {
                $msg["estado"] = '';
            } elseif (!$modelo) {
                $msg["estado"] = '';
            } elseif (!$combustivel) {
                $msg["estado"] = '';
            } elseif (!$transmissao) {
                $msg["estado"] = '';
            } elseif (!$capacidade) {
                $msg["estado"] = '';
            } elseif (!$numeroPortas) {
                $msg["estado"] = '';
            } elseif (!$precoDia) {
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
            $_POST['transmissao'], $_POST['capacidade'], $_POST['numeroPortas'], $_POST['precoDia']);
        $submit->create();
    }
}