<?php
global $conn;
require("func.php");

// SQL to get lists
$sql = "SELECT id_lista, nome_lista FROM liste";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
    // Start the form and the select element
    echo '<form action="select_candidate.php" method="post">';
    echo '<select name="list">';

    // Output each list as an option
    while($row = $result->fetch_assoc()) {
        echo '<option value="'. $row['id_lista'] .'">'. $row['nome_lista'] . '</option>';
    }

    // Close the select element and add the submit button
    echo '</select>';
    echo '<input type="submit" value="Select List">';
    echo '</form>';
} else {
    echo "0 results";
}

$conn->close();
?>