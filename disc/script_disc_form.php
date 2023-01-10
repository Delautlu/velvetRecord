<?php
    // Récupération des valeurs :
    $id = (isset($_POST['id']) && $_POST['id'] != "") ? $_POST['id'] : Null;
    $nom = (isset($_POST['nom']) && $_POST['nom'] != "") ? $_POST['nom'] : Null;
    $url = (isset($_POST['url']) && $_POST['url'] != "") ? $_POST['url'] : Null;

    // En cas d'erreur, on renvoie vers le formulaire
    if ($id == Null) {
        header("Location: discs.php");
    }
    elseif ($nom == Null || $url == Null) {
        header("Location: disc_form.php?id=".$id);
        exit;
    }

    // Si la vérification des données est ok :
    require "db.php"; 
    $db = ConnexionDisc();

    try {
        // Construction de la requête UPDATE sans injection SQL :
        $requete = $db->prepare("UPDATE disc SET disc_id =:id, disc_title = :titre, disc_year =:annee, disc_label =:label, disc_genre =:cat, disc_price =:prix, disc_picture =:img_disc
        WHERE disc_id = :id;");
        
        $requete->bindValue(":id", $id, PDO::PARAM_STR);
        $requete->bindValue(":titre", $titre, PDO::PARAM_INT);
        $requete->bindValue(":annee", $annee, PDO::PARAM_STR);
        $requete->bindValue(":label", $label, PDO::PARAM_STR);
        $requete->bindValue(":cat", $cat, PDO::PARAM_STR);
        $requete->bindValue(":prix", $prix, PDO::PARAM_STR);
        $requete->bindValue(":img_disc", $img_disc, PDO::PARAM_STR);

        $requete->execute();
        $requete->closeCursor();
    }

    catch (Exception $e) {
        echo "Erreur : " . $requete->errorInfo()[2] . "<br>";
        die("Fin du script (script_disc_form.php)");
    }

    // Si OK: redirection vers la page artist_detail.php
    header("Location: disc_detail.php?id=" . $id);
    exit;

    ?>