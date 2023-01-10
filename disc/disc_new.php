<?php

    // on importe le contenu du fichier "db.php"
    include "db.php";
    // on exécute la méthode de connexion à notre BDD
    $db = ConnexionDisc();

    // on lance une requête pour chercher toutes les fiches d'artistes
    $requete = $db->query("SELECT artist_name, artist_id FROM artist");
    // on récupère tous les résultats trouvés dans une variable
    $tableau = $requete->fetchAll(PDO::FETCH_OBJ);
    // on clôt la requête en BDD
    $requete->closeCursor();



?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DISQUES - Ajout</title>
</head>
<body>

    <h1>Ajouter un vinyle</h1>

    <a href="discs.php"><button>Retour à la liste des disques</button></a>

    <br>
    <br>

    <form action ="script_disc_new.php" method="post" enctype="multipart/form-data">

        <label for="disc_title">Title:</label><br>
        <input type="text" name="titre" id="disc_title">
        <br><br>

        <label for="artist_name">Artist:</label><br>
        <select id="artist_name" name="artist_id"><span id="sj"></span>
                        <option value="selection">Veuillez sélectionner un artist</option>
                        <?php foreach ($tableau as $name): ?>
                            <option value=<?=$name->artist_id?> ><?= $name->artist_name ?></option>
                        <?php endforeach; ?>
                        
        </select> 
        <br><br>

        <label for="disc_year">Year:</label><br>
        <input type="text" name="annee" id="disc_year">
        <br><br>

        <label for="disc_genre">Genre:</label><br>
        <input type="text" name="genre" id="disc_genre">
        <br><br>

        <label for="disc_label">Label:</label><br>
        <input type="text" name="label" id="disc_label">
        <br><br>

        <label for="disc_price">Price:</label><br>
        <input type="text" name="prix" id="disc_price">
        <br><br>

        <label for="disc_picture">Picture :</label><br>
        <input type="file" name="img" id="img_disc"> 
    
        <br><br>

        <input type="submit" value="Ajouter">
        <input type="submit" value="Retour">

    </form>
</body>
</html>