<?php
function LOGIN(){
    require 'DBManager.php';

    $user = $_POST["Username"];
    $psw = $_POST["Password"];

    $res=FindUser($user,$psw);

    if($res!=0)
    {
        echo $res;
        session_start();
        $_SESSION['Username']=$user;
        $_SESSION['Password']=$psw;
        //header('Location: ../index.php');
    }
    else{
        echo "Wrong username or password";
    }

}
?>