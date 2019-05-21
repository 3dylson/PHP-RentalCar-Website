<?php

class UserController{

    public static function process(){
        if(isset($_POST['user-register'])){
            $user = new User();
            $user->login = $_POST['login'];
            $user->password = $_POST['password'];
            //...
            $user->create();
        }elseif (isset($_POST['user-login'])){
            self::processLogin();
        }
    }

    private static function processLogin(){
        $user = new User();
        $user->login = $_POST['login'];
        $user->password = $_POST['password'];
        if($user->readByLoginAndPassword()){
            $_SESSION['userid'] = $user->id;
        }
    }

    public static function isUserLoggedIn(){
        return(isset($_SESSION['userid']));
    }

    public static function getLoggedUser(){
        $userid = isset($_SESSION['userid']) ? $_SESSION['userid'] : null;
        if($userid !=null){
            $user = new User();
            $user->id = $userid;
            if(!$user->readById()){
                $user = null;
            } //Verificar se esta na BD, se ñ devolver null

        }
        return($user);
    }

    private static function processLogout(){
        // Initialize the session.
// If you are using session_name("something"), don't forget it now!
        session_start();

// Unset all of the session variables.
        $_SESSION = [];

// If it's desired to kill the session, also delete the session cookie.
// Note: This will destroy the session, and not just the session data!
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        }

// Finally, destroy the session.
        session_destroy();
    }

    public static function isUserLoggedAdmin(){
        $res = false;
        $user = self::getLoggedUser();
        if($user != null && $user->admin == 1){
            $res = true;
        }
        return($res);
    }
}
