<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Thomas DA SILVA PENAS - Test d'admission FINELIA</title>
        <link rel="stylesheet" href="style/style.css"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="js/javascript.js"></script>
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Itim&display=swap" rel="stylesheet">   
    </head>

    <body>
        <div id="connexion-bd">
            <!--Test de la connexion à la BD -->
            <?php $servername = 'localhost';
            $login = 'root';
            $pwd = '';

            //Connexion
            try{
                $connexion = new PDO("mysql:host=$servername;dbname=finelia_db", $login, $pwd);
                echo 'Connexion à la base réussie';
            } 
            catch(Exception $e){
                die('Erreur : ' . $e->getMessage());
            }

            //Requêtes de récupération des données dans la base MySQL
            $etudiants = $connexion->query('SELECT * FROM etudiant');
            $matières = $connexion->query('SELECT * FROM matiere');
            ?>
        </div>
        
        <form action="moyenne.php" method="post">
            <p id="consigne">Choisissez un étudiant, une matière et rentrez la note ainsi que le coefficient :</p>

            <!-- Liste déroulante de tous les étudiants -->
            <select name="etudiant">
                <?php
                while ($etudiant = $etudiants->fetch()) { ?>
                    <option value=<?php echo "" . $etudiant['id_etudiant']. ""?>>
                    <?php echo $etudiant['nom'] . " " . $etudiant['prenom'];?></option>
                <?php
                } ?>           
            </select>

            <!-- Liste déroulante de toutes les matières -->
            <select name="matiere">
            <?php
                while ($matiere = $matières->fetch()) { ?>
                    <option value=<?php echo "" . $matiere['id_matiere']. ""?>>
                    <?php echo $matiere['nom_matiere'];?></option>
                <?php
                } ?>
            </select>
            
            <!-- Saisie clavier de la note et du coef -->
            <p>Note : <input type="text" name="note"> </p>
            <p>Coef : <input type="text" name="coef"> </p>

            <p><input type="submit" value="Valider" id="submitBtn"></p>
        </form>
    </body>
</html>