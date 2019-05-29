<?php
require_once dirname(__FILE__).'DBconnection.php';
require_once dirname(__FILE__).'/../BL/User.php';

/**
 * Created by PhpStorm.
 * User: ASUS F555B
 * Date: 5/10/2019
 * Time: 4:07 PM
 */

class UserDAL
{
    static public function create($e){
        $conn= DBconnection::connect();
        $sql= "INSERT INTO Utilizador (idCliente, nome, nome_login, email, dataNascimento, password, nif, admin)
                values (?,?,?,?,?,?,?,?,?)";
        $q=$conn->prepare($sql);
        $q->execute(array($e->idCliente,$e->nome,$e->nome_login,$e->email,$e->dataNascimento,$e->password,$e->nif, $e->usertype));
        DBconnection::disconnect();

    }
    static public function delete($e){
        $conn= DBconnection::connect();
        $sql="DELETE FROM Utilizador WHERE idCliente = ?";
        $q=$conn->prepare($sql);
        $q->execute(Array($e->id));
        DBconnection::disconnect();
    }
    static public function mostrarUsers(){
        $conn= DBconnection::connect();
        $sql="Select idCliente, nome, email FROM Utilizador";
        $result=$conn->prepare($sql);
        $result->execute();
        if($result->rowCount()>0)
            while($row=$result->fetch()){
                echo "idCliente: " . $row["idCliente"]. " - Nome: " . $row["nome"]. " - email: " . $row["email"]. "<br>";
            }
        else
            echo '0 results'. "<br>";
        DBConnection::disconnect();
    }

    public function update($e){
        $conn= DBconnection::connect();
        $sql='UPDATE Utilizador SET nome = ?, email = ?, dataNascimento = ?, password=?, nif=?  WHERE idCliente= ?';
        $result=$conn->prepare($sql);
        $result->execute(Array($e->nome,$e->email,$e->dataNascimento, $e->password, $e->nif));
        if($result->rowCount()>0)
            echo "Alteração feita com sucesso!". "<br>";
        else
            echo "Erro" . "<br>";
        DBconnection::disconnect();
    }

    public static function verificarnif($e){
        $conn= DBconnection::connect();
        $sql='SELECT idCliente FROM Utilizador WHERE nif=?';
        $result=$conn->prepare($sql);
        $result->execute(Array($e->nif));
        DBconnection::disconnect();
        if($result->rowCount()>0){
            return true;
        }else{
            return false;
        }
    }
    public static function verificarlogin1($e){
        $conn= DBconnection::connect();
        $sql='SELECT idCliente FROM Utilizador WHERE nome_login=?';
        $result=$conn->prepare($sql);
        $result->execute(Array($e->nome_login));
        DBconnection::disconnect();
        if($result->rowCount()>0){
            return true;
        }else{
            return false;
        }
    }

    public static function typeofuser($e){
        $conn= DBconnection::connect();
        $sql='SELECT * FROM Utilizador WHERE idCliente=?';
        $result=$conn->prepare($sql);
        $result->execute(Array($e->idCliente));
        $type=$result->fetch();
        DBconnection::disconnect();
        if($type['Admin']==1){
            return true;
        }else{
            return false;
        }

    }

    public static function verificarlogin($e){
        $conn= DBconnection::connect();
        $sql='SELECT idCliente FROM Utilizador WHERE nome_login= ? AND password= ?';
        $result=$conn->prepare($sql);
        $result->execute(Array($e->nome_login,$e->password));
        if($result->rowCount()>0){
            $row=$result->fetch();
            return $row["idCliente"];
        }else{
            return -1;
        }
    }
    public static function getInformUser(){
        $conn= DBconnection::connect();
        $sql='SELECT * FROM Utilizadpr WHERE idCliente= ?';
        $result=$conn->prepare($sql);
        $result->execute(Array($_SESSION['idCliente']));
        if($result->rowCount()>0){
            $row=$result->fetch();
            return $row;
        }
    }

     public static function verificarPrimeiroUtilizador(){
         $conn= DBconnection::connect();
         $sql="Select * FROM Utilizador";
         $result=$conn->prepare($sql);
         $result->execute();
         DBconnection::disconnect();
         if($result->rowCount()>0)
             return false;
         else
             return true;
     }

    public static function verificarPass(){
        $conn= DBconnection::connect();
        $sql="Select * FROM Utilizador WHERE ID=?";
        $result=$conn->prepare($sql);
        $result->execute(Array($_SESSION['idCliente']));
        $row=$result->fetch();
        return $row['Password'];
    }
    public static function alterarPass(){
        $conn= DBconnection::connect();
        $sql="UPDATE Utilizador SET password=? WHERE idCliente=?";
        $result=$conn->prepare($sql);
        $result->execute(Array($_POST['new_password'],$_SESSION['idCliente']));
    }


