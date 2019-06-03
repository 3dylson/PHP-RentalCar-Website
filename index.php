<?php
if(session_status()==PHP_SESSION_NONE){
    session_start();
}
require_once 'Controllers/MainControllers.php';
$msg=[
    "estado"=>[],
    "user"=>[]
];
$msg= MainControllers::process();
if(isset($_SESSION['idCliente'])) $userinfo= MainControllers::getInformUser();


//
//
//require_once 'DAL/DBconnection.php';
//require_once 'Controllers/MainControllers.php';

//MainControllers::process();
?>
<!doctype html>
<html lang="en">
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
<body>
<body class="bgHome">
<div class="container">
    <div class="row">
        <div class="col-sm-6">
            <a href="./index.php?page=Home" name="logo">
                <img id="logosize" src="./Imagens/Logo.png" height="115" width="218"/></a>
        </div>
        <div class="col-sm-6">
            <div class="collapse navbar-collapse" id="myNavbar">
                <u class="nav navbar-nav navbar-right">
                    <br>
                    <?php

                    /*if(!isset($_SESSION['idCliente']) || $_SESSION['idCliente']==-1){
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
                    }*/

                    if(isset($userinfo))
                        echo '
                    <button class="open-button" onclick="openForm()"><span class="glyphicon glyphicon-user"></span>' . $userinfo['Nome'] . '</button>
                        <div class="form-popup" id="myForm">
                            <form method="post" class="form-container">
                                <h1>Welcome!</h1>
                                <div class="container">
                                    <div class="row">
                                        <div class="col-sm-1">
                                            <a id="b2" class="btn btn-primary" name="reserva"
                                               href="./index.php?page=User/Reservas" role="button">Ver Reserva</a>
                                            <br>
                                            <a id="b3" class="btn btn-primary" name="definições"
                                               href="./index.php?page=User/DefinicoesConta" role="button">Definições</a>
                                            <br>
                                            
                                            <a id="b3" class="btn btn-primary" name="admin"
                                               href="./index.php?page=Admin/Área_Admin" role="button">Admin</a>
                                            <br>
                                            <br>
                                        <input id="log2" type="email" placeholder="Enter Email" name="userEmail" required>

                          
                                        <input id="log" type="password" placeholder="Enter Password" name="signUp-Password" required>
                                            <br>
                            <button type="submit" class="btn" name="Login" >Login</button>
                            <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
                                            <button id="b4" type="button" class="btn cancel" onclick="closeForm()">Close</button>
                                        </div>
                                    </div>
                                </div>
                            
                            </form>
                            <script>
                                function openForm() {
                                    document.getElementById("myForm").style.display = "block";
                                }

                                function closeForm() {
                                    document.getElementById("myForm").style.display = "none";
                                }
                            </script>
                        </div>
                        <form method="post"></form>
                        <a href="./index.php?=SignUp">
                        <button class="open-button" name="SignUp"><span class="glyphicon glyphicon-user"></span> Sign Up</button></a>
                        <a href="">
                        <button class="open-button" name="Logout" ><span class="glyphicon glyphicon-log-out"></span> Logout</button></a>
                            </form>
                
            </div>
        </div>';
                    ?>

                </u>
            </div>
        </div>
    </div>
</div>

<!-----CONTEÚDO----->
<?php
$option = $_GET['page'];
$page = "PL/".$option.".php";
require_once $page;

/*if(isset($_GET['page'])){
MainController::mensagem($msg);
if(($_GET['page']=='EscolherSeguros') && isset($msg)) echo'<br />' . $msg['Seguro'];
$valor ='PL/'. $_GET['page'] . '.php';
require_once $valor;*/

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
                                    <li> <a href="./index.php?page=PolíticaDePrivacidade">
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
    