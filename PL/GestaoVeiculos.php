<!----Side Bar links----->
<section class="sectionnavbarfixo">
    <div class="container-fluid text-lefth">
        <div class="row content">
            <div class="col-sm-2 sidenav">
                <h4>ADMIN</h4>
                <p><a class="btn" href="./index.php?page=GestaoVeiculos">Gestão de Veículos</a></p>
                <p><a class="btn" href="./index.php?page=GerenciarCategorias">Gerenciar Categorias</a></p>
                <p><a class="btn" href="./index.php?page=GerenciarPromocoes">Gerenciar Promoções</a></p>
                <p><a class="btn" href="./index.php?page=GerenciarSeguros">Gerenciar Seguros</a></p>
                <p><a class="btn" href="./index.php?page=GerenciarReserva">Gerenciar Reservas</a></p>
            </div>
            <!----Side Bar links----->
          <!-- <div class="col-sm-8 text-left">--->
                <!----Veículos----->

            <div class="row" id="cars">
                <div class="col-6 col-sm-4">

                        <?php VeículoController::mostrarVeiculosDisponiveis(); ?>

                </div>
            </div>
        </div>
    </div>
</section>
                                                  