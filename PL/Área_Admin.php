<?php

if(UserController::isUserLoggedAdmin()) {
    ?>
    <!----Side Bar links----->
    <section class="sectionnavbarfixo">
        <div class="container-fluid text-lefth">
            <div class="row content">
                <div id="gestao" class="col-sm-2 sidenav">
                    <h4>ADMIN</h4>
                    <p><a class="btn" href="./index.php?page=GestaoVeiculos">Gestão de Veículos</a></p>
                    <p><a class="btn" href="./index.php?page=GerenciarCategorias">Gerenciar Categorias</a></p>
                    <p><a class="btn" href="./index.php?page=GerenciarPromocoes">Gerenciar Promoções</a></p>
                    <p><a class="btn" href="./index.php?page=GerenciarSeguros">Gerenciar Seguros</a></p>
                    <p><a class="btn" href="./index.php?page=GerenciarReserva">Gerenciar Reservas</a></p>
                </div>
                <h1 style="margin-left: 20px; color: #ebebeb">Bem Vindo a área de Administrador!</h1>
                <!----Side Bar links----->
            </div>
        </div>
    </section>


    <?php
}else{
print ("Sem Acesso!");

}
?>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>



                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    