<?php


class DBconnection
{
    static private $dbconnection;
    public function __construct(){}
    public static function connect() {
        try {
            self::$dbconnection = new PDO("mysql:host=localhost;dbname=mydb;charset=UTF8","root","admin");
            self::$dbconnection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);

        } catch (Exception $e) {
            echo $e->getMessage();
            return null;
        }
        return self::$dbconnection;
    }
    public static function disconnect(){
        self::$dbconnection=null;
    }

/*class DB{
    private $conn;
    private static $instance = null;

    private function __construct()
    {
        try{
            $host = 'localhost';
            $dbname = 'mydb';
            $username = 'root';
            $password = 'admin';
            $dsn = "mysql:localhost=$host;mydb=$dbname; charset=utf8";

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

}*/


/*$Reserva = new Reserva();
$Reserva->DataDeReserva = 22/11/19;
$Reserva->DataDeDevolucao = 24/11/19;

$res = $Reserva->create();
if(!$res){
    print "ERRO";
}*/

//$conn= new newPDO(dsn: "mysql:host=localhost;dbname=orders;charsset=UTF8","dw","dw");
//$pdo = new PDO("mysql:host=localhost;dbname=mysql", "username", "password");
}