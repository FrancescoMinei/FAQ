<?php
    require 'DBManager.php';

    $id=$_POST["id"];
    $que = $_POST["Question"];
    $ans = $_POST["Answer"];
    $tag = $_POST["Tag"];
    $ref=$_POST['Refuse'];
    if($ref=='Impossibile modificare')
        header('Location: ../Home');
    else{
    EditQuestion($id,$que,$ans,$tag);
    header('Location: ../Home');
    }
?>