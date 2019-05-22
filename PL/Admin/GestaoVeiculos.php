<html lang="en">
<head>
    <title>Gestão de Veículos - Admin</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/Style.css">
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <nav class="breadnav" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">Gestão de Veículos</li>
                    </ol>
                </nav>
            </div>
            <div class="col-sm">
                <form class="navbar-form navbar-right" action="/action_page.php">
                    <div class="input-group">
                        <input id="searchb" type="text" class="form-control" placeholder="Search">
                        <div class="input-group-btn">
                            <button class="btn btn-default" type="submit">
                                <i class="glyphicon glyphicon-search"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</nav>
<!-------Nav Bar---->

<!----Side Bar links----->
<section class="sectionnavbarfixo">
    <div class="container-fluid text-lefth">
        <div class="row content">
            <div id="gestao" class="col-sm-2 sidenav">
                <h4>ADMIN</h4>
                <p><a href="Assistência%20ao%20Cliente.html">Assistência ao Cliente</a></p>
                <p><a href="Gerenciar%20Categorias.html">Gerenciar Categorias</a></p>
                <p><a href="Gerenciar%20Promoções.html">Gerenciar Promoções</a></p>
                <p><a href="Gerenciar%20Seguros.html">Gerenciar Seguros</a></p>
                <p><a href="Gerenciar%20Reserva.html">Gerenciar Reservas</a></p>
            </div>
            <!----Side Bar links----->
            <!----Veículos----->
            <div class="row" id="cars">
                <div class="col-6 col-sm-4"><div class="card" style="width: 18rem;">
                        <img class="card-img-top" src="../Imagens/BMW-X5-Rent.png" height="180"
                             width="286" alt="Card image cap">
                        <div class="card-body">
                            <strong  class="card-title">BMW X5</strong>
                            <p class="card-text">SUV | Diesel | Manual | 5 Lugares | 5 Portas</p>
                            <button type="button" class="btn btn-danger">Remover</button>
                            <button type="button" class="btn btn-warning">Indisponível</button>
                        </div>
                    </div></div>
                <div class="col-6 col-sm-4"><div class="card" style="width: 18rem;">
                        <img class="card-img-top" src="../Imagens/Range-Rover-Rent.jpg" height="180"
                             width="286" alt="Card image cap">
                        <div class="card-body">
                            <strong  class="card-title">Range Rover</strong>
                            <p class="card-text">SUV | Diesel | Manual | 5 Lugares | 5 Portas</p>
                            <button type="button" class="btn btn-danger">Remover</button>
                            <button type="button" class="btn btn-warning">Indisponível</button>
                        </div>
                        <br>
                    </div></div>
                <!-- Force next columns to break to new line at md breakpoint and up -->
                <div class="w-100 d-none d-md-block"></div>
                <div class="col-6 col-sm-4"><div class="card" style="width: 18rem;">
                        <img class="card-img-top" src="../Imagens/Mercedes-C200-Convertible-Rent.png" height="180"
                             width="286" alt="Card image cap">
                        <div class="card-body">
                            <strong  class="card-title">Mercedes Convertible</strong>
                            <p class="card-text">Automóvel | Diesel | Automático | 3 Lugares | 2 Portas</p>
                            <button type="button" class="btn btn-danger">Remover</button>
                            <button type="button" class="btn btn-warning">Indisponível</button>
                        </div>
                        <br>
                    </div></div>
                <br>
            </div>
        </div>
        <!----Veículos----->
    </div>
    </div>
</section>
</body>
</html>
