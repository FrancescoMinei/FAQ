<?php
function LOGIN(){
    session_start();
    $servername = "localhost";
    $username="FaqAdmin";
    $password="password123";
    $dbname="faq";
    $conn=new mysqli($servername,$username,$password,$dbname);
    if($conn->connect_error)
        die("Connection Error" . $conn->connect_error);
    
    if ( !isset($_POST['username'], $_POST['password']) ) 
        exit('Please fill both the username and password fields!');
    
     $conn->close();
}
?>