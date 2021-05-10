<?php
include 'formulaire.php';
    $sql = "INSERT INTO note(note, coef, id_matiere, id_etudiant) VALUES ($_POST[note], $_POST[coef], $_POST[matiere], $_POST[etudiant])";

    try{
        $connexion->exec($sql);
    }
    catch(PDOException $e){
        echo "Erreur : " . $e->getMessage();
    }
?>
<button>Calculer la moyenne des étudiants</button>