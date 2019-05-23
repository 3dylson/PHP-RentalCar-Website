<?php
require_once 'Categoria_VeículoController.php';
require_once 'PromoçãoController.php';
require_once 'ReservaController.php';
require_once 'SeguroController.php';
require_once 'UserController.php';
require_once 'VeículoController.php';


class MainControllers
{
    public static function getNavAdmin(){
        $aux=[
            'logo'=>'<li><a href="../Home.php">Home&nbsp;&nbsp;&nbsp;&nbsp;</a></li>',
            'admin'=>'<li><a href="../index.php?page=Área_Admin">Admin&nbsp;&nbsp;&nbsp;</a></li>',
            'reserva'=>'<li><a href="../index.php?page=Reservas">Reservas&nbsp;&nbsp;&nbsp;</a></li>',
            'definições'=>'<li><a href="../index.php?page=Definições_da_Conta">Definições&nbsp;&nbsp;&nbsp;</a></li>',
            'logout'=>'<li><a href="../Home.php">Logout&nbsp;&nbsp;&nbsp;</a></li>',

        ];
        return $aux;
    }
    public static function getNavSemRegisto(){
        $aux=[
            'logo'=>'<li><a href="../Home.php">Home&nbsp;&nbsp;&nbsp;&nbsp;</a></li>',
            'login'=>'<li><a href="">Login&nbsp;&nbsp;&nbsp;</a></li>',
            'SignUp'=>'<li><a href="">Logout&nbsp;&nbsp;&nbsp;</a></li>',
        ];
        return $aux;
    }
    public static function getNavUser(){
        $aux=[
            'logo'=>'<li><a href="../Home.php">Home&nbsp;&nbsp;&nbsp;&nbsp;</a></li>',
            'reserva'=>'<li><a href="../index.php?page=Reservas">Reservas&nbsp;&nbsp;&nbsp;</a></li>',
            'definições'=>'<li><a href="../index.php?page=Definições_da_Conta">Definições&nbsp;&nbsp;&nbsp;</a></li>',
            'logout'=>'<li><a href="../Home.php">Logout&nbsp;&nbsp;&nbsp;</a></li>',
        ];
        return $aux;
    }
    public static function logout(){
        if(UserController::typeofuser())
            return '<a href="../index.php?terminarSessao">Logout</a>' ;
        else
            return '<a href="../index.php?terminarSessao">Logout</a>';
    }



    static public function firstCall(){
        if(UserController::verificarPrimeiroUtilizador()){
            $c=new User("1","root","GrupoSete","gruposete@example.com","01/01/2019",
                "admin","admin", "282685489", "1" );
            $c->create();
        }
    }

    static public function mensagem($msg){
        if(($_GET['page']=='NovoUser') && isset($msg)){ echo '<br />' . $msg['user']; unset($msg['user']);}
    }


    static public function getUserInformation(){
        return UserController::getInformUser();
    }



    public static function process(){
        self::firstCall();
        $estado['User']=UserController::Process();

        return $estado;

    }
}