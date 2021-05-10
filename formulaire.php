<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Thomas DA SILVA PENAS - Test d'admission FINELIA</title>
    <link rel="stylesheet" href="style/style.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="js/javascript.js"></script>
</head>

<body>
    <div id="connexion-bd">
        <!--Test de la connexion à la BD -->
        <?php $servername = 'localhost';
        $login = 'root';
        $pwd = '';


        $connexion = new PDO("mysql:host=$servername;dbname=finelia_db", $login, $pwd);
        if (!$connexion) {
            die('Erreur : ' . mysqli_connect_error());
        }
        echo 'Connexion à la base réussie';

        //Requêtes de récupération des données dans la base MySQL
        $etudiants = $connexion->query('SELECT * FROM etudiant');
        $matières = $connexion->query('SELECT * FROM matiere');
        ?>
    </div>
    <form action="moyenne.php" method="post">
        <p>Choisissez un étudiant, une matière et rentrez la note ainsi que le coef :</p>
        <select name="etudiant">
            <?php
            while ($etudiant = $etudiants->fetch()) { ?>
                <option value=<?php echo "" . $etudiant['id_etudiant']. ""?>>
                <?php echo $etudiant['nom'] . " " . $etudiant['prenom'];?></option>
            <?php
            } ?>           
        </select>
        
        <select name="matiere">
        <?php
            while ($matiere = $matières->fetch()) { ?>
                <option value=<?php echo "" . $matiere['id_matiere']. ""?>>
                <?php echo $matiere['nom_matiere'];?></option>
            <?php
            } ?>
        </select>
        <p>Note : <input type="text" name="note"> </p>
        <p>Coef : <input type="text" name="coef"> </p>

        <p><input type="submit" value="Valider" id="submitBtn"></p>
    </form>

</body>

</html>