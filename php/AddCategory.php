<?php
    require 'DBManager.php';

    $cat = $_POST["CategoryName"];
    InsertCategory($cat);
    header('Location: ../index.php');
?>