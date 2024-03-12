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
        echo "<p> from ".$row['userPseudo']." at ".$row['horaire']."</p>";
        echo "</div>"; 
    }
}
        
?>