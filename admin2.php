<?php
 require 'func.php';
 global $conn;

 $id_lista = $_POST['list'];
    $sql = "SELECT cognome, nome, nome_lista, voti FROM candidati JOIN liste ON candidati.id_lista = liste.id_lista WHERE candidati.id_lista = $id_lista";
    $result = $conn->query($sql);
    //calcolo totale voti
      $sql2 = "SELECT SUM(voti) AS totale_voti FROM candidati WHERE id_lista = $id_lista";
        $result2 = $conn->query($sql2);
        $row2 = $result2->fetch_assoc();
        $totale_voti = $row2['totale_voti'];
    //calcolo totale assoluto voti
      $sql3 = "SELECT SUM(voti) AS totale_voti_assoluti FROM candidati";
        $result3 = $conn->query($sql3);
        $row3 = $result3->fetch_assoc();
        $totale_voti_assoluti = $row3['totale_voti_assoluti'];

    if ($result->num_rows > 0) {
        echo '<table>';
        echo '<tr>';
        echo '<th>Cognome</th>';
        echo '<th>Nome</th>';
        echo '<th>Lista</th>';
        echo '<th>Voti</th>';
        echo '<th>% Relativa</th>';
        echo '<th>% Assoluta</th>';
        echo '</tr>';
        while($row = $result->fetch_assoc()) {
            echo '<tr>';
            echo '<td>' . $row['cognome'] . '</td>';
            echo '<td>' . $row['nome'] . '</td>';
            echo '<td>' . $row['nome_lista'] . '</td>';
            echo '<td>' . $row['voti'] . '</td>';
            if ($totale_voti == 0) {
                $percentuale_voti = 0;
            } else {
                $percentuale_voti = ($row['voti'] / $totale_voti) * 100;
                $percentuale_voti = number_format($percentuale_voti, 2);
            }
            if ($totale_voti_assoluti == 0){
             $percentuale_voti_assoluti = 0;
            } else {
                $percentuale_voti_assoluti = ($row['voti'] / $totale_voti_assoluti) * 100;
                $percentuale_voti_assoluti = number_format($percentuale_voti_assoluti, 2);

            }
            //percentuale relativa
            echo '<td>' . $percentuale_voti . ' % </td>';
            //percentuale assoluta
            echo '<td>' . $percentuale_voti_assoluti . ' % </td>';
            echo '</tr>';
        }
        echo '</table>';
    } else {
        echo "0 results";
    }

?>
