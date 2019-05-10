<!doctype html>
<html lang="en">
<head>
    <title>CRUD</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>


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


