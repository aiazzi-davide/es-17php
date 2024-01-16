<?php
// HTML per la pagina di benvenuto
echo '<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Sistema di Voto</title>
</head>
<body>
    <h1>Benvenuto nel Sistema di Voto</h1>
    <p>Per favore, premi il pulsante qui sotto per iniziare il processo di voto.</p>
    <form action="select_list.php" method="post">
        <input type="submit" value="Inizia a Votare">
    </form>
</body>
</html>';
?>