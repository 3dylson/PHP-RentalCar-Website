<?php
$Veiculos=Veículo::mostrarVeiculos();
?>

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
            <!----Veículos----->
            <div class="col-sm-8 text-left">
                <div class="col-6 col-sm-4"><div class="card" style="width: 18rem;">
                    <?php echo ' <img class="card-img-top" src=' . $Veiculos['Img'] . ' height="180"
                             width="286" alt="Card image cap"></img>';?>
                        <div class="card-body">
                            <strong  class="card-title"><?php echo $Veiculos['Nome'], $Veiculos['idVeiculos'] ;?> </strong>
                            <button type="submit" name="" class="btn btn-danger">Remover</button>
                            <button type="submit" class="btn btn-warning">Indisponível</button>
                        </div>
                    </div></div>
                <br>
            </div>
        </div>
        <!----Veículos----->
    </div>
    </div>
</section>
                                                  