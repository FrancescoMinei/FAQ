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
            <h1 id="Title">Category</h1>
                <?php
                require "php/DBManager.php" ;
                echo LoadCategory();
                session_start();
                    if(!isset($_SESSION['Username'])){
                ?>
                <div class="logout">
                    <a href="login.html"><i class="fas fa-sign-in-alt"></i></a>
                </div>
                <?php } else { ?>
                    <div class="AdminControl">
                    <li id="AdminStuff"><a href="admin/AggiungiAdmin.php">Aggiungi admin</a></li>
                    <li id="AdminStuff"><a href="admin/AggiungiCategoria.php">Aggiungi categoria</a></li>
                    <li id="AdminStuff"><a href="admin/AggiungiDomanda.php">Aggiungi domanda e risposta</a></li>
                    <li id="AdminStuff"><a href="admin/EditQuestion.php">Modifica</a>
                    <select id="AdminStuff" name="Category" id="cmbMake" name="Make">
                    <?php
                    require 'php/DBManager.php';
                    echo LoadCategoryWithIndex();
                    ?>
                    </select></li>
                    
                    </div>
                    <div class="logout">
                        <a href="logout.php"><i class="fas fa-sign-out-alt"></i></a>
                    </div>
                    <?php } ?>
        </div>
        <div class="MainContent">
            <?php 
            echo LoadQuestions(1);?>
                <!--<h1>FAQ</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Elit ullamcorper dignissim cras tincidunt lobortis feugiat vivamus at. Integer malesuada nunc vel risus commodo viverra. Volutpat odio facilisis mauris sit amet massa vitae tortor. Orci ac auctor augue mauris augue neque gravida in fermentum. Augue neque gravida in fermentum et sollicitudin ac. Tellus id interdum velit laoreet. Cras fermentum odio eu feugiat pretium nibh ipsum. Rhoncus est pellentesque elit ullamcorper dignissim. Pellentesque diam volutpat commodo sed egestas egestas. Nisi est sit amet facilisis.
        Facilisis sed odio morbi quis commodo odio aenean. Augue mauris augue neque gravida in fermentum et. Id velit ut tortor pretium viverra suspendisse potenti. Dui nunc mattis enim ut tellus elementum sagittis vitae et. Id venenatis a condimentum vitae sapien pellentesque. Lorem ipsum dolor sit amet consectetur. Elit scelerisque mauris pellentesque pulvinar pellentesque. Ipsum dolor sit amet consectetur adipiscing elit. Ut faucibus pulvinar elementum integer enim neque volutpat ac. At quis risus sed vulputate odio ut. A diam sollicitudin tempor id eu.
        Massa enim nec dui nunc mattis enim ut tellus. Leo a diam sollicitudin tempor. A lacus vestibulum sed arcu non odio euismod lacinia at. Nunc pulvinar sapien et ligula ullamcorper malesuada. At ultrices mi tempus imperdiet nulla malesuada pellentesque elit eget. Magna etiam tempor orci eu lobortis. Ullamcorper malesuada proin libero nunc consequat interdum varius sit amet. Tristique nulla aliquet enim tortor at auctor. Vulputate sapien nec sagittis aliquam malesuada bibendum. Sed viverra ipsum nunc aliquet bibendum. Enim eu turpis egestas pretium aenean pharetra magna. Etiam tempor orci eu lobortis elementum nibh tellus.</p>
        </div>-->
    </div>
</body>

</html>