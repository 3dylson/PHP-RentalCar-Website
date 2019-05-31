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
            'logo'=> '<li><a href="../PL/Home.php">Home&nbsp;&nbsp;&nbsp;&nbsp;</a></li>',
            'admin'=>'<li><a href="../index.php?page=Área_Admin">Admin&nbsp;&nbsp;&nbsp;</a></li>',
            'reserva'=>'<li><a href="../index.php?page=Reservas">Reservas&nbsp;&nbsp;&nbsp;</a></li>',
            'definições'=>'<li><a href="../index.php?page=DefinicoesConta">Definições&nbsp;&nbsp;&nbsp;</a></li>',
            'Logout'=> '<li><a href="../PL/Home.php">Logout&nbsp;&nbsp;&nbsp;</a></li>',

        ];
        return $aux;
    }
    public static function getNavSemRegisto(){
        $aux=[
            'logo'=> '<li><a href="../PL/Home.php">Home&nbsp;&nbsp;&nbsp;&nbsp;</a></li>',
            'Login'=>'<li><a href="">Login&nbsp;&nbsp;&nbsp;</a></li>',
            'SignUp'=>'<li><a href="">Logout&nbsp;&nbsp;&nbsp;</a></li>',
        ];
        return $aux;
    }
    public static function getNavUser(){
        $aux=[
            'logo'=> '<li><a href="../PL/Home.php">Home&nbsp;&nbsp;&nbsp;&nbsp;</a></li>',
            'reserva'=>'<li><a href="../index.php?page=Reservas">Reservas&nbsp;&nbsp;&nbsp;</a></li>',
            'definições'=>'<li><a href="../index.php?page=Definições_da_Conta">Definições&nbsp;&nbsp;&nbsp;</a></li>',
            'Logout'=> '<li><a href="../PL/Home.php">Logout&nbsp;&nbsp;&nbsp;</a></li>',
        ];
        return $aux;
    }
    public static function logout(){
        if(UserController::typeofuser())
            return '<a href="../index.php?Logout">Logout</a>' ;
        else
            return '<a href="../index.php?Logout">Logout</a>';
    }



    static public function firstCall(){
        if(UserController::verificarPrimeiroUtilizador()){
            $c=new User("1","root","GrupoSete","gruposete@example.com","2019/01/01",
                "admin","admin", "282685489", "1" );
            $c->create();
        }
    }


    static public function mensagem($msg){
        if(($_GET['page']=='EscolherSeguros') && isset($msg)){ echo '<br />' . $msg['Seguro']; unset($msg['Seguro']);}
        if(($_GET['page']=='EscolherVeiculos') && isset($msg)){ echo '<br />' . $msg['Veículo']; unset($msg['Veículo']);}
        if(($_GET['page']=='SignUp') && isset($msg)){ echo'<br />' . $msg['User'];unset($msg['User']);}
        if(($_GET['page']=='Reservas') && isset($msg)){ echo'<br />' . $msg['Reserva'];unset($msg['Reserva']);}
        if(($_GET['page']=='Login') && isset($msg)){ echo'<br />' . $msg['User']; unset($msg['User']);}
        if(($_GET['page']=='DefinicoesConta') && isset($msg)){ echo'<br />' . $msg['User']; unset($msg['User']);}
        if(($_GET['page']=='GerenciarCategorias') && isset($msg)){ echo'<br />' . $msg['Categoria_Veículo']; unset($msg['Categoria_Veículo']);}
        if(($_GET['page']=='GerenciarPromocoes') && isset($msg)){ echo'<br />' . $msg['Promoção']; unset($msg['Promoção']);}
        if(($_GET['page']=='GerenciarReserva') && isset($msg)){ echo'<br />' . $msg['Reserva']; unset($msg['Reserva']);}
        if(($_GET['page']=='GerenciarSeguros') && isset($msg)){ echo'<br />' . $msg['Seguro']; unset($msg['Seguro']);}
        if(($_GET['page']=='GestaoVeiculos') && isset($msg)){ echo'<br />' . $msg['Veículo']; unset($msg['Veículo']);}
    }

    static public function getInformUser(){
        return UserController::getInformUser();
    }




    public static function process(){
        self::firstCall();
        $estado['User']=UserController::Process();
        $estado['Categoria_Veículo']=Categoria_VeículoController::Process();
        $estado['Promoção']=PromoçãoController::Process();
        $estado['Reserva']=ReservaController::Process();
        $estado['Seguro']=SeguroController::Process();
        $estado['Veículo']=VeículoController::Process();

        return $estado;

    }

}