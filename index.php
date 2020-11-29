<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://kit.fontawesome.com/489989c000.js" crossorigin="anonymous"></script>
    <title>FAQ</title>
</head>

<body>
    <div class="Wrapper">
        <div class="SideBar">
        <a href="index.php"><img src="IMG/Faq_Logo.png" alt="Logo.png"></a>
        <h1 id="Title">Categorie</h1>
            <input name="search" id="Search" type="text" placeholder="Titolo..." >   
            <button name="ok" type="submit" onclick=EditUrlTitle()><i class="fas fa-search"></i></button>
            <select id="STag" name="Tag" id="cmbMake">
            <?php
            require "php/DBManager.php" ; 
            echo LoadTagWithIndex();
            session_start();
            ?>
            </select>
            <button name="ok" type="submit" onclick=EditUrlTag()><i class="fas fa-search"></i></button>
                <?php
                echo LoadCategory();
                    if(!isset($_SESSION['Username'])){
                ?>
                <div class="logout">
                    <a href="login.html"><i class="fas fa-sign-in-alt"></i></a>
                </div>
                <?php } else { ?>
                    <div class="AdminControl">
                    <h1 id="AdminControl">Admin</h1>
                    <li id="AdminStuff"><a href="admin/AggiungiAdmin.php">Aggiungi admin</a></li>
                    <li id="AdminStuff"><a href="admin/AggiungiCategoria.php">Aggiungi categoria</a></li>
                    <li id="AdminStuff"><a href="admin/AggiungiDomanda.php">Aggiungi domanda e risposta</a></li>
                    <?php if(!isset($_GET['Tag'])){?>
                    <form action="admin/EditQuestion.php" method="post">
                    <input type="submit" value="Modifica"></br>
                    <select name="Make" id="AdminStuff" name="Category" id="cmbMake" size="10">
                    </form>             
                    <?php
                    if($_GET['ID']!=null)
                        echo LoadTitleWithId((int)$_GET['ID']);
                    else
                    echo LoadTitleWithId(1);
                    ?>
                    </select></li>
                    <?php }?>
                    </div>
                    <div class="logout">
                        <a href="php/logout.php"><i class="fas fa-sign-out-alt"></i></a>
                    </div>
                    <?php } ?>
        </div>
        <div class="MainContent">
            <?php
            if(isset($_GET['Tag'])){
                echo SearchByTag($_GET['Tag']);
            }
            else{ 
            if(isset($_GET['Title'])){
                echo SearchByTitle((string)$_GET['Title']);
            }
            else{
            if(isset($_GET['ID'])){
                if(($_GET['ID']!=null))
                    echo LoadQuestions((int)$_GET['ID']);
            }
            else
                echo LoadQuestions(1);
            }
        }

          ?>
</body>
<script src="js/script.js"></script>
</html>