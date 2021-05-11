<?php
include('formulaire.php');
//Insertion des données dans la base
$sql = "INSERT INTO note(note, coef, id_matiere, id_etudiant) VALUES ($_POST[note], $_POST[coef], $_POST[matiere], $_POST[etudiant])";

try {
    $connexion->exec($sql);
} 
catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}

//Affichage de tout les étudiants
$etudiants = $connexion->query('SELECT * FROM etudiant');
while ($etudiant = $etudiants->fetch()) {
    $notes = $connexion->query("SELECT * FROM note WHERE id_etudiant = " . $etudiant['id_etudiant']);

    //Calcul de la somme des coefficient pour chaque étudiant
    $stmt = $connexion->prepare("SELECT SUM(coef) as coefsum FROM note WHERE id_etudiant = " . $etudiant['id_etudiant']);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $coefsum = $row['coefsum'];
    $notesum = NULL;

    //Calcul de la somme des produits entre les notes et leur coefficient respectifs
    while ($note = $notes->fetch()) {
        foreach ($note as $n) :
            intval($notesum += ($note['note'] * $note['coef']) / 10); // --> somme des notes avec coefficients appliqués
        endforeach;
    }

    //Affichage des étudiants ainsi que de leur notes?>
    <p id="affiche-moyenne"><?php echo "" . $etudiant['nom'] . " "  . $etudiant['prenom'] . " ";

        if (isset($coefsum))
            print("a " . $notesum / $coefsum . " de moyenne générale");
        else
            print("n'a aucune note pour l'instant"); ?></p>
    </br><?php
}
