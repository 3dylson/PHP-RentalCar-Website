<?php
require_once dirname(__FILE__)."/../BL/User.php";

class UserController
{
    public static function process(){
        if(isset($_POST['user-register'])){
            $nome_login=$_POST['nome_login'];
            $nome=$_POST['nome'];
            $email=$_POST['email'];
            $dataNascimento=$_POST['dataNascimento'];
            $password=$_POST['password'];
            $passwordConfirmated=$_POST['passwordConfirmated'];
            $nif=$_POST['nif'];
            if(!$nome_login){
                $msg["estado"]='Insira o seu Username.';
            }elseif (!$nome) {
                $msg["estado"]='Insira o Nome';
            }elseif(!$email){
                $msg["estado"]='Insira um Email.';
            }elseif(!$dataNascimento){
                $msg["estado"]='Insira a data do seu Nascimento.';
            } elseif (!$password) {
                $msg["estado"]='Insira uma password.';
            }elseif (self::verificarnif($nif)) {
                $msg["estado"]='O nif ja existe!';
            }elseif(self::verificarlogin1($nome_login)){
                $msg["estado"]='Já existe um usuario com este login!';
            }
            elseif(is_int($nome)){
                $msg["estado"]='Insira um nome valido';
            }elseif($password!=$passwordConfirmated){
                $msg["estado"]='As password não coincidem!';
            }else{
                self::createUser();
                $msg["estado"]='Cadastro Efectuado Com Sucesso!';
            }
            return  $msg["estado"];
        }


        if(isset($_POST['log'])){
            self::verificarlogin();
            if(isset($_SESSION['ID']) && $_SESSION['ID']>0){
                header('Location: ./Home.php');
                //unset($_GET['page']);
            }
        }



    }


    public static function createUser(){
        $user= new User('',$_POST['nome_login'],$_POST['nome'],$_POST['email'],$_POST['dataNascimento'],$_POST['password'],$_POST['nif'],'');
        if(isset($_SESSION['ID']) && UserController::typeofuser()){$user->usertype=1;}
        else {$user->usertype=0;}
        $user->create();
    }

    public static function createAdmin(){
        $user= new User('',$_POST['nome_login'],$_POST['nome'],$_POST['email'],$_POST['dataNascimento'],$_POST['password'],$_POST['nif'],'');
        $user->usertype='1';
        $user->create();
    }

    public static function verificarnif($nifaux){
        $user=new User();
        $user->nif=$nifaux;
        return $user->verificarnif();
    }
    public static function verificarlogin(){
        $user1=new User();
        $user1->login=$_POST['login1'];
        $user1->password=$_POST['palavra_passe'];
        if(($aux=$user1->verificarlogin())>0 || $aux==-1)
            $_SESSION['ID']=$aux;
    }
    public static function verificarlogin1($logaux){
        $user=new User();
        $user->login=$logaux;
        return $user->verificarlogin1();
    }
    public static function verificarPrimeiroUtilizador(){
        return User::verificarPrimeiroUtilizador();
    }
    public static function getInformaCliente(){
        return User::getInfofromUser();
    }

    public static function ProcessLogout(){
        if(isset($_GET['terminarSessao'])){
            $_SESSION = array();
            if (ini_get("session.use_cookies")) {
                $params = session_get_cookie_params();
                setcookie(session_name(), '', time() - 42000,
                    $params["path"], $params["domain"],
                    $params["secure"], $params["httponly"]
                );}
            session_destroy();
            //$_GET['page']='login';
            header('Location: ./Home.php');
        }
        if(isset($_POST['changepass'])){
            if(!$_POST['new_password']){
                $msg["estado"]='Insira uma nova password.';
            }elseif(self::verificarPass()!=$_POST['password_antigo']){
                $msg["estado"]='Password antigo não coincide!';
            }elseif($_POST['repeatNewPass']!=$_POST['new_password']){
                $msg["estado"]='Os Passwords não coincidem';
            }else{
                self::alterarPass();
                $msg["estado"]='Password alterado Com sucesso!';
            }
            return $msg["estado"];
        }
    }

    public static function loginverification(){
        if(isset($_SESSION['ID']))
            return true;
        else
            return false;
    }

    public static function typeofuser(){
        if(self::loginverification()){
            $user= new User($_SESSION['ID']);
            return $user->typeofuser();
        }
    }
    static public function verificarPass(){
        return User::verificarPass();
    }
    static public function alterarPass(){
        User::alterarPass();
    }
}