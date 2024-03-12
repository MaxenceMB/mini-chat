<?php
include "connexionBD.php";
$pdo = createConnection();

// Si les champs GET ont bien été renseignés
if(isset($_GET['pseudo']) && isset($_GET['phrase'])) {

    // Variables
    $pseudo = $_GET['pseudo'];
    $phrase = $_GET['phrase'];

    // Préparation
    $req = $pdo->prepare('INSERT INTO chatJS(userPseudo, contenu, horaire)
                              VALUES(:pseudo, :contenu, :horaire)');

    // Requête
    $req->execute(array('pseudo'  => $pseudo,
                        'contenu' => $phrase,
                        'horaire' => time()));

    echo "Success - Message ".$phrase." added to database.";

} else {
    echo "Error - 'pseudo' or 'phrase' not defined";
}