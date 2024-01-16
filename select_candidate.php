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

// Get the selected list ID from the URL
$list_id = $_GET['list'];

// SQL to get candidates for the selected list
$sql = "SELECT id_candidato, cognome, nome FROM candidati WHERE id_lista = $list_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Start the form and the select element
    echo '<form action="confirm_vote.php" method="get">';
    echo '<select name="candidate">';

    // Output each candidate as an option
    while($row = $result->fetch_assoc()) {
        echo '<option value="'. $row['id_candidato'] .'">'. $row['cognome'] . ' ' . $row['nome'] . '</option>';
    }

    // Close the select element and add the submit button
    echo '</select>';
    echo '<input type="submit" value="Vote">';
    echo '</form>';
} else {
    echo "0 results";
}

$conn->close();
?>