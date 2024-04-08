<?php

include "connexionBD.php";
$pdo = createConnection();

$stmt = $pdo->prepare("SELECT * FROM (SELECT * FROM chatJS WHERE idRoom = :idRoom ORDER BY horaire DESC LIMIT 10) AS sub ORDER BY idMessage ASC");

if ($stmt == false) {
    echo "PREPARE ERROR";
} else {
    $stmt->execute([":idRoom" => $_POST["room"]]);
    while ($row = $stmt->fetch()) {
        $messageDiv = "";
        $id         =  $row['idMessage'];
        $pseudo     = ($row['userPseudo'] == "") ? "Anonymous" : $row['userPseudo'];
        $contenu    =  $row['contenu'];
        $dateMsg    = ($row['horaire'] > $timestamp = strtotime('today midnight')) ? date('H:i A', $row['horaire']) : date('H:i A', $row['horaire'])." on ".date('d/m/Y', $row['horaire']);

        $messageDiv .= "<div class = 'msg' data-msg = ".$id.">";
        $messageDiv .= "<p class = 'msg-text'> ".$contenu."</p>";
        $messageDiv .= "<p class = 'msg-info'> from ".$pseudo." at ".$dateMsg."</p>";
        $messageDiv .= "</div>"; 

        $messages[$row['idMessage']] = $messageDiv;
    }

    echo json_encode($messages);
}