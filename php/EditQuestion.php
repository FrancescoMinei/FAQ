<?php
    require 'DBManager.php';

    $id=$_POST["id"];
    $que = $_POST["Question"];
    $ans = $_POST["Answer"];
    $tag = $_POST["Tag"];
    EditQuestion($id,$que,$ans,$tag);
    header('Location: ../index.php');
?>