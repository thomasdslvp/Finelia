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
        ?>

        <form action="moyenne.php" method="post">
            <p>Rentrez une note : <input type="text" name="note" /></p>
            <p>Choisissez une matière : </p>
                <select name="matière">
                <option value="fr">Français</option>
                <option value="hg">Histoire-Géo</option>
                <option value="maths">Mathématiques</option>
                <option value="ang">Anglais</option>
            </select>
        
            <p><input type="submit" value="OK"></p>
        </form>
    </body>
</html>