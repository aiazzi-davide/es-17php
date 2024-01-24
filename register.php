<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css">

    <title >register</title>
</head>
<body>
<div class="myAnim" id="div1">
    <h1 class="myAnim"  id="h1">Register</h1>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="form" id="form" autocomplete="off">
        <div class="form__groupL">
            <input type="text" name="cognome" id="cognome" placeholder="Cognome" class="form__field" required>
            <input type="text" name="nome" id="nome" placeholder="Nome" class="form__field" required>
            <input type="email" name="email" id="email" placeholder="Email" class="form__field" required>
            <input type="password" name="password" id="password" placeholder="Password" class="form__field" required>
            <input type="password" name="password2" id="password2" placeholder="Conferma Password" class="form__field" required>
            <input type="submit" value="Register" class="form__submit rnbw">
        </div>

        <script src="js/script.js"></script>
        </form>
    </div>
</body>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require 'func.php';
    global $conn;
    $cognome = $_POST['cognome'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];
    $sql = "INSERT INTO user (cognome, nome, email, password) VALUES ('$cognome', '$nome', '$email', '$password')";
    if ($password == $password2) {
        if ($conn->query($sql) === TRUE) {
            echo "Registrazione avvenuta con successo";
        } else {
            echo "Errore: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Le password non coincidono";
    }
}
?>
</html>