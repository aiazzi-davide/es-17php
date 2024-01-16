<?php
// Connessione al database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "SistemaDiVoto1";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connessione al database fallita: " . $conn->connect_error);
}

// Ottieni il numero totale di voti
$sql = "SELECT SUM(voti) AS totale_voti FROM candidati";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$totale_voti = $row["totale_voti"];

// Ottieni il numero di voti per ogni lista
$sql = "SELECT l.nome_lista, SUM(c.voti) AS voti_lista
        FROM liste l
        INNER JOIN candidati c ON l.id_lista = c.id_lista
        GROUP BY l.id_lista";
$result = $conn->query($sql);

echo "<h1>Riepilogo dei voti</h1>";

// Visualizza il riepilogo dei voti
if ($result->num_rows > 0) {
    echo "<table>
            <tr>
                <th>Lista</th>
                <th>Voti assoluti</th>
                <th>Voti percentuali</th>
            </tr>";

    while ($row = $result->fetch_assoc()) {
        $nome_lista = $row["nome_lista"];
        $voti_lista = $row["voti_lista"];
        $percentuale_voti = ($voti_lista / $totale_voti) * 100;

        echo "<tr>
                <td>$nome_lista</td>
                <td>$voti_lista</td>
                <td>$percentuale_voti%</td>
            </tr>";
    }

    echo "</table>";
} else {
    echo "Nessun voto presente.";
}

$conn->close();
?>