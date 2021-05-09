<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Thomas DA SILVA PENAS - Test d'admission FINELIA</title>
        <link rel="stylesheet" href="style.css">
    </head>

    <body>
        
        <!--Test de la connexion à la BD -->
        <?php   $servername = 'localhost';
                $login = 'root';
                $pwd = '';

                $connexion = new PDO("mysql:host=$servername;dbname=finelia_db", $login, $pwd);
                if(!$connexion){
                    die('Erreur : ' .mysqli_connect_error());
                }
                echo 'Connexion réussie';
                
                //Requêtes de récupération des données dans la base MySQL
                $etudiants = $connexion->query('SELECT * FROM etudiant');
                $matières = $connexion->query('SELECT * FROM matiere');
        ?>  
            <form action="moyenne.php" method="post">
                <p>Rentrez les notes des étudiants suivants :</p>
        <?php
                while ($etudiant = $etudiants->fetch()){
        ?>
                    <p><?php echo $etudiant['nom'] . " " . $etudiant['prenom'];?>

                    </p>
          <?php } ?>
                <p><input type="submit" value="OK"></p>
            </form>
    </body>
</html>