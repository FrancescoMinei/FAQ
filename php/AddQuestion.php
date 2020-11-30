<?php
    require 'DBManager.php';

    $que = $_POST["Question"];
    $ans = $_POST["Answer"];
    $tag = $_POST["Tag"];
    $cat = $_POST["Category"];
    InsertQuestion($que,$ans,$tag,$cat);
    header('Location: ../Home');
?>