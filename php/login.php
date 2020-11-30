<?php
    require 'DBManager.php';

    $user = $_POST["Username"];
    $psw = $_POST["Password"];

    $res=FindUser($user);

    if(password_verify($psw,$res['PassWord']))
    {
        echo $res;
        session_start();
        $_SESSION['Username']=$user;
        $_SESSION['Password']=$psw;
        header('Location: ../Home');
    }
    else{
        echo "Wrong username or password";
    }
?>