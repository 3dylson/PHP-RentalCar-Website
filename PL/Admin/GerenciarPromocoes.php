<html lang="en">
<head>
    <title>Gerenciar Promoções - Admin</title>
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
                        <li class="breadcrumb-item"><a href="Gestão%20de%20Veículos%20(Admin).html">Gestão de Veículos</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Gerenciar Promoções</li>
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
            <div class="col-sm-2 sidenav">
                <h4>ADMIN</h4>
                <p><a href="Assistência%20ao%20Cliente.html">Assistência ao Cliente</a></p>
                <p><a href="Gerenciar%20Categorias.html">Gerenciar Categorias</a></p>
                <p><a href="Gerenciar%20Seguros.html">Gerenciar Seguros</a></p>
                <p><a href="Gerenciar%20Reserva.html">Gerenciar Reservas</a></p>
                <p><a href="Gestão%20de%20Veículos%20(Admin).html">Gestão de Veículos</a></p>
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
                                <tr>
                                    <td>Europa Sale</td>
                                    <td>2012/05/06</td>
                                    <td>15%</td>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Primeira Reserva</td>
                                    <td>2011/12/01</td>
                                    <td>20%</td>
                                </tr>
                                <tr>
                                    <td>SummerTime</td>
                                    <td>2010/08/21</td>
                                    <td>25%</td>
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
            <!----Sale Table----->
        </div>
    </div>
</section>
</body>
</html>
