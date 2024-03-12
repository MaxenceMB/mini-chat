<?php

include "connexionBD.php";
$pdo = createConnection();

$stmt = $pdo->prepare("SELECT * FROM chatJS ORDER BY horaire LIMIT 10");

if ($stmt == false) {
    echo "PREPARE ERROR";
} else {
    $stmt->execute();
    while ($row = $stmt->fetch()) {
        echo "<div>";
        echo "<p> ".$row['contenu']."</p>";
        if ($row['horaire'] > $timestamp = strtotime('today midnight')) {
            echo "<p> from ".$row['userPseudo']." at ".date('H:i A', $row['horaire'])."</p>";
        } else {
            echo "<p> from ".$row['userPseudo']." at ".date('H:i A', $row['horaire'])." on ".date('m/d/Y', $row['horaire'])."</p>";
        }
        echo "</div>"; 
    }
}
        
?>