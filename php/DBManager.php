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
        $ris = $ris . "<li><a href='#'>" . $elem['CategoryName'] . "</a></li>";
    }
    return $ris;
    $conn->close();
}
function LoadQuestions($id){
    $servername = "localhost";
    $username="FaqAdmin";
    $password="password123";
    $dbname="faq";
    $conn=new mysqli($servername,$username,$password,$dbname);
    if($conn->connect_error)
        die("Connection Error" . $conn->connect_error);
    $sql="SELECT question.Question, question.Answer FROM question WHERE question.fk_catogory=$id";
    $res=$conn->query($sql);
    $ris = "";
    while($elem = $res->fetch_assoc()){
        $ris = $ris . 
        "<h1>" . $elem['Question'] . "</h1> 
        <p>" . $elem['Answer'] . "</p>";
    }
    return $ris;
    $conn->close();

}
function InsertCategory(){
    $servername = "localhost";
    $username="FaqAdmin";
    $password="password123";
    $dbname="faq";
    $conn=new mysqli($servername,$username,$password,$dbname);
    if($conn->connect_error)
        die("Connection Error" . $conn->connect_error);
    $sql = "INSERT INTO category (firstname, lastname, email)
    VALUES ('John', 'Doe', 'john@example.com')";
    /*if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
    } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    }*/
    $conn->close();
}


?>
