<?php
require("../classes/utilisateur.class.php");
require("../classes/gestionnaireUtilisateur.class.php");

$gestion_u = new GestionnaireUtilisateur();
$gestion_u->verification_admin();// Fonction définie dans le fichier gestionnaireUtilisateur.class.php

$admin = $gestion_u->getUtilisateurActuel(); // Récupération de l'utilisateur actuel


if (!isset($_GET["id"]) || $_GET["id"] == "") {
    // Mode ajout

    $action_titre = "Ajouter";
    $script_traitement = "traitement_ajout_page.php";
    $valeur_champ_titre = ""; // On laisse le champ vide
    $valeur_champ_contenu = ""; // On laisse le champ vide
    $form_suppression = ""; // On ne crée pas de formulaire de suppression
    $voir_page = ""; // On ne crée pas de lien vers la page à afficher

} else {
    // Mode édition
    require("../config.php");

    require("../classes/bdd.class.php");
    require("../classes/page.class.php");
    require("../classes/gestionnairepages.class.php");

    $gestionnaire = new GestionnairePages();
    $page_a_afficher = $gestionnaire->obtenir_page_actuelle();

    $action_titre = "Modifier";
    $script_traitement = "traitement_modif_page.php?id=" . $_GET["id"];
    $valeur_champ_titre = $page_a_afficher->getTitre();
    $valeur_champ_contenu = $page_a_afficher->getContenu();

    $form_suppression = "
    <form name='delete_form' action='traitement_delete_page.php?id=" . $_GET["id"] . "' method='POST'>
        <input type='hidden' name='delete'>
        <input id='delete_button' type='button' value='Supprimer la page'>
    </form>";
    $voir_page = "
    <div style='width: 50%; margin: 5 auto;'>
        <a href='../index.php'><button>Voir la page</button></a>
    </div>";
}

//TO DO : Gérer cas comme 'id=abd' ou 'id=333333333333333'
// Le getionnaire de page nous fournit la première page si l'id n'est pas valide

?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="CSS/editeur.css">

    <title>Administration - <?= $action_titre ?></title>
</head>

<body>

    <h1>Éditeur de page</h1>
    <h2>Vous êtes connecter en tant que <?php echo $admin->getNom(); ?> une page</h2>

    <div style="width: 50%; margin: 0 auto;">
        <a href="index.php"><button>Revenir à la page précédente</button></a>
    </div>

    <?= $voir_page ?>

    <hr />

    <h3><?= $action_titre ?> une page : </h3>

    <div style="width: 50%; margin: 0 auto;">
        <form action="<?= $script_traitement ?>" method="POST">

            <input type="text" placeholder="Title page" name="title" value="<?= $valeur_champ_titre ?>" required>

            <textarea name="content" placeholder="Page content" required><?= $valeur_champ_contenu ?></textarea>

            <input type="submit" value="<?= $action_titre ?>">

        </form>

        <?= $form_suppression ?>

    </div>
    <script src="JS/editeur.js"></script>
</body>