<?php
require("../config.php");

require("../classes/utilisateur.class.php");
require("../classes/gestionnaireUtilisateur.class.php");

require("../classes/page.class.php");
require("../classes/gestionnairepages.class.php");
require("../classes/bdd.class.php");


$gestion_p = new GestionnairePages();

?>
<doctype html>
    <html lang="fr">

        <head>
            <meta charset="UTF-8">
            <title>Liste des pages</title>
            <link rel="stylesheet" href="CSS/list.css">
        </head>

        <h2>Les pages du site : </h2>
        <ul>
            <?php $gestion_p->afficher_liste_admin() ?>
        </ul>
        <div style="display: flex; flex-direction: column;">
            <a href="editeur_page.php"><button>Ajouter une page</button></a>

            <a href="index.php">Revenir à la page accueil admin</a>
        </div>