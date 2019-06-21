<?php

/*$carinfo= VeículoController::mostrarNomeVeiculos();*/
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

            <!----Category----->
            <form class="form-horizontal" method="post" >
                <fieldset style="width: 10px">
                    <legend>CATEGORIAS DO VEÍCULO</legend>
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-4">
                                <!-- Select Basic -->
                                <div class="form-group">
                                    <label style="color: #ebebeb" class="col-md-4 control-label" for="category_name">VEÍCULO</label>
                                    <div class="col-md-5">
                                        <select id="category_name" name="category_name" class="form-control">

                                            <option><?php echo $carinfo["Nome"];?></option>

                                        </select>
                                    </div>
                                </div>
                                <!-- Select Basic -->
                                <div class="form-group">
                                    <label style="color: #ebebeb" class="col-md-4 control-label" >CATEGORIA</label>
                                    <div class="col-md-5">
                                        <input style="color: black"  name="Categoria" class="form-control" PLACEHOLDER="">

                                    </div>
                                </div>
                                <!-- Text input-->
                                <div class="form-group">
                                    <label style="color: #ebebeb" class="col-md-4 control-label" for="marca">MARCA</label>
                                    <div class="col-md-5">
                                        <input id="marca" name="marca" placeholder="MARCA"
                                               class="form-control input-md" required="" type="text">
                                    </div>
                                </div>
                                <!-- Text input-->
                                <div class="form-group">
                                    <label style="color: #ebebeb" class="col-md-4 control-label" for="Modelo">MODELO</label>
                                    <div class="col-md-5">
                                        <input id="Modelo" name="modelo" placeholder="MODELO"
                                               class="form-control input-md" required="" type="text">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <!-- Text input-->
                                <div class="form-group">
                                    <label style="color: #ebebeb" class="col-md-4 control-label" for="Combustível">COMBUSTÍVEL</label>
                                    <div class="col-md-5">
                                        <input id="Combustível" name="combustivel" placeholder="COMBUSTÍVEL"
                                               class="form-control input-md" required="" type="text">
                                    </div>
                                </div>
                                <!-- Text input-->
                                <div class="form-group">
                                    <label style="color: #ebebeb" class="col-md-4 control-label" for="Transmissão">TRANSMISSÃO</label>
                                    <div class="col-md-6">
                                        <input id="Transmissão" name="transmissao" placeholder="ADD TRANSMISSÃO"
                                               class="form-control input-md" required="" type="text">
                                    </div>
                                </div>
                                <!-- Text input-->
                                <div class="form-group">
                                    <label style="color: #ebebeb" class="col-md-4 control-label" for="Capacidade">CAPACIDADE</label>
                                    <div class="col-md-6">
                                        <input id="add_capacidade" name="capacidade" placeholder="ADD CAPACIDADE"
                                               class="form-control input-md" required="" type="text">
                                    </div>
                                </div>
                                <!-- Text input-->
                                <div class="form-group">
                                    <label  style="color: #ebebeb"class="col-md-4 control-label" for="NumerosPortas">NÚMERO DE PORTAS</label>
                                    <div class="col-md-5">
                                        <input id="NumerosPortas" name="numeroPortas" placeholder="ADD PORTAS"
                                               class="form-control input-md" required="" type="text">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <!-- Text input-->
                                <div class="form-group">
                                    <label style="color: #ebebeb" class="col-md-4 control-label" for="add_preço">Preço</label>
                                    <div class="col-md-3">
                                        <input id="add_preço" name="precoDia" placeholder="Preço Aluger por dia €"
                                               class="form-control input-md" required="" type="number">
                                    </div>
                                </div>
                                <!-- Button -->
                                <div class="form-group">
                                    <label style="color: #ebebeb" class="col-md-4 control-label" for="SubmitCategoria"></label>
                                    <div class="col-md-4">
                                        <button id="SubmitCategoria" name="SubmitCategoria" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </fieldset>
            </form>
            <!----Category----->
        </div>
    </div>
</section>

                                       