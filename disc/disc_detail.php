<?php
    // On se connecte à la BDD via notre fichier db.php :
    require "db.php";
    $db = ConnexionDisc();

    // On récupère l'ID passé en paramètre :
    $id = $_GET["id"];

    // On crée une requête préparée avec condition de recherche :
    $requete = $db->prepare("SELECT * FROM disc INNER JOIN artist ON disc.artist_id = artist.artist_id WHERE disc_id=?");
    // on ajoute l'ID du disque passé dans l'URL en paramètre et on exécute :
    $requete->execute(array($id));

    // on récupère le 1e (et seul) résultat :
    $myArtist = $requete->fetch(PDO::FETCH_OBJ);

    // on clôt la requête en BDD
    $requete->closeCursor();

?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0 shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <title>Détail</title>
    </head>
    <body>
    <h2>Détails</h2>
    <div class="row align-items-center"> 
        <div class="col-6">
            Title<br> 
            <ol class="breadcrumb p-2">
                <li class="breadcrumb-item active" aria-current="page"><?= $myArtist->disc_title ?></li><br>
            </ol>
        </div>
        <div class="col-6">
            Artist<br>
            <ol class="breadcrumb p-2">
                <li class="breadcrumb-item active" aria-current="page"><?= $myArtist->artist_name ?></li><br>
            </ol>
        </div>
    </div>

    <div class= "row align-items-center">
        <div class="col-6">
            Year<br>
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page"><?= $myArtist->disc_year?></li><br>
            </ol>
        </div>
        <div class="col-6">
            Genre<br>
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page"><?= $myArtist->disc_genre?></li><br>
            </ol>
        </div>
    </div>

    <div class= "row align-items-center">
        <div class="col-6">
            Label<br>
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page"><?= $myArtist->disc_label ?></li><br>
            </ol>
        </div>
        <div class="col-6">
            Price<br>
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page"><?= $myArtist->disc_price?></li><br>
            </ol>
        </div>
    </div>
        Picture<br>
        <img src="assets/img/<?= $myArtist->disc_picture ?>" alt="<?= $myArtist->disc_picture?>"><br><br>

        <a href="disc_form.php?id=<?= $myArtist->disc_id?>"class="btn btn-primary">Modifier</a>
        <a href="script_disc_delete.php?id=<?= $myArtist->disc_id?>" id="suppr"><button class="btn btn-primary">Supprimer</button></a>
        <a href="discs.php?id=<?= $myArtist->disc_id?>"class="btn btn-primary">Retour</a>

    

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="assets/js/delete.js"></script>
    </body>


    
</html>



