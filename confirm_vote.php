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
$sql = "SELECT cognome, nome, id_lista FROM candidati WHERE id_candidato = $candidate_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output the candidate details
    while($row = $result->fetch_assoc()) {
        echo 'Selected List: '. $row['id_lista'] . '<br>';
        echo 'Selected Candidate: '. $row['cognome'] . ' ' . $row['nome'] . '<br>';
    }
    // Add the confirm and cancel buttons
    echo '<form action="confirm_vote_action.php" method="get">';
    echo '<input type="hidden" name="candidate" value="'. $candidate_id .'">';
    echo '<input type="submit" name="confirm" value="Confirm">';
    echo '<input type="submit" name="cancel" value="Cancel">';
    echo '</form>';
} else {
    echo "0 results";
}

$conn->close();
?>