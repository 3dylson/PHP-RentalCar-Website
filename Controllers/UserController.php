<?php
require_once dirname(__FILE__).'/../BL/User.php';

class UserController
{
    public static function process(){
        if(isset($_POST['user-signup'])){
            $nome_login=$_POST['nome_login'];
            $nome=$_POST['userName'];
            $email=$_POST['userEmail'];
            $dataNascimento=$_POST['dataNascimento'];
            $password=$_POST['signUp_Password'];
            $passwordConfirmated=$_POST['signUp_passwordConfirmated'];
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


        if(isset($_POST['Login'])){
            self::verificarlogin();
            if(isset($_SESSION['idCliente']) && $_SESSION['idCliente']>0){
                header('Location: ./index.php?page=Home');
                //unset($_GET['page']);
            }
        }



    }


    public static function createUser(){
        $user= new User('',$_POST['nome_login'],$_POST['userName'],$_POST['userEmail'],$_POST['dataNascimento'],
            $_POST['signUp_Password'],$_POST['signUp_passwordConfirmated'], $_POST['nif'], '');
        if(isset($_SESSION['idCliente']) && UserController::typeofuser()){$user->usertype=1;}
        else {$user->usertype=0;}
        $user->create();
    }


    public static function createAdmin(){
        $user= new User('',$_POST['nome_login'],$_POST['userName'],$_POST['userEmail'],$_POST['dataNascimento'],
            $_POST['signUp_Password'], $_POST['signUp_passwordConfirmated'], $_POST['nif'],'');
        $user->usertype='1';
        $user->create();
    }

    public static function verificarnif($nifaux){
        $user=new User();
        $user->nif=$nifaux;
        return $user->verificarnif();
    }
    public static function verificarlogin(){
        $user1= new User();
        $user1->email=$_POST['userEmail'];
        $user1->password=$_POST['signUp_Password'];
        if(($aux=$user1->verificarlogin())>0 || $aux==-1)
            $_SESSION['idCliente']=$aux;
    }
    public static function verificarlogin1($logaux){
        $user=new User();
        $user->nome_login=$logaux;
        return $user->verificarlogin1();
    }
    public static function verificarPrimeiroUtilizador(){
        return User::verificarPrimeiroUtilizador();
    }
    public static function getInformUser(){
        return User::getInformUser();
    }

    public static function ProcessLogout(){
        if(isset($_POST['Logout'])){
            $_SESSION = array();
            if (ini_get("session.use_cookies")) {
                $params = session_get_cookie_params();
                setcookie(session_name(), '', time() - 42000,
                    $params["path"], $params["domain"],
                    $params["secure"], $params["httponly"]
                );}
            session_destroy();
            //$_GET['page']='login';
            header('Location: ./index.php?page=Home');
        }
        exit;
    }

    public static function updatePassword()
    {
        if(isset($_POST['changepass'])){
            if(!$_POST['new_password']){
                $msg["estado"]='Insira uma nova password.';
            }elseif(self::verificarPass()!=$_POST['old_password']){
                $msg["estado"]='Password antiga não coincide!';
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
        return(isset($_SESSION['idCliente']));

    }

    public static function typeofuser(){
        if(self::loginverification()){
            $user= new User($_SESSION['idCliente']);
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