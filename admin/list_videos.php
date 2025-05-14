<?php

require_once '../config.php';
require_once '../classes/utilisateur.class.php';
require_once '../classes/gestionnaireUtilisateur.class.php';
require_once '../classes/gestionnairevideos.class.php';
require_once '../classes/bdd.class.php';
require_once '../classes/video.class.php';
require_once '../classes/gestionnairevideos.class.php';

$gestion_v = new GestionnaireVideos();


?>

<h2>Les vidéos du site : </h2>
<ul>
    <?php $gestion_v->afficher_liste_admin() ?>
</ul>

<a href="editeur_video.php"><button>Ajouter une page</button></a>

<a href="index.php">Revenir à la page accueil admin</a>