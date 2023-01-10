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
    <meta name="viewport" content="width=device-width, initial-scale=1.0 shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Disques- Ajout</title>
</head>
<body>

    <h1 class="titre">Ajouter un vinyle</h1>
    <br>
    <br>
    <div class="container form-group">
    <form action= "script_disc_new.php" method="post" enctype="multipart/form-data">

        <label for="disc_title">Title:</label><br>
        <input type="text" class="form-control" id="disc_title">
        <br><br>
        <label for="artist_name">Artist:</label><br>
        <select id="artist_name" class="form-control"><span id="sj"></span>
                        <option value="selection">Veuillez sélectionner un artist</option>
                        <?php foreach ($tableau as $name): ?>
                            <option value=<?=$name->artist_id?> ><?= $name->artist_name ?></option>
                        <?php endforeach; ?>
                        
        </select> 
        <br><br>
        <label for="disc_year">Year:</label><br>
        <input type="text" class="form-control"  id="disc_year">
        <br><br>
        <label for="disc_genre">Genre:</label><br>
        <input type="text" class="form-control" id="disc_genre">
        <br><br>
        <label for="disc_label">Label:</label><br>
        <input type="text" class="form-control"  id="disc_label">
        <br><br>
        <label for="disc_price">Price:</label><br>
        <input type="text" class="form-control"  id="disc_price">
        <br><br>
        <label for="disc_picture">Picture :</label><br>
        <input type="file" name="artist_id" id="img_disc"> 
        <br><br>
        <input class="btn btn-primary" type="submit" value=" Ajouter">
        <input class="btn btn-primary" type= "reset" value="Retour">
    </form>
    <br><br>
     <a href="discs.php"><button>Retour à la liste des disques</button></a>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>