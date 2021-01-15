<?php
    //CREDENZIALI DATABASE, MODIFICARE QUANDO INSTALLATE SU UNA NUOVA MACCHINA
    $servername = "127.0.0.1";
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

    $stmt = $conn->prepare("SELECT question.Question, question.Answer,question.Tag FROM question WHERE question.fk_category= ? ORDER BY question.Question");
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $stmt->bind_result($que,$ans,$tag);

    $ris = "";
    while($stmt->fetch()){
        $ris = $ris . 
        "<h1>" . $que . "</h1> 
        <p>" . $ans . "</p>
        <p>Tag: " . $tag . "</p>";
    }
    return $ris;

    $stmt->close();
    $conn->close();
}
function LoadQuestionWithId($id){
    $conn=DataConnect();

    $stmt = $conn->prepare("SELECT question.Question, question.Answer,question.Tag FROM question WHERE question.id= ?");
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $stmt->bind_result($que,$ans,$tag);

    $ris = "";
    while($stmt->fetch()){
        $ris = 
        "<input id=\"id_edit\" name=\"id\" value=\"".$id."\" style=\"display:none\" >"
        ."<input name=".'Question'." id=".'Input-item'." type=".'text'." class=".'form-control'." value=\"". $que ."\" aria-label=".'Categoria'." aria-describedby=".'basic-addon2'." autofocus=".">"
        ."<textarea class=form-control rows=". 15 ." name=".'desc'.">".$ans."</textarea>"
        ."<input name=".'Tag'." id=".'Input-item'." type=".'text'." class=".'form-control'." value=\"". $tag ."\" aria-label=".'Categoria'." aria-describedby=".'basic-addon2'." autofocus=".">";
    }
    return $ris;

    $stmt->close();
    $conn->close();
}
function LoadTitleWithId($id){
    $conn=DataConnect();

    $stmt = $conn->prepare("SELECT question.id, question.Question FROM question WHERE question.fk_category= ?");
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $stmt->bind_result($id,$que);

    $ris = "";
    while($stmt->fetch()){
        $ris = $ris . " <option value=" . $id ." id=" . $id .">" . $que . "</option>";
    }
    return $ris;

    $stmt->close();
    $conn->close();
}
function FindUser($user){
    $conn=DataConnect();

    $stmt = $conn->prepare("SELECT UserName, PassWord FROM account WHERE UserName= ?");
    $stmt->bind_param('s', $user);
    $stmt->execute();
    $stmt->bind_result($user,$pass);
    $stmt->fetch();

    $data=array($user,$pass);

    $conn->close();
    return $data;
}
function SearchByTag($tag){
    $conn=DataConnect();

    $stmt = $conn->prepare("SELECT question.Question, question.Answer, question.Tag FROM question WHERE question.Tag = ?  ORDER BY question.Question");
    $stmt->bind_param('s', $tag);
    $stmt->execute();
    $stmt->bind_result($que,$ans,$tag);

    $ris = "";
    while($stmt->fetch()){
        $ris = $ris . 
        "<h1>" . $que . "</h1> 
        <p>" . $ans . "</p>
        <p>Tag: " . $tag. "</p>";
    }
    return $ris;

    $stmt->close();
    $conn->close();
}
function SearchByTitle($title){
    $conn=DataConnect();

    $stmt = $conn->prepare("SELECT question.Question, question.Answer, question.Tag FROM question WHERE question.Question LIKE ?  ORDER BY question.Question");
    $param= "%" . $title . "%";
    $stmt->bind_param('s', $param);
    $stmt->execute();
    $stmt->bind_result($que,$ans,$tag);

    $ris = "";
    while($stmt->fetch()){
        $ris = $ris . 
        "<h1>" . $que . "</h1> 
        <p>" . $ans . "</p>
        <p>Tag: " . $tag. "</p>";
    }
    return $ris;

    $stmt->close();
    $conn->close();
}
function InsertQuestion($Que,$Ans,$Tag,$idCat){
    $conn=DataConnect();
    $stmt = $conn->prepare("INSERT INTO question (Question, Answer, Tag, fk_category) VALUES (?,?,?,?)");
    $stmt->bind_param('sssi', $Que,$Ans,$Tag,$idCat);
    $stmt->execute();
    $stmt->close();
    $conn->close();
}
function InsertCategory($cat){
    $conn=DataConnect();
    $stmt = $conn->prepare("INSERT INTO category (CategoryName) VALUES (?)");
    $stmt->bind_param('s', $cat);
    $stmt->execute();

    $stmt->close();
    $conn->close();
}
function InsertAdmin($User,$Pass){
    $conn=DataConnect();
    $psw=password_hash($Pass,PASSWORD_DEFAULT);
    $stmt = $conn->prepare("INSERT INTO account (UserName, PassWord) VALUES (?,?)");
    $stmt->bind_param('ss', $User,$psw);
    $stmt->close();
    $conn->close();
}
function EditQuestion($id,$Que,$Ans,$Tag){
    $conn=DataConnect();
    $stmt = $conn->prepare("UPDATE question SET Question=?,Answer=?,Tag=? WHERE id=?");
    $stmt->bind_param('sssi', $Que,$Ans,$Tag,$id);
    $stmt->execute();
    $stmt->close();
    $conn->close();
}
?>
