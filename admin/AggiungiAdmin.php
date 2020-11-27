<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/styleAdmin.css">
    <title>Aggiungi Admin</title>
</head>
<body>
<div class="Wrapper">
        <form action="../php/AddAdmin.php" method="POST">
            <div class="Square">
                <h1 id="Text">Aggiungi Admin</h1>
                <input name="Username" id="Input-item" type="text" class="form-control" placeholder="UserName" aria-label="Categoria" aria-describedby="basic-addon2" required="" autofocus="">
                <input name="Password" id="Input-item" type="password" class="form-control" placeholder="Password" aria-label="Categoria" aria-describedby="basic-addon2" required="" autofocus="">
                <input name="Password2" id="Input-item" type="password" class="form-control" placeholder="Ripeti password" aria-label="Categoria" aria-describedby="basic-addon2" required="" autofocus="">               
                <input type="submit" id="btn_submit" value="Aggiungi">
            </div>
        </form>
    </div>
</body>
</html>