   /* public static function create($User){
        $db=DB::getInstance();
        $query = "INSERT INTO USER (nome, nome_login, email, dataNascimento, password, passwordConfirmed, nif, admin) 
        VALUES (:nome, :nome_login, :email, :dataNascimento, :password, :passwordConfirmed, :nif, :admin)";
        $res=$db->query($query, array(':nome'=> $User->nome, 'nome_login'=> $User->nome_login,
            'email'=> $User->email, 'dataNascimento'=> $User->dataNascimento,
            'password'=> $User->password, 'passwordConfirmed'=> $User->passwordConfirmed,
            'nif'=> $User->nif, 'admin'=> $User->admin));

        if($res){
            $User->idUser=$db->lastInsertId();
        }
        return $res;
    }
    public static function update($User){
        $db=DB::getInstance();
        $query = "UPDATE User SET VALUES (nome = :nome, nome_login, email = :email,
        dataNascimento = :dataNascimento, password = :password, passwordConfirmed = :passwordConfirmed,
        nif = :nif, admin = :admin)";
        $res=$db->query($query, array(':nome'=> $User->nome, 'nome_login'=>$User->nome_login,
            'email'=> $User->email, 'dataNascimento'=> $User->dataNascimento, 'password'=> $User->password,
            'passwordConfirmed'=> $User->passwordConfirmed, 'nif'=> $User->nif, 'admin'=> $User->admin));

        if($res){
            $User->idUser=$db->lastInsertId();
        }
        return $res;
    }
    public static function delete($id){

        $db=DB::getInstance();

        $query = "DELETE FROM User WHERE idUser = ':idUser'";
        $res=$db->query($query, array(':idUser'=> $id));

        return $res;
    }

    public static function getAll(){

        $db=DB::getInstance();

        $query = "SELECT * FROM User";
        $res=$db->query($query);
        $res->setFetchMode( PDO::FETCH_CLASS, "User");
        return $res;
    }
    public static function verificar($e){
        $conn= DBConnection::connect();
        $sql='SELECT id FROM user WHERE nif=?';
        $result=$conn->prepare($sql);
        $result->execute(Array($e->nif));
        DBConnection::disconnect();
        if($result->rowCount()>0){
            return true;
        }else{
            return false;
        }
    }
    public static function readByLogin1($e){
        $conn= DBConnection::connect();
        $sql='SELECT id FROM user WHERE Login=?';
        $result=$conn->prepare($sql);
        $result->execute(Array($e->login));
        DBConnection::disconnect();
        if($result->rowCount()>0){
            return true;
        }else{
            return false;
        }
    }
    public static function typeofuser($e){
        $conn= DBConnection::connect();
        $sql='SELECT * FROM user WHERE id=?';
        $result=$conn->prepare($sql);
        $result->execute(Array($e->id));
        $type=$result->fetch();
        DBConnection::disconnect();
        if($type['Admin']==1){
            return true;
        }else{
            return false;
        }

    }
    public static function readyByLogin($e){
        $conn= DBConnection::connect();
        $sql='SELECT id FROM user WHERE login= ? AND password= ?';
        $result=$conn->prepare($sql);
        $result->execute(Array($e->login,$e->password));
        if($result->rowCount()>0){
            $row=$result->fetch();
            return $row["id"];
        }else{
            return -1;
        }
    }
    public static function getInformUser(){
        $conn= DBConnection::connect();
        $sql='SELECT * FROM user WHERE ID= ?';
        $result=$conn->prepare($sql);
        $result->execute(Array($_SESSION['ID']));
        if($result->rowCount()>0){
            $row=$result->fetch();
            return $row;
        }
    }
    public static function readyByfirstname(){
        $conn= DBConnection::connect();
        $sql="Select * FROM user";
        $result=$conn->prepare($sql);
        $result->execute();
        DBConnection::disconnect();
        if($result->rowCount()>0)
            return false;
        else
            return true;
    }

    public static function readyByPass(){
        $conn= DBConnection::connect();
        $sql="Select * FROM user WHERE ID=?";
        $result=$conn->prepare($sql);
        $result->execute(Array($_SESSION['ID']));
        $row=$result->fetch();
        return $row['Password'];
    }
    public static function changedPass(){
        $conn= DBConnection::connect();
        $sql="UPDATE user SET password=? WHERE ID=?";
        $result=$conn->prepare($sql);
        $result->execute(Array($_POST['new_password'],$_SESSION['ID']));
    }*/

}