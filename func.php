<?php
// Connessione al database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "SistemaDiVoto1";

$conn = new mysqli($servername, $username, $password, $dbname)
or die("Connessione al database fallita: " . $conn->connect_error);


?>