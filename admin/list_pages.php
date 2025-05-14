<?php
require("../config.php");

require("../classes/utilisateur.class.php");
require("../classes/gestionnaireUtilisateur.class.php");

require("../classes/page.class.php");
require("../classes/gestionnairepages.class.php");
require("../classes/bdd.class.php");


    $gestion_p = new GestionnairePages();

?>


<h2>Les pages du site : </h2>
<ul>
    <?php $gestion_p->afficher_liste_admin() ?>
</ul>
<a href="editeur_page.php"><button>Ajouter une page</button></a>

<a href="index.php">Revenir à la page accueil admin</a>