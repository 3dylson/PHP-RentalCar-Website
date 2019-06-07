<?php
if(isset($_GET['idVeiculo'])) $reserva_veiculo=Veículo::getVeiculoInfo();
?>

<!------Content--------->
<div class="container" style="margin-top:60px">
    <div class="row">
        <div class="col-sm-4">
            <h2><?php echo $reserva_veiculo["Nome"];?></h2>
            <?php echo '<img src="' . $reserva_veiculo['Img'] . '" height="170" width="238""></img> ';?>
<!--            <p>SUV | Diesel | Manual | 5 Lugares | 5 Portas</p>-->
            <form method="post">
                <a class="nav-link active" href="./index.php?page=PagamentoConclusao">
                    <button class="btn btn-success" type="submit" name="Reservar" ><span class="glyphicon glyphicon-euro"> Pagamento! </span></button></a>
            </form>

<!--            <strong style="margin-left: 10px"> Preço: 220.50€</strong>-->
            <br>
            <a class="nav-link active" href="./index.php?page=EscolherVeiculo">
                <button class="btn btn-primary"><span class="glyphicon glyphicon-search"></span> Escolher outro Veículo.</button></a>
            <hr class="d-sm-none">
        </div>
        <!--<div class="col-sm-8">
            <h2>Escolha o seu plano de seguro:</h2>-->
            <!------ Insurance Table----->
           <!-- <div id="tabela-responsiva" class="table-responsive">
                <div class="membership-pricing-table">
                    <table>
                        <tbody>
                        <tr>
                            <th></th>
                            <th class="plan-header plan-header-free">
                                <div class="pricing-plan-name">FREE</div>
                                <div class="pricing-plan-price">
                                    <sup>€</sup>0<span>.00</span>
                                </div>
                            </th>
                            <th class="plan-header plan-header-blue">
                                <div class="pricing-plan-name">BASIC</div>
                                <div class="pricing-plan-price">
                                    <sup>€</sup>50<span>.99</span>
                                </div>
                            </th>
                            <th class="plan-header plan-header-blue">
                                <div class="pricing-plan-name">PLUS</div>
                                <div class="pricing-plan-price">
                                    <sup>€</sup>99<span>.95</span>
                                </div>
                            </th>
                            <th class="plan-header plan-header-standard">
                                <div class="header-plan-inner">
                                    <!-<span class="plan-head"> </span>-->
                                   <!-- <span class="recommended-plan-ribbon">RECOMMENDED</span>
                                    <div class="pricing-plan-name">STANDARD</div>
                                    <div class="pricing-plan-price">
                                        <sup>€</sup>395<span>.99</span>
                                    </div>
                                </div>
                            </th>
                            <th class="plan-header plan-header-blue">
                                <div class="pricing-plan-name">PREMIUM</div>
                                <div class="pricing-plan-price">
                                    <sup>$</sup>500</span>
                                </div>
                            </th>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1"
                                           value="option1">
                                </div>
                            </td>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2"
                                           value="option2">
                                </div>
                            </td>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="exampleRadios"
                                           id="exampleRadios3" value="option3">
                                </div>
                            </td>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="exampleRadios"
                                           id="exampleRadios4" value="option4" checked>
                                </div>
                            </td>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="exampleRadios"
                                           id="exampleRadios5" value="option5">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Theft Insurance:</td>
                            <td><span class="icon-no glyphicon glyphicon-remove-circle"></span></td>
                            <td><span class="icon-no glyphicon glyphicon-remove-circle"></span></td>
                            <td><span class="icon-no glyphicon glyphicon-remove-circle"></span></td>
                            <td><span class="icon-yes glyphicon glyphicon-ok-circle"></span></td>
                            <td><span class="icon-yes glyphicon glyphicon-ok-circle"></span></td>
                        </tr>
                        <tr>
                            <td>Damage Management Fee:</td>
                            <td><span class="icon-no glyphicon glyphicon-remove-circle"></span></td>
                            <td><span class="icon-no glyphicon glyphicon-remove-circle"></span></td>
                            <td><span class="icon-no glyphicon glyphicon-remove-circle"></span></td>
                            <td><span class="icon-yes glyphicon glyphicon-ok-circle"></span></td>
                            <td><span class="icon-yes glyphicon glyphicon-ok-circle"></span></td>
                        </tr>
                        <tr>
                            <td>Glass Protection:</td>
                            <td><span class="icon-no glyphicon glyphicon-remove-circle"></span></td>
                            <td><span class="icon-no glyphicon glyphicon-remove-circle"></span></td>
                            <td><span class="icon-yes glyphicon glyphicon-ok-circle"></span></td>
                            <td><span class="icon-yes glyphicon glyphicon-ok-circle"></span></td>
                            <td><span class="icon-yes glyphicon glyphicon-ok-circle"></span></td>
                        </tr>
                        <tr>
                            <td>Excess reduction:</td>
                            <td><span class="icon-no glyphicon glyphicon-remove-circle"></span></td>
                            <td><span class="icon-yes glyphicon glyphicon-ok-circle"></span></td>
                            <td><span class="icon-yes glyphicon glyphicon-ok-circle"></span></td>
                            <td><span class="icon-yes glyphicon glyphicon-ok-circle"></span></td>
                            <td><span class="icon-yes glyphicon glyphicon-ok-circle"></span></td>
                        </tr>
                        </tbody>
                    </table>
                    <hr>
                </div>
            </div>-->-->
            <!------ Insurance Table--->
        </div>
    </div>
</div>
<!----Content---------->
