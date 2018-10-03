<?php

    session_start();

    function generateToken($sessionId){
        $length = 32;
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);

        $randomString = '';

        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }

        $randomString .= $sessionId[rand(0, strlen($sessionId) - 5)];

        $_SESSION[$sessionId] = $randomString;
        return $randomString;
    }

    if(isset($_POST['csrf'])){
        $id=$_POST['csrf'];
        if($_SESSION[$id]){
            echo $_SESSION[$id];
        }
        else{
            echo "NULL";
        }
    }

    if(isset($_POST['csrfSubmit'])){

        $id = $_COOKIE["csrf_session"];

        if($_SESSION[$id] == $_POST['token']){
            echo "Success";
        }
        else{
            echo "Error";
        }
    }

?>