<?php
function LoadCategory(){
    $servername = "localhost";
    $username="FaqAdmin";
    $password="password123";
    $dbname="faq";

    $conn=new mysqli($servername,$username,$password,$dbname);
    if($conn->connect_error)
        die("Connection Error" . $conn->connect_error);

    $sql="SELECT category.CategoryName FROM category";
    $res=$conn->query($sql);
    $ris = "";
    while($elem = $res->fetch_assoc()){
        $ris = $ris . '<li><a href="' . $elem["Dir "] . '">''</a></li>';
    }
    return $ris;
    $conn->close();
}
?>
