<?php
if(session_status()==PHP_SESSION_NONE){
    session_start();
}
require_once 'Controllers/MainController.php';
$msg=[
    "estado"=>[],
    "user"=>[]
];
$msg= MainController::process();
if(isset($_SESSION['ID'])) $userinfo= MainController::getUserInformation();
?>


<!doctype html>
<html lang="en">
<head>
    <title>Rental Car - <?php echo MainController::title();?></title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<body class="bgHome">
<div class="container">
    <div class="row">
        <div class="col-sm-6">
            <a href="index.html">
                <img id="logosize" src="../Imagens/Logo.png" height="115" width="218"/></a>
        </div>
        <div class="col-sm-6">
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav navbar-right">
                    <br>
                    <button class="open-button" onclick="openForm()"><span class="glyphicon glyphicon-log-in"></span> Login</button>
                    <div class="form-popup" id="myForm">
                        <form action="/action_page.php" class="form-container">
                            <h1>Login</h1>

                            <label for="email"><b>Email</b></label>
                            <br>
                            <input id="log2" type="email" placeholder="Enter Email" name="email" required>

                            <label for="password"><b>Password</b></label>
                            <input id="log" type="password" placeholder="Enter Password" name="psw" required>
                            <br>
                            <button type="submit" class="btn">Login</button>
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
                    <a href="UserData-BeforePay.html">
                        <button class="open-button"><span class="glyphicon glyphicon-user"></span> Sign Up</button></a>
                </ul>
            </div>
        </div>

    </div>
</div>

<?php

class DB{
    private $conn;
    private static $instance = null;

    private function __construct()
    {
        try{
            $host = 'localhost';
            $dbname = 'mydb';
            $username = 'root';
            $password = '';
            $dsn = "mysql:host=$host;dbname=$dbname; charset=utf8";

            $this->conn = new PDO($dsn, $username, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND=> "SET NAMES utf8"));
            $this->conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
        } catch (PDOException $e){
            echo $e->getMessage();
            exit();
        }

    }

    public static function getInstance(){
        if(self::$instance==null){
            self::$instance=new DB();
        }
        return(self::$instance);
    }

    public function query($q, $parms=[]){
        $res=$this->conn->prepare($q);

        if($res){
            $res->execute($parms);
        }
        return $res;
    }

    public function __destruct()
    {
        // TODO: Implement __destruct() method.
        if(self::$instance!=null){
            self::$instance=null;
            $this->conn=null;
        }
    }

    public function lastInsertId(){
        return($this->conn->lastInsertId());
    }

}


/*$Reserva = new Reserva();
$Reserva->DataDeReserva = 22/11/19;
$Reserva->DataDeDevolucao = 24/11/19;

$res = $Reserva->create();
if(!$res){
    print "ERRO";
}*/

//$conn= new newPDO(dsn: "mysql:host=localhost;dbname=orders;charsset=UTF8","dw","dw");
//$pdo = new PDO("mysql:host=localhost;dbname=mysql", "username", "password");



?>


</body>
</html>


