<?php
/*if(session_status()==PHP_SESSION_NONE){
    session_start();
}
require_once 'Controllers/MainControllers.php';
$msg=[
    "estado"=>[],
    "user"=>[]
];
$msg= MainControllers::process();
if(isset($_SESSION['idCliente'])) $userinfo= MainControllers::getInformUser();
*/?>
<!--Main Quote Starts-->
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
        <a href="./index.php?page=EscolherVeiculo" type="submit" name="Reservar" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Pesquisar</a>

        <!---------<input  type="submit" value="PESQUISAR" class="submit"/>---->
        <!--Search Menu Ends-->
    </form>
</div>
<br>
<br>
<br>
<br>