<?php
    require "db.php";
    $db = ConnexionDisc();
    $requete = $db->prepare("SELECT * FROM disc  WHERE disc_id=?");
    $requete->execute(array($_GET["id"]));
    $myArtist = $requete->fetch(PDO::FETCH_OBJ);
    $requete->closeCursor();

    $choixart = $db->query("SELECT artist_name, artist_id FROM artist");
    $tableau = $choixart->fetchAll(PDO::FETCH_OBJ);
    $choixart->closeCursor();

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Modifier</title>
    
</head>
<body>

<h1>Modifier un vinyle</h1>

<form action ="script_disc_form.php" method="post">

<input type="hidden" name="id" value="<?= $myArtist->disc_id ?>">

<label for="titre">Title</label><br>
<input type="text" name="title" id="titre" value="<?= $myArtist->disc_title ?>">
<br><br>

<label for="nom">Artist</label><br>
    <select id="nom" name="artist_name">
        <option value="select">Veuillez sélectionner un artiste</option>
        <?php foreach ($choixart as $choix): ?>
            <option value=<?=$choix->artist_id?> ><?= $choix->artist_name ?></option>
        <?php endforeach; ?>                
    </select> 
<br><br>

<label for="annee">Year</label><br>
<input type="text" name="annees" id="annee" value="<?= $myArtist->disc_year ?>">
<br><br>

<label for="cat">Genre</label><br>
<input type="text" name="genres" id="cat" value="<?= $myArtist->disc_genre ?>">
<br><br>

<label for="label">Label</label><br>
<input type="text" name="labels" id="label" value="<?= $myArtist->disc_label?>">
<br><br>

<label for="prix">Price</label><br>
<input type="text" name="price" id="prix" value="<?= $myArtist->disc_price?>">
<br><br>

<label for="disc_picture">Picture :</label><br>
<input type="file" name="img" id="img_disc"><br>
<img src="assets/img/<?= $myArtist->disc_picture ?>" alt="<?= $myArtist->disc_picture?>"><br><br>

<a href="script_disc_form.php" class="btn btn-primary">Modifier</a>
<a href="discs.php" class="btn btn-primary">Retour</a>

</form>

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
