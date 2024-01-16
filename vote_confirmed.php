<?php
    // Connect to the database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "SistemaDiVoto1";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get the selected candidate ID from the URL
    $candidate_id = $_POST['candidate'];

    //aggiunta di voti al candidato
    $sql = "UPDATE candidati SET voti = voti + 1 WHERE id_candidato = $candidate_id";
    $result = $conn->query($sql);

    echo "Voto confermato!";
    echo '<br><button type="button"><a href="index.php">Torna alla pagina iniziale</a></button>';

    $conn->close();
?>
