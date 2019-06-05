<?php
if(session_status()==PHP_SESSION_NONE) {
    session_start();
}

require_once (dirname(__FILE__).'/Controllers/MainControllers.php');
require_once (dirname(__FILE__). '/DAL/DBconnection.php');
$msg=[
    "estado"=>[],
    "user"=>[]
];
$msg= MainControllers::process();
if(isset($_SESSION['idCliente'])) $userinfo= MainControllers::getInformUser();


?>
<!doctype html>
<html lang="en"
<head>
    <title>Rental Car - </title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>


    <link rel="stylesheet" href="./CSS/StyleAri.css">
    <link rel="stylesheet" href="./CSS/Style.css">
    <link rel="stylesheet" href="./CSS/StyleGE.css">


</head>
<body class="bgHome">
<!-----NAV BAR-------->
<?php

if(!isset($_SESSION['idCliente']) || $_SESSION['idCliente']==-1){
    $menu= MainControllers::getNavSemRegisto();
    foreach($menu as $k=>$v)
        echo $v;
}elseif(isset($_SESSION['idCliente']) && $_SESSION['idCliente']>0 && UserController::typeofuser()){
    $menu= MainControllers::getNavAdmin();
    foreach ($menu as $k=>$v)
        echo $v;
}else{
    $menu= MainControllers::getNavUser();
    foreach ($menu as $k=>$v)
        echo $v;
}

?>
<!-----NAV BAR-------->
<!-----CONTEÚDO----->
<?php
$option = $_GET['page'];
$page = "PL/".$option.".php";
require_once $page;


/*if(isset($_GET['page'])) {
    MainControllers::mensagem($msg);
    if (($_GET['page'] == 'EscolherVeiculo') && isset($msg)) echo '<br />' . $msg['Reserva'];
//    if (($_GET['page'] == 'SignUp') && isset($msg)) echo '<br />' . $msg['User'];
    $valor = 'PL/' . $_GET['page'] . '.php';
    require_once $valor;
}*/
?>
<!-----CONTEÚDO----->
<!---Footer------->
<footer class="container-fluid bg-grey py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-6 ">
                        <div class="logo-part">
                            <img src="./Imagens/Logo-footer.png" height="119" width="218"/>
                            <p>Reserve um carro com a MELITOUR</p>
                            <p>Melitour tem o veículo para satisfazer todas as necessidades de
                                aluguer de automóveis.</p>
                        </div>
                    </div>
                    <div class="col-md-6 px-4">
                        <h6>Company</h6>
                        <p>"-Satisfação do cliente é a nossa motivação!"</p>
                        <a href="./index.php?page=SobreNos" class="btn-footer"> About Us </a><br>
                        <a href="./index.php?page=Contactos" class="btn-footer"> Contact Us</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-6 px-4">
                        <h6> ALLOW LIVE TO THRIVE,<br>DON'T DRINK & DRIVE</h6>
                        <div class="row ">
                            <div class="col-md-6">
                                <ul>
                                    <li> <a href="./index.php?page=PoliticaPrivacidade">
                                            Política de Privacidade</a> </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 ">
                        <h6> Newsletter</h6>
                        <div class="social">
                            <a href="#">
                                <img src="./Imagens/insta.png" height="30" width="30"/></a>
                            <a href="#">
                                <img src="./Imagens/fcbook.png" height="30" width="30"/></a>
                            <a href="#">
                                <img src="./Imagens/Twiter.png" height="30" width="30"/></a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!---Footer------->
</footer>
</body>
</html>