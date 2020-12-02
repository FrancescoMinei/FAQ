<?php
    require 'DBManager.php';

    $id=$_POST["id"];
    $que = $_POST["Question"];
    $ans = $_POST["desc"];
    $tag = $_POST["Tag"];
    
    EditQuestion($id,$que,$ans,$tag);
    header('Location: ../Home');
    
?>