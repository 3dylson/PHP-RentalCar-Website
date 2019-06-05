<?php
require_once dirname(__FILE__). '/Categoria_VeículoController.php';
require_once dirname(__FILE__). '/PromoçãoController.php';
require_once dirname(__FILE__). '/ReservaController.php';
require_once dirname(__FILE__). '/SeguroController.php';
require_once dirname(__FILE__). '/UserController.php';
require_once dirname(__FILE__). '/VeículoController.php';


class MainControllers
{
    public static function getNavAdmin(){
        if(isset($_SESSION['idCliente'])) $userinfo= MainControllers::getInformUser();
        $aux=[

            'NavAdmin'=>'
<div class="container">
    <div class="row">
        <div class="col-sm-6">
            <a href="./index.php?page=Home" name="Logo">
                <img id="logosize" src="./Imagens/Logo.png" height="115" width="218"/></a>
        </div>
        <div class="col-sm-6">
            <div class="collapse navbar-collapse" id="myNavbar">
                <u class="nav navbar-nav navbar-right"/>
                    <br>
                    
                    <button class="open-button" onclick="openForm()"><span class="glyphicon glyphicon-log-in"></span>' . $userinfo['nome'] . ' </button>
                    <div class="form-popup" id="myForm">
                        <form class="form-container" method="post" >
                            <h1></h1>
                            <div class="container">
                                    <div class="row">
                                        <div class="col-sm-1">
                                            <a id="b2" class="btn btn-primary"
                                               href="./index.php?page=Reservas" role="button">Ver Reserva</a>
                                            <br>
                                            <a id="b3" class="btn btn-primary"
                                               href="./index.php?page=DefinicoesConta" role="button">Definições</a>
                                            <br>
                                            <a id="b3" class="btn btn-primary"
                                               href="./index.php?page=Área_Admin" role="button">Admin</a>
                                            <br>
                                            <button id="b4" type="button" class="btn cancel" onclick="closeForm()">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        <script>
                            function openForm() {
                                document.getElementById("myForm").style.display = "block";
                            }

                            function closeForm() {
                                document.getElementById("myForm").style.display = "none";
                            }
                        </script>
                    </div>
                     <a href="./index.php?page=Logout">
                       <button class="open-button" name="Logout"><span class="glyphicon glyphicon-log-out"></span>Logout</button></a>
                       
                </ul>
            </div>
        </div>

    </div>
</div>',

        ];
        return $aux;
    }
    public static function getNavSemRegisto(){

        $aux=[
            'Nav'=>'
<div class="container">
    <div class="row">
        <div class="col-sm-6">
            <a href="./index.php?page=Home" name="Logo">
                <img id="logosize" src="./Imagens/Logo.png" height="115" width="218"/></a>
        </div>
        <div class="col-sm-6">
            <div class="collapse navbar-collapse" id="myNavbar">
                <u class="nav navbar-nav navbar-right"/>
                    <br>
                    <button class="open-button" onclick="openForm()"><span class="glyphicon glyphicon-log-in"></span> Login</button>
                    <div class="form-popup" id="myForm">
                        <form method="post" class="form-container" >
                            <h1></h1>

                            <label for="email"><b>Email</b></label>
                            <br>
                            <input id="log2" type="email" placeholder="Enter Email" name="userEmail" required>

                            <label for="psw"><b>Password</b></label>
                            <input id="log" type="password" placeholder="Enter Password" name="signUp_Password" required>
                            <br>
                            <button type="submit" name="Login" class="btn">Login</button>
                            <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
                        </form>
                        <script>
                            function openForm() {
                                document.getElementById("myForm").style.display = "block";
                            }

                            function closeForm() {
                                document.getElementById("myForm").style.display = "none";
                            }
                        </script>
                    </div>
                    <a href="./index.php?page=SignUp">
                        <button class="open-button"><span class="glyphicon glyphicon-user"></span> Sign Up</button></a>
                </ul>
            </div>
        </div>

    </div>
</div>',
            /*'Login'=>'<li><a href="">Login&nbsp;&nbsp;&nbsp;</a></li>',
            'SignUp'=>'<li><a href="">Logout&nbsp;&nbsp;&nbsp;</a></li>',*/
        ];
        return $aux;
    }
    public static function getNavUser(){
        if(isset($_SESSION['idCliente'])) $userinfo= MainControllers::getInformUser();
        $aux=[
            'NavUser'=>'<div class="container">
    <div class="row">
        <div class="col-sm-6">
            <a href="./index.php?page=Home" name="Logo">
                <img id="logosize" src="./Imagens/Logo.png" height="115" width="218"/></a>
        </div>
        <div class="col-sm-6">
            <div class="collapse navbar-collapse" id="myNavbar">
                <u class="nav navbar-nav navbar-right"/>
                    <br>
                    <button class="open-button" onclick="openForm()"><span class="glyphicon glyphicon-log-in"></span>' . $userinfo['Nome'] . ' </button>
                    <div class="form-popup" id="myForm">
                        <form method="post" class="form-container">
                            <h1></h1>
                            <div class="container">
                                    <div class="row">
                                        <div class="col-sm-1">
                                            <a id="b2" class="btn btn-primary"
                                               href="./index.php?page=Reservas" role="button">Ver Reserva</a>
                                            <br>
                                            <a id="b3" class="btn btn-primary"
                                               href="./index.php?page=DefinicoesConta" role="button">Definições</a>
                                            <br>
                                           
                                            <button id="b4" type="button" class="btn cancel" onclick="closeForm()">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        <script>
                            function openForm() {
                                document.getElementById("myForm").style.display = "block";
                            }

                            function closeForm() {
                                document.getElementById("myForm").style.display = "none";
                            }
                        </script>
                    </div>
                    <a href="./index.php?page=Logout">
                       <button name="Logout" class="open-button"><span class="glyphicon glyphicon-log-out"></span> Logout</button></a>
                </ul>
            </div>
        </div>

    </div>
</div>',
        ];
        return $aux;
    }
    public static function Logout(){
        if(UserController::typeofuser())
            return '<a href="./index.php?page=Logout"></a>' ;
        else
            return '<a href="./index.php?page=Logout"></a>';
    }

