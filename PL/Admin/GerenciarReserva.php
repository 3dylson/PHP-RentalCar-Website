
<!----Side Bar links----->
<section class="sectionnavbarfixo">
    <div class="container-fluid text-lefth">
        <div class="row content">
            <div class="col-sm-2 sidenav">
                <h4>ADMIN</h4>
                <p><a href="../../index.php?page=GestaoVeiculos">Gestão de Veículos</a></p>
                <p><a href="../../index.php?page=GerenciarCategorias">Gerenciar Categorias</a></p>
                <p><a href="../../index.php?page=GerenciarPromocoes">Gerenciar Promoções</a></p>
                <p><a href="../../index.php?page=GerenciarSeguros">Gerenciar Seguros</a></p>
                <p><a href="../../index.php?page=GerenciarReserva">Gerenciar Reservas</a></p>
            </div>
            <!----Side Bar links----->

            <!----Reservation Table----->
            <div class="col-sm-8 text-left">
                <h1>Reservas:</h1>
                <div class="container">
                    <div class="row">
                        <div class="span5">
                            <table class="table table-striped table-condensed">
                                <thead>
                                <tr>
                                    <th>Username</th>
                                    <th>Data da Reserva</th>
                                    <th>Custo</th>
                                    <th>Status</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>Donna R. Folse</td>
                                    <td>2012/05/06</td>
                                    <td>55.50€</td>
                                    <td><span class="label label-success">Pago</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Emily F. Burns</td>
                                    <td>2011/12/01</td>
                                    <td>21.66€</td>
                                    <td><span class="label label-warning">Aguarda Pagamento</span></td>
                                </tr>
                                <tr>
                                    <td>Andrew A. Stout</td>
                                    <td>2010/08/21</td>
                                    <td>35€</td>
                                    <td><span class="label label-info">Cancelado</span></td>
                                </tr>
                                <tr>
                                    <td>Mary M. Bryan</td>
                                    <td>2009/04/11</td>
                                    <td>42.33€</td>
                                    <td><span class="label label-danger">Falha na Cobrança</span></td>
                                </tr>
                                <tr>
                                    <td>Mary A. Lewis</td>
                                    <td>2007/02/01</td>
                                    <td>16.87€</td>
                                    <td><span class="label label-success">Concluido</span></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <hr>
                <button type="button" class="btn btn-dark">Editar</button>
                <button type="button" class="btn btn-outline-success">Guardar</button>
            </div>
            <!----Reservation Table----->
        </div>
    </div>
</section>
