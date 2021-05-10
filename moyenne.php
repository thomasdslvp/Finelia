<?php

include 'formulaire.php';
    $sql = "INSERT INTO note(note, coef, id_matiere, id_etudiant) VALUES ($_POST[note], $_POST[coef], $_POST[matiere], $_POST[etudiant])";

    try{
        $connexion->exec($sql);     
    }
    catch(PDOException $e){
        echo "Erreur : " . $e->getMessage();
    }

    $etudiants = $connexion->query('SELECT * FROM etudiant');
    

    while ($etudiant = $etudiants->fetch()) {
        $notes = $connexion->query("SELECT * FROM note WHERE id_etudiant = " . $etudiant['id_etudiant']);
        $stmt = $connexion->prepare("SELECT SUM(coef) as coefsum FROM note WHERE id_etudiant = " . $etudiant['id_etudiant']);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $coefsum=$row['coefsum'];
        //DEBUG 
        print_r($coefsum); // --> Somme des coefficients d'un étudiant
        while($note = $notes->fetch()){     

            
        }
        //$notes = $connexion->exec('SELECT * FROM note WHERE id_etudiant =  ' . $etudiant['id_etudiant']);
        echo "" . $etudiant['nom']. " "  . $etudiant['prenom']. "";?> </br><?php    
    } 
    ?>

<!-- Action à définir -->
