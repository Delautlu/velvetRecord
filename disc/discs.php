<?php

// on importe le contenu du fichier "db.php"
include "db.php";
// on exécute la méthode de connexion à notre BDD
$db = ConnexionDisc();

// on lance une requête pour chercher toutes les fiches d'artistes
$requete = $db->query("SELECT * FROM disc INNER JOIN artist ON disc.artist_id = artist.artist_id");
// on récupère tous les résultats trouvés dans une variable
$tableau = $requete->fetchAll(PDO::FETCH_OBJ);
// on clôt la requête en BDD
$requete->closeCursor();

$calcul = $db->query("SELECT COUNT(disc_id) AS total FROM disc ");
$compte = $calcul->fetch();
$total = $compte['total'];
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0 maximum-scale=1, user-scalable=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Disques Velvet record</title>
</head>

<body>
    <td><a href="disc_new.php"><button type="button" class="btn btn-primary float-right" id="aj">Ajouter</button></a>
    </td>
   
<div class="container-fluid">
        <h2><p class="font-weight-bold">Liste des disques (<?= $total ?>)</p></h2>    
    <div class="row">
        <?php foreach ($tableau as $disc): ?>
        <div class="card col-5 m-4" style="width:18rem;"id="card">
            <div class="row">
                <img src="assets/img/<?= $disc->disc_picture ?>" style="max-width:100%;height:auto"  class="card-img-top col-6" id="imgcard" alt="mage">
                    <div class="card-body col-6">
                    <p class="text-right font-weight-bold"><?= $disc->disc_title ?>
                    <p class="text-right font-weight-bold"><?= $disc->artist_name ?>
                    <p class="text-right">Label : <?= $disc->disc_label ?>
                    <p class="text-right">Year : <?= $disc->disc_year ?>
                    <p class="text-right">Genre :<?= $disc->disc_genre ?>
                    <p class="text-right"><a href="disc_detail.php?id=<?= $disc->disc_id ?>" class="btn btn-primary stretched-link">Détails</a>
                    </div>
            </div>
                
        </div>
        <?php endforeach; ?>
    </div>
</div> 
















    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
</body>

</html>