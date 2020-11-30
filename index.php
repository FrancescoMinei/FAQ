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
    <?php
    require "php/DBManager.php";
    session_start();
    ?>
    <div class="Wrapper">
        <div class="SideBar">
            <a href="Home"><img src="IMG/Faq_Logo.png" alt="Logo.png"></a>
            <h1 id="Title">Categorie</h1>
            <input name="search" id="Search" type="text" placeholder="Titolo...">
            <button name="ok" type="submit" onclick=EditUrlTitle()><i class="fas fa-search"></i></button>
            <select id="STag" name="Tag" id="cmbMake">
                <?php
                echo LoadTagWithIndex();
                ?>
            </select>
            <button name="ok" type="submit" onclick=EditUrlTag()><i class="fas fa-search"></i></button>
            <?php
            echo LoadCategory();
            if (!isset($_SESSION['Username'])) {
            ?>
                <div class="logout">
                    <a href="Login"><i class="fas fa-sign-in-alt"></i></a>
                </div>
            <?php } else { ?>
                <div class="AdminControl">
                    <h1 id="AdminControl">Admin</h1>
                    <li id="AdminStuff"><a href="AggiungiAdmin">Aggiungi admin</a></li>
                    <li id="AdminStuff"><a href="AggiungiCategoria">Aggiungi categoria</a></li>
                    <li id="AdminStuff"><a href="AggiungiDomanda">Aggiungi domanda e risposta</a></li>
                    <?php if (isset($_GET['ID'])){ ?>
                        <form action="ModificaDomanda" method="post">
                            <input type="submit" value="Modifica"></br>
                            <select name="Make" id="AdminStuff" name="Category" id="cmbMake" size="5">
                        </form>
                        <?php
                        if ($_GET['ID'] != null)
                            echo LoadTitleWithId((int)$_GET['ID']);
                        ?>
                        </select></li>
                    <?php } ?>
                </div>
                <div class="logout">
                    <a href="php/logout.php"><i class="fas fa-sign-out-alt"></i></a>
                </div>
            <?php } ?>
        </div>
        <div class="MainContent">
            <?php
            if (isset($_GET['Tag'])) {
                echo SearchByTag($_GET['Tag']);
            } else {
                if (isset($_GET['Title'])) {
                    echo SearchByTitle((string)$_GET['Title']);
                } else {
                    if (isset($_GET['ID'])) {
                        if (($_GET['ID'] != null))
                            echo LoadQuestions((int)$_GET['ID']);
                    } else
                        echo /*LoadQuestions(1);*/ '<h1>Home page</h1>
                <p>Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lacus laoreet non curabitur gravida. 
                Quisque non tellus orci ac. Mattis aliquam faucibus purus in massa tempor nec feugiat nisl. Amet commodo nulla facilisi nullam vehicula ipsum. Cursus mattis molestie a iaculis at erat pellentesque adipiscing. 
                Fusce ut placerat orci nulla pellentesque dignissim enim sit. Libero id faucibus nisl tincidunt eget. Blandit volutpat maecenas volutpat blandit aliquam etiam erat velit scelerisque. Neque gravida in fermentum et sollicitudin ac.
                 Nec feugiat in fermentum posuere urna nec tincidunt praesent. Faucibus pulvinar elementum integer enim neque volutpat ac. Massa sapien faucibus et molestie ac feugiat sed. 
                Et malesuada fames ac turpis egestas sed.</p>

                ';
                }
            }

            ?>
</body>
<script src="js/script.js"></script>

</html>