    static public function firstCall(){
        if(UserController::verificarPrimeiroUtilizador()){
            $c=new User("1","root","GrupoSete","gruposete@example.com","2019/01/01",
                "admin","admin", "999999999", "1" );
            $c->create();
        }
    }

    static public function mensagem($msg){
        if(($_GET['page']=='EscolherSeguros') && isset($msg)){ echo '<br />' . $msg['Seguro']; unset($msg['Seguro']);}
        if(($_GET['page']=='EscolherVeiculos') && isset($msg)){ echo '<br />' . $msg['Veículo']; unset($msg['Veículo']);}
        if(($_GET['page']=='SignUp') && isset($msg)){ echo'<br />' . $msg['User'];unset($msg['User']);}
        if(($_GET['page']=='Reservas') && isset($msg)){ echo'<br />' . $msg['Reserva'];unset($msg['Reserva']);}
        if(($_GET['page']=='Login') && isset($msg)){ echo'<br />' . $msg['User']; unset($msg['User']);}
        if(($_GET['page']=='DefinicoesConta') && isset($msg)){ echo'<br />' . $msg['User']; unset($msg['User']);}
        if(($_GET['page']=='GerenciarCategorias') && isset($msg)){ echo'<br />' . $msg['Categoria_Veículo']; unset($msg['Categoria_Veículo']);}
        if(($_GET['page']=='GerenciarPromocoes') && isset($msg)){ echo'<br />' . $msg['Promoção']; unset($msg['Promoção']);}
        if(($_GET['page']=='GerenciarReserva') && isset($msg)){ echo'<br />' . $msg['Reserva']; unset($msg['Reserva']);}
        if(($_GET['page']=='GerenciarSeguros') && isset($msg)){ echo'<br />' . $msg['Seguro']; unset($msg['Seguro']);}
        if(($_GET['page']=='GestaoVeiculos') && isset($msg)){ echo'<br />' . $msg['Veículo']; unset($msg['Veículo']);}
    }

    static public function getInformUser(){
        return UserController::getInformUser();
    }

    public static function process(){
        self::firstCall();
        $estado['User']=UserController::Process();
        $estado['Categoria_Veículo']=Categoria_VeículoController::Process();
        $estado['Promoção']=PromoçãoController::Process();
        $estado['Reserva']=ReservaController::Process();
        $estado['Seguro']=SeguroController::Process();
        $estado['Veículo']=VeículoController::Process();

        return $estado;
    }
}