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
$candidate_id = $_GET['candidate'];

// SQL to get the candidate details
$sql = "SELECT c.cognome, c.nome, l.nome_lista FROM candidati c join liste l on c.id_lista = l.id_lista WHERE id_candidato = $candidate_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output the candidate details
    while($row = $result->fetch_assoc()) {
        echo 'Lista selezionata: '. $row['nome_lista'] . '<br>';
        echo 'Selected Candidate: '. $row['cognome'] . ' ' . $row['nome'] . '<br>';
    }
    // Add the confirm and cancel buttons
    echo '<button type="button"><a href="vote_confirmed.php">Converma</a></button>';
    echo '<button type="button"><a href="index.php">Annulla</a></button>';
} else {
    echo "0 results";
}

$conn->close();
?>