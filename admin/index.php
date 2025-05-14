<?php
require("../config.php");

require("../classes/utilisateur.class.php");
require("../classes/gestionnaireUtilisateur.class.php");

require("../classes/page.class.php");
require("../classes/gestionnairepages.class.php");
require("../classes/bdd.class.php");


// On demande au gestionnaire toutes les informations concernant la page a afficher
$gestion_p = new GestionnairePages();

$gestion_u = new GestionnaireUtilisateur();
$gestion_u->verification_admin();// Fonction définie dans le fichier gestionnaireUtilisateur.class.php

$admin = $gestion_u->getUtilisateurActuel(); // Récupération de l'utilisateur actuel

?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="CSS/admin.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">
    <title>Accueil</title>
</head>

<body>

    <h1>Bienvenue en tant qu'admin !</h1>
    <h2>Vous êtes connecter en tant que <?php echo $admin->getNom(); ?></h2>

    <a href="logout.php"><button>Se déconnecter</button></a>
    <a href="../index.php"><button>Voir le site</button></a>

    <hr />

    <h2>Gestion du contenu : </h2>

    <a href="list_pages.php"><button>Pages</button></a>
    <a href="list_videos.php"><button>Vidéos</button></a>
</body>