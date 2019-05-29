<?php


//
//
//require_once 'DAL/DBconnection.php';
//require_once 'Controllers/MainControllers.php';

MainControllers::process();
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


    <link rel="stylesheet" href="./CSS/StyleAri.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

</head>
<body>
<body class="bgHome">
<div class="container">
    <div class="row">
        <div class="col-sm-6">
            <a href="./index.php?page=Home.php">
                <img id="logosize" src="./Imagens/Logo.png" height="115" width="218"/></a>
        </div>
        <div class="col-sm-6">
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav navbar-right">
                    <br>
                    <button class="open-button" onclick="openForm()"><span class="glyphicon glyphicon-log-in"></span> Login</button>
                    <div class="form-popup" id="myForm">
                        <form method="post" class="form-container">
                            <h1>Login</h1>

                            <label for="email"><b>Email</b></label>
                            <br>
                            <input id="log2" type="email" placeholder="Enter Email" name="email" required>

                            <label for="password"><b>Password</b></label>
                            <input id="log" type="password" placeholder="Enter Password" name="psw" required>
                            <br>
                            <button type="submit" class="btn">Login</button>
                            <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
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
                    <a href="./index.php?page=User/SignUp">
                        <button class="open-button"><span class="glyphicon glyphicon-user"></span> Sign Up</button></a>
                </ul>
            </div>
        </div>

    </div>
</div>

<!--Search Menu Ends-->
<?php
$option = $_GET['page'];
$page = "PL/".$option.".php";
require_once $page;


?>
CONTEÚDO
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
                        <a href="./index.php?page=SobreNós.php" class="btn-footer"> About Us </a><br>
                        <a href="./index.php?page=Contactos.php" class="btn-footer"> Contact Us</a>
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
                                    <li> <a href="./index.php?page=PolíticaDePrivacidade.php">
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
