<!DOCTYPE html>
<html lang="en">
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
        ?>  
        <div class="logout">
            <a href="login.html"><i class="fas fa-sign-in-alt"></i></a>
        </div>
        </div>
        <div class="MainContent">
        <?php
        echo LoadQuestions(1);
        ?>
        </div>
    </div>
</body>
</html>