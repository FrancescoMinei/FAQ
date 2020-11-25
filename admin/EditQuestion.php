<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/styleEditQuestion.css">
    <title>Modifica</title>
</head>
<body>
<div class="Wrapper">
        <form action="../php/AddCategory.php" method="POST">
            <div class="Square">
                <h1 id="Text">Modifica</h1>
                <label>Seleziona la categoria: </label>
                <select name="Category" id="cmbMake" name="Make">
                <?php
                require '../php/DBManager.php';
                echo LoadCategoryWithIndex();
                ?>
                </select>
                <input type="submit" id="btn_submit" value="Aggiungi">
            </div>
        </form>
    </div>
</body>
</html>