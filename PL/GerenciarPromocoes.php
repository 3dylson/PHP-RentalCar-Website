
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
            <!----Sale Table----->
            <div class="col-sm-6 text-left">
                <b>Break</b>
                <h1>Promoções:</h1>
                <div class="container">
                    <div class="row">
                        <div class="col-sm-8">
                            <table class="table table-striped table-condensed">
                                <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>Data de Validade</th>
                                    <th>Percentagem</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php PromoçãoController::mostrarPromocoes();?>


            <!----Sale Table----->
        </div>
    </div>
</section>
                                        