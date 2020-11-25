<?php
function DataConnect(){
    $servername = "localhost";
    $username="FaqAdmin";
    $password="password123";
    $dbname="faq";
    $conn=new mysqli($servername,$username,$password,$dbname);
    if($conn->connect_error)
        die("Connection Error" . $conn->connect_error);
    return $conn;
}
function LoadCategory(){
    $conn=DataConnect();
    $sql="SELECT category.id, category.CategoryName FROM category";
    $res=$conn->query($sql);
    $ris = "";
    while($elem = $res->fetch_assoc()){
        $ris = $ris . "<li id=" . $elem['id'] ."><a href='#'>" . $elem['CategoryName'] . "</a></li>";
    }
    return $ris;
    $conn->close();
}
function LoadCategoryWithIndex(){
    $conn=DataConnect();
    $sql="SELECT category.id, category.CategoryName FROM category";
    $res=$conn->query($sql);
    $ris = "";
    while($elem = $res->fetch_assoc()){
        $ris = $ris . " <option value=" . $elem['id'] ." id=" . $elem['id'] .">" . $elem['CategoryName'] . "</option>";
    }
    return $ris;
    $conn->close();
}
function LoadQuestions($id){
    $conn=DataConnect();
    $sql="SELECT question.Question, question.Answer,question.Tag FROM question WHERE question.fk_catogory=$id";
    $res=$conn->query($sql);
    $ris = "";
    while($elem = $res->fetch_assoc()){
        $ris = $ris . 
        "<h1>" . $elem['Question'] . "</h1> 
        <p>" . $elem['Answer'] . "</p>
        <p>" . $elem['Tag'] . "</p>";
    }
    return $ris;
    $conn->close();
}
function Registration(){
    $conn=DataConnect();
    $psw=password_hash('password1234',PASSWORD_DEFAULT);
    $sql="INSERT INTO `account`(`Id`, `UserName`, `PassWord`) VALUES (1,'Admin','$psw')";
    echo $sql;
    $conn->query($sql);
    $conn->close();
}
function FindUser($user){
    $conn=DataConnect();
    $sql="SELECT * FROM account WHERE UserName='$user'";
    $res=$conn->query($sql);
    $data=$res->fetch_array(MYSQLI_ASSOC);
    $res->free_result();
    $conn->close();
    return $data;
}
function InsertQuestion($Que,$Ans,$Tag,$idCat)
{
    $conn=DataConnect();
    $sql = "INSERT INTO `question`(`Question`, `Answer`, `Tag`, `fk_catogory`) VALUES ('$Que','$Ans','$Tag','$idCat')";
    $conn->query($sql);
    $conn->close();
}
function InsertCategory($cat){
    $conn=DataConnect();
    $sql = "INSERT INTO `category`(`CategoryName`) VALUES ('$cat')";
    $conn->query($sql);
    $conn->close();
}
function InsertAdmin($User,$Pass)
{
    $conn=DataConnect();
    $psw=password_hash($Pass,PASSWORD_DEFAULT);
    $sql = "INSERT INTO `account`(`UserName`, `PassWord`) VALUES ('$User','$psw')";
    $conn->query($sql);
    $conn->close();
}
?>
