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

            <div class="card" style="width: 18rem;">
                <form method="post" enctype="multipart/form-data">
                <input type="file" name="Img" />
                <div class="card-body">
                    <input style="color: black" class="card-title" type="number" name="idVeiculo" placeholder="ID">
                    <input style="color: black" class="card-title" type="number" name="Categoria_Veiculo_idCategoria_Veiculo" placeholder="ID-categoria">
                    <input style="color: black" class="card-title" type="number" name="Reserva_idReserva" placeholder="ID-reserva">
                    <input style="color: black" class="card-title" type="number" name="NumeroDeRegistro" placeholder="NumeroDeRegistro">
                    <input style="padding: inherit " style="color: black"  class="card-title" type="text" name="Disponibilidade" placeholder="Disponibilidade">
                    <input style="padding: inherit" style="color: black"  class="card-title" type="text" name="Nome" placeholder="Nome">

                    <input style="align-content:initial" type="submit" name="Add" class="btn" value="Add">
                    </form>
                </div>
            </div>
                        <?php VeículoController::mostrarVeiculosDisponiveis(); ?>

        </div>
    </div>
</section>
                                                  