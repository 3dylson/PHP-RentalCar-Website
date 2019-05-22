<?php
require_once dirname(__FILE__).'/DBConnection.php';
require_once dirname(__FILE__).'/../BL/User.php';

/**
 * Created by PhpStorm.
 * User: ASUS F555B
 * Date: 5/10/2019
 * Time: 4:07 PM
 */

class UserDAL
{
    public static function create($User){
        $db=DB::getInstance();
        $query = "INSERT INTO User (nome, nome_login, email, dataNascimento, password, passwordConfirmed, nif, admin) 
        VALUES (:nome, :email, :dataNascimento, :password, :passwordConfirmed, :nif, :admin)";
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
    }

}