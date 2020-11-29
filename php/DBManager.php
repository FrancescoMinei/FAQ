<?php
    //CREDENZIALI DATABASE, MODIFICARE QUANDO INSTALLATE SU UNA NUOVA MACCHINA
    $servername = "localhost";
    $username="FaqAdmin";
    $password="password123";
    $dbname="faq";
function DataConnect(){
    global $servername,$username, $password,$dbname;
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
        $ris = $ris . "<li id=" . $elem['id'] ."><a href='index.php?ID=".$elem['id'] ."'>" . $elem['CategoryName'] . "</a></li>";
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
function LoadTagWithIndex(){
        $conn=DataConnect();
        $sql="SELECT DISTINCT question.Tag FROM question";
        $res=$conn->query($sql);
        $ris = "";
        while($elem = $res->fetch_assoc()){
            $ris = $ris . " <option value=" . $elem['Tag'] .">" . $elem['Tag'] . "</option>";
        }
        return $ris;
        $conn->close();
}
function LoadQuestions($id){
    $conn=DataConnect();
    $sql="SELECT question.Question, question.Answer,question.Tag FROM question WHERE question.fk_category=$id";
    $res=$conn->query($sql);
    $ris = "";
    while($elem = $res->fetch_assoc()){
        $ris = $ris . 
        "<h1>" . $elem['Question'] . "</h1> 
        <p>" . $elem['Answer'] . "</p>
        <p>Tag: " . $elem['Tag'] . "</p>";
    }
    return $ris;
    $conn->close();
}
function LoadQuestionWithId($id){
    $conn=DataConnect();
    $sql="SELECT question.Question, question.Answer,question.Tag FROM question WHERE question.id=$id";
    $res=$conn->query($sql);
    $ris = "";
    while($elem = $res->fetch_assoc()){
        $ris = 
        "<label name=\"id\">". $id ."</label>"
        ."<input name=".'Question'." id=".'Input-item'." type=".'text'." class=".'form-control'." value=\"". $elem['Question'] ."\" aria-label=".'Categoria'." aria-describedby=".'basic-addon2'." autofocus=".">"
        ."<textarea class=form-control rows=". 15 ." name=".'desc'.">".$elem['Answer']."</textarea>"
        ."<input name=".'Tag'." id=".'Input-item'." type=".'text'." class=".'form-control'." value=\"". $elem['Tag'] ."\" aria-label=".'Categoria'." aria-describedby=".'basic-addon2'." autofocus=".">";
    }
    return $ris;
    $conn->close();
}
function LoadTitleWithId($id){
    $conn=DataConnect();
    $sql="SELECT question.id, question.Question FROM question WHERE question.fk_category=$id";
    $res=$conn->query($sql);
    $ris = "";
    while($elem = $res->fetch_assoc()){
        $ris = $ris . " <option value=" . $elem['id'] ." id=" . $elem['id'] .">" . $elem['Question'] . "</option>";
    }
    return $ris;
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
Function SearchByTag($tag){
    $conn=DataConnect();
    $sql="SELECT question.Question, question.Answer,question.Tag FROM question WHERE question.Tag = $tag";
    $res=$conn->query($sql);
    $ris = "";
    while($elem = $res->fetch_assoc()){
        $ris = $ris . 
        "<h1>" . $elem['Question'] . "</h1> 
        <p>" . $elem['Answer'] . "</p>
        <p>Tag: " . $elem['Tag'] . "</p>";
    }
    return $ris;
    $conn->close();
}
Function SearchByTitle($title){
    $conn=DataConnect();
    $sql="SELECT question.Question, question.Answer,question.Tag FROM question WHERE question.Question LIKE '$title" . "%'";
    $res=$conn->query($sql);
    $ris = "";
    while($elem = $res->fetch_assoc()){
        $ris = $ris . 
        "<h1>" . $elem['Question'] . "</h1> 
        <p>" . $elem['Answer'] . "</p>
        <p>Tag: " . $elem['Tag'] . "</p>";
    }
    return $ris;
    $conn->close();
}
function InsertQuestion($Que,$Ans,$Tag,$idCat){
    $conn=DataConnect();
    $sql = "INSERT INTO `question`(`Question`, `Answer`, `Tag`, `fk_category`) VALUES ('$Que','$Ans','$Tag','$idCat')";
    $conn->query($sql);
    $conn->close();
}
function InsertCategory($cat){
    $conn=DataConnect();
    $sql = "INSERT INTO `category`(`CategoryName`) VALUES ('$cat')";
    $conn->query($sql);
    $conn->close();
}
function InsertAdmin($User,$Pass){
    $conn=DataConnect();
    $psw=password_hash($Pass,PASSWORD_DEFAULT);
    $sql = "INSERT INTO `account`(`UserName`, `PassWord`) VALUES ('$User','$psw')";
    $conn->query($sql);
    $conn->close();
}
function EditQuestion($id,$Que,$Ans,$Tag){
    $conn=DataConnect();
    $sql="UPDATE `question` SET `Question`='$Que',`Answer`='$Ans',`Tag`='$Tag' WHERE id=$id";
    $conn->query($sql);
    $conn->close();
}
?>
