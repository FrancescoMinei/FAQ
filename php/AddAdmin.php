<?php
    require 'DBManager.php';

    $user = $_POST["Username"];
    $psw = $_POST["Password"];
    $psw2 = $_POST["Password2"];
    if($psw==$psw2)
    {
    InsertAdmin($user,$psw);
    header('Location: ../Home');
    }
    else
    {
        echo "<script type='text/javascript'>alert('Le password non corrispondono');</script>";
        header('Location: ../admin/AggiungiAdmin.php');
    }
?>