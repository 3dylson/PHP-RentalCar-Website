<?php
/*if(session_status()==PHP_SESSION_NONE){
    session_start();
}
require_once (dirname(__FILE__).'/../Controllers/MainControllers.php');
require_once (dirname(__FILE__). '/../DAL/DBconnection.php');

$msg=[
    "estado"=>[],
    "user"=>[]
];
$msg= MainControllers::process();
if(isset($_SESSION['idCliente'])) $userinfo= MainControllers::getInformUser();
*/?>
<!--Main Quote Starts-->
<body class="bgHome">
<div class="ph">

    <h5>THE ROYAL ESSENCE OF JORNEY</h5>
    <h2>RELAXED JORNEY EVER</h2>
</div>
<!--Main Quote Ends-->
<!--Search Menu starts-->
<div class="search">
    <form method="post">
        <!--<div class="container">
            <div class="row">-->
        <input class="" type="text" name="LocalPickUp" value="<?php if(isset($_POST['LocalPickUp']))
            echo $_POST['LocalPickUp'];?>" placeholder="PickUp" autocomplete="on">
        <input class="" type="date" name="DatadaReserva" value="<?php if(isset($_POST['DatadaReserva']))
            echo $_POST['DatadaReserva'];?>" placeholder="PickUp" autocomplete="off">
        <div class="w-100"></div>
        <input class="" type="text" name="LocalDropOff" value="<?php if(isset($_POST['LocalDropOff']))
            echo $_POST['LocalDropOff'];?>" placeholder="DropOff" autocomplete="on">
        <input class="" type="date" name="DatadeDevolucao" value="<?php if(isset($_POST['DatadeDevolucao']))
            echo $_POST['DatadeDevolucao'];?>" placeholder="Devolução" autocomplete="off">
        <!--</div>
    </div>-->
<br>
        <input href="./index.php?page=EscolherVeiculo" type="submit" name="Pesquisar" value="Search" class="btn btn-primary btn-lg active" role="button" aria-pressed="true"></input>

        <!---------<input  type="submit" value="PESQUISAR" class="submit"/>---->
        <!--Search Menu Ends-->
    </form>
</div>
</body>
<br>
<br>
<br>
<br>