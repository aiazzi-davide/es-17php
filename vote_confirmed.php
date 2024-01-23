<?php
    global $conn;
    require("func.php");


    // Get the selected candidate ID from the URL
    $candidate_id = $_POST['candidate'];

    //aggiunta di voti al candidato
    $sql = "UPDATE candidati SET voti = voti + 1 WHERE id_candidato = $candidate_id";
    $result = $conn->query($sql);

    echo "Voto confermato!";
    echo '<br><button type="button"><a href="index.php">Torna alla pagina iniziale</a></button>';

    $conn->close();
?